<?php

namespace App\Nova;

use App\Enums\Colors;
use App\Enums\CourseCategory;
use App\Enums\CourseType;
use App\Enums\Currency;
use App\Nova\Actions\BulkEnrollUsers;
use Laravel\Nova\Http\Requests\NovaRequest;
use Illuminate\Http\Request;
use Laravel\Nova\Actions\ExportAsCsv;
use App\Nova\Abstracts\Resource;
use App\Nova\Repeater\Objective;
use Customf\Fabric\Fabric;
use DigitalCreative\Filepond\Filepond;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Action;
use Laravel\Nova\Fields\Badge;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Repeater;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Panel;
use Illuminate\Support\Str;
use Laravel\Nova\Fields\FormData;
use App\Nova\ZoomMeeting;

class Course extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Course>
     */
    public static $model = \App\Models\Course::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * Indicates if the resource should be displayed in the sidebar.
     *
     * @return bool
     */
    public static function availableForNavigation(Request $request)
    {
        return $request->user()->isAdmin() || $request->user()->hasPermissionTo('view course');
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'name'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Slug::make('Slug')
                ->hideFromIndex()
                ->from('Name')
                ->required(),

            Select::make('Course Category', 'category')->options(
                array_column(CourseCategory::cases(), 'value', 'value')
            )
                ->sortable()
                ->searchable()
                ->required()
                ->showWhenPeeking()
                ->showOnPreview(),

            Select::make('Color', 'color')->options(
                array_column(Colors::cases(), 'value', 'value')
            )
                ->sortable()
                ->required()
                ->searchable()
                ->showWhenPeeking()
                ->showOnPreview(),

            Panel::make('Content', $this->content()),
            Panel::make('Pricing', $this->pricing()),

            Badge::make('Status')->map([
                0 => 'danger',
                1 => 'success',
                2 => 'warning',
            ])->labels([
                        0 => 'Unpublished',
                        1 => 'Published',
                        2 => 'Draft',
                    ])->withIcons(),

            HasMany::make('Quiz', 'quizzes', Quiz::class),

            HasMany::make('Zoom Meetings', 'zoomMeetings', ZoomMeeting::class),

            BelongsToMany::make('Departments', 'departments', Department::class)
                ->searchable(),

            BelongsToMany::make('Users', 'users', User::class)
                ->searchable(),

            Panel::make('Certificate', $this->fabricfield()),

        ];
    }

    /**
     * Get certificate field for the resource.
     *
     * @return array
     */
    protected function fabricfield()
    {
        return [
            Fabric::make('certificate')->rules('json')
                ->hideFromDetail()
                ->hideFromIndex()
        ];
    }

    /**
     * Get the content fields for the resource.
     *
     * @return array
     */
    protected function content()
    {
        return [
            Trix::make('Description')
                ->rules('required'),

            Repeater::make('Objectives')
                ->repeatables([
                    Objective::make(),
                ])
                ->required()
                ->asJson(),

            Text::make(__('Objectives'), function ($model) {
                $objectives = $model->objectives;
                $results = [];
                if ($objectives) {
                    foreach ($objectives as $key => $objective) {
                        $results[] = ' ( ' . ($key + 1) . ' ) - ' . $objective['fields']['name'] . '<br>';
                    }
                }
                return implode('', $results);
            })
                ->asHtml()
                ->hideWhenUpdating()
                ->hideWhenCreating(),

            Filepond::make('Course Thumbnail', 'thumbnails')
                ->disk('s3')
                ->path('courses/thumbnails')
                ->rules('required')
                ->image()
                ->prunable(),

            // Filepond::make('Course Video', 'video')
            //     ->disk('s3')
            //     ->path('courses/videos')
            //     ->video()
            //     ->prunable(),
        ];
    }

    /**
     * Get the pricing fields for the resource.
     *
     * @return array
     */
    protected function pricing()
    {
        return [
            Select::make('Course Type', 'type')->options(
                array_column(CourseType::cases(), 'value', 'value')
            )
                ->sortable()
                ->searchable()
                ->required()
                ->showWhenPeeking()
                ->showOnPreview(),

            Select::make('Currency', 'currency')->options(
                array_column(Currency::cases(), 'value', 'value')
            )
                ->hide()
                ->sortable()
                ->searchable()
                ->required()
                ->showWhenPeeking()
                ->showOnPreview()
                ->dependsOn(
                    ['type'],
                    function (Select $field, NovaRequest $request, FormData $formData) {
                        if ($formData->type === 'Paid') {
                            $field->show();
                        }
                    }
                ),

            Number::make('Price', 'amount')
                ->hide()
                ->min(0)
                ->max(100000)
                ->step('any')
                ->nullable()
                ->dependsOn(
                    ['type'],
                    function (Text $field, NovaRequest $request, FormData $formData) {
                        if ($formData->type === 'Paid') {
                            $field->show();
                        }
                    }
                ),

            Number::make('Discount', 'discount')
                ->hide()
                ->min(0)
                ->max(100000)
                ->step('any')
                ->nullable()
                ->dependsOn(
                    ['type'],
                    function (Text $field, NovaRequest $request, FormData $formData) {
                        if ($formData->type === 'Paid') {
                            $field->show();
                        }
                    }
                ),
        ];
    }


    /**
     * Get the menu that should represent the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Nova\Menu\MenuItem
     */
    public function menu(Request $request)
    {
        return parent::menu($request)->withBadge(function () {
            return static::$model::count();
        });
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [
            ExportAsCsv::make()
                ->icon('arrow-down-circle'),
            (new Actions\CourseStatus($this->model()))
                ->exceptOnIndex()
                ->showInline()
                ->size('2xl')
                ->confirmText('Please select the status to be applied.')
                ->confirmButtonText('Change Status')
                ->icon('shield-exclamation'),
            (new Actions\EnrollUsers)
                ->exceptOnIndex()
                ->showInline()
                ->size('2xl')
                ->confirmText('Kindly select the users to be enrolled into the selected course.')
                ->confirmButtonText('Enroll')
                ->icon('user-group'),
            (new Actions\CreateZoomLink)
                ->exceptOnIndex() // Optional: Control where the action appears
                ->showInline()    // Optional: Display the action inline
                ->size('2xl')     // Optional: Set the size of the action button
                ->confirmText('Create Zoom Meeting for this course?') // Optional: Confirmation text
                ->confirmButtonText('Create Zoom Meeting')
                ->icon('video-camera'),

        ];
    }
}

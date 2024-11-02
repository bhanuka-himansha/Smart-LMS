<?php

namespace App\Nova;

use App\Nova\Filters\UserRoleType;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rules;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Line;
use Laravel\Nova\Fields\Stack;
use Laravel\Nova\Nova;
use Carbon\Carbon;
use Laravel\Nova\Actions\ExportAsCsv;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Select;

class User extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\User>
     */
    public static $model = \App\Models\User::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'name',
        'email',
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

            Gravatar::make()->maxWidth(50),

            Text::make('Name', 'name')
                ->sortable()
                ->rules('required', 'max:255'),

            BelongsTo::make('Department', 'department', Department::class)
                ->sortable()
                ->searchable()
                ->withSubtitles()
                ->modalSize('5xl')
                ->showWhenPeeking()
                ->showOnPreview(),

            Text::make('EPF No', 'epfno')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Position', 'position')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Roles', function ($model) {
                return implode(', ', array_column($model->roles->toArray(), 'name'));
            })
                ->showWhenPeeking()
                ->showOnPreview(),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}'),

            Text::make('First Name', 'first_name')
                ->sortable()
                ->rules('required', 'max:255')
                ->hideFromIndex(),

            Text::make('Last Name', 'last_name')
                ->sortable()
                ->rules('required', 'max:255')
                ->hideFromIndex(),

            Text::make('Username', 'username')
                ->sortable()
                ->rules('required', 'max:255')
                ->hideFromIndex(),

            Text::make('Mobile Number', 'mobile')
                ->sortable()
                ->rules('required', 'max:255'),

            Select::make('Gender')->options([
                'Male' => 'Male',
                'Female' => 'Female',
                'Other' => 'Other',
            ]),

            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', Rules\Password::defaults())
                ->updateRules('nullable', Rules\Password::defaults()),

            BelongsToMany::make('Roles', 'roles', \Pktharindu\NovaPermissions\Nova\Role::class)
                ->canSee(function ($request) {
                    // Check if the user is admin or has permission to detach roles
                    return $request->user()->isAdmin() ||
                        $request->user()->hasPermissionTo('view user') ||
                        Gate::allows('detachRole', [$request->user(), $this->resource]);
                })
            ,

            Boolean::make('Status')
                ->default(function () {
                    return true;
                })
                ->showWhenPeeking()
                ->showOnPreview(),

            Stack::make('Created By', [
                Line::make('Created By', function ($model) {
                    if ($model->createdBy?->name == null) {
                        return '-';
                    } else {
                        return '<a class="link-default" href="' . Nova::url('/resources/' . User::uriKey() . '/' . $model->created_by) . '">' . $model->createdBy->name . '</a>';
                    }
                })
                    ->asHeading()
                    ->asHtml(),
                Line::make('Created Time', function ($model) {
                    return Carbon::parse($model->created_at)?->diffForHumans() ?? '-';
                })->asSmall()
            ])
                ->canSee(function () use ($request) {
                    return $request->user()->isAdmin() || $request->user()->hasPermissionTo('view user');
                }),

            Stack::make('Updated By', [
                Line::make('Updated By', function ($model) {
                    if ($model->updatedBy?->name == null) {
                        return '-';
                    } else {
                        return '<a class="link-default" href="' . Nova::url('/resources/' . User::uriKey() . '/' . $model->updated_by) . '">' . $model->updatedBy->name . '</a>';
                    }
                })
                    ->asHeading()
                    ->asHtml(),
                Line::make('Updated Time', function ($model) {
                    return Carbon::parse($model->updated_at)?->diffForHumans() ?? '-';
                })->asSmall(),
            ])
                ->hideFromIndex()
                ->canSee(function () use ($request) {
                    return $request->user()->isAdmin() || $request->user()->hasPermissionTo('view user');
                }),

            BelongsToMany::make('Courses', 'courses', Course::class)
                ->searchable(),
        ];
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
        return [
            UserRoleType::make(),
        ];
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

            (new Actions\UploadUsers)
                ->standalone()
                ->size('2xl')
                ->confirmText('Kindly select your csv file consisting of user data in the predefined format.')
                ->confirmButtonText('Upload & Create Users')
                ->icon('user-group'),
        ];
    }
}

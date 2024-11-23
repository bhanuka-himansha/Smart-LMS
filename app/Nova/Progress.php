<?php

namespace App\Nova;

use Laravel\Nova\Http\Requests\NovaRequest;
use Illuminate\Http\Request;
use Laravel\Nova\Actions\ExportAsCsv;
use App\Nova\Abstracts\Resource;
use Carbon\Carbon;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class Progress extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Progress>
     */
    public static $model = \App\Models\Progress::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title =  'progress';

    /**
     * Indicates if the resource should be displayed in the sidebar.
     *
     * @return bool
     */
    public static function availableForNavigation(Request $request)
    {
        return $request->user()->isAdmin() || $request->user()->hasPermissionTo('view progress');
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'progress'
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


            BelongsTo::make('Content', 'content', Content::class)
                ->sortable()
                ->searchable()
                ->withSubtitles()
                ->modalSize('5xl')
                ->showWhenPeeking()
                ->showOnPreview(),

            BelongsTo::make('Student', 'student', User::class)
                ->sortable()
                ->searchable()
                ->withSubtitles()
                ->modalSize('5xl')
                ->showWhenPeeking()
                ->showOnPreview(),

            Text::make(__('Started At'), function ($model) {
                if ($model->started_at) {
                    return Carbon::parse($model->started_at)->format('Y-m-d | H:i:s A');
                } else {
                    return 'Not Started';
                }
            })
                ->asHtml()
                ->hideWhenUpdating()
                ->hideWhenCreating(),

            Text::make(__('Ended At'), function ($model) {
                if ($model->ended) {
                    return Carbon::parse($model->ended)->format('Y-m-d | H:i:s A');
                } else {
                    return 'In Progress';
                }
            })
                ->asHtml()
                ->hideWhenUpdating()
                ->hideWhenCreating(),
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
        ];
    }
}

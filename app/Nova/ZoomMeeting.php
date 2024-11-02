<?php

namespace App\Nova;

use Laravel\Nova\Http\Requests\NovaRequest;
use Illuminate\Http\Request;
use Laravel\Nova\Actions\ExportAsCsv;
use App\Nova\Abstracts\Resource;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\DateTime;

class ZoomMeeting extends Resource
{
    public static function authorizedToCreate(Request $request)
    {
        return false;
    }

    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\ZoomMeeting>
     */
    public static $model = \App\Models\ZoomMeeting::class;

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
        return $request->user()->isAdmin() || $request->user()->hasPermissionTo('view zoom meeting');
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name',
        'zoom_meeting_title',
        'zoom_meeting_id',
        'zoom_meeting_url',
        'zoom_meeting_password',
    ];

       /**
     * Determine if the current user can view the given resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public function authorizedToView(Request $request)
    {
        return false;
    }

      /**
     * Determine if the current user can update the given resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return bool
     */
    public function authorizedToUpdate(Request  $request)
    {
        return false; // Disable editing for this resource
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()
                ->sortable(),

            BelongsTo::make('Course', 'course', Course::class)
                ->sortable()
                ->searchable()
                ->withSubtitles()
                ->modalSize('5xl')
                ->showWhenPeeking()
                ->showOnPreview(),

            Text::make('Zoom Meeting Title', 'zoom_meeting_title')
                ->sortable(),

            Text::make('Zoom Meeting ID', 'zoom_meeting_id')
                ->sortable(),


            Text::make('Zoom Meeting URL', 'zoom_meeting_url'),

            // Text::make('Zoom Meeting Password', 'zoom_meeting_password')
            //     ->nullable(),

            // DateTime::make('Start Time','start_time')
            // ->sortable(),

            Boolean::make('Mute Upon Entry', 'mute_upon_entry'),

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

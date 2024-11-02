<?php

namespace App\Nova;

use App\Enums\QuestionType;
use Laravel\Nova\Http\Requests\NovaRequest;
use Illuminate\Http\Request;
use Laravel\Nova\Actions\ExportAsCsv;
use App\Nova\Abstracts\Resource;
use App\Nova\Repeater\FillDescription;
use App\Nova\Repeater\FillInTheBlanks;
use App\Nova\Repeater\MultipleChoice;
use App\Nova\Repeater\ShortAnswer;
use App\Nova\Repeater\SingleChoice;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Repeater;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;

class Question extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Question>
     */
    public static $model = \App\Models\Question::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'question';

    /**
     * Indicates if the resource should be displayed in the sidebar.
     *
     * @return bool
     */
    public static function availableForNavigation(Request $request)
    {
        return $request->user()->isAdmin() || $request->user()->hasPermissionTo('view question');
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'question'
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

            BelongsTo::make('Quiz', 'quiz', Quiz::class)
                ->sortable()
                ->searchable()
                ->withSubtitles()
                ->modalSize('5xl')
                ->showCreateRelationButton()
                ->showWhenPeeking()
                ->showOnPreview(),

            Text::make('Question')
                ->sortable()
                ->rules('required', 'max:255'),

            Select::make('Question Type', 'type')->options(
                array_column(QuestionType::cases(), 'value', 'value')
            )
                ->sortable()
                ->showWhenPeeking()
                ->showOnPreview(),

            Repeater::make('Multiple Choice Answers', 'multiple')
                ->repeatables([
                    MultipleChoice::make(),
                ]),

            Repeater::make('Short Answer', 'short')
                ->repeatables([
                    ShortAnswer::make(),
                ]),

            Repeater::make('Fill In The Blanks', 'fill')
                ->repeatables([
                    FillDescription::make(),
                ])
                ->help('*Please indicate answer by adding the answer in between {{ answer }}'),

            Text::make(__('Answer'), function ($model) {
                if ($model->multiple) {
                    $answers = $model->multiple;
                    $results = [];
                    foreach ($answers as $key => $answer) {
                        if($answer['fields']['correct_answer'] == 1){
                            $results[] = ' <span class="text-green-600">( ' . ($key + 1) .  ' ) - ' . $answer['fields']['choice'] . '</span><br>';
                        } else {
                            $results[] = ' ( ' . ($key + 1) .  ' ) - ' . $answer['fields']['choice'] . '<br>';
                        }
                    }
                    return implode('', $results);
                }

                if ($model->short) {
                    $answers = $model->short;
                    $results = [];
                    foreach ($answers as $key => $answer) {
                        $results[] = $answer['fields']['answer'];
                    }
                    return implode('', $results);
                }

                if ($model->fill) {
                    $answers = $model->fill;
                    $results = [];
                    foreach ($answers as $key => $answer) {
                        $results[] = $answer['fields']['description'];
                    }
                    return implode('', $results);
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

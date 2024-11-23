<?php

namespace App\Nova\Repeater;

use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Repeater\Repeatable;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class MultipleChoice extends Repeatable
{
    /**
     * Get the fields displayed by the repeatable.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Text::make('Choice')
                ->sortable()
                ->rules('required', 'max:255'),

            Boolean::make('Correct Answer', 'correct_answer'),
        ];
    }
}

<?php

namespace App\Nova\Actions;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class BulkEnrollUsers extends Action
{
    use InteractsWithQueue, Queueable;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        $courseId = $fields->id;
        $errors = [];
        $iteration = 0;

        //selecting user id = 2 users
        $students = User::whereHas('roles', function ($query) {
            $query->where('id', '2');
        })->get();

        if ($students) {

            foreach ($students as $student) {
                // Check if the course is already attached
                if ($student->courses()?->where('course_id', $courseId)->exists()) {
                    $iteration++;
                    $errors[] = "{$iteration}. {$student->name}. <br/>";
                    continue;
                }

                // Attach the course to the student
                $student->courses()?->attach($courseId);
            }

            if (!empty($errors)) {
                return Action::danger('Some students are alredy enrolled to this couse (Skipped): <br/>' . implode(' ', $errors));
            }

            return Action::message('Course successfully attached to all students.');
        } else {
            return Action::danger('No students found');
        }


    }

    /**
     * Get the fields available on the action.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [

            Select::make('Course Name', 'id')
                ->options(\App\Models\Course::pluck('name', 'id'))
                ->searchable()
                ->required()
                ->sortable(),
        ];
    }
}

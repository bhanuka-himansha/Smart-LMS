<?php

namespace App\Nova\Actions;

use App\Models\Course;
use App\Nova\User;
use App\Models\User as ModelsUser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Outl1ne\MultiselectField\Multiselect;
use Laravel\Nova\Http\Requests\NovaRequest;

class EnrollUsers extends Action
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
        $studentArray = json_decode($fields->students);
        $courseId = $models->first()->id;  // Assuming $models->first() fetches the desired course model.

        if ($studentArray && count($studentArray) > 0) {
            $errors = [];
            foreach ($studentArray as $key => $studentId) {
                $user = ModelsUser::find($studentId);
                if (!$user) {
                    // Collect error for non-existing user
                    $errors[] = "User with ID {$studentId} not found.";
                    continue;
                }

                // Check if the course is already attached
                $iteration = $key + 1;
                if ($user->courses()?->where('course_id', $courseId)->exists()) {
                    $errors[] = "{$iteration}. {$user->name}. <br/>";
                    continue;
                }

                // Attach the course to the user
                $user->courses()?->attach($courseId);
            }

            if (!empty($errors)) {
                return Action::danger('Some actions could not be completed as the below mentioned students are already enrolled in this course: <br/>' . implode(' ', $errors));
            }

            return Action::message('Course successfully attached to all selected students.');
        }

        return Action::danger('No students were provided or an invalid list of students was given.');
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
            Multiselect::make('Students')
                ->placeholder('Select to enroll...')
                ->asyncResource(User::class),
        ];
    }
}

<?php

namespace App\Nova\Actions;

use App\Helpers\ZoomHelper;
use App\Models\Course;
use App\Models\ZoomMeeting;
use Exception;
use Faker\Provider\ar_EG\Text;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Http\Requests\NovaRequest;
use Illuminate\Support\Facades\Http;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text as FieldsText;
use Laravel\Nova\Fields\Trix;
use Jubaer\Zoom\Facades\Zoom;
use Laravel\Nova\Fields\DateTime;

class CreateZoomLink extends Action
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
        $model = $models[0];
        try {
            $data = [
                "name" => $fields->topic,
                "password" => $fields->password,
                "mute" => $fields->mute,
                "start_time" => $fields->start_time,
            ];
            $meeting = ZoomHelper::createMeeting($data);
            ZoomMeeting::create([
                'zoom_meeting_title' => $fields->topic,
                'course_id' => $model->id,
                'zoom_meeting_id' => $meeting['data']['id'],
                'zoom_meeting_url' => $meeting['data']['join_url'],
                'zoom_meeting_password' => Hash::make($meeting['data']['password']),
                'start_time' => $fields -> start_time,
            ]);

            return Action::message('Zoom meetings created successfully for selected courses.');
        } catch (Exception $e) {
            return Action::message($e);
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
            // Trix::make('Biography', 'bio'),
            FieldsText::make('Topic', 'topic')->withMeta([
                'extraAttributes' => [
                    'placeholder' => 'Meeting Topic',
                ],
            ]),
            Password::make('Password', 'password'),
            Boolean::make('mute_upon_entry', 'mute'),
            DateTime::make('Start Time', 'start_time'),
        ];
    }
}

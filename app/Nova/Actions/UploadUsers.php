<?php

namespace App\Nova\Actions;

use App\Imports\UsersImport;
use App\Nova\Course;
use DigitalCreative\Filepond\Filepond;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Http\Requests\NovaRequest;
use Maatwebsite\Excel\Facades\Excel;
use Outl1ne\MultiselectField\Multiselect;

class UploadUsers extends Action
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
        if ($fields->user_csv == null || $fields->user_csv[0] == null || $fields->user_csv[0] == "") {
            return Action::danger('A csv file consisting of user data is a must to continue.');
        }

        $user_data = $fields->user_csv[0];
        $user_data = decrypt($user_data);
        $import = new UsersImport;
        Excel::import($import, $user_data->path);

        if (!empty($import->getErrors())) {
            Log::error('User Import Errors', $import->getErrors());
            return Action::danger('There were errors with the data provided in the CSV. Please check the logs.' . $import->getErrors());
        }

        return Action::message('All users have been imported successfully!');
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
            Filepond::make('Users CSV', 'user_csv')
                ->required()
                ->single()
                ->prunable()
                ->disableCredits()
                ->disablePreview()
                ->acceptedTypes('.csv'),
        ];
    }
}

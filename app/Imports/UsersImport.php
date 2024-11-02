<?php

namespace App\Imports;

use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;

class UsersImport implements ToCollection
{
    public $errors = [];

    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row) {
            if ($key == 0) continue;

            $validator = Validator::make($row->toArray(), [
                '0' => 'required|max:255', // name
                '1' => 'required|max:255', // first_name
                '2' => 'required|max:255', // last_name
                '3' => 'required|max:255|unique:users,username', // username
                '4' => 'required|email|max:255|unique:users,email', // email
                '5' => 'required', // mobile
                '6' => 'required|in:male,female,other', // gender
                '7' => 'required|integer|exists:departments,id', // department_id
                '8' => 'required|max:255', // position
                '9' => 'required|max:255', // epfno
                '10' => 'required|max:255', // role
            ]);

            if ($validator->fails()) {
                $this->errors[] = ['row' => $key, 'errors' => $validator->errors()->all()];
                continue;
            }

            $user = new User();
            $user->name = $row[0];
            $user->first_name = $row[1];
            $user->last_name = $row[2];
            $user->username = $row[3];
            $user->email = $row[4];
            $user->mobile = $row[5];
            $user->gender = $row[6];
            $user->department_id = $row[7];
            $user->position = $row[8];
            $user->epfno = $row[9];
            $user->password = Hash::make('Test321@');
            $user->save();
            $user->assignRole($row[10]);
        }
    }

    public function getErrors()
    {
        return $this->errors;
    }
}

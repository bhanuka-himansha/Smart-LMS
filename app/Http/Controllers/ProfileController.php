<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $departments = Department::orderBy('name', 'asc')->get();
        return view('profile.edit', [
            'user' => $request->user(),
        ], ['departments' => $departments]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $rules = [
            'username' => 'required|unique:users,username,' . Auth::id(),
            'email' => 'required|unique:users,email,' . Auth::id(),
            'epfno' => 'required|unique:users,epfno,' . Auth::id(),
        ];

        $user = User::find(Auth::id());
        if ($user) {
            $validatedData = $request->validate($rules);

            $user->update([
                'username' => $validatedData['username'],
                'email' => $validatedData['email'],
                'epfno' => $validatedData['epfno'],
            ]);

            return Redirect::route('profile.edit')->with('status', 'profile-updated');

        }
        return Redirect::route('profile.edit')->with('error', 'something went wrong');

    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
     * Update user personal details
     */
    public function updateDetails(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:80',
            'last_name' => 'required|max:80',
            'gender' => 'required',
            'department_id' => 'numeric',
            'position' => 'max:150',
        ]);

        $rules = [
            'mobile' => 'required|numeric|unique:users,mobile,' . Auth::id(),
        ];

        $user = User::find(Auth::id());
        if ($user) {
            $validatedData = $request->validate($rules);
            $mobile = $validatedData['mobile'] ?? $user->mobile;
            $name = $request->first_name . " " . $request->last_name;

            $user->update([
                'name' => $name,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'gender' => $request->gender,
                'department_id' => $request->department_id,
                'position' => $request->position,
                'mobile' => $mobile,
            ]);

            return Redirect::route('profile.edit')->with('status', 'details-updated');
        }
        return Redirect::route('profile.edit')->with('error', 'something went wrong');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\DB;

use File;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        $user->fill($request->validated());

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = $user->id . '_photo.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/users'), $filename);
            $user->photo = $filename;
        }

        if (isset($request->deletePhoto)) {
            File::delete(public_path('images/users/' . $user->photo));
            $user->photo = null;
          }

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        if ($request->filled('password')) {
            $validated = $request->validateWithBag('updatePassword', [
                'current_password' => ['required', 'current_password'],
                'password' => ['required', Password::defaults(), 'confirmed'],
            ]);

            $user->update([
                'password' => Hash::make($validated['password']),
            ]);
        }

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
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

         DB::table('task_user')->where('user_id', $user->id)->delete();
         DB::table('space_user')->where('user_id', $user->id)->delete();
        
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdminProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function adminedit(Request $request): View
    {
        return view('admin.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function adminupdate(AdminProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // Handle the profile picture update
    if ($request->hasFile('foto_profile')) {
        // Validate the profile picture
        $request->validate([
            'foto_profile' => 'image|max:2048', // adjust the validation rules as needed
        ]);

        // Store the new profile picture
        $path = $request->file('foto_profile')->store('profile_pictures', 'public');
        
        // Optionally, delete the old profile picture if it exists
        if ($user->foto_profile) {
            Storage::disk('public')->delete($user->foto_profile);
        }

        // Update the user's profile picture path
        $user->foto_profile = $path;
    }

    $user->save();

        $request->user()->save();
        session()->flash('success', 'Profile berhasil diperbarui, silahkan cek email untuk verifikasi');
        return Redirect::route('admin.profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function admindestroy(Request $request): RedirectResponse
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
}

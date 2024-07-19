<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

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
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

 //   public function editprofile($id)
 //   {
  //      $karir = User::findOrFail($id);
  //      return view('admin.admin_edit_karir', compact('karir'));
   // }

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
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfilePhotoRequest;
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

        $validated = $request->validated();

        // Jika email berubah, reset email verification
        if ($user->email !== $validated['email']) {
            $user->email_verified_at = null;
        }

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Update only profile photo.
     */
    public function updatePhoto(ProfilePhotoRequest $request): RedirectResponse
    {
        try {
            $user = $request->user();

            // Delete old photo if exists
            if ($user->photo) {
                Storage::disk('public')->delete('photos/'.$user->photo);
            }

            $photo = $request->file('photo');
            $filename = time().'_'.$user->id.'.'.$photo->getClientOriginalExtension();

            // Store file using public disk with proper permissions
            $path = Storage::disk('public')->putFileAs('photos', $photo, $filename, 'public');

            $user->photo = $filename;
            $user->save();

            // upload successful (no verbose info log)

            return Redirect::route('profile.edit')->with('status', 'photo-updated');
        } catch (\Exception $e) {
            \Log::error('Photo upload failed', [
                'user_id' => auth()->id(),
                'error' => $e->getMessage(),
            ]);

            return Redirect::route('profile.edit')
                ->with('error', 'Gagal upload foto: '.$e->getMessage())
                ->withInput();
        }
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

        // Delete user photo if exists
        if ($user->photo) {
            Storage::disk('public')->delete('photos/'.$user->photo);
        }

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
     * Remove profile photo
     */
    public function removePhoto(Request $request): RedirectResponse
    {
        $user = $request->user();

        if ($user->photo) {
            Storage::disk('public')->delete('photos/'.$user->photo);
            $user->photo = null;
            $user->save();
        }

        return Redirect::route('profile.edit')->with('status', 'photo-removed');
    }
}

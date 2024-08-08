<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str; // Thêm dòng này


class SocialController extends Controller
{
    //
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle Google callback
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        return $this->createOrLoginUser($user);
    }

    // public function redirectToFacebook()
    // {
    //     return Socialite::driver('facebook')->redirect();
    // }


    // public function handleFacebookCallback()
    // {
    //     $user = Socialite::driver('facebook')->user();
    //     return $this->createOrLoginUser($user);
    // }

    // Create or login user
    protected function createOrLoginUser($socialUser)
    {
        $user = User::where('email', $socialUser->getEmail())->first();

        if (!$user) {

            // Download and store the avatar image
            $avatarUrl = $socialUser->getAvatar();
            $avatarContent = file_get_contents($avatarUrl);
            $avatarPath = 'uploads/avatars/id' . Str::random(40) . '.jpg'; // Use a unique file name
            Storage::disk('public')->put($avatarPath, $avatarContent);

            $user = User::create([
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'password' => Str::random(16), // generate a random password
                'so_dien_thoai' => null,
                'anh_dai_dien' => $socialUser->getAvatar(),
                'role' => 'user' // Default role
            ]);
        }

        Auth::login($user, true);
        return redirect('home'); // Redirect to your desired route
    }
}

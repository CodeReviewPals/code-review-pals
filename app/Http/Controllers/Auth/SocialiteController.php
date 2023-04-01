<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Enums\Auth\SocialiteProvider;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;

class  SocialiteController extends Controller
{
    /**
     * @param SocialiteProvider $provider Match the provider from the Enum class.
     *
     * @return RedirectResponse Redirect to the login page.
     */
    public function redirect(SocialiteProvider $provider): RedirectResponse
    {
        return Socialite::driver($provider->value)->redirect();
    }

    /**
     * @param SocialiteProvider $provider Match the provider from the Enum class.
     *
     * @return RedirectResponse
     */
    public function callback(SocialiteProvider $provider): RedirectResponse
    {
        $userData = Socialite::driver($provider->value)->user();

        $user = User::updateOrCreate([
            'github_id'      => $userData->getId(),
            'login_provider' => $provider,
        ], [
            'avatar_url'           => $userData->getAvatar(),
            'password'             => Hash::make($userData->refreshToken),
            'name'                 => $userData->getName(),
            'email'                => $userData->getEmail(),
            'github_token'         => $userData->token,
            'github_refresh_token' => $userData->refreshToken,
        ]);

        Auth::login($user);

        return to_route('dashboard');
    }
}

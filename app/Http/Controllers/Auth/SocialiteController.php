<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Enums\Auth\SocialiteProvider;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

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
    public function callback(SocialiteProvider $provider): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        $userData = Socialite::driver($provider->value)->user();

        $user = User::updateOrCreate([
            'github_id'      => $userData->getId(),
            'login_provider' => $provider,
        ], [
            'avatar_url'           => $userData->getAvatar(),
            'password'             => Hash::make($userData->refreshToken), // @phpstan-ignore-line
            'name'                 => $userData->getName(),
            'email'                => $userData->getEmail(),
            'github_token'         => $userData->token, // @phpstan-ignore-line
            'github_refresh_token' => $userData->refreshToken, // @phpstan-ignore-line
        ]);

        Auth::login($user);
        $token = $user->createToken('pal', $user->tokenAbilities())->plainTextToken;
        request()->session()->put('pal_token', $token);
        return to_route('dashboard.index');
    }
}

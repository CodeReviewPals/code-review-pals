<?php

namespace App\Actions\Discord;

use App\Models\User;
use App\Services\Github\PullRequestService;
use Discord\Builders\MessageBuilder;
use Discord\Parts\Channel\Message;
use Discord\Discord;
use Discord\Parts\User\User as DiscordUser;

class AddPullRequestCommandAction
{
    public function __construct(protected PullRequestService $service)
    {
    }

    public function __invoke(Message $message, Discord $discord, array $matches)
    {
        try {
            $url = $matches[1] ?? '';
            $user = $this->getUser($message->author);
            $this->service->createFromUrl($url, $user);
            $message->reply(
                "Thank you for your interest ❤️ \n Your Pull Request submitted successfully."
            );
        } catch (\Throwable $th) {
            $message->reply(
                'error occurred on creating PR. please check your URL and if everything is ok contact with admins 😉'
            );
        }
    }

    public function getUser(DiscordUser $discordUser): User
    {
        $user = User::discord($discordUser)->first();
        if ($user instanceof User) {
            return $user;
        }
        return User::create([
            'discord_id' => $discordUser->id,
            'name' => $discordUser->username,
            'email' => $discordUser->email,
            'avatar_url' => $discordUser->avatar,
        ]);
    }
}

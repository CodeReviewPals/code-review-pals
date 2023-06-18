<?php

namespace App\Actions\Discord;

use App\Jobs\CreatePullRequestByUrlJob;
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
        $url = $matches[1] ?? '';
        $user = $this->getUser($message->author);

        CreatePullRequestByUrlJob::dispatch($url, $user);

        $message->reply(
            "Thank you for your interest ❤️ \n Your Pull Request submitted successfully."
        );
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

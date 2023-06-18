<?php

namespace App\Actions\Channel;

use App\Actions\Discord\Channels\CreateChannel;
use ReflectionException;
use App\Enums\Discord\ChannelType;
use Saloon\Exceptions\PendingRequestException;
use Saloon\Exceptions\InvalidResponseClassException;
use App\Models\Channel;
use App\Models\PullRequest;

class GetOrCreateAChannelByPullRequestAction
{
    /**
     * @throws InvalidResponseClassException
     * @throws ReflectionException
     * @throws PendingRequestException
     */
    public function execute(PullRequest $pullRequest): Channel
    {
        $mainLang = $pullRequest->repository->language;

        $channel = Channel::name($mainLang)->first();
        if ($channel instanceof Channel) {
            return $channel;
        }
        $channelData = app(CreateChannel::class)
            ->execute(
                name: $mainLang,
                channelType: ChannelType::FORUM,
                parentId: config('services.discord.channels.code_reviews')
            )
            ->dtoOrFail();

        return Channel::create($channelData->toArray());
    }
}

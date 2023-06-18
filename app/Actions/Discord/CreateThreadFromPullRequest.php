<?php

namespace App\Actions\Discord;

use App\DTO\Discord\MessageObject;
use App\Http\Integrations\Discord\Channel\Requests\CreateForumPost;
use App\Models\Channel;
use App\Models\PullRequest;
use Saloon\Contracts\Response;

class CreateThreadFromPullRequest
{
    use DiscordAction;

    /**
     * @throws InvalidResponseClassException
     * @throws ReflectionException
     * @throws PendingRequestException
     */
    public function execute(PullRequest $pullRequest, Channel $channel): Response
    {
        $repository = $pullRequest->repository;
        $tags = $repository->topics;
        $tags[] = $repository->language;
        $message = $this->makeMessage($pullRequest);
        $request = new CreateForumPost(
            name: $pullRequest->title,
            message: $message,
            channelId: $channel->channel_id
        );

        return $this->connector->send($request);
    }

    public function makeMessage(PullRequest $pullRequest): MessageObject
    {
        return new MessageObject('HELLO');
    }
}

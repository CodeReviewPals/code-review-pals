<?php

namespace App\Actions\Discord\Channels;

use ReflectionException;
use Saloon\Contracts\Response;
use App\Enums\Discord\ChannelType;
use App\Actions\Discord\DiscordAction;
use Saloon\Exceptions\PendingRequestException;
use Saloon\Exceptions\InvalidResponseClassException;
use App\Http\Integrations\Discord\Channel\Requests\CreateGuildChannel;

class CreateChannel
{
    use DiscordAction;

    /**
     * @throws InvalidResponseClassException
     * @throws ReflectionException
     * @throws PendingRequestException
     */
    public function execute(
        string $name,
        ChannelType $channelType = ChannelType::TEXT,
        ?string $parentId = null
    ): Response {
        $request = new CreateGuildChannel(
            name: $name,
            channelType: $channelType,
            parentId: $parentId
        );

        return $this->connector->send($request);
    }
}

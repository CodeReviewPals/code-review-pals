<?php

namespace App\Http\Integrations\Discord\Channel\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Response;
use App\DTO\Discord\ChannelData;
use Saloon\Contracts\Body\HasBody;
use App\Enums\Discord\ChannelType;
use Saloon\Traits\Body\HasJsonBody;

class CreateGuildChannel extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * Define the HTTP method
     *
     * @var Method
     */
    protected Method $method = Method::POST;

    public function __construct(
        public string $name,
        public ChannelType $channelType = ChannelType::TEXT,
        public string|int|null $parentId = null,
    ) {}

    /**
     * Define the endpoint for the request
     *
     * @return string
     */
    public function resolveEndpoint(): string
    {
        return '/guilds/'
            . config('services.discord.guild_id')
            . '/channels';
    }

    protected function defaultBody(): array
    {
        return [
            'name'      => $this->name,
            'type'      => $this->channelType->value,
            'parent_id' => $this->parentId,
        ];
    }

    /**
     * @param Response $response
     *
     * @return ChannelData
     */
    public function createDtoFromResponse(Response $response): ChannelData
    {
        return ChannelData::from($response->collect());
    }
}

<?php

namespace App\Http\Integrations\Discord\Channel\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Response;
use App\DTO\Discord\ChannelData;
use App\DTO\Discord\ForumThreadData;
use App\DTO\Discord\MessageObject;
use Saloon\Contracts\Body\HasBody;
use App\Enums\Discord\ChannelType;
use Saloon\Traits\Body\HasJsonBody;

class CreateForumPost extends Request implements HasBody
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
        public MessageObject $message,
        public string $channelId,
        public ?array $tags = null
    ) {
    }

    /**
     * Define the endpoint for the request
     *
     * @return string
     */
    public function resolveEndpoint(): string
    {
        return sprintf('/channels/%s/threads', $this->channelId);
    }

    protected function defaultBody(): array
    {
        return [
            'auto_archive_duration' => config('services.discord.configs.auto_archive_time'),
            'name' => $this->name,
            'message' => $this->message,
            'applied_tags' => $this->tags,
        ];
    }

    /**
     * @param Response $response
     *
     * @return ChannelData
     */
    public function createDtoFromResponse(Response $response): ForumThreadData
    {
        return ForumThreadData::from($response->collect());
    }
}

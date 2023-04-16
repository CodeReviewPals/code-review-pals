<?php

namespace App\Actions\Discord\Channels;

use Exception;
use App\Models\Channel;
use App\Models\Repository;
use Illuminate\Support\Str;
use App\DTO\Discord\ChannelData;
use App\Enums\Discord\ChannelType;
use Illuminate\Database\Eloquent\Model;

class CreateThreadFromRepository
{
    public function execute(Repository $repository): Model|bool
    {
        try {
            /** @var ChannelData $threadData */
            $threadData = app(CreateChannel::class)->execute(
                name: $this->generateChannelName($repository->full_name),
                channelType: ChannelType::FORUM,
                parentId: config('services.discord.channels.code_reviews'),
            )->dtoOrFail();

            return $repository->channels()->save(
                new Channel([
                    'channel_id' => $threadData->channelId,
                    'parent_id'  => $threadData->parentId,
                    'guild_id'   => $threadData->guildId,
                    'type'       => $threadData->type,
                    'name'       => $threadData->name,
                ]),
            );
        } catch (Exception) {
            return false;
        }
    }

    private function generateChannelName(string $name): string
    {
        return Str::slug(
            title: Str::replace(
                search: '/',
                replace: '-',
                subject: $name,
            ),
        );
    }
}

<?php

namespace App\Enums\Discord;

/**
 * @link https://discord.com/developers/docs/resources/channel#channel-object-channel-types Documentation
 */
enum ChannelType: int
{
    case TEXT = 0; // a text channel within a server
    case DM = 1; // a direct message between users
    case VOICE = 2; // a voice channel within a server
    case GROUP_DM = 3; // a direct message between multiple users
    case CATEGORY = 4; // an organizational category that contains up to 50 channels
    case ANNOUNCEMENT = 5; // a channel that users can follow and crosspost into their own server (formerly news channels)
    case ANNOUNCEMENT_THREAD = 10; // a temporary sub-channel within a ANNOUNCEMENT channel
    case PUBLIC_THREAD = 11; // a temporary sub-channel within a TEXT or FORUM channel
    case PRIVATE_THREAD = 12; // a temporary sub-channel within a TEXT channel that is only viewable by those invited and those with the MANAGE_THREADS permission
    case STAGE_VOICE = 13; // a voice channel for hosting events with an audience
    case DIRECTORY = 14; // the channel in a hub containing the listed servers
    case FORUM = 15; // Channel that can only contain threads
}

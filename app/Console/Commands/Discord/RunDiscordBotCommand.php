<?php

namespace App\Console\Commands\Discord;

use Discord\Discord;
use Discord\Parts\Channel\Message;
use Discord\WebSockets\Event;
use Discord\WebSockets\Intents;
use Illuminate\Console\Command;

class RunDiscordBotCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'discord:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'run discord bot';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $discord = new Discord([
            'token' => config('services.discord.bot_token'),
            'intents' => Intents::getAllIntents(),
        ]);

        $discord->on('ready', function (Discord $discord) {
            $discord->on(Event::MESSAGE_CREATE, [$this, 'messageHandler']);
        });
    }

    public function messageHandler(Message $message, Discord $discord)
    {
        if ($message->author->bot) {
            // Do nothing
            return;
        }
        if ($message->content[0] !== '!') {
            // don't listen to messages without !
            return;
        }
        return $this->messageRouting($message, $discord);
    }

    protected function messageRouting(Message $inputMessage, Discord $discord)
    {
        $messages = config('discord.messages');
        foreach ($messages as $message) {
            if (preg_match($message['regex'], $inputMessage->content, $matches)) {
                return app($message['handler'])($inputMessage, $discord, $matches);
            }
            continue;
        }
    }
}

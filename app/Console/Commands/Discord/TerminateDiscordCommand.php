<?php

namespace App\Console\Commands\Discord;

use Illuminate\Console\Command;

class TerminateDiscordCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'discord:terminate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'terminate discord process';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $processId = cache()->get(config('cache.discord.process_id'));

        $this->info("Sending TERM Signal To Process: {$processId}");
        if (!posix_kill($processId, SIGTERM)) {
            $this->error(
                "Failed to kill process: {$processId} (" .
                    posix_strerror(posix_get_last_error()) .
                    ')'
            );
            return;
        }
        cache()->delete(config('cache.discord.process_id'));
    }
}

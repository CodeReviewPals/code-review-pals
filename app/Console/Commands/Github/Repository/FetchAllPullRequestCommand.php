<?php

namespace App\Console\Commands\Github\Repository;

use App\Models\Repository;
use Illuminate\Console\Command;
use App\Jobs\Github\Repository\FetchAllPullRequest;

class FetchAllPullRequestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'github:fetch-pull-request {--repository=*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch repository pull request.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $repositories = null;

        if (!empty($this->option('repository'))) {
            $repositories = Repository::query()
                ->forJob()
                ->whereIn('id', $this->option('repository'))
                ->get();
        }

        FetchAllPullRequest::dispatch($repositories);
    }
}

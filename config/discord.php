<?php

use App\Actions\Discord\AddPullRequestCommandAction;

return [
    /**
     * should be regex
     */
    'messages' => [
        [
            'regex' =>
                '/!add ((https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,}))/',
            'handler' => AddPullRequestCommandAction::class,
        ],
    ],
];

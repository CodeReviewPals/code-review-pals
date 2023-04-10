<?php

return [
    'github' => [
        'pull_request' => [
            'url' => env('REGEX_GITHUB_PULL_URL', '/https:\/\/github\.com\/+([A-Za-z-]+)\/+([A-Za-z-]+)\/pull\/+([0-9]+)/'),
        ],
    ],
];
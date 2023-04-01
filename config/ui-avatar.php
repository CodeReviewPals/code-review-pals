<?php

return [
    'default'   => [
        'size'       => env('UI_AVATAR_SIZE', 64),
        'color'      => env('UI_AVATAR_COLOR', 'ffffff'),
        'background' => env('UI_AVATAR_BACKGROUND', '000000'),
        'bold'       => env('UI_AVATAR_BOLD', true),
    ],
    'base_path' => env('UI_AVATAR_BASE_PATH', 'https://ui-avatars.com/api/'),
];
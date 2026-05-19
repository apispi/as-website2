<?php

return [
    // Enable or disable the Agents feature.
    'enabled' => env('APP_AGENTS_ENABLED', false),

    // Category name in the `products` table used to identify agents.
    'category' => env('AGENTS_CATEGORY', 'Agent'),
];

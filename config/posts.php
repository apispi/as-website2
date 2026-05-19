<?php

return [
    // Enable or disable the posts feature. Preferred env: `APP_POSTS_ENABLED`.
    // Legacy fallbacks: `APP_POST_ENABLED`, `POST_ENABLED` and `POSTS_ENABLED` are still supported.
    'enabled' => filter_var(env('APP_POSTS_ENABLED', env('APP_POST_ENABLED', env('POST_ENABLED', env('POSTS_ENABLED', false)))), FILTER_VALIDATE_BOOLEAN),

    // Model used for posts. Defaults to LocalPost (native posts table).
    // To use WordPress: set POSTS_MODEL=App\\Models\\WpPost in .env
    'model' => env('POSTS_MODEL', App\Models\LocalPost::class),
];

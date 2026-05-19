<?php

return [
    // Enable or disable the posts feature.
    'enabled' => filter_var(env('APP_POSTS_ENABLED', false), FILTER_VALIDATE_BOOLEAN),
];

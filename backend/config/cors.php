<?php

$configuredFrontendOrigins = array_filter(array_map(
    'trim',
    explode(',', (string) env('FRONTEND_URLS', env('FRONTEND_URL', '')))
));

return [
    'paths' => ['api/*', 'up'],
    'allowed_methods' => ['*'],
    'allowed_origins' => array_values(array_unique(array_merge(
        [
            'http://localhost:5173',
            'https://it-management-helpdesk-system.vercel.app',
            'https://it-management-helpdesk-system-charlesv12.vercel.app',
        ],
        $configuredFrontendOrigins
    ))),
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,
];
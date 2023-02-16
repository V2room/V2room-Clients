<?php

return [
    'host' => env('ROUTE_HOST', env('APP_URL', '')),
    'sub_domain' => [
        'admin' => env('ROUTE_SUB_DOMAIN_ADMIN', 'admin'),
        'web' => env('ROUTE_SUB_DOMAIN_WEB', 'web'),
        'api' => env('ROUTE_SUB_DOMAIN_API', 'api'),
    ],
];

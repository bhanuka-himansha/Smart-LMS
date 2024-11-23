<?php

return [
    'client_id' => env('ZOOM_CLIENT_KEY'),
    'client_secret' => env('ZOOM_CLIENT_SECRET'),
    'redirect_uri' => env('ZOOM_ACCOUNT_ID'),
    'base_url' => 'https://api.zoom.us/v2/',
];

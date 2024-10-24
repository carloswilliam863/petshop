<?php



return [

'paths' => ['api/*', 'sanctum/csrf-cookie', 'storage/*'],

'allowed_methods' => ['*'],

'allowed_origins' => ['*'],  // Isso permite qualquer origem. Ajuste conforme necessário.

'allowed_origins_patterns' => [],

'allowed_headers' => ['*'],

'exposed_headers' => [],

'max_age' => 0,

'supports_credentials' => false,


];

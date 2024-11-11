<?php


return [
    'dev' => env('APP_ENV') === 'local', // Verifica se está em desenvolvimento
    'build_directory' => public_path('build'), // Diretório onde os arquivos gerados ficam
    'manifest' => public_path('build/manifest.json'), // Caminho para o manifest.json
    'entrypoints' => [
        'app' => [
            'resources/css/app.css',
            'resources/js/app.js',
        ]
    ],
];

<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],


        //SQL SERVER
        //new PDO("sqlsrv:Server=localhost;Database=testdb", "UserName", "Password");
        'db' => [
            'host' => 'DESKTOP-RKPB187',
            'user' => '',
            'pass' => '',
            'dbname' => 'db_SIMPKB',
            'driver' => '{SQL Server}'
        ],
    ],
];

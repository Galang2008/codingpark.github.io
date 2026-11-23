<?php

// Mengembalikan nilai atau hasil dari fungsi ini.
return [

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Default Queue Connection Name
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Laravel's queue supports a variety of backends via a single, unified
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | API, giving you convenient access to each backend using identical
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | syntax for each. The default queue connection is defined below.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci default pada array atau konfigurasi.
    'default' => env('QUEUE_CONNECTION', 'database'),

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Queue Connections
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Here you may configure the connection options for every queue backend
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | used by your application. An example configuration is provided for
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | each backend supported by Laravel. You're also free to add more.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Drivers: "sync", "database", "beanstalkd", "sqs", "redis",
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |          "deferred", "background", "failover", "null"
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci connections pada array atau konfigurasi.
    'connections' => [

        // Menetapkan nilai untuk kunci sync pada array atau konfigurasi.
        'sync' => [
            // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
            'driver' => 'sync',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci database pada array atau konfigurasi.
        'database' => [
            // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
            'driver' => 'database',
            // Menetapkan nilai untuk kunci connection pada array atau konfigurasi.
            'connection' => env('DB_QUEUE_CONNECTION'),
            // Menetapkan nilai untuk kunci table pada array atau konfigurasi.
            'table' => env('DB_QUEUE_TABLE', 'jobs'),
            // Menetapkan nilai untuk kunci queue pada array atau konfigurasi.
            'queue' => env('DB_QUEUE', 'default'),
            // Menetapkan nilai untuk kunci retry_after pada array atau konfigurasi.
            'retry_after' => (int) env('DB_QUEUE_RETRY_AFTER', 90),
            // Menetapkan nilai untuk kunci after_commit pada array atau konfigurasi.
            'after_commit' => false,
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci beanstalkd pada array atau konfigurasi.
        'beanstalkd' => [
            // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
            'driver' => 'beanstalkd',
            // Menetapkan nilai untuk kunci host pada array atau konfigurasi.
            'host' => env('BEANSTALKD_QUEUE_HOST', 'localhost'),
            // Menetapkan nilai untuk kunci queue pada array atau konfigurasi.
            'queue' => env('BEANSTALKD_QUEUE', 'default'),
            // Menetapkan nilai untuk kunci retry_after pada array atau konfigurasi.
            'retry_after' => (int) env('BEANSTALKD_QUEUE_RETRY_AFTER', 90),
            // Menetapkan nilai untuk kunci block_for pada array atau konfigurasi.
            'block_for' => 0,
            // Menetapkan nilai untuk kunci after_commit pada array atau konfigurasi.
            'after_commit' => false,
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci sqs pada array atau konfigurasi.
        'sqs' => [
            // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
            'driver' => 'sqs',
            // Menetapkan nilai untuk kunci key pada array atau konfigurasi.
            'key' => env('AWS_ACCESS_KEY_ID'),
            // Menetapkan nilai untuk kunci secret pada array atau konfigurasi.
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            // Menetapkan nilai untuk kunci prefix pada array atau konfigurasi.
            'prefix' => env('SQS_PREFIX', 'https://sqs.us-east-1.amazonaws.com/your-account-id'),
            // Menetapkan nilai untuk kunci queue pada array atau konfigurasi.
            'queue' => env('SQS_QUEUE', 'default'),
            // Menetapkan nilai untuk kunci suffix pada array atau konfigurasi.
            'suffix' => env('SQS_SUFFIX'),
            // Menetapkan nilai untuk kunci region pada array atau konfigurasi.
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            // Menetapkan nilai untuk kunci after_commit pada array atau konfigurasi.
            'after_commit' => false,
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci redis pada array atau konfigurasi.
        'redis' => [
            // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
            'driver' => 'redis',
            // Menetapkan nilai untuk kunci connection pada array atau konfigurasi.
            'connection' => env('REDIS_QUEUE_CONNECTION', 'default'),
            // Menetapkan nilai untuk kunci queue pada array atau konfigurasi.
            'queue' => env('REDIS_QUEUE', 'default'),
            // Menetapkan nilai untuk kunci retry_after pada array atau konfigurasi.
            'retry_after' => (int) env('REDIS_QUEUE_RETRY_AFTER', 90),
            // Menetapkan nilai untuk kunci block_for pada array atau konfigurasi.
            'block_for' => null,
            // Menetapkan nilai untuk kunci after_commit pada array atau konfigurasi.
            'after_commit' => false,
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci deferred pada array atau konfigurasi.
        'deferred' => [
            // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
            'driver' => 'deferred',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci background pada array atau konfigurasi.
        'background' => [
            // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
            'driver' => 'background',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci failover pada array atau konfigurasi.
        'failover' => [
            // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
            'driver' => 'failover',
            // Menetapkan nilai untuk kunci connections pada array atau konfigurasi.
            'connections' => [
                // Menjalankan instruksi PHP sebagai bagian dari proses ini.
                'database',
                // Menjalankan instruksi PHP sebagai bagian dari proses ini.
                'deferred',
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            ],
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    ],

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Job Batching
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | The following options configure the database and table that store job
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | batching information. These options can be updated to any database
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | connection and table which has been defined by your application.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci batching pada array atau konfigurasi.
    'batching' => [
        // Menetapkan nilai untuk kunci database pada array atau konfigurasi.
        'database' => env('DB_CONNECTION', 'sqlite'),
        // Menetapkan nilai untuk kunci table pada array atau konfigurasi.
        'table' => 'job_batches',
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    ],

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Failed Queue Jobs
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | These options configure the behavior of failed queue job logging so you
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | can control how and where failed jobs are stored. Laravel ships with
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | support for storing failed jobs in a simple file or in a database.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Supported drivers: "database-uuids", "dynamodb", "file", "null"
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci failed pada array atau konfigurasi.
    'failed' => [
        // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
        'driver' => env('QUEUE_FAILED_DRIVER', 'database-uuids'),
        // Menetapkan nilai untuk kunci database pada array atau konfigurasi.
        'database' => env('DB_CONNECTION', 'sqlite'),
        // Menetapkan nilai untuk kunci table pada array atau konfigurasi.
        'table' => 'failed_jobs',
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    ],

// Menjalankan instruksi PHP sebagai bagian dari proses ini.
];

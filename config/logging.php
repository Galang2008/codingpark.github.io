<?php

// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Monolog\Handler\NullHandler;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Monolog\Handler\StreamHandler;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Monolog\Handler\SyslogUdpHandler;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Monolog\Processor\PsrLogMessageProcessor;

// Mengembalikan nilai atau hasil dari fungsi ini.
return [

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Default Log Channel
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | This option defines the default log channel that is utilized to write
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | messages to your logs. The value provided here should match one of
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | the channels present in the list of "channels" configured below.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci default pada array atau konfigurasi.
    'default' => env('LOG_CHANNEL', 'stack'),

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Deprecations Log Channel
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | This option controls the log channel that should be used to log warnings
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | regarding deprecated PHP and library features. This allows you to get
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | your application ready for upcoming major versions of dependencies.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci deprecations pada array atau konfigurasi.
    'deprecations' => [
        // Menetapkan nilai untuk kunci channel pada array atau konfigurasi.
        'channel' => env('LOG_DEPRECATIONS_CHANNEL', 'null'),
        // Menetapkan nilai untuk kunci trace pada array atau konfigurasi.
        'trace' => env('LOG_DEPRECATIONS_TRACE', false),
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    ],

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Log Channels
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Here you may configure the log channels for your application. Laravel
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | utilizes the Monolog PHP logging library, which includes a variety
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | of powerful log handlers and formatters that you're free to use.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Available drivers: "single", "daily", "slack", "syslog",
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |                    "errorlog", "monolog", "custom", "stack"
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci channels pada array atau konfigurasi.
    'channels' => [

        // Menetapkan nilai untuk kunci stack pada array atau konfigurasi.
        'stack' => [
            // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
            'driver' => 'stack',
            // Menetapkan nilai untuk kunci channels pada array atau konfigurasi.
            'channels' => explode(',', (string) env('LOG_STACK', 'single')),
            // Menetapkan nilai untuk kunci ignore_exceptions pada array atau konfigurasi.
            'ignore_exceptions' => false,
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci single pada array atau konfigurasi.
        'single' => [
            // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
            'driver' => 'single',
            // Menetapkan nilai untuk kunci path pada array atau konfigurasi.
            'path' => storage_path('logs/laravel.log'),
            // Menetapkan nilai untuk kunci level pada array atau konfigurasi.
            'level' => env('LOG_LEVEL', 'debug'),
            // Menetapkan nilai untuk kunci replace_placeholders pada array atau konfigurasi.
            'replace_placeholders' => true,
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci daily pada array atau konfigurasi.
        'daily' => [
            // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
            'driver' => 'daily',
            // Menetapkan nilai untuk kunci path pada array atau konfigurasi.
            'path' => storage_path('logs/laravel.log'),
            // Menetapkan nilai untuk kunci level pada array atau konfigurasi.
            'level' => env('LOG_LEVEL', 'debug'),
            // Menetapkan nilai untuk kunci days pada array atau konfigurasi.
            'days' => env('LOG_DAILY_DAYS', 14),
            // Menetapkan nilai untuk kunci replace_placeholders pada array atau konfigurasi.
            'replace_placeholders' => true,
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci slack pada array atau konfigurasi.
        'slack' => [
            // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
            'driver' => 'slack',
            // Menetapkan nilai untuk kunci url pada array atau konfigurasi.
            'url' => env('LOG_SLACK_WEBHOOK_URL'),
            // Menetapkan nilai untuk kunci username pada array atau konfigurasi.
            'username' => env('LOG_SLACK_USERNAME', env('APP_NAME', 'Laravel')),
            // Menetapkan nilai untuk kunci emoji pada array atau konfigurasi.
            'emoji' => env('LOG_SLACK_EMOJI', ':boom:'),
            // Menetapkan nilai untuk kunci level pada array atau konfigurasi.
            'level' => env('LOG_LEVEL', 'critical'),
            // Menetapkan nilai untuk kunci replace_placeholders pada array atau konfigurasi.
            'replace_placeholders' => true,
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci papertrail pada array atau konfigurasi.
        'papertrail' => [
            // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
            'driver' => 'monolog',
            // Menetapkan nilai untuk kunci level pada array atau konfigurasi.
            'level' => env('LOG_LEVEL', 'debug'),
            // Menetapkan nilai untuk kunci handler pada array atau konfigurasi.
            'handler' => env('LOG_PAPERTRAIL_HANDLER', SyslogUdpHandler::class),
            // Menetapkan nilai untuk kunci handler_with pada array atau konfigurasi.
            'handler_with' => [
                // Menetapkan nilai untuk kunci host pada array atau konfigurasi.
                'host' => env('PAPERTRAIL_URL'),
                // Menetapkan nilai untuk kunci port pada array atau konfigurasi.
                'port' => env('PAPERTRAIL_PORT'),
                // Menetapkan nilai untuk kunci connectionString pada array atau konfigurasi.
                'connectionString' => 'tls://'.env('PAPERTRAIL_URL').':'.env('PAPERTRAIL_PORT'),
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            ],
            // Menetapkan nilai untuk kunci processors pada array atau konfigurasi.
            'processors' => [PsrLogMessageProcessor::class],
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci stderr pada array atau konfigurasi.
        'stderr' => [
            // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
            'driver' => 'monolog',
            // Menetapkan nilai untuk kunci level pada array atau konfigurasi.
            'level' => env('LOG_LEVEL', 'debug'),
            // Menetapkan nilai untuk kunci handler pada array atau konfigurasi.
            'handler' => StreamHandler::class,
            // Menetapkan nilai untuk kunci handler_with pada array atau konfigurasi.
            'handler_with' => [
                // Menetapkan nilai untuk kunci stream pada array atau konfigurasi.
                'stream' => 'php://stderr',
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            ],
            // Menetapkan nilai untuk kunci formatter pada array atau konfigurasi.
            'formatter' => env('LOG_STDERR_FORMATTER'),
            // Menetapkan nilai untuk kunci processors pada array atau konfigurasi.
            'processors' => [PsrLogMessageProcessor::class],
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci syslog pada array atau konfigurasi.
        'syslog' => [
            // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
            'driver' => 'syslog',
            // Menetapkan nilai untuk kunci level pada array atau konfigurasi.
            'level' => env('LOG_LEVEL', 'debug'),
            // Menetapkan nilai untuk kunci facility pada array atau konfigurasi.
            'facility' => env('LOG_SYSLOG_FACILITY', LOG_USER),
            // Menetapkan nilai untuk kunci replace_placeholders pada array atau konfigurasi.
            'replace_placeholders' => true,
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci errorlog pada array atau konfigurasi.
        'errorlog' => [
            // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
            'driver' => 'errorlog',
            // Menetapkan nilai untuk kunci level pada array atau konfigurasi.
            'level' => env('LOG_LEVEL', 'debug'),
            // Menetapkan nilai untuk kunci replace_placeholders pada array atau konfigurasi.
            'replace_placeholders' => true,
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci null pada array atau konfigurasi.
        'null' => [
            // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
            'driver' => 'monolog',
            // Menetapkan nilai untuk kunci handler pada array atau konfigurasi.
            'handler' => NullHandler::class,
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci emergency pada array atau konfigurasi.
        'emergency' => [
            // Menetapkan nilai untuk kunci path pada array atau konfigurasi.
            'path' => storage_path('logs/laravel.log'),
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    ],

// Menjalankan instruksi PHP sebagai bagian dari proses ini.
];

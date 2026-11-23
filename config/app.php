<?php

// Mengembalikan nilai atau hasil dari fungsi ini.
return [

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Application Name
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | This value is the name of your application, which will be used when the
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | framework needs to place the application's name in a notification or
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | other UI elements where an application name needs to be displayed.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci name pada array atau konfigurasi.
    'name' => env('APP_NAME', 'Laravel'),

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Application Environment
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | This value determines the "environment" your application is currently
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | running in. This may determine how you prefer to configure various
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | services the application utilizes. Set this in your ".env" file.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci env pada array atau konfigurasi.
    'env' => env('APP_ENV', 'production'),

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Application Debug Mode
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | When your application is in debug mode, detailed error messages with
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | stack traces will be shown on every error that occurs within your
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | application. If disabled, a simple generic error page is shown.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci debug pada array atau konfigurasi.
    'debug' => (bool) env('APP_DEBUG', false),

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Application URL
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | This URL is used by the console to properly generate URLs when using
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | the Artisan command line tool. You should set this to the root of
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | the application so that it's available within Artisan commands.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci url pada array atau konfigurasi.
    'url' => env('APP_URL', 'http://localhost'),

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Application Timezone
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Here you may specify the default timezone for your application, which
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | will be used by the PHP date and date-time functions. The timezone
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | is set to "UTC" by default as it is suitable for most use cases.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci timezone pada array atau konfigurasi.
    'timezone' => 'UTC',

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Application Locale Configuration
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | The application locale determines the default locale that will be used
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | by Laravel's translation / localization methods. This option can be
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | set to any locale for which you plan to have translation strings.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci locale pada array atau konfigurasi.
    'locale' => env('APP_LOCALE', 'en'),

    // Menetapkan nilai untuk kunci fallback_locale pada array atau konfigurasi.
    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    // Menetapkan nilai untuk kunci faker_locale pada array atau konfigurasi.
    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Encryption Key
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | This key is utilized by Laravel's encryption services and should be set
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | to a random, 32 character string to ensure that all encrypted values
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | are secure. You should do this prior to deploying the application.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci cipher pada array atau konfigurasi.
    'cipher' => 'AES-256-CBC',

    // Menetapkan nilai untuk kunci key pada array atau konfigurasi.
    'key' => env('APP_KEY'),

    // Menetapkan nilai untuk kunci previous_keys pada array atau konfigurasi.
    'previous_keys' => [
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ...array_filter(
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            explode(',', (string) env('APP_PREVIOUS_KEYS', ''))
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ),
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    ],

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Maintenance Mode Driver
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | These configuration options determine the driver used to determine and
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | allow maintenance mode to be controlled across multiple machines.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Supported drivers: "file", "cache"
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci maintenance pada array atau konfigurasi.
    'maintenance' => [
        // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        // Menetapkan nilai untuk kunci store pada array atau konfigurasi.
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    ],

// Menjalankan instruksi PHP sebagai bagian dari proses ini.
];

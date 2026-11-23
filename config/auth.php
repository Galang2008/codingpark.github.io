<?php

// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use App\Models\User;

// Mengembalikan nilai atau hasil dari fungsi ini.
return [

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Authentication Defaults
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | This option defines the default authentication "guard" and password
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | reset "broker" for your application. You may change these values
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | as required, but they're a perfect start for most applications.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci defaults pada array atau konfigurasi.
    'defaults' => [
        // Menetapkan nilai untuk kunci guard pada array atau konfigurasi.
        'guard' => env('AUTH_GUARD', 'web'),
        // Menetapkan nilai untuk kunci passwords pada array atau konfigurasi.
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    ],

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Authentication Guards
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Next, you may define every authentication guard for your application.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Of course, a great default configuration has been defined for you
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | which utilizes session storage plus the Eloquent user provider.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | All authentication guards have a user provider, which defines how the
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | users are actually retrieved out of your database or other storage
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | system used by the application. Typically, Eloquent is utilized.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Supported: "session"
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci guards pada array atau konfigurasi.
    'guards' => [
        // Menetapkan nilai untuk kunci web pada array atau konfigurasi.
        'web' => [
            // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
            'driver' => 'session',
            // Menetapkan nilai untuk kunci provider pada array atau konfigurasi.
            'provider' => 'users',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    ],

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | User Providers
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | All authentication guards have a user provider, which defines how the
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | users are actually retrieved out of your database or other storage
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | system used by the application. Typically, Eloquent is utilized.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | If you have multiple user tables or models you may configure multiple
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | providers to represent the model / table. These providers may then
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | be assigned to any extra authentication guards you have defined.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Supported: "database", "eloquent"
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci providers pada array atau konfigurasi.
    'providers' => [
        // Menetapkan nilai untuk kunci users pada array atau konfigurasi.
        'users' => [
            // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
            'driver' => 'eloquent',
            // Menetapkan nilai untuk kunci model pada array atau konfigurasi.
            'model' => env('AUTH_MODEL', User::class),
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    ],

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Resetting Passwords
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | These configuration options specify the behavior of Laravel's password
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | reset functionality, including the table utilized for token storage
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | and the user provider that is invoked to actually retrieve users.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | The expiry time is the number of minutes that each reset token will be
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | considered valid. This security feature keeps tokens short-lived so
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | they have less time to be guessed. You may change this as needed.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | The throttle setting is the number of seconds a user must wait before
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | generating more password reset tokens. This prevents the user from
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | quickly generating a very large amount of password reset tokens.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci passwords pada array atau konfigurasi.
    'passwords' => [
        // Menetapkan nilai untuk kunci users pada array atau konfigurasi.
        'users' => [
            // Menetapkan nilai untuk kunci provider pada array atau konfigurasi.
            'provider' => 'users',
            // Menetapkan nilai untuk kunci table pada array atau konfigurasi.
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            // Menetapkan nilai untuk kunci expire pada array atau konfigurasi.
            'expire' => 60,
            // Menetapkan nilai untuk kunci throttle pada array atau konfigurasi.
            'throttle' => 60,
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    ],

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Password Confirmation Timeout
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Here you may define the number of seconds before a password confirmation
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | window expires and users are asked to re-enter their password via the
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | confirmation screen. By default, the timeout lasts for three hours.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci password_timeout pada array atau konfigurasi.
    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

// Menjalankan instruksi PHP sebagai bagian dari proses ini.
];

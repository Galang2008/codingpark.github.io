<?php

// Mengembalikan nilai atau hasil dari fungsi ini.
return [

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Third Party Services
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | This file is for storing the credentials for third party services such
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | location for this type of information, allowing packages to have
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | a conventional file to locate the various service credentials.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci postmark pada array atau konfigurasi.
    'postmark' => [
        // Menetapkan nilai untuk kunci key pada array atau konfigurasi.
        'key' => env('POSTMARK_API_KEY'),
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    ],

    // Menetapkan nilai untuk kunci resend pada array atau konfigurasi.
    'resend' => [
        // Menetapkan nilai untuk kunci key pada array atau konfigurasi.
        'key' => env('RESEND_API_KEY'),
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    ],

    // Menetapkan nilai untuk kunci ses pada array atau konfigurasi.
    'ses' => [
        // Menetapkan nilai untuk kunci key pada array atau konfigurasi.
        'key' => env('AWS_ACCESS_KEY_ID'),
        // Menetapkan nilai untuk kunci secret pada array atau konfigurasi.
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        // Menetapkan nilai untuk kunci region pada array atau konfigurasi.
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    ],

    // Menetapkan nilai untuk kunci slack pada array atau konfigurasi.
    'slack' => [
        // Menetapkan nilai untuk kunci notifications pada array atau konfigurasi.
        'notifications' => [
            // Menetapkan nilai untuk kunci bot_user_oauth_token pada array atau konfigurasi.
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            // Menetapkan nilai untuk kunci channel pada array atau konfigurasi.
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    ],

// Menjalankan instruksi PHP sebagai bagian dari proses ini.
];

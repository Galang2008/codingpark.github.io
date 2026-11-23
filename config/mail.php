<?php

// Mengembalikan nilai atau hasil dari fungsi ini.
return [

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Default Mailer
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | This option controls the default mailer that is used to send all email
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | messages unless another mailer is explicitly specified when sending
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | the message. All additional mailers can be configured within the
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | "mailers" array. Examples of each type of mailer are provided.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci default pada array atau konfigurasi.
    'default' => env('MAIL_MAILER', 'log'),

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Mailer Configurations
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Here you may configure all of the mailers used by your application plus
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | their respective settings. Several examples have been configured for
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | you and you are free to add your own as your application requires.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Laravel supports a variety of mail "transport" drivers that can be used
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | when delivering an email. You may specify which one you're using for
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | your mailers below. You may also add additional mailers if needed.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Supported: "smtp", "sendmail", "mailgun", "ses", "ses-v2",
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |            "postmark", "resend", "log", "array",
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |            "failover", "roundrobin"
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci mailers pada array atau konfigurasi.
    'mailers' => [

        // Menetapkan nilai untuk kunci smtp pada array atau konfigurasi.
        'smtp' => [
            // Menetapkan nilai untuk kunci transport pada array atau konfigurasi.
            'transport' => 'smtp',
            // Menetapkan nilai untuk kunci scheme pada array atau konfigurasi.
            'scheme' => env('MAIL_SCHEME'),
            // Menetapkan nilai untuk kunci url pada array atau konfigurasi.
            'url' => env('MAIL_URL'),
            // Menetapkan nilai untuk kunci host pada array atau konfigurasi.
            'host' => env('MAIL_HOST', '127.0.0.1'),
            // Menetapkan nilai untuk kunci port pada array atau konfigurasi.
            'port' => env('MAIL_PORT', 2525),
            // Menetapkan nilai untuk kunci username pada array atau konfigurasi.
            'username' => env('MAIL_USERNAME'),
            // Menetapkan nilai untuk kunci password pada array atau konfigurasi.
            'password' => env('MAIL_PASSWORD'),
            // Menetapkan nilai untuk kunci timeout pada array atau konfigurasi.
            'timeout' => null,
            // Menetapkan nilai untuk kunci local_domain pada array atau konfigurasi.
            'local_domain' => env('MAIL_EHLO_DOMAIN', parse_url((string) env('APP_URL', 'http://localhost'), PHP_URL_HOST)),
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci ses pada array atau konfigurasi.
        'ses' => [
            // Menetapkan nilai untuk kunci transport pada array atau konfigurasi.
            'transport' => 'ses',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci postmark pada array atau konfigurasi.
        'postmark' => [
            // Menetapkan nilai untuk kunci transport pada array atau konfigurasi.
            'transport' => 'postmark',
            // 'message_stream_id' => env('POSTMARK_MESSAGE_STREAM_ID'),
            // 'client' => [
            //     'timeout' => 5,
            // ],
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci resend pada array atau konfigurasi.
        'resend' => [
            // Menetapkan nilai untuk kunci transport pada array atau konfigurasi.
            'transport' => 'resend',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci sendmail pada array atau konfigurasi.
        'sendmail' => [
            // Menetapkan nilai untuk kunci transport pada array atau konfigurasi.
            'transport' => 'sendmail',
            // Menetapkan nilai untuk kunci path pada array atau konfigurasi.
            'path' => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -bs -i'),
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci log pada array atau konfigurasi.
        'log' => [
            // Menetapkan nilai untuk kunci transport pada array atau konfigurasi.
            'transport' => 'log',
            // Menetapkan nilai untuk kunci channel pada array atau konfigurasi.
            'channel' => env('MAIL_LOG_CHANNEL'),
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci array pada array atau konfigurasi.
        'array' => [
            // Menetapkan nilai untuk kunci transport pada array atau konfigurasi.
            'transport' => 'array',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci failover pada array atau konfigurasi.
        'failover' => [
            // Menetapkan nilai untuk kunci transport pada array atau konfigurasi.
            'transport' => 'failover',
            // Menetapkan nilai untuk kunci mailers pada array atau konfigurasi.
            'mailers' => [
                // Menjalankan instruksi PHP sebagai bagian dari proses ini.
                'smtp',
                // Menjalankan instruksi PHP sebagai bagian dari proses ini.
                'log',
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            ],
            // Menetapkan nilai untuk kunci retry_after pada array atau konfigurasi.
            'retry_after' => 60,
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci roundrobin pada array atau konfigurasi.
        'roundrobin' => [
            // Menetapkan nilai untuk kunci transport pada array atau konfigurasi.
            'transport' => 'roundrobin',
            // Menetapkan nilai untuk kunci mailers pada array atau konfigurasi.
            'mailers' => [
                // Menjalankan instruksi PHP sebagai bagian dari proses ini.
                'ses',
                // Menjalankan instruksi PHP sebagai bagian dari proses ini.
                'postmark',
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            ],
            // Menetapkan nilai untuk kunci retry_after pada array atau konfigurasi.
            'retry_after' => 60,
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    ],

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Global "From" Address
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | You may wish for all emails sent by your application to be sent from
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | the same address. Here you may specify a name and address that is
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | used globally for all emails that are sent by your application.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci from pada array atau konfigurasi.
    'from' => [
        // Menetapkan nilai untuk kunci address pada array atau konfigurasi.
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        // Menetapkan nilai untuk kunci name pada array atau konfigurasi.
        'name' => env('MAIL_FROM_NAME', env('APP_NAME', 'Laravel')),
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    ],

// Menjalankan instruksi PHP sebagai bagian dari proses ini.
];

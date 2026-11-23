<?php

// Mengembalikan nilai atau hasil dari fungsi ini.
return [

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Default Filesystem Disk
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Here you may specify the default filesystem disk that should be used
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | by the framework. The "local" disk, as well as a variety of cloud
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | based disks are available to your application for file storage.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci default pada array atau konfigurasi.
    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Filesystem Disks
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Below you may configure as many filesystem disks as necessary, and you
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | may even configure multiple disks for the same driver. Examples for
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | most supported storage drivers are configured here for reference.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Supported drivers: "local", "ftp", "sftp", "s3"
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci disks pada array atau konfigurasi.
    'disks' => [

        // Menetapkan nilai untuk kunci local pada array atau konfigurasi.
        'local' => [
            // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
            'driver' => 'local',
            // Menetapkan nilai untuk kunci root pada array atau konfigurasi.
            'root' => storage_path('app/private'),
            // Menetapkan nilai untuk kunci serve pada array atau konfigurasi.
            'serve' => true,
            // Menetapkan nilai untuk kunci throw pada array atau konfigurasi.
            'throw' => false,
            // Menetapkan nilai untuk kunci report pada array atau konfigurasi.
            'report' => false,
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci public pada array atau konfigurasi.
        'public' => [
            // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
            'driver' => 'local',
            // Menetapkan nilai untuk kunci root pada array atau konfigurasi.
            'root' => storage_path('app/public'),
            // Menetapkan nilai untuk kunci url pada array atau konfigurasi.
            'url' => rtrim(env('APP_URL', 'http://localhost'), '/').'/storage',
            // Menetapkan nilai untuk kunci visibility pada array atau konfigurasi.
            'visibility' => 'public',
            // Menetapkan nilai untuk kunci throw pada array atau konfigurasi.
            'throw' => false,
            // Menetapkan nilai untuk kunci report pada array atau konfigurasi.
            'report' => false,
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci s3 pada array atau konfigurasi.
        's3' => [
            // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
            'driver' => 's3',
            // Menetapkan nilai untuk kunci key pada array atau konfigurasi.
            'key' => env('AWS_ACCESS_KEY_ID'),
            // Menetapkan nilai untuk kunci secret pada array atau konfigurasi.
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            // Menetapkan nilai untuk kunci region pada array atau konfigurasi.
            'region' => env('AWS_DEFAULT_REGION'),
            // Menetapkan nilai untuk kunci bucket pada array atau konfigurasi.
            'bucket' => env('AWS_BUCKET'),
            // Menetapkan nilai untuk kunci url pada array atau konfigurasi.
            'url' => env('AWS_URL'),
            // Menetapkan nilai untuk kunci endpoint pada array atau konfigurasi.
            'endpoint' => env('AWS_ENDPOINT'),
            // Menetapkan nilai untuk kunci use_path_style_endpoint pada array atau konfigurasi.
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            // Menetapkan nilai untuk kunci throw pada array atau konfigurasi.
            'throw' => false,
            // Menetapkan nilai untuk kunci report pada array atau konfigurasi.
            'report' => false,
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    ],

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Symbolic Links
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Here you may configure the symbolic links that will be created when the
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | `storage:link` Artisan command is executed. The array keys should be
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | the locations of the links and the values should be their targets.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci links pada array atau konfigurasi.
    'links' => [
        // Menetapkan pasangan nilai atau callback pada struktur data ini.
        public_path('storage') => storage_path('app/public'),
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    ],

// Menjalankan instruksi PHP sebagai bagian dari proses ini.
];

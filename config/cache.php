<?php

// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Support\Str;

// Mengembalikan nilai atau hasil dari fungsi ini.
return [

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Default Cache Store
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | This option controls the default cache store that will be used by the
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | framework. This connection is utilized if another isn't explicitly
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | specified when running a cache operation inside the application.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci default pada array atau konfigurasi.
    'default' => env('CACHE_STORE', 'database'),

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Cache Stores
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Here you may define all of the cache "stores" for your application as
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | well as their drivers. You may even define multiple stores for the
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | same cache driver to group types of items stored in your caches.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Supported drivers: "array", "database", "file", "memcached",
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |                    "redis", "dynamodb", "octane",
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |                    "failover", "null"
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci stores pada array atau konfigurasi.
    'stores' => [

        // Menetapkan nilai untuk kunci array pada array atau konfigurasi.
        'array' => [
            // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
            'driver' => 'array',
            // Menetapkan nilai untuk kunci serialize pada array atau konfigurasi.
            'serialize' => false,
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci database pada array atau konfigurasi.
        'database' => [
            // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
            'driver' => 'database',
            // Menetapkan nilai untuk kunci connection pada array atau konfigurasi.
            'connection' => env('DB_CACHE_CONNECTION'),
            // Menetapkan nilai untuk kunci table pada array atau konfigurasi.
            'table' => env('DB_CACHE_TABLE', 'cache'),
            // Menetapkan nilai untuk kunci lock_connection pada array atau konfigurasi.
            'lock_connection' => env('DB_CACHE_LOCK_CONNECTION'),
            // Menetapkan nilai untuk kunci lock_table pada array atau konfigurasi.
            'lock_table' => env('DB_CACHE_LOCK_TABLE'),
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci file pada array atau konfigurasi.
        'file' => [
            // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
            'driver' => 'file',
            // Menetapkan nilai untuk kunci path pada array atau konfigurasi.
            'path' => storage_path('framework/cache/data'),
            // Menetapkan nilai untuk kunci lock_path pada array atau konfigurasi.
            'lock_path' => storage_path('framework/cache/data'),
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci memcached pada array atau konfigurasi.
        'memcached' => [
            // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
            'driver' => 'memcached',
            // Menetapkan nilai untuk kunci persistent_id pada array atau konfigurasi.
            'persistent_id' => env('MEMCACHED_PERSISTENT_ID'),
            // Menetapkan nilai untuk kunci sasl pada array atau konfigurasi.
            'sasl' => [
                // Menjalankan instruksi PHP sebagai bagian dari proses ini.
                env('MEMCACHED_USERNAME'),
                // Menjalankan instruksi PHP sebagai bagian dari proses ini.
                env('MEMCACHED_PASSWORD'),
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            ],
            // Menetapkan nilai untuk kunci options pada array atau konfigurasi.
            'options' => [
                // Memcached::OPT_CONNECT_TIMEOUT => 2000,
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            ],
            // Menetapkan nilai untuk kunci servers pada array atau konfigurasi.
            'servers' => [
                // Menjalankan instruksi PHP sebagai bagian dari proses ini.
                [
                    // Menetapkan nilai untuk kunci host pada array atau konfigurasi.
                    'host' => env('MEMCACHED_HOST', '127.0.0.1'),
                    // Menetapkan nilai untuk kunci port pada array atau konfigurasi.
                    'port' => env('MEMCACHED_PORT', 11211),
                    // Menetapkan nilai untuk kunci weight pada array atau konfigurasi.
                    'weight' => 100,
                // Menjalankan instruksi PHP sebagai bagian dari proses ini.
                ],
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            ],
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci redis pada array atau konfigurasi.
        'redis' => [
            // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
            'driver' => 'redis',
            // Menetapkan nilai untuk kunci connection pada array atau konfigurasi.
            'connection' => env('REDIS_CACHE_CONNECTION', 'cache'),
            // Menetapkan nilai untuk kunci lock_connection pada array atau konfigurasi.
            'lock_connection' => env('REDIS_CACHE_LOCK_CONNECTION', 'default'),
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci dynamodb pada array atau konfigurasi.
        'dynamodb' => [
            // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
            'driver' => 'dynamodb',
            // Menetapkan nilai untuk kunci key pada array atau konfigurasi.
            'key' => env('AWS_ACCESS_KEY_ID'),
            // Menetapkan nilai untuk kunci secret pada array atau konfigurasi.
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            // Menetapkan nilai untuk kunci region pada array atau konfigurasi.
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            // Menetapkan nilai untuk kunci table pada array atau konfigurasi.
            'table' => env('DYNAMODB_CACHE_TABLE', 'cache'),
            // Menetapkan nilai untuk kunci endpoint pada array atau konfigurasi.
            'endpoint' => env('DYNAMODB_ENDPOINT'),
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci octane pada array atau konfigurasi.
        'octane' => [
            // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
            'driver' => 'octane',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci failover pada array atau konfigurasi.
        'failover' => [
            // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
            'driver' => 'failover',
            // Menetapkan nilai untuk kunci stores pada array atau konfigurasi.
            'stores' => [
                // Menjalankan instruksi PHP sebagai bagian dari proses ini.
                'database',
                // Menjalankan instruksi PHP sebagai bagian dari proses ini.
                'array',
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
    | Cache Key Prefix
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | When utilizing the APC, database, memcached, Redis, and DynamoDB cache
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | stores, there might be other applications using the same cache. For
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | that reason, you may prefix every cache key to avoid collisions.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci prefix pada array atau konfigurasi.
    'prefix' => env('CACHE_PREFIX', Str::slug((string) env('APP_NAME', 'laravel')).'-cache-'),

// Menjalankan instruksi PHP sebagai bagian dari proses ini.
];

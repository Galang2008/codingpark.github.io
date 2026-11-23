<?php

// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Support\Str;
// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Pdo\Mysql;

// Mengembalikan nilai atau hasil dari fungsi ini.
return [

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Default Database Connection Name
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Here you may specify which of the database connections below you wish
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | to use as your default connection for database operations. This is
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | the connection which will be utilized unless another connection
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | is explicitly specified when you execute a query / statement.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci default pada array atau konfigurasi.
    'default' => env('DB_CONNECTION', 'sqlite'),

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Database Connections
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Below are all of the database connections defined for your application.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | An example configuration is provided for each database system which
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | is supported by Laravel. You're free to add / remove connections.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci connections pada array atau konfigurasi.
    'connections' => [

        // Menetapkan nilai untuk kunci sqlite pada array atau konfigurasi.
        'sqlite' => [
            // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
            'driver' => 'sqlite',
            // Menetapkan nilai untuk kunci url pada array atau konfigurasi.
            'url' => env('DB_URL'),
            // Menetapkan nilai untuk kunci database pada array atau konfigurasi.
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            // Menetapkan nilai untuk kunci prefix pada array atau konfigurasi.
            'prefix' => '',
            // Menetapkan nilai untuk kunci foreign_key_constraints pada array atau konfigurasi.
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
            // Menetapkan nilai untuk kunci busy_timeout pada array atau konfigurasi.
            'busy_timeout' => null,
            // Menetapkan nilai untuk kunci journal_mode pada array atau konfigurasi.
            'journal_mode' => null,
            // Menetapkan nilai untuk kunci synchronous pada array atau konfigurasi.
            'synchronous' => null,
            // Menetapkan nilai untuk kunci transaction_mode pada array atau konfigurasi.
            'transaction_mode' => 'DEFERRED',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci mysql pada array atau konfigurasi.
        'mysql' => [
            // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
            'driver' => 'mysql',
            // Menetapkan nilai untuk kunci url pada array atau konfigurasi.
            'url' => env('DB_URL'),
            // Menetapkan nilai untuk kunci host pada array atau konfigurasi.
            'host' => env('DB_HOST', '127.0.0.1'),
            // Menetapkan nilai untuk kunci port pada array atau konfigurasi.
            'port' => env('DB_PORT', '3306'),
            // Menetapkan nilai untuk kunci database pada array atau konfigurasi.
            'database' => env('DB_DATABASE', 'laravel'),
            // Menetapkan nilai untuk kunci username pada array atau konfigurasi.
            'username' => env('DB_USERNAME', 'root'),
            // Menetapkan nilai untuk kunci password pada array atau konfigurasi.
            'password' => env('DB_PASSWORD', ''),
            // Menetapkan nilai untuk kunci unix_socket pada array atau konfigurasi.
            'unix_socket' => env('DB_SOCKET', ''),
            // Menetapkan nilai untuk kunci charset pada array atau konfigurasi.
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            // Menetapkan nilai untuk kunci collation pada array atau konfigurasi.
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            // Menetapkan nilai untuk kunci prefix pada array atau konfigurasi.
            'prefix' => '',
            // Menetapkan nilai untuk kunci prefix_indexes pada array atau konfigurasi.
            'prefix_indexes' => true,
            // Menetapkan nilai untuk kunci strict pada array atau konfigurasi.
            'strict' => true,
            // Menetapkan nilai untuk kunci engine pada array atau konfigurasi.
            'engine' => null,
            // Menetapkan nilai untuk kunci options pada array atau konfigurasi.
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                // Menetapkan pasangan nilai atau callback pada struktur data ini.
                (PHP_VERSION_ID >= 80500 ? Mysql::ATTR_SSL_CA : PDO::MYSQL_ATTR_SSL_CA) => env('MYSQL_ATTR_SSL_CA'),
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            ]) : [],
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci mariadb pada array atau konfigurasi.
        'mariadb' => [
            // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
            'driver' => 'mariadb',
            // Menetapkan nilai untuk kunci url pada array atau konfigurasi.
            'url' => env('DB_URL'),
            // Menetapkan nilai untuk kunci host pada array atau konfigurasi.
            'host' => env('DB_HOST', '127.0.0.1'),
            // Menetapkan nilai untuk kunci port pada array atau konfigurasi.
            'port' => env('DB_PORT', '3306'),
            // Menetapkan nilai untuk kunci database pada array atau konfigurasi.
            'database' => env('DB_DATABASE', 'laravel'),
            // Menetapkan nilai untuk kunci username pada array atau konfigurasi.
            'username' => env('DB_USERNAME', 'root'),
            // Menetapkan nilai untuk kunci password pada array atau konfigurasi.
            'password' => env('DB_PASSWORD', ''),
            // Menetapkan nilai untuk kunci unix_socket pada array atau konfigurasi.
            'unix_socket' => env('DB_SOCKET', ''),
            // Menetapkan nilai untuk kunci charset pada array atau konfigurasi.
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            // Menetapkan nilai untuk kunci collation pada array atau konfigurasi.
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            // Menetapkan nilai untuk kunci prefix pada array atau konfigurasi.
            'prefix' => '',
            // Menetapkan nilai untuk kunci prefix_indexes pada array atau konfigurasi.
            'prefix_indexes' => true,
            // Menetapkan nilai untuk kunci strict pada array atau konfigurasi.
            'strict' => true,
            // Menetapkan nilai untuk kunci engine pada array atau konfigurasi.
            'engine' => null,
            // Menetapkan nilai untuk kunci options pada array atau konfigurasi.
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                // Menetapkan pasangan nilai atau callback pada struktur data ini.
                (PHP_VERSION_ID >= 80500 ? Mysql::ATTR_SSL_CA : PDO::MYSQL_ATTR_SSL_CA) => env('MYSQL_ATTR_SSL_CA'),
            // Menjalankan instruksi PHP sebagai bagian dari proses ini.
            ]) : [],
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci pgsql pada array atau konfigurasi.
        'pgsql' => [
            // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
            'driver' => 'pgsql',
            // Menetapkan nilai untuk kunci url pada array atau konfigurasi.
            'url' => env('DB_URL'),
            // Menetapkan nilai untuk kunci host pada array atau konfigurasi.
            'host' => env('DB_HOST', '127.0.0.1'),
            // Menetapkan nilai untuk kunci port pada array atau konfigurasi.
            'port' => env('DB_PORT', '5432'),
            // Menetapkan nilai untuk kunci database pada array atau konfigurasi.
            'database' => env('DB_DATABASE', 'laravel'),
            // Menetapkan nilai untuk kunci username pada array atau konfigurasi.
            'username' => env('DB_USERNAME', 'root'),
            // Menetapkan nilai untuk kunci password pada array atau konfigurasi.
            'password' => env('DB_PASSWORD', ''),
            // Menetapkan nilai untuk kunci charset pada array atau konfigurasi.
            'charset' => env('DB_CHARSET', 'utf8'),
            // Menetapkan nilai untuk kunci prefix pada array atau konfigurasi.
            'prefix' => '',
            // Menetapkan nilai untuk kunci prefix_indexes pada array atau konfigurasi.
            'prefix_indexes' => true,
            // Menetapkan nilai untuk kunci search_path pada array atau konfigurasi.
            'search_path' => 'public',
            // Menetapkan nilai untuk kunci sslmode pada array atau konfigurasi.
            'sslmode' => env('DB_SSLMODE', 'prefer'),
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci sqlsrv pada array atau konfigurasi.
        'sqlsrv' => [
            // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
            'driver' => 'sqlsrv',
            // Menetapkan nilai untuk kunci url pada array atau konfigurasi.
            'url' => env('DB_URL'),
            // Menetapkan nilai untuk kunci host pada array atau konfigurasi.
            'host' => env('DB_HOST', 'localhost'),
            // Menetapkan nilai untuk kunci port pada array atau konfigurasi.
            'port' => env('DB_PORT', '1433'),
            // Menetapkan nilai untuk kunci database pada array atau konfigurasi.
            'database' => env('DB_DATABASE', 'laravel'),
            // Menetapkan nilai untuk kunci username pada array atau konfigurasi.
            'username' => env('DB_USERNAME', 'root'),
            // Menetapkan nilai untuk kunci password pada array atau konfigurasi.
            'password' => env('DB_PASSWORD', ''),
            // Menetapkan nilai untuk kunci charset pada array atau konfigurasi.
            'charset' => env('DB_CHARSET', 'utf8'),
            // Menetapkan nilai untuk kunci prefix pada array atau konfigurasi.
            'prefix' => '',
            // Menetapkan nilai untuk kunci prefix_indexes pada array atau konfigurasi.
            'prefix_indexes' => true,
            // 'encrypt' => env('DB_ENCRYPT', 'yes'),
            // 'trust_server_certificate' => env('DB_TRUST_SERVER_CERTIFICATE', 'false'),
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    ],

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Migration Repository Table
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | This table keeps track of all the migrations that have already run for
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | your application. Using this information, we can determine which of
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | the migrations on disk haven't actually been run on the database.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci migrations pada array atau konfigurasi.
    'migrations' => [
        // Menetapkan nilai untuk kunci table pada array atau konfigurasi.
        'table' => 'migrations',
        // Menetapkan nilai untuk kunci update_date_on_publish pada array atau konfigurasi.
        'update_date_on_publish' => true,
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    ],

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Redis Databases
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Redis is an open source, fast, and advanced key-value store that also
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | provides a richer body of commands than a typical key-value system
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | such as Memcached. You may define your connection settings here.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci redis pada array atau konfigurasi.
    'redis' => [

        // Menetapkan nilai untuk kunci client pada array atau konfigurasi.
        'client' => env('REDIS_CLIENT', 'phpredis'),

        // Menetapkan nilai untuk kunci options pada array atau konfigurasi.
        'options' => [
            // Menetapkan nilai untuk kunci cluster pada array atau konfigurasi.
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            // Menetapkan nilai untuk kunci prefix pada array atau konfigurasi.
            'prefix' => env('REDIS_PREFIX', Str::slug((string) env('APP_NAME', 'laravel')).'-database-'),
            // Menetapkan nilai untuk kunci persistent pada array atau konfigurasi.
            'persistent' => env('REDIS_PERSISTENT', false),
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci default pada array atau konfigurasi.
        'default' => [
            // Menetapkan nilai untuk kunci url pada array atau konfigurasi.
            'url' => env('REDIS_URL'),
            // Menetapkan nilai untuk kunci host pada array atau konfigurasi.
            'host' => env('REDIS_HOST', '127.0.0.1'),
            // Menetapkan nilai untuk kunci username pada array atau konfigurasi.
            'username' => env('REDIS_USERNAME'),
            // Menetapkan nilai untuk kunci password pada array atau konfigurasi.
            'password' => env('REDIS_PASSWORD'),
            // Menetapkan nilai untuk kunci port pada array atau konfigurasi.
            'port' => env('REDIS_PORT', '6379'),
            // Menetapkan nilai untuk kunci database pada array atau konfigurasi.
            'database' => env('REDIS_DB', '0'),
            // Menetapkan nilai untuk kunci max_retries pada array atau konfigurasi.
            'max_retries' => env('REDIS_MAX_RETRIES', 3),
            // Menetapkan nilai untuk kunci backoff_algorithm pada array atau konfigurasi.
            'backoff_algorithm' => env('REDIS_BACKOFF_ALGORITHM', 'decorrelated_jitter'),
            // Menetapkan nilai untuk kunci backoff_base pada array atau konfigurasi.
            'backoff_base' => env('REDIS_BACKOFF_BASE', 100),
            // Menetapkan nilai untuk kunci backoff_cap pada array atau konfigurasi.
            'backoff_cap' => env('REDIS_BACKOFF_CAP', 1000),
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

        // Menetapkan nilai untuk kunci cache pada array atau konfigurasi.
        'cache' => [
            // Menetapkan nilai untuk kunci url pada array atau konfigurasi.
            'url' => env('REDIS_URL'),
            // Menetapkan nilai untuk kunci host pada array atau konfigurasi.
            'host' => env('REDIS_HOST', '127.0.0.1'),
            // Menetapkan nilai untuk kunci username pada array atau konfigurasi.
            'username' => env('REDIS_USERNAME'),
            // Menetapkan nilai untuk kunci password pada array atau konfigurasi.
            'password' => env('REDIS_PASSWORD'),
            // Menetapkan nilai untuk kunci port pada array atau konfigurasi.
            'port' => env('REDIS_PORT', '6379'),
            // Menetapkan nilai untuk kunci database pada array atau konfigurasi.
            'database' => env('REDIS_CACHE_DB', '1'),
            // Menetapkan nilai untuk kunci max_retries pada array atau konfigurasi.
            'max_retries' => env('REDIS_MAX_RETRIES', 3),
            // Menetapkan nilai untuk kunci backoff_algorithm pada array atau konfigurasi.
            'backoff_algorithm' => env('REDIS_BACKOFF_ALGORITHM', 'decorrelated_jitter'),
            // Menetapkan nilai untuk kunci backoff_base pada array atau konfigurasi.
            'backoff_base' => env('REDIS_BACKOFF_BASE', 100),
            // Menetapkan nilai untuk kunci backoff_cap pada array atau konfigurasi.
            'backoff_cap' => env('REDIS_BACKOFF_CAP', 1000),
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        ],

    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    ],

// Menjalankan instruksi PHP sebagai bagian dari proses ini.
];

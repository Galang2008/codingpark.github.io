<?php

// Mengimpor kelas atau fungsi yang digunakan pada file ini.
use Illuminate\Support\Str;

// Mengembalikan nilai atau hasil dari fungsi ini.
return [

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Default Session Driver
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | This option determines the default session driver that is utilized for
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | incoming requests. Laravel supports a variety of storage options to
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | persist session data. Database storage is a great default choice.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Supported: "file", "cookie", "database", "memcached",
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |            "redis", "dynamodb", "array"
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci driver pada array atau konfigurasi.
    'driver' => env('SESSION_DRIVER', 'database'),

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Session Lifetime
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Here you may specify the number of minutes that you wish the session
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | to be allowed to remain idle before it expires. If you want them
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | to expire immediately when the browser is closed then you may
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | indicate that via the expire_on_close configuration option.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci lifetime pada array atau konfigurasi.
    'lifetime' => (int) env('SESSION_LIFETIME', 120),

    // Menetapkan nilai untuk kunci expire_on_close pada array atau konfigurasi.
    'expire_on_close' => env('SESSION_EXPIRE_ON_CLOSE', false),

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Session Encryption
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | This option allows you to easily specify that all of your session data
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | should be encrypted before it's stored. All encryption is performed
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | automatically by Laravel and you may use the session like normal.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci encrypt pada array atau konfigurasi.
    'encrypt' => env('SESSION_ENCRYPT', false),

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Session File Location
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | When utilizing the "file" session driver, the session files are placed
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | on disk. The default storage location is defined here; however, you
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | are free to provide another location where they should be stored.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci files pada array atau konfigurasi.
    'files' => storage_path('framework/sessions'),

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Session Database Connection
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | When using the "database" or "redis" session drivers, you may specify a
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | connection that should be used to manage these sessions. This should
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | correspond to a connection in your database configuration options.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci connection pada array atau konfigurasi.
    'connection' => env('SESSION_CONNECTION'),

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Session Database Table
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | When using the "database" session driver, you may specify the table to
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | be used to store sessions. Of course, a sensible default is defined
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | for you; however, you're welcome to change this to another table.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci table pada array atau konfigurasi.
    'table' => env('SESSION_TABLE', 'sessions'),

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Session Cache Store
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | When using one of the framework's cache driven session backends, you may
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | define the cache store which should be used to store the session data
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | between requests. This must match one of your defined cache stores.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Affects: "dynamodb", "memcached", "redis"
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci store pada array atau konfigurasi.
    'store' => env('SESSION_STORE'),

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Session Sweeping Lottery
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Some session drivers must manually sweep their storage location to get
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | rid of old sessions from storage. Here are the chances that it will
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | happen on a given request. By default, the odds are 2 out of 100.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci lottery pada array atau konfigurasi.
    'lottery' => [2, 100],

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Session Cookie Name
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Here you may change the name of the session cookie that is created by
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | the framework. Typically, you should not need to change this value
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | since doing so does not grant a meaningful security improvement.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci cookie pada array atau konfigurasi.
    'cookie' => env(
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        'SESSION_COOKIE',
        // Menjalankan instruksi PHP sebagai bagian dari proses ini.
        Str::slug((string) env('APP_NAME', 'laravel')).'-session'
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    ),

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Session Cookie Path
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | The session cookie path determines the path for which the cookie will
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | be regarded as available. Typically, this will be the root path of
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | your application, but you're free to change this when necessary.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci path pada array atau konfigurasi.
    'path' => env('SESSION_PATH', '/'),

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Session Cookie Domain
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | This value determines the domain and subdomains the session cookie is
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | available to. By default, the cookie will be available to the root
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | domain without subdomains. Typically, this shouldn't be changed.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci domain pada array atau konfigurasi.
    'domain' => env('SESSION_DOMAIN'),

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | HTTPS Only Cookies
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | By setting this option to true, session cookies will only be sent back
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | to the server if the browser has a HTTPS connection. This will keep
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | the cookie from being sent to you when it can't be done securely.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci secure pada array atau konfigurasi.
    'secure' => env('SESSION_SECURE_COOKIE'),

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | HTTP Access Only
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Setting this value to true will prevent JavaScript from accessing the
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | value of the cookie and the cookie will only be accessible through
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | the HTTP protocol. It's unlikely you should disable this option.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci http_only pada array atau konfigurasi.
    'http_only' => env('SESSION_HTTP_ONLY', true),

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Same-Site Cookies
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | This option determines how your cookies behave when cross-site requests
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | take place, and can be used to mitigate CSRF attacks. By default, we
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | will set this value to "lax" to permit secure cross-site requests.
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | See: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Set-Cookie#samesitesamesite-value
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Supported: "lax", "strict", "none", null
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci same_site pada array atau konfigurasi.
    'same_site' => env('SESSION_SAME_SITE', 'lax'),

    /*
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Partitioned Cookies
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |--------------------------------------------------------------------------
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | Setting this value to true will tie the cookie to the top-level site for
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | a cross-site context. Partitioned cookies are accepted by the browser
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    | when flagged "secure" and the Same-Site attribute is set to "none".
    // Menjalankan instruksi PHP sebagai bagian dari proses ini.
    |
    */

    // Menetapkan nilai untuk kunci partitioned pada array atau konfigurasi.
    'partitioned' => env('SESSION_PARTITIONED_COOKIE', false),

// Menjalankan instruksi PHP sebagai bagian dari proses ini.
];

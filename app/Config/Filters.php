<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'     => CSRF::class,
        'toolbar'  => DebugToolbar::class,
        'honeypot' => Honeypot::class,
        'isLoggedIn' => \App\Filters\LoginFilter::class,
        'AdminFilter' => \App\Filters\AdminFilter::class,
        'KasirFilter' => \App\Filters\KasirFilter::class,
        'ManajerFilter' => \App\Filters\ManajerFilter::class,

    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
            'AdminFilter' => [
                'except' => ['login','Auth/*']
            ],
            'KasirFilter' => [
                'except' => ['login','Auth/*']
            ],
            'ManajerFilter' => [
                'except' => ['login','Auth/*']
            ]
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
            'AdminFilter' => [
                'except' => ['home','user','user/*','Log/*','data_log']
            ],
            'KasirFilter' => [
                'except' => ['home','order','order/*','transaksi','transaksi/*']
            ],
            'ManajerFilter' => [
                'except' => ['home','laporan','transaksi','transaksi/*','Log/*','data_log','menu','menu/*']
            ]
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [
        
    ];
}

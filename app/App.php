<?php

class App extends \Molengo\WebApp
{

    /**
     * Init configuration
     *
     * @return void
     */
    public static function init()
    {
        // timezone
        date_default_timezone_set('Europe/Berlin');

        // directories
        define('G_APP_DIR', __DIR__);
        define('G_ROOT_DIR', realpath(__DIR__ . '/..'));
        define('G_LOG_DIR', realpath(__DIR__ . '/../log'));
        define('G_TMP_DIR', realpath(__DIR__ . '/../tmp'));
        define('G_CACHE_DIR', realpath(__DIR__ . '/../cache'));
        define('G_ASSET_DIR', realpath(__DIR__ . '/../assets'));
        define('G_VENDOR_DIR', realpath(__DIR__ . '/../vendor'));
        define('G_VIEW_DIR', realpath(__DIR__ . '/View'));

        // set debug modus
        define('G_DEBUG', self::getRequest()->isLocalhost());

        if (G_DEBUG) {
            // dev database
            self::set('db.dsn', 'mysql:host=127.0.0.1;port=3306;dbname=molengo_webapp;username=root;password=');

            // smtp
            self::set('smtp.type', 'smtp');
            self::set('smtp.host', 'mail.gmx.net');
            self::set('smtp.port', '465');
            self::set('smtp.secure', true);
            self::set('smtp.username', 'mail@gmx.net');
            self::set('smtp.password', 'password');
            self::set('smtp.from', 'mail@gmx.net');
            self::set('smtp.to', 'mail@gmx.net');

            // cache
            self::set('cache.mode', 0);
            self::set('cache.min', 0);
        } else {
            // live database
            self::set('db.dsn', 'mysql:host=127.0.0.1;port=3306;dbname=molengo_webapp;username=root;password=');

            // smtp
            self::set('smtp.type', 'smtp');
            self::set('smtp.host', '127.0.0.1');
            self::set('smtp.port', '25');
            self::set('smtp.username', 'mail@gmx.net');
            self::set('smtp.password', 'password');
            self::set('smtp.from', 'mail@gmx.net');
            self::set('smtp.to', 'mail@gmx.net');

            // cache
            self::set('cache.mode', 1);
            self::set('cache.min', 1);
        }

        // session
        self::set('session.name', 'webapp');

        // app secret
        self::set('app.secret', '54530e855d68c1d021b74327d1e6bd991443698d');

        // init all objects
        self::initAll();
    }
}

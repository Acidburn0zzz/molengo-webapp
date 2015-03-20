<?php

class App extends \Molengo\WebApp
{

    /**
     * Init configuration
     *
     * @return void
     */
    public function config()
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
        define('G_DEBUG', $this->getRequest()->isLocalhost());

        if (G_DEBUG) {
            // dev database
            $this->set('db.dsn', 'mysql:host=127.0.0.1;port=3306;dbname=molengo_webapp;username=root;password=');

            // smtp
            $this->set('smtp.type', 'smtp');
            $this->set('smtp.host', 'mail.gmx.net');
            $this->set('smtp.port', '465');
            $this->set('smtp.secure', true);
            $this->set('smtp.username', 'mail@gmx.net');
            $this->set('smtp.password', 'password');
            $this->set('smtp.from', 'mail@gmx.net');
            $this->set('smtp.to', 'mail@gmx.net');

            // cache
            $this->set('cache.mode', 0);
            $this->set('cache.min', 0);
        } else {
            // live database
            $this->set('db.dsn', 'mysql:host=127.0.0.1;port=3306;dbname=molengo_webapp;username=root;password=');

            // smtp
            $this->set('smtp.type', 'smtp');
            $this->set('smtp.host', '127.0.0.1');
            $this->set('smtp.port', '25');
            $this->set('smtp.username', 'mail@gmx.net');
            $this->set('smtp.password', 'password');
            $this->set('smtp.from', 'mail@gmx.net');
            $this->set('smtp.to', 'mail@gmx.net');

            // cache
            $this->set('cache.mode', 1);
            $this->set('cache.min', 1);
        }

        // session
        $this->set('session.name', 'webapp');

        // app secret
        $this->set('app.secret', '54530e855d68c1d021b74327d1e6bd991443698d');
    }

}

<?php

namespace Controller;

class AppController extends \Molengo\Controller\BaseController
{

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        // check if user logged in
        if ($this->boolAuth == true && !$this->user->isAuth()) {
            $this->response->redirectBase('login');
        }
    }

    /**
     * Returns global assets (js, css)
     *
     * @return string
     */
    protected function assets()
    {
        // global assets
        $arrFiles = parent::assets();
        $arrFiles[] = G_ASSET_DIR . '/css/d.css';
        // customized notifIt with bootstrap colors
        $arrFiles[] = G_ASSET_DIR . '/css/notifIt-app.css';
        $arrFiles[] = 'Index/css/layout.css';
        //$arrFiles[] = 'Index/css/print.css';
        $arrFiles[] = G_ASSET_DIR . '/js/d.js';
        $arrFiles[] = G_ASSET_DIR . '/js/notifIt.js';
        $arrFiles[] = 'Index/js/app.js';
        return $arrFiles;
    }

    /**
     * Callback: before rpc action is called
     *
     * @param array $arrParams
     * @return boolean
     */
    protected function beforeCall($arrParams = null)
    {
        $boolReturn = false;

        // Create fully qualified name
        //$strName = get_class($this) . '::' . $strMethod;
        //
        //check authentication
        $boolReturn = $this->user->isAuth();
        if (!$boolReturn) {
            $this->response->setHeader('HTTP/1.1 401 Unauthorized', true, 401);
            echo 'Unauthorized access';
            exit;
        }
        return $boolReturn;
    }

}

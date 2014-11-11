<?php

namespace Controller;

use App;

class IndexController extends AppController
{

    /**
     * Returns action assets
     *
     * @param array $arrParams
     * @return array
     */
    protected function indexAssets()
    {
        $arrFiles = parent::assets();
        $arrFiles[] = 'Index/css/index.css';
        $arrFiles[] = 'Index/js/index.js';
        return $arrFiles;
    }

    /**
     * Optional, only for single page apps required
     *
     * @param array $arrParams
     * @return array
     */
    protected function getPageFiles($arrParams = array())
    {
        $arrFiles = array();
        $arrFiles[] = 'Index/css/index.css';
        $arrFiles[] = 'Index/js/index.js';
        return $arrFiles;
    }

    /**
     * Action: index (default)
     * @return void
     */
    public function index()
    {
        $tpl = $this->template();
        $tpl->addFiles($this->indexAssets());
        $tpl->addFile('Index/html/index.html.php');
        $tpl->render('Index/html/layout.html.php');
    }

    public function load()
    {
        $arrReturn = array();
        $arrReturn['status'] = 1;
        return $arrReturn;
    }
}

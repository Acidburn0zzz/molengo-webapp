<?php

namespace Controller;

class IndexController extends AppController
{

    /**
     * Action: index (default)
     *
     * @return void
     */
    public function index()
    {
        $this->view->set('controller', $this);
        $this->view->addFiles($this->indexAssets());
        $this->view->addFile('Index/html/index.html.php');
        $this->view->render('Index/html/layout.html.php');
    }

    /**
     * Action: load
     *
     * @return array
     */
    public function load()
    {
        $arrReturn = array();
        $arrReturn['status'] = 1;
        return $arrReturn;
    }

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

}

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
        $arrFiles = parent::getAssets();
		$arrFiles[] = 'Index/css/index.css';
        $arrFiles[] = 'Index/js/index.js';
        $arrFiles[] = 'Index/html/index.html.php';
        $this->view->addFiles($arrFiles);
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

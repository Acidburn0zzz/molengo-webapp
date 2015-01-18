<?php

namespace Controller;

class LoginController extends AppController
{

    // no auth check for login controller
    protected $boolAuth = false;

    /**
     * Action: index
     *
     * @return void
     */
    public function index()
    {
        if ($this->request->is('post')) {

            $arrLogin = array();
            $arrLogin['username'] = $this->request->param('username', 'p');
            $arrLogin['password'] = $this->request->param('password', 'p');

            $boolReturn = $this->user->login($arrLogin);
            if ($boolReturn) {
                $this->response->redirectBase('/');
            } else {
                $this->response->redirectBase('login');
            }
            exit;
        } else {
            $this->user->logout();
            $this->view->addFile('Index/css/login.css');
            $this->view->render('Index/html/login.html.php');
        }
    }

    /**
     * Action: logout
     *
     * @return void
     */
    public function logout()
    {
        $this->user->logout();
        $this->response->redirectBase('/');
        exit;
    }

    /**
     * Returns assets
     *
     * @return array
     */
    protected function indexAssets()
    {
        $arrFiles = parent::assets();
        //$arrFiles['js'][] = 'Index/js/login.js';
        return $arrFiles;
    }

}

<?php

namespace Controller;

use App;

class LoginController extends AppController
{

    public function __construct()
    {
        // no auth check for login controller
    }

    protected function indexAssets()
    {
        $arrFiles = parent::assets();
        //$arrFiles['js'][] = 'Index/js/login.js';
        return $arrFiles;
    }

    public function index()
    {
        $req = $this->request();
        $res = $this->response();
        $user = App::getUser();

        if ($req->is('post')) {

            $arrLogin = array();
            $arrLogin['username'] = $req->param('username', 'p');
            $arrLogin['password'] = $req->param('password', 'p');

            $arrReturn = $user->login($arrLogin);
            if ($arrReturn['status'] == 1) {
                $res->redirectBase('/');
            } else {
                $res->redirectBase('login');
            }
            exit;
        } else {
            $user->logout();
            $tpl = $this->template();
            $tpl->addFile('Index/css/login.css');
            $tpl->render('Index/html/login.html.php');
        }
    }

    public function logout()
    {
        App::getUser()->logout();
        App::getResponse()->redirectBase('/');
        exit;
    }
}

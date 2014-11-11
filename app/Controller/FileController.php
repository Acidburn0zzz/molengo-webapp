<?php

namespace Controller;

use App;

class FileController extends AppController
{

    /**
     * Download file
     */
    public function index()
    {
        $req = $this->request();
        $strKey = $req->param('key', 'gp');
        $strDownload = $req->param('download', 'gp', '1');
        $boolDownload = ($strDownload == '1');
        $fs = new \Molengo\TempFile();
        $fs->send($strKey, $boolDownload);
    }
}

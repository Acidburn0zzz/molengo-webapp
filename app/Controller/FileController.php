<?php

namespace Controller;

class FileController extends AppController
{

    /**
     * Download file
     *
     * @return void
     */
    public function index()
    {
        $strKey = $this->request->param('key', 'gp');
        $strDownload = $this->request->param('download', 'gp', '1');
        $boolDownload = ($strDownload == '1');
        $fs = new \Molengo\TempFile();
        $fs->send($strKey, $boolDownload);
    }

}

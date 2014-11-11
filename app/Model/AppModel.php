<?php

namespace Model;

use App;

class AppModel extends \Molengo\Model\BaseModel
{

    /**
     * Get current user information
     * @param string $strKey
     * @param mixed $mixDefault
     * @return mixed
     */
    protected function getUserInfo($strKey, $mixDefault = '')
    {
        return App::getUserInfo($strKey, $mixDefault);
    }
}

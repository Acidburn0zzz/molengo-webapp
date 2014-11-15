<?php

namespace Model\Index;

use App;

class TestModel extends \Model\AppModel
{

    public function getById($numId)
    {
        $arrReturn = array();

        $db = $this->getDb();
        $strSql = "SELECT * FROM customer WHERE id={id};";

        $arrFields = array();
        $arrFields['id'] = $numId;

        $strSql = $db->prepare($strSql, $arrFields);
        $arrReturn = $db->queryAll($strSql);

        return $arrReturn;
    }

    public function getByValue($strValue)
    {
        $db = $this->getDb();

        $strSql = "SELECT * FROM {table} WHERE value={value};";

        $arrFields = array();
        $arrFields['table'] = $db->escIdent('tablename');
        $arrFields['value'] = $db->esc($strValue);

        $strSql = $db->prepare($strSql, $arrFields, false);
        $arrReturn = $db->queryAll($strSql);

        return $arrReturn;
    }
}

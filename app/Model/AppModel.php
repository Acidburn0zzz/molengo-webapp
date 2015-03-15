<?php

namespace Model;

class AppModel extends \Molengo\Model\BaseModel
{

    /**
     * Returns filtered data for datatable component
     *
     * @param array $arrRows
     * @param array $arrParams
     * @return array
     */
    public function filterDataTable(&$arrRows, $arrParams)
    {
        $arrReturn = array();
        //$strFilterValue = gv($arrParams['options']['filter'], 'value', 'all');
        //$strFilterText = gv($arrParams['options']['filter'], 'text', 'all');
        //$strFilterSelected = gv($arrParams['options']['filter'], 'selected', true);
        $numPageSize = gv($arrParams['options'], 'pageSize', 10);
        $numPage = gv($arrParams['options'], 'page', 0);
        $numPage = ($numPage < 0) ? 0 : $numPage;
        $strSortDirection = gv($arrParams['options'], 'sortDirection', 'asc'); // desc
        $strSortProperty = gv($arrParams['options'], 'sortProperty', '');
        $strSortFlag = gv($arrParams['options'], 'sortFlag', 'natural');
        //$strView = gv($arrParams['options'], 'view', 'list');
        $strSearch = gv($arrParams['options'], 'search', '');

        // search
        if (!empty($strSearch)) {
            foreach ($arrRows as $i => $arrRow) {
                $boolFound = false;
                foreach ($arrRow as $k => $v) {
                    if (stripos($v, $strSearch) !== false) {
                        $boolFound = true;
                        break;
                    }
                }
                if (!$boolFound) {
                    unset($arrRows[$i]);
                }
            }
        }

        // sort array
        if (!empty($strSortProperty)) {
            $arrSortFlags = array(
                'natural' => SORT_NATURAL,
                'numeric' => SORT_NUMERIC,
                'regular' => SORT_REGULAR,
                'string' => SORT_STRING
            );
            $numSortFlag = isset($arrSortFlags[$strSortFlag]) ? $arrSortFlags[$strSortFlag] : SORT_NATURAL;
            $numSortOrder = ($strSortDirection == 'asc') ? SORT_ASC : SORT_DESC;
            $this->sortArrayByColumn($arrRows, $strSortProperty, $numSortOrder, $numSortFlag);
        }

        // pagination result
        $numCount = 0;
        if (empty($arrRows)) {
            $numPage = 0;
        } else {
            $numCount = count($arrRows);
            if ($numPage < 1) {
                $numPage = 1;
            }
        }

        $numPages = ceil($numCount / $numPageSize);
        if ($numPage > $numPages) {
            $numPage = $numPages;
        }
        $numPageIndex = $numPage - 1;
        $numOffset = $numPageIndex * $numPageSize;
        $arrReturn['count'] = $numCount;
        $arrReturn['page'] = $numPage;
        $arrReturn['pages'] = $numPages;
        $arrReturn['start'] = '0';
        $arrReturn['end'] = '0';
        if ($numCount > 0) {
            $numStart = ($numPageIndex * $numPageSize);
            $numEnd = $numStart + $numPageSize;
            $numEnd = ($numEnd < $numCount) ? $numEnd : $numCount;
            $arrReturn['start'] = $numStart + 1;
            $arrReturn['end'] = $numEnd;
        }
        $arrReturn['items'] = array_slice($arrRows, $numOffset, $numPageSize);
        return $arrReturn;
    }

    /**
     * Sort array by key
     *
     * @param array $arr
     * @param string $strCol
     * @param int $numSortOrder
     * @param int $numSortFlag
     */
    public function sortArrayByColumn(&$arr, $strCol, $numSortOrder = SORT_ASC, $numSortFlag = SORT_REGULAR)
    {
        $sortCol = array();
        foreach ($arr as $key => $row) {
            $sortCol[$key] = $row[$strCol];
        }
        array_multisort($sortCol, $numSortOrder, $numSortFlag, $arr);
    }

}

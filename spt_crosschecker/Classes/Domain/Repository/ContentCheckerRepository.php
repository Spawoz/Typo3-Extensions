<?php
namespace SPAWOZ\SptCrosschecker\Domain\Repository;

/**
 * *************************************************************
 *
 * Copyright notice
 *
 * (c) 2016
 *
 * All rights reserved
 *
 * This script is part of the TYPO3 project. The TYPO3 project is
 * free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html.
 *
 * This script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * This copyright notice MUST APPEAR in all copies of the script!
 * *************************************************************
 */

/**
 * The repository for ContentCheckers
 */
class ContentCheckerRepository extends \TYPO3\CMS\Core\Database\DatabaseConnection
{

    /**
     * getConnected
     *
     * @return Object
     */
    public function getConnected($extensionConfiguration)
    {
        if (! $this->isConnected) {
            $this->setDatabaseHost($extensionConfiguration['remote_hostName']['value']);
            $this->setDatabaseUsername($extensionConfiguration['remote_userName']['value']);
            $this->setDatabasePassword($extensionConfiguration['remote_password']['value']);
            $this->setDatabaseName($extensionConfiguration['remote_databaseName']['value']);
            $this->link = mysqli_init();
            $connected = @$this->link->real_connect($host, $this->databaseUsername, $this->databaseUserPassword, null, 
                (int) $this->databasePort, $this->databaseSocket, 
                $this->connectionCompression ? MYSQLI_CLIENT_COMPRESS : 0);
            if ($connected) {
                return $this;
            } else {
                return false;
            }
        }
    }

    /**
     * function doGetTableList
     *
     * @return array
     */
    public function doGetTableList($dbObj, $extensionConfiguration)
    {
        try {
            $select = "SHOW TABLES FROM " . $extensionConfiguration['remote_databaseName']['value'];
            $res = $dbObj->sql_query($select);
            while ($row = $dbObj->sql_fetch_assoc($res)) {
                $tableValue = array_values($row);
                $tableList[$tableValue[0]] = $tableValue[0];
            }
            return $tableList;
        } catch (\TYPO3\CMS\Fluid\Core\ViewHelper\Exception $exception) {
            throw new \TYPO3\CMS\Fluid\Core\ViewHelper\Exception($exception->getMessage());
        }
    }

    /**
     * function doGetContents
     *
     * @return array
     */
    public function doGetContents($dbObj, $requestParams)
    {
        $queryOptions = [];
        foreach ($requestParams['externalDbTables'] as $_key => $_value) { 
            $queryOptions = [];
         $queryOptions = $this->doPrepareQuery($dbObj, $_value, $requestParams);
            if (! empty($queryOptions)) {
                $result = $dbObj->exec_SELECTgetRows($queryOptions['select'], $_value, $queryOptions['where'], 
                    $groupBy = '', $queryOptions['orderby'], $limit = '');
                $dataResult[$_value] = $result;
            }
        }
        return $dataResult;
    }

    /**
     * function doPrepareQuery
     *
     * @return array
     */
    public function doPrepareQuery($dbObj, $_value, $requestParams)
    {
        $filterDateTo = time();
        if (! empty($requestParams['filterDateTo'])) {
            $filterDateTo = strtotime($requestParams['filterDateTo']);
        }
        $filterDateFrom = strtotime($requestParams['filterDateFrom']);
        $select = "SHOW COLUMNS FROM " . $_value;
        $res = $dbObj->sql_query($select);
        while ($row = $dbObj->sql_fetch_assoc($res)) {
            $field = $row['Field'];
            switch ($field) {
                case 'crdate':
                case 'tstamp':
                case 'modification_date':
                    if (! empty($queryOptions['select'])) {
                        $queryOptions['select'] .= ' , ' . $_value . '.*,' . $_value . '.'.$field.' AS range'.$field;
                        $queryOptions['where'] .= ' OR ' . $_value . '.'.$field.'  BETWEEN ' . $filterDateFrom . ' AND ' .
                             $filterDateTo;
                        $queryOptions['orderby'] = $queryOptions['orderby'] . ' , ' . $_value . '.'.$field.' DESC';
                    } else {
                        $queryOptions['select'] = $_value . '.*,' . $_value . '.'.$field.' AS range'.$field;
                        $queryOptions['where'] = $_value . '.'.$field.'  BETWEEN ' . $filterDateFrom . ' AND ' .
                             $filterDateTo;
                        $queryOptions['orderby'] = $_value . '.'.$field.' DESC';
                    }
                    break;
            }
        }
        return $queryOptions;
    }
}

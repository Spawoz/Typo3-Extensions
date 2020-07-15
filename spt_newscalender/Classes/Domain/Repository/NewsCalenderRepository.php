<?php
namespace TYPO3\SptNewscalender\Domain\Repository;


use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;

/***
 *
 * This file is part of the "News Calender" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020 Arun Chandran <arun@spawoz.com>, Spawoz Technologies
 *
 ***/

/**
 * The repository for NewsCalenders
 */
class NewsCalenderRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    public function initializeObject() {
       $querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings');
       $querySettings->setRespectStoragePage(FALSE);
       $this->setDefaultQuerySettings($querySettings);
    }
    
    public function getValue(){
      $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)
        ->getQueryBuilderForTable('tx_news_domain_model_news');
      $res = $queryBuilder
        ->select('uid', 'title', 'teaser', 'datetime', 'archive', 'fe_group', 'exclude_news', 'repeat_news', 'hidden')
        ->from('tx_news_domain_model_news')
        ->execute();
      return $res;
    }
}

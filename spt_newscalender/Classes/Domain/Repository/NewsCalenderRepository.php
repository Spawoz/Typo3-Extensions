<?php
namespace TYPO3\SptNewscalender\Domain\Repository;

/***
 *
 * This file is part of the "News Calender" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 Merin Vincent <merin@spawoz.com>, Spawoz Technologies
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
      $res = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('uid, title, teaser, datetime, archive, fe_group, exclude_news, repeat_news, hidden', 'tx_news_domain_model_news', 'deleted = "0"');
      return $res;
    }
}

<?php
namespace TYPO3\SptNewscalender\Controller;


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
use \TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * NewsCalenderController
 */
class NewsCalenderController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * newsCalenderRepository
     *
     * @var \TYPO3\SptNewscalender\Domain\Repository\NewsCalenderRepository
     * @inject
     */
    protected $newsCalenderRepository = null;
    
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {        
      $newsCalenders = $this->newsCalenderRepository->getValue();
      $detailPageId = $this->settings['detailPid'];
      $currentDate = date("Y-m-d");
        foreach($newsCalenders as $newsCalender)
        {
            $startDate = date("Y-m-d", $newsCalender['datetime']);
            $endDate = date("Y-m-d", $newsCalender['archive']);
            if(empty($newsCalender['exclude_news']) && empty($newsCalender['hidden']) ) {
                if(in_array($GLOBALS['TSFE']->fe_user->user['usergroup'], explode(',', $newsCalender['fe_group'])) || empty($newsCalender['fe_group'])) {
                    $url = $this->getTypoLink($detailPageId, $newsCalender['uid']);
                    $newsDetails = GeneralUtility::makeInstance('TYPO3\\SptNewscalender\\Domain\\Model\\NewsCalender');
                    $newsDetails->setNewsUid($newsCalender['uid']);
                    if($endDate >= $startDate) {
                        $newsDetails->setStartDate($newsCalender['datetime']);
                        $newsDetails->setEndDate($newsCalender['archive']);
                    }
                    else {
                        $newsDetails->setStartDate($newsCalender['datetime']); 
                    }
                    $newsDetails->setTitle($newsCalender['title']);
                    $this->newsCalenderRepository->add($newsDetails);
                    $persistenceManager = $this->objectManager->get('TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager');
                    $persistenceManager->persistAll();
                    if($endDate >= $startDate) {
                        if($newsCalender['repeat_news'] == 0) {
                            $news[] = [title => $newsCalender['title'], start => $startDate, end => $endDate, url => $url];
                        }
                        else {
                            $news[] = [id => $newsCalender['uid'], title => $newsCalender['title'], start => $startDate, url => $url];
                            while (strtotime($startDate) <= strtotime("-7 days", strtotime($endDate))) {     
                                $startDate = date ("Y-m-d", strtotime("+7 days", strtotime($startDate)));
                                $news[] = [id => $newsCalender['uid'], title => $newsCalender['title'], start => $startDate, url => $url];  
                            }
                        }
                    } else {
                        if($newsCalender['repeat_news'] == 0) {
                            $news[] = [start => $startDate, title => $newsCalender['title'], url => $url];
                        }
                        else {
                            $news[] = [id => $newsCalender['uid'], title => $newsCalender['title'], start => $startDate,url => $url];
                        }
                    }
                    $filterNews = array_filter($news);
                }
            }
        }
        $newsCalender = json_encode($filterNews);
        $this->view->assignMultiple(array('newsCalenders' => $newsCalender, 'currentDate' => $currentDate));
    }
    
    //Creation of Typolink
    public function getTypoLink($pageId, $uid)
    {
        $conf = array(
            'parameter' => $pageId,
            'additionalParams' => '&tx_news_pi1[news]=' . $uid .'&tx_news_pi1[controller]=News&tx_news_pi1[action]=detail',
            'forceAbsoluteUrl'=> true,
            'useCacheHash' => true,
            'returnLast' => 'url',
        ); 
        $url = $GLOBALS['TSFE']->cObj->typoLink('', $conf);
        return $url;
    }
}

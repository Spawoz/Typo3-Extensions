<?php
namespace TYPO3\SptNewscalender\Domain\Model;

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
 * NewsCalender
 */
class NewsCalender extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    
   /**
     * newsUid
     *
     * @var int
     */
    protected $newsUid = 0;
    
    /**
     * startDate
     *
     * @var string
     */
    protected $startDate = '';
    

    /**
     * endDate
     *
     * @var string
     */
    protected $endDate = '';

    /**
     * title
     *
     * @var string
     */
    protected $title = '';
    
   
    /**
     * Returns the newsUid
     *
     * @return int $newsUid
     */
    public function getNewsUid()
    {
        return $this->newsUid;
    }
    /**
     * Sets the newsUid
     *
     * @param int $newsUid
     * @return void
     */
     public function setNewsUid($newsUid)
    {
        $this->newsUid = $newsUid;
    }
    /**
     * Returns the startDate
     *
     * @return string $startDate
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Sets the startDate
     *
     * @param string $startDate
     * @return void
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * Returns the endDate
     *
     * @return string $endDate
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Sets the endDate
     *
     * @param string $endDate
     * @return void
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
}

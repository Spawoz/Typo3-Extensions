<?php
namespace SPT\SptSocialmedia\Domain\Repository;

/***
 *
 * This file is part of the "Social Media Widget" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 Arun Chandran <arun@spawoz.com>, Spawoz Technologies Pvt. Ltd
 *
 ***/

/**
 * The repository for Socialmedias
 */
class SocialmediaRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
	// Order by BE sorting
    protected $defaultOrderings = array(        
        'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
    );

	/**
     * Disable respecting of a storage pid within queries globally.
     */
    public function initializeObject()
    {
        $defaultQuerySettings = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings::class);
        $defaultQuerySettings->setRespectStoragePage(false);
        $this->setDefaultQuerySettings($defaultQuerySettings);
    }
}

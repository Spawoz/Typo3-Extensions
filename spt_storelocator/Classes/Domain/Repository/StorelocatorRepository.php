<?php

declare(strict_types=1);

namespace SPT\SptStorelocator\Domain\Repository;


/**
 * This file is part of the "Store Locator" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2023 Arun Chandran
 */

/**
 * The repository for Storelocators
 */
class StorelocatorRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    // Default sorting
    protected $defaultOrderings = array(
       'titel' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
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

    // Get store list based on selected page id and categories
    public function getStoresByCategory($categories, $pid) {
        $categories = explode(',', $categories);
        $query = $this->createQuery();
        $constraints = [];
        $categoryConstraints = [];
        if(!empty($categories)) {
            foreach ($categories as $category) {
                $categoryConstraints[] = $query->like('kategorie', '%' . $category . '%');
            }
        }
        if (!empty($categoryConstraints)) {
            $constraints[] = $query->logicalOr($categoryConstraints);
        }
        if (!empty($pid)) {
            $constraints[] = $query->equals('pid', $pid);
        }
        $query->matching($query->logicalAnd($constraints));
        return $query->execute();
    }
}

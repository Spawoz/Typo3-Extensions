<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'SptStorelocator',
        'List',
        [
            \SPT\SptStorelocator\Controller\StorelocatorController::class => 'list'
        ],
        // non-cacheable actions
        [
            \SPT\SptStorelocator\Controller\StorelocatorController::class => 'list'
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'SptStorelocator',
        'Map',
        [
            \SPT\SptStorelocator\Controller\StorelocatorController::class => 'map'
        ],
        // non-cacheable actions
        [
            \SPT\SptStorelocator\Controller\StorelocatorController::class => 'map'
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    list {
                        iconIdentifier = spt_storelocator-plugin-list
                        title = LLL:EXT:spt_storelocator/Resources/Private/Language/locallang_db.xlf:tx_spt_storelocator_list.name
                        description = LLL:EXT:spt_storelocator/Resources/Private/Language/locallang_db.xlf:tx_spt_storelocator_list.description
                        tt_content_defValues {
                            CType = list
                            list_type = sptstorelocator_list
                        }
                    }
                    map {
                        iconIdentifier = spt_storelocator-plugin-map
                        title = LLL:EXT:spt_storelocator/Resources/Private/Language/locallang_db.xlf:tx_spt_storelocator_map.name
                        description = LLL:EXT:spt_storelocator/Resources/Private/Language/locallang_db.xlf:tx_spt_storelocator_map.description
                        tt_content_defValues {
                            CType = list
                            list_type = sptstorelocator_map
                        }
                    }
                }
                show = *
            }
       }'
    );

    // add costum backend form elements
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'][1580467607] = [
        'nodeName' => 'GoogleMapElement',
        'priority' => 40,
        'class' => \SPT\SptStorelocator\Form\Element\GoogleMapElement::class
    ];
})();

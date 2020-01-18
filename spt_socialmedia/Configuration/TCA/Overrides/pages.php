<?php
if (!defined('TYPO3_MODE')) {
  die ('Access denied.');
}
  
$tempColumns = [
    'spt_socialmedia' => [
        'label' => 'LLL:EXT:spt_socialmedia/Resources/Private/Language/locallang_db.xlf:pages.spt_socialmedia',
        'exclude' => 0,
        'config' => [
            'type' => 'inline',
            'allowed' => 'tx_sptsocialmedia_domain_model_socialmedia',
            'foreign_table' => 'tx_sptsocialmedia_domain_model_socialmedia',
            'foreign_sortby' => 'sorting',
            'foreign_field' => 'tx_sptsocialmedia',
            'minitems' => 0,
            'maxitems' => 999,
            'appearance' => [                    
                'collapseAll' => true,
                'expandSingle' => true,
                'levelLinksPosition' => 'bottom',
                'useSortable' => true,
                'showPossibleLocalizationRecords' => true,
                'showRemovedLocalizationRecords' => true,
                'showAllLocalizationLink' => true,
                'showSynchronizationLink' => true,
                'enabledControls' => [
                    'info' => false,
                ]
            ]
        ]
    ],  
];
  
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', $tempColumns);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('pages', '--div--;LLL:EXT:spt_socialmedia/Resources/Private/Language/locallang_db.xlf:pages.extendsocialmedia, spt_socialmedia', '', '');
?>
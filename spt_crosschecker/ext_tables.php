<?php
if (! defined('TYPO3_MODE')) {
    die('Access denied.');
}

if (TYPO3_MODE === 'BE') {
    
    /**
     * Registers a Backend Module
     */
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
        'SPAWOZ.SptCrosschecker',
        'tools', // Make module a submodule of 'tools'
        'sptcrosschecker', // Submodule key
        '', // Position
        [
        'ContentChecker' => 'list,show'
        ],
        [
            'access' => 'user,group',
            'icon' => 'EXT:spt_crosschecker/ext_icon.gif',
            'labels' => 'LLL:EXT:spt_crosschecker/Resources/Private/Language/locallang_sptcrosschecker.xlf'
        ]
    );
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'spt_crosschecker',
    'Configuration/TypoScript',
    'Content Cross Checker'
);
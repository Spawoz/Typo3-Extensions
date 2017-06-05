<?php

if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'TYPO3.SptNewscalender',
            'Newscalender',
            'newsCalender'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($extKey, 'Configuration/TypoScript', 'News Calender');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_sptnewscalender_domain_model_newscalender', 'EXT:spt_newscalender/Resources/Private/Language/locallang_csh_tx_sptnewscalender_domain_model_newscalender.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sptnewscalender_domain_model_newscalender');
        $pluginSignature = str_replace('_', '', $_EXTKEY) . '_' . 'newscalender';
        $TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	    $pluginSignature,'FILE:EXT:' . $_EXTKEY . '/Configuration/Flexform/news.xml'
        );
    $tempColumns = array(
        'repeat_news' => [
        'exclude' => 0,
        'label' => 'LLL:EXT:spt_newscalender/Resources/Private/Language/locallang_db.xlf:tx_sptnewscalender_domain_model_newscalender.repeat_news',
        'config' => [
            'type' => 'check',
            'default' => 0
        ]
    ],
        'exclude_news' => [
        'exclude' => 0,
        'label' => 'LLL:EXT:spt_newscalender/Resources/Private/Language/locallang_db.xlf:tx_sptnewscalender_domain_model_newscalender.exclude_news',
        'config' => [
            'type' => 'check',
            'default' => 0
        ]
    ],
);
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_news_domain_model_news',$tempColumns,1);
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'tx_news_domain_model_news',
    'repeat_news,exclude_news',
    '',
    'after:archive'
);
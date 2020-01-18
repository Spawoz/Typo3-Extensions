<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'SPT.SptSocialmedia',
            'Sptsocialmedia',
            'Social Media Widget'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('spt_socialmedia', 'Configuration/TypoScript', 'Social Media Widget');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_sptsocialmedia_domain_model_socialmedia', 'EXT:spt_socialmedia/Resources/Private/Language/locallang_csh_tx_sptsocialmedia_domain_model_socialmedia.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sptsocialmedia_domain_model_socialmedia');
    }
);




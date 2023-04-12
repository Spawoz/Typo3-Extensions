<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_sptstorelocator_domain_model_storelocator', 'EXT:spt_storelocator/Resources/Private/Language/locallang_csh_tx_sptstorelocator_domain_model_storelocator.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sptstorelocator_domain_model_storelocator');
})();

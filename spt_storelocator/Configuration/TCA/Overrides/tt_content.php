<?php
defined('TYPO3') || die();

$extKey = 'spt_storelocator';

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'SptStorelocator',
    'List',
    'List View'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'SptStorelocator',
    'Map',
    'Map View'
);

// flexform
$pluginSignatureList = str_replace('_', '', $extKey) . '_list';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignatureList] = 'layout,select_key,recursive';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignatureList] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignatureList,
    'FILE:EXT:' . $extKey . '/Configuration/Flexforms/PluginStoreLocatorList.xml'
);

$pluginSignatureMap = str_replace('_', '', $extKey) . '_map';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignatureMap] = 'layout,select_key,recursive';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignatureMap] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignatureMap,
    'FILE:EXT:' . $extKey . '/Configuration/Flexforms/PluginStoreLocatorMap.xml'
);
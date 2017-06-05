<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
	{

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'TYPO3.SptNewscalender',
            'Newscalender',
            [
                'NewsCalender' => 'list'
            ],
            // non-cacheable actions
            [
                'NewsCalender' => 'list'
            ]
        );

	// wizards
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
		'mod {
			wizards.newContentElement.wizardItems.plugins {
				elements {
					newscalender {
						icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($extKey) . 'Resources/Public/Icons/user_plugin_newscalender.svg
						title = LLL:EXT:spt_newscalender/Resources/Private/Language/locallang_db.xlf:tx_spt_newscalender_domain_model_newscalender
						description = LLL:EXT:spt_newscalender/Resources/Private/Language/locallang_db.xlf:tx_spt_newscalender_domain_model_newscalender.description
						tt_content_defValues {
							CType = list
							list_type = sptnewscalender_newscalender
						}
					}
				}
				show = *
			}
	   }'
	);
    },
    $_EXTKEY
);

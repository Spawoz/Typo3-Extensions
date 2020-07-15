<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
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
						iconIdentifier = typo3_SptNewscalender-plugin-typo3_SptNewscalender
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
	$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);

	$iconRegistry->registerIcon(
	'typo3_SptNewscalender-plugin-typo3_SptNewscalender',
	\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
	['source' => 'EXT:spt_newscalender/Resources/Public/Icons/user_plugin_newscalender.svg']
	);

    }
);




   
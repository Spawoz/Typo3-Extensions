<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
	{

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'SPT.SptSocialmedia',
            'Sptsocialmedia',
            [
                
                SPT\SptSocialmedia\Controller\SocialmediaController::class => 'list'
            ],
            // non-cacheable actions
            [
                SPT\SptSocialmedia\Controller\SocialmediaController::class => 'list'
            ]
        );


  // wizards
   \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
       'mod {
           wizards.newContentElement.wizardItems.plugins {
               elements {
                   sptjobs {
                       iconIdentifier = spt_socialmedia-plugin-spt_socialmedia
                       title = LLL:EXT:spt_socialmedia/Resources/Private/Language/locallang_db.xlf:tx_spt_socialmedia_domain_model_sptsocialmedia
                       description = LLL:EXT:spt_socialmedia/Resources/Private/Language/locallang_db.xlf:tx_spt_socialmedia_domain_model_sptsocialmedia.description
                       tt_content_defValues {
                           CType = list
                           list_type = sptsocialmedia_sptsocialmedia
                       }
                   }
               }
               show = *
           }
      }'
   );

   $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);

	$iconRegistry->registerIcon(
	'spt_socialmedia-plugin-spt_socialmedia',
	\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
	['source' => 'EXT:spt_jobs/Resources/Public/Icons/user_plugin_sptsocialmedia.svg']
	);

	   }
	);
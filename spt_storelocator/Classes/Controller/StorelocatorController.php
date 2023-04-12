<?php

declare(strict_types=1);

namespace SPT\SptStorelocator\Controller;

/**
 * This file is part of the "Store Locator" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2023 Arun Chandran
 */

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\PathUtility;
use TYPO3\CMS\Core\Messaging\FlashMessage;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/**
 * StorelocatorController
 */
class StorelocatorController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * storelocatorRepository
     *
     * @var \SPT\SptStorelocator\Domain\Repository\StorelocatorRepository
     */
    protected $storelocatorRepository = null;

    /**
     * @param \SPT\SptStorelocator\Domain\Repository\StorelocatorRepository $storelocatorRepository
     */
    public function injectStorelocatorRepository(\SPT\SptStorelocator\Domain\Repository\StorelocatorRepository $storelocatorRepository)
    {
        $this->storelocatorRepository = $storelocatorRepository;
    }

    /**
     * Constructor 
     */
    public function __construct() {
        $this->pageRenderer = GeneralUtility::makeInstance(PageRenderer::class);
        $this->errorTitle = LocalizationUtility::translate('tx_sptstorelocator_domain_model_storelocator.errorTitle', 'spt_storelocator');
        $this->errorText = LocalizationUtility::translate('tx_sptstorelocator_domain_model_storelocator.errorText', 'spt_storelocator');
        // Include custom css file
        $customCSS = 'EXT:spt_storelocator/Resources/Public/Css/storelocator.min.css';
        $this->pageRenderer->addCssFile($customCSS, 'stylesheet', 'screen', 'all', [], true, true, '', true);
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    { 
        $this->cObj = $this->configurationManager->getContentObject();
        $settings = $this->settings; // Get extension settings
        // Get store list based on storage id and category
        $storeLocations = $this->storelocatorRepository->getStoresByCategory($settings['categories'], $this->cObj->data['pages']);
        // If store locations found
        if (count($storeLocations) > 0) {
            $this->view->assign('storelocators', $storeLocations);
        } else {
            // If no stores found, show warning message
            $this->addFlashMessage($this->errorText, $this->errorTitle, FlashMessage::WARNING);
        }
        return $this->htmlResponse();
    }

    /**
     * action map
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function mapAction(): \Psr\Http\Message\ResponseInterface
    {
        $arguments = $this->request->getArguments();
        $settings = $this->settings; // Get extension settings
        $this->cObj = $this->configurationManager->getContentObject();

        // Check if API key is set
        if( $settings['apiKey'] ) {
            // Include the Map Library, JS & CSS files
            $googleLib = 'https://maps.googleapis.com/maps/api/js?key=' . $settings['apiKey'];
            $handlebarsLib = PathUtility::stripPathSitePrefix(ExtensionManagementUtility::extPath($this->request->getControllerExtensionKey())).'Resources/Public/Js/handlebars.min.js';
            $snazzymapLib = PathUtility::stripPathSitePrefix(ExtensionManagementUtility::extPath($this->request->getControllerExtensionKey())).'Resources/Public/Js/snazzy-info-window.min.js';
            $mapconfigJs = PathUtility::stripPathSitePrefix(ExtensionManagementUtility::extPath($this->request->getControllerExtensionKey())).'Resources/Public/Js/multiplelocationmap.js';
            $snazzymapCSS = PathUtility::stripPathSitePrefix(ExtensionManagementUtility::extPath($this->request->getControllerExtensionKey())).'Resources/Public/Css/snazzy-info-window.min.css';
            $mapstyleJs = '<script id="marker-content-template" type="text/x-handlebars-template">
                                <div class="row gmap-infowindow">
                                    <div class="col-12">
                                        <section class="custom-content">
                                            <h3 class="custom-header">{{title}}</h3>
                                            <div class="custom-image">{{{image}}}</div>
                                            <div class="custom-body">{{{body}}}</div>
                                        </section>
                                    </div>
                                </div>
                        </script>';      
            $this->pageRenderer->addJsFooterFile($googleLib);
            $this->pageRenderer->addJsFooterFile($handlebarsLib);
            $this->pageRenderer->addJsFooterFile($snazzymapLib);
            $this->pageRenderer->addJsFooterFile($mapconfigJs);
            $this->pageRenderer->addFooterData($mapstyleJs);
            $this->pageRenderer->addCssFile($snazzymapCSS, 'stylesheet', 'screen', 'all', [], true, true, '', true);

            // Get store list based on storage id and category
            $storeLocations = $this->storelocatorRepository->getStoresByCategory($settings['categories'], $this->cObj->data['pages']);

            // If store locations found
            if (count($storeLocations) > 0) {
                // Map info window processing
                $locationInfo = '';
                foreach ($storeLocations as $storeKey => $storeValue) {
                    // Get image url
                    if(!empty($storeValue->getBild())) {
                        $imagePath = 'fileadmin'.$storeValue->getBild()->getOriginalResource()->getOriginalFile()->getIdentifier();
                        $imageUrl = '<image src="'.$imagePath.'" width="150" />';
                    }

                    // Get 'Weitere Informationen' link & process as URL
                    $morelinkUrl = $this->cObj->typoLink_URL(['parameter' => $storeValue->getMoreinfo(), 'forceAbsoluteUrl' => true]);
                    $getMoreLink = (!empty($storeValue->getMoreinfo())) ? '<a href="'.$morelinkUrl.'" target="_blank">' . LocalizationUtility::translate('tx_sptstorelocator_domain_model_storelocator.moreinfo', 'spt_storelocator').'</a>' : '';
                    
                    // Get address info
                    $getAddress = ($storeValue->getAdresse()) ? nl2br($storeValue->getAdresse()) : '';
                    $getAddress = trim(preg_replace( "/\r|\n/", "", $getAddress ));
                    
                    // Process the JSON array including the store details
                    $locationInfo .= "{ 'title': '".addslashes($storeValue->getTitel())."', 'image': '".$imageUrl."', 'description': '".addslashes($storeValue->getVorschautext().'<br/><br/>'.addslashes($getAddress).'<br/><br/>'.$getMoreLink)."', 'lattitude': ".$storeValue->getLatitude().", 'longitude': ".$storeValue->getLongitude().", 'datauid': ".$storeValue->getUid()."},";
                } 

                // Find center of map focus (if not set in settings, taking the first record properties)
                $centerLat = ($this->settings["centerLat"]) ? $this->settings["centerLat"] : $storeLocations->getFirst()->getLatitude();
                $centerLong = ($this->settings["centerLong"]) ? $this->settings["centerLong"] : $storeLocations->getFirst()->getLongitude();

                // Map settings & attributes
                $mapAttributes = '
                    var centerLat = '.$centerLat.';
                    var centerLong = '.$centerLong.';
                    var pinImage = "'.$this->settings["pinImage"].'";
                    var gmapLocation = ['.$locationInfo.'];
                ';

                // Include map attributes to header
                $this->pageRenderer->addHeaderData('<script type="text/javascript">'.$mapAttributes.'</script>');
                $this->view->assign('storelocators', $storeLocations);
            } else {
                // If no stores found, show warning message
                $this->addFlashMessage($this->errorText, $this->errorTitle, FlashMessage::WARNING);
            }
        } else {
            // If no API key found, show error message
            $apierrorMessageTitle = LocalizationUtility::translate('tx_sptstorelocator_domain_model_storelocator.apikeyerrorTitle', 'spt_storelocator');
            $apierrorMessageText = LocalizationUtility::translate('tx_sptstorelocator_domain_model_storelocator.apierrorMessageText', 'spt_storelocator');
            $this->addFlashMessage($apierrorMessageText, $apierrorMessageTitle, FlashMessage::ERROR);
        }
        return $this->htmlResponse();
    }
}


plugin.tx_sptsocialmedia_sptsocialmedia {
  view {
    templateRootPaths.0 = EXT:spt_socialmedia/Resources/Private/Templates/
    templateRootPaths.1 = {$plugin.tx_sptsocialmedia_sptsocialmedia.view.templateRootPath}
    partialRootPaths.0 = EXT:spt_socialmedia/Resources/Private/Partials/
    partialRootPaths.1 = {$plugin.tx_sptsocialmedia_sptsocialmedia.view.partialRootPath}
    layoutRootPaths.0 = EXT:spt_socialmedia/Resources/Private/Layouts/
    layoutRootPaths.1 = {$plugin.tx_sptsocialmedia_sptsocialmedia.view.layoutRootPath}
  }
  persistence {
    storagePid = {$plugin.tx_sptsocialmedia_sptsocialmedia.persistence.storagePid}
    #recursive = 1
  }
  features {
    #skipDefaultArguments = 1
  }
  mvc {
    #callDefaultActionIfActionCantBeResolved = 1
  }
  settings {
    includeJSLib = {$plugin.tx_sptsocialmedia_sptsocialmedia.settings.includeJSLib}
  }
}

plugin.tx_sptsocialmedia._CSS_DEFAULT_STYLE (
    textarea.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    input.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    .tx-spt-socialmedia table {
        border-collapse:separate;
        border-spacing:10px;
    }

    .tx-spt-socialmedia table th {
        font-weight:bold;
    }

    .tx-spt-socialmedia table td {
        vertical-align:top;
    }

    .typo3-messages .message-error {
        color:red;
    }

    .typo3-messages .message-ok {
        color:green;
    }
)

#Include social media in all the pages
page.99999 = USER
page.99999 { 
    userFunc = TYPO3\CMS\Extbase\Core\Bootstrap->run
    pluginName = Sptsocialmedia
    extensionName = SptSocialmedia
    controller = Socialmedia
    vendorName = SPT
    switchableControllerActions {
        Socialmedia {
            1 = list
        }
    }
}

#include  and css
page.includeCSS {
    filecss = EXT:spt_socialmedia/Resources/Public/Css/socialwidget.css
    filecss1 = EXT:spt_socialmedia/Resources/Public/Css/font-awesome/css/font-awesome.min.css
}

#include Js
page.includeJSFooter {
    file = EXT:spt_socialmedia/Resources/Public/Js/jquery.min.js
    file1 = EXT:spt_socialmedia/Resources/Public/Js/socialwidget.js
}
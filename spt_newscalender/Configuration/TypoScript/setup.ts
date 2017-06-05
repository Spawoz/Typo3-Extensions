
plugin.tx_sptnewscalender_newscalender {
  view {
    templateRootPaths.0 = EXT:spt_newscalender/Resources/Private/Templates/
    templateRootPaths.1 = {$plugin.tx_sptnewscalender_newscalender.view.templateRootPath}
    partialRootPaths.0 = EXT:spt_newscalender/Resources/Private/Partials/
    partialRootPaths.1 = {$plugin.tx_sptnewscalender_newscalender.view.partialRootPath}
    layoutRootPaths.0 = EXT:spt_newscalender/Resources/Private/Layouts/
    layoutRootPaths.1 = {$plugin.tx_sptnewscalender_newscalender.view.layoutRootPath}
  }
  persistence {
    storagePid = {$plugin.tx_sptnewscalender_newscalender.persistence.storagePid}
    #recursive = 1
  }
  features {
    #skipDefaultArguments = 1
  }
  mvc {
    #callDefaultActionIfActionCantBeResolved = 1
  }
  
}

plugin.tx_sptnewscalender._CSS_DEFAULT_STYLE (
    textarea.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    input.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    .tx-spt-newscalender table {
        border-collapse:separate;
        border-spacing:10px;
    }

    .tx-spt-newscalender table th {
        font-weight:bold;
    }

    .tx-spt-newscalender table td {
        vertical-align:top;
    }

    .typo3-messages .message-error {
        color:red;
    }

    .typo3-messages .message-ok {
        color:green;
    }
)
page.includeCSS {
  css100 = EXT:spt_newscalender/Resources/Public/Css/fullcalendar.min.css
  css100.media = all
  css200 = EXT:spt_newscalender/Resources/Public/Css/fullcalendar.print.min.css
  css200.media = all
  css300 = EXT:spt_newscalender/Resources/Public/Css/fullcalendar.css
  css300.media = all  
}
[globalVar = LIT:1 = {$plugin.tx_sptnewscalender_newscalender.settings.addJQueryLibrary}]
    page.includeJSFooterlibs.newscalJQueryLib = EXT:spt_newscalender/Resources/Public/Js/jquery.min.js
[end]
page.includeJSFooter {
  js1 = EXT:spt_newscalender/Resources/Public/Js/moment.min.js
  js2 = EXT:spt_newscalender/Resources/Public/Js/fullcalendar.min.js
}

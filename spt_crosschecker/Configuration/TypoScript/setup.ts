
 # Module configuration
module.tx_sptcrosschecker_tools_sptcrosscheckersptcrosschecker {
	persistence {
		storagePid = {$module.tx_sptcrosschecker_sptcrosschecker.persistence.storagePid}
	}
	view {
		templateRootPaths.0 = EXT:spt_crosschecker/Resources/Private/Backend/Templates/
		templateRootPaths.1 = {$module.tx_sptcrosschecker_sptcrosschecker.view.templateRootPath}
		partialRootPaths.0 = EXT:spt_crosschecker/Resources/Private/Backend/Partials/
		partialRootPaths.1 = {$module.tx_sptcrosschecker_sptcrosschecker.view.partialRootPath}
		layoutRootPaths.0 = EXT:spt_crosschecker/Resources/Private/Backend/Layouts/
		layoutRootPaths.1 = {$module.tx_sptcrosschecker_sptcrosschecker.view.layoutRootPath}
	}
}


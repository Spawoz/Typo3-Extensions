
module.tx_sptcrosschecker_sptcrosschecker {
	view {
		# cat=module.tx_sptcrosschecker_sptcrosschecker/file; type=string; label=Path to template root (BE)
		templateRootPath = EXT:spt_crosschecker/Resources/Private/Backend/Templates/
		# cat=module.tx_sptcrosschecker_sptcrosschecker/file; type=string; label=Path to template partials (BE)
		partialRootPath = EXT:spt_crosschecker/Resources/Private/Backend/Partials/
		# cat=module.tx_sptcrosschecker_sptcrosschecker/file; type=string; label=Path to template layouts (BE)
		layoutRootPath = EXT:spt_crosschecker/Resources/Private/Backend/Layouts/
	}
	persistence {
		# cat=module.tx_sptcrosschecker_sptcrosschecker//a; type=string; label=Default storage PID
		storagePid =
	}
}

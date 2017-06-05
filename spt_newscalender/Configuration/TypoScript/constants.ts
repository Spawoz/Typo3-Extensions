
plugin.tx_sptnewscalender_newscalender {
  view {
    # cat=plugin.tx_sptnewscalender_newscalender/file; type=string; label=Path to template root (FE)
    templateRootPath = EXT:spt_newscalender/Resources/Private/Templates/
    # cat=plugin.tx_sptnewscalender_newscalender/file; type=string; label=Path to template partials (FE)
    partialRootPath = EXT:spt_newscalender/Resources/Private/Partials/
    # cat=plugin.tx_sptnewscalender_newscalender/file; type=string; label=Path to template layouts (FE)
    layoutRootPath = EXT:spt_newscalender/Resources/Private/Layouts/
  }
  persistence {
    # cat=plugin.tx_sptnewscalender_newscalender//a; type=string; label=Default storage PID
    storagePid =
  }
settings {
    addJQueryLibrary = 1
  }
}

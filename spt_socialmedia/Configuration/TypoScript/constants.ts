
plugin.tx_sptsocialmedia_sptsocialmedia {
  view {
    # cat=plugin.tx_sptsocialmedia_sptsocialmedia/file; type=string; label=Path to template root (FE)
    templateRootPath = EXT:spt_socialmedia/Resources/Private/Templates/
    # cat=plugin.tx_sptsocialmedia_sptsocialmedia/file; type=string; label=Path to template partials (FE)
    partialRootPath = EXT:spt_socialmedia/Resources/Private/Partials/
    # cat=plugin.tx_sptsocialmedia_sptsocialmedia/file; type=string; label=Path to template layouts (FE)
    layoutRootPath = EXT:spt_socialmedia/Resources/Private/Layouts/
  }
  persistence {
    # cat=plugin.tx_sptsocialmedia_sptsocialmedia//a; type=string; label=Default storage PID
    storagePid =
  }
  settings {
    includeJSLib = 0
  }
}

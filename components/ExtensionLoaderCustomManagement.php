<?php
/**
 * Custom management for custom extensions
 */
class ExtensionLoaderCustomManagement extends CustomManagement
{
  /**
   * (non-PHPdoc)
   * @see CustomManagement::runBeforeInstallationAutoBuildDatabase()
   */
  public function runBeforeInstallationAutoBuildDatabase(MessageLogger $messageLogger)
  {
    ExtensionLoaderInstallUtil::resolveCustomMetadataAndLoad();
  }

  /**
   * (non-PHPdoc)
   * @see CustomManagement::resolveIsCustomDataLoaded()
   */
  public function resolveIsCustomDataLoaded()
  {
    ExtensionLoaderInstallUtil::resolveCustomMetadataAndLoad();
  }
}
?>

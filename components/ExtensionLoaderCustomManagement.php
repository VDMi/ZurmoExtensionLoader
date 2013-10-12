<?php
/**
 * Custom management for custom extensions
 */
class ExtensionLoaderCustomManagement extends CustomManagement
{
  /**
   * Called right before the auto build is initialized in the installation process.
   * @see InstallUtil::runInstallation
   * @param MessageLogger $messageLogger
   */
  public function runBeforeInstallationAutoBuildDatabase(MessageLogger $messageLogger)
  {
    ExtensionLoaderInstallUtil::resolveCustomMetadataAndLoad($messageLogger);
  }

  /**
   * Called as a begin request behavior.  This is only called during non-installation behavior. This can be used
   * as a convenience for developers to check and load any missing metadata customizations as they develop.
   */
  public function resolveIsCustomDataLoaded()
  {
    ExtensionLoaderInstallUtil::resolveCustomMetadataAndLoad();
  }

  /**
   * Called right after the default data is loaded in the installation process.
   * @see InstallUtil::runInstallation
   * @param MessageLogger $messageLogger
   */
  public function runAfterInstallationDefaultDataLoad(MessageLogger $messageLogger)
  {
    ExtensionLoaderInstallUtil::runAfterInstallationDefaultDataLoad($messageLogger);
  }
  /**
   * Called from ImportCommand.  Override and add calls to any import routines you would like to run.
   * @see ImportCommand
   * @param MessageLogger $messageLogger
   * @param string $importName - Optional array of specific import process to run, otherwise if empty,
   *                             run all available import processes.
   */
  public function runImportsForImportCommand(ImportMessageLogger $messageLogger, $importName = null)
  {
    ExtensionLoaderInstallUtil::runImportsForImportCommand($messageLogger, $importName);
  }


}
?>

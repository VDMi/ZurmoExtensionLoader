ZurmoExtensionLoader
====================

Extension loader for Zurmo.
Zurmo only allows 1 custom extension to be loaded, this extension allows you to make as much extensions as you like.

To use this extensionloader, clone in app/protected/extensions/extensionloader

Add the following to perInstanceConfig.php

[code]
    $instanceConfig['components']['custom']['class'] = 'application.extensions.extensionloader.components.ExtensionLoaderCustomManagement';

    $instanceConfig['import'][] = "application.extensions.extensionloader.*";
    $instanceConfig['import'][] = "application.extensions.extensionloader.components.*";
    $instanceConfig['import'][] = "application.extensions.extensionloader.utils.*";
[/code]

This extension searches for extensions in app/protected/extensions/custom.

Example:
app/protected/extensions/custom/AnimalLoader/AnimalLoader.php

Will automatically be loaded, the class has to be the same as the filename without the extension.

[code]
    class AnimalLoader {
      function resolveCustomMetadataAndLoad() {

      }
    }
[/code]

This function will be executed on the cutom metadata resolve.

This extension currently only allows resolveCustomMetadataAndLoad(), do pull requests for more functions, it's easy!

[code]
    public static function "function"()
    {
        ExtensionLoaderInstallUtil::triggerFunction(__FUNCTION__);
    }
[/code]

You can also add functions to ExtensionLoaderCustomManagement when needed.

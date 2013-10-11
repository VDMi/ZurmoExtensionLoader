<?php
/**
 * Helper class for custom extensions installutils
 */
class ExtensionLoaderInstallUtil
{
  public static function resolveCustomMetadataAndLoad()
  {
    ExtensionLoaderInstallUtil::triggerFunction(__FUNCTION__);
  }

  public static function triggerFunction($function) {
    $classes = ExtensionLoaderInstallUtil::findAllClassesWithFunction($function);
    foreach($classes as $class) {
      $class->{$function}();
    }
  }

  public static function findAllClassesWithFunction($function) {
    $functions = array();
    $customInstallUtilDirectoryName = COMMON_ROOT . "/protected/extensions/custom";

    // Check if our custom extension dir exists
    if (is_dir($customInstallUtilDirectoryName))
    {

      // Find all the folders in this custom folder
      $folders = scandir($customInstallUtilDirectoryName);
      // Loop through the folders
      foreach ($folders as $folder)
      {
        $fullFolderPath = $customInstallUtilDirectoryName . '/' . $folder;

        // Only show folders and only actual folders (not virtual, like ..)
        if($folder != '.' && $folder != '..' && is_dir($fullFolderPath)) {
          $files = scandir($fullFolderPath);
          foreach($files as $file) {

            $fullFilePath = $fullFolderPath . '/' . $file;
            if($file != '.' && $file != '..' && is_file($fullFilePath) && pathinfo($fullFilePath, PATHINFO_EXTENSION) == 'php') {

              require_once($fullFilePath);

              $pathInfo = pathinfo($fullFilePath);
              if(isset($pathInfo['filename'])) {
                $className = $pathInfo['filename'];
                if(class_exists($className)) {
                  $classInstance = new ReflectionClass($className);
                  if($classInstance->hasMethod($function)) {
                    $functions[] = $classInstance->newInstance();
                  }
                }
              }
            }
          }
        }
      }
    }
    return $functions;
  }
}
?>

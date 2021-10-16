 <?php
 /**
  * Loader
  * 
  * PHP 7.4.5
  * 
  * @category App
  * @package  App
  * @author   Christian Shungu <christianshungu@gmail.com>
  * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
  * @link     https://github.com/silex100
  * @version: 1
  * @date     12/02/2021
  * @file     Loader.php
  */
 class Loader
 {
 
     /**
      * Methode register
      * 
      * @return void
      */
     public static function register(): void
     {
         spl_autoload_register([__CLASS__, '_autoloader']);
     }
     /**
      * Methode autoloader
      * 
      * @param string $className - 
      * 
      * @return void
      */
     private static function _autoloader(string $className): void
     {
         $class = str_replace('App\\', '', $className);
         $class = str_replace('\\', '/', $class);
         $class = str_replace('/', '\\', $class);
         $path  = APP_ROOT.DIRECTORY_SEPARATOR."src/";
         $filename = $path.$class.".php";
         if (file_exists($filename) && is_readable($filename)) { 
             include_once $filename;
         } 
     }
 }
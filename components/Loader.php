<?php

class Loader
{
    public static function autoload($className)
    {
        $classDirs =  [
            '..' . DIRECTORY_SEPARATOR . 'app'. DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR,
            '..' . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR ];

       foreach ($classDirs as $classDir){
           $filePath = $classDir . $className . '.php';
           if (file_exists($filePath)) {
               require_once $filePath;
           }
       }

    }
}
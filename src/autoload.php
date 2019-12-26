<?php
    spl_autoload_register(function($class){
   
        $class = ltrim($class, '\\');
        $dir = __DIR__ . '/src/mingyuan';
        $namespace = 'mingyuan';
        
        if(strpos($class, $namespace) === 0)
        {
            $class = substr($class, strlen($namespace));
            $path = '';
            if(($pos = strripos($class, '\\')) !== FALSE)
            {
                $path = str_replace('\\', '/', substr($class, 0, $pos)) . '/';
                $class = substr($class, $pos + 1);
            }
            $path .= str_replace('_', '/', $class) . '.php';
            $dir .= '/' . $path;
            
            if(file_exists($dir))
            {
                include $dir;
                return true;
            }
            
            return false;
        }
        
        return false;
    
    });

    // spl_autoload_register(function ($className) {
    //     $className = ltrim($className, '\\');
    //     $fileName = '';
    //     if ($lastNsPos = strripos($className, '\\')) {
    //         $namespace = substr($className, 0, $lastNsPos);
    //         $className = substr($className, $lastNsPos + 1);
    //         $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    //     }
    //     $fileName = __DIR__ . DIRECTORY_SEPARATOR . $fileName . $className . '.php';
    //     die($fileName);
    //     if (file_exists($fileName)) {
    //         require $fileName;
    
    //         return true;
    //     }
    
    //     return false;
    // });
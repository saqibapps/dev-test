<?php

define( 'ROOT', dirname( __DIR__ ) . DIRECTORY_SEPARATOR ) ;
define( 'APP',      ROOT . 'App' . DIRECTORY_SEPARATOR);
define( 'VIEW',     ROOT . 'App' . DIRECTORY_SEPARATOR . 'View' . DIRECTORY_SEPARATOR ) ;
define( 'MODEL',    ROOT . 'App' . DIRECTORY_SEPARATOR . 'Model' . DIRECTORY_SEPARATOR ) ;
define( 'CONTROLLER', ROOT . 'App' . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR ) ;
define( 'DATA',     ROOT . 'App' . DIRECTORY_SEPARATOR . 'Data' . DIRECTORY_SEPARATOR ) ;
define( 'CORE',     ROOT . 'App' . DIRECTORY_SEPARATOR . 'Core' . DIRECTORY_SEPARATOR ) ;
define( 'TRANSPORT', ROOT . 'App' . DIRECTORY_SEPARATOR . 'Transport' . DIRECTORY_SEPARATOR) ;

$modules = [ ROOT, APP, CORE, CONTROLLER, DATA, TRANSPORT ] ;

set_include_path( get_include_path() . PATH_SEPARATOR . implode( PATH_SEPARATOR, $modules )  ) ;

spl_autoload_register( 'spl_autoload', false );

new Application();




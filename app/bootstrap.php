<?php

//Load config
    require_once 'config/config.php';


	//autoload core libraries
spl_autoload_register(function ($class){
   require_once 'libraries/'. $class . '.php';
});
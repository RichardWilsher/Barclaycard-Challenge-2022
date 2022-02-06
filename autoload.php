<?php
// autoloader to load the required template
function autoload($className){
    $file = '../' . str_replace('\\', '/', $className) . '.php';

    require $file;
}
spl_autoload_register('autoload');
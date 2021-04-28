<?php
function autoload_src($class_name) {
    require 'src/' . implode('/', explode('\\', $class_name)) . '.php';
}
spl_autoload_register('autoload_src');
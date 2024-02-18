<?php

spl_autoload_register('Loader');

function Loader ($className)
{
    $extension = ".php";
    $fullPath = $className . $extension;
    var_dump($fullPath);
    if (!file_exists($fullPath)) {
        return false;
    }

    return include_once $fullPath;
}
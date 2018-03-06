<?php

spl_autoload_register( //PHP default function
    function($className){
        //search for the file including the $className in the current directory
        $filename = sprintf('%s/%s.php', __DIR__, str_replace('\\', '/', $className));
        //if the file exist it will be required once
        if (is_file($filename)) {
            require_once $filename;
        }
    }
);

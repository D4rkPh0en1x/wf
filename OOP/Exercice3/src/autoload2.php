<?php

spl_autoload_register(
    function($namespace){
        //$filename = sprintf('%s\%s.php', __DIR__, str_replace('\\', DIRECTORY_SEPARATOR, $namespace));
        //var_dump ($filename);
        $filename = $namespace . '.php';
        $filename = str_replace('\\', DIRECTORY_SEPARATOR, $filename);
        $filename = __DIR__ . DIRECTORY_SEPARATOR . $filename;
        
        if (is_file($filename)) {
            require_once $filename;
        }
        
    }
);

use Model\Role;
use Model\User;
use Model\Person;

$user = new User();
$role = new Role(Role::ROLE_USER);


$user->setPassword('myPassword')
     ->setRoles([$role])
     ->setSalt('mySalt')
     ->setUsername('myUsername');

$person = new Person();
$person->setFirstname('Frank')
       ->setLastname('Schroeder')
       ->setEmails(['frank@eliza.family']);


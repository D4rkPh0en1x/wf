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

use Model\User;

interface UserInterface{
    
    public function getId();
    public function getRoles();
    public function getPassword();
    public function getSalt();
    public function getUsername();
    public function setRoles(array $roles);
    public function addRole(Role $role);
    public function setPassword($password);
    public function setSalt($salt);
    public function setUsername($username);
    public function eraseCredentials();
    
}

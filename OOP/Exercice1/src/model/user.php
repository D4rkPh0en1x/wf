<?php

/*
 A class User
 * Into the namespace Model
 * With the following properties :
 	* id			a private property
 	* roles			a protected property
 	* password		a protected property
 	* salt			a protected property
 	* username		a protected property
 * The property "roles" must be initialized as empty array
 * With the following public methods :
 	* getId()			return the stored id
 	* getRoles			return the stored roles
 	* getPassword		return the stored password
 	* getSalt			return the stored salt
 	* getUsername		return the stored username
 	* setRoles			set up the stored roles
 	* setPassword		set up the stored password
 	* setSalt			set up the stored salt
 	* setUsername		set up the stored username
 	* eraseCredentials	Erase stored salt and password data
 */

namespace Model;

class User{
    private $id;
    protected $roles = [];
    protected $password;
    protected $salt;
    protected $username;
    public function getId(){
       
        return $this->id;
    }
    public function getRoles(){
        
        return $this->roles;
    }
    public function getPassword(){
        
        return $this->password;
    }
    public function getSalt(){
        
        return $this->salt;
    }
    public function getUsername(){
        
        return $this->username;
    }
    public function setRoles($roles){
        
        $this->roles = $roles;
        return $this;
    }
    public function setPassword($password){
        
        $this->password = $password;
        return $this;
    }
    public function setSalt($salt){
        
        $this->salt = $salt;
        return $this;
    }
    public function setUsername($username){
        
        $this->username = $username;
        return $this;
    }
    public function eraseCredentials(){
        
        $this->password = null;
        $this->salt = null;
    }

};








<?php

/*
A class Person
* Into the namespace Model
* With the following properties :
* id			a private property
* firstname		a protected property
* lastname		a protected property
* emails		a protected property
* The property "emails" must be initialized as empty array
* With the following public methods :
* getId()		return the stored id
* getFirstname  return the stored firstname
* getLastname	return the stored lastname
* getEmails	  	return the stored emails
* setFirstname	set up the stored firstname
* setLastname	set up the stored lastname
* setEmails	set up the stored emails
*/

namespace Model;

class Person{
    
    private $id;
    protected $firstname;
    protected $lastname;
    protected $emails = [];
    public function getID(){
        
        return $this->id;
    }
    public function getFirstname(){
        
        return $this->firstname;
    }
    public function getLastname(){
        
        return $this->lastname;
    }
    public function getEmails(){
        
        return $this->emails;
    }
    public function setFirstname($firstname){
        
        $this->firstname=$firstname;
        return $this;
    }
    public function setLastname($lastname){
        
        $this->lastname=$lastname;
        return $this;        
    }
    public function setEmails($emails){
        
        $this->emails = $emails;
        return $this; 
    }
    
};
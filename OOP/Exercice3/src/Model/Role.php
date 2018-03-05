<?php
namespace Model;

use Exception\NotAllowedRoleException; //we need to insert the just created class

class Role
{
    public const ROLE_USER = 'ROLE_USER';
    
    public const ROLE_ADMIN = 'ROLE_ADMIN';
    
    private $id;
    
    protected $label;
    
    public function __construct($label)
    {
        $this->setLabel($label);
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function setLabel($label)
    {
        $allowedRoles = [self::ROLE_USER, self::ROLE_ADMIN]; //declare the allowed roles
        if (!in_array($label, $allowedRoles)) { //check if the passed role is in the allowed roles list
            throw new NotAllowedRoleException($allowedRoles, $label); 
           //if not in the list we will call the function NotAllowedRoleException we created to construct the error message
           //for that the allowedRoles list will be transfered as argument and the wanted label
        }
        //if the label is in the allowedRoles list we will return the label 
        $this->label = $label;
        return $this;
    }
}


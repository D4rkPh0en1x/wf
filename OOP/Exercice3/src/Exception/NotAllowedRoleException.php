<?php
namespace Exception;

class NotAllowedRoleException extends \RuntimeException
{
    private $allowedRoles;
    private $givenRole;
    
    //use the existing __construct function to construct our message
    public function __construct ($allowedRoles = [], //pass the allowedRoles
                                 $givenRole = '', //pass the givenRole
                                 $message = null, //default entries for the the default construct function
                                 $code = null, //default entries for the the default construct function
                                 $previous = null)  //default entries for the the default construct function
    {
        
        $this->allowedRoles = $allowedRoles; //list of allowed roles
        $this->givenRole = $givenRole; //role given to create user with
        
        //the basic vars for the parent constructor - we leave as is as we don't know how this is handled internaly
        parent::__construct($message, $code, $previous); //parent is here the internal PHP RuntimeException function
        
        //finaly call the function for updating the message with the message from the current constructor
        $this->updateMessage();
        
    }
    
    protected function updateMessage()
    {
        $this->message = sprintf( //sprintf — Return a formatted string
            //update the message if a given role is not in the defined list of roles
            'The role "%s" is not allowed. Only "%s" are allowed. %s',
            $this->givenRole,
            //implode the allowedRoles in a comma separated list like asked in the todo
            implode(', ', $this->allowedRoles), 
            (string)parent::getMessage() //get the message from the parent calling this function (here construct)
        );
       
    }
}


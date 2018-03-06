<?php

interface ArrayInterface extends Countable, ArrayAccess{
    //abstract public function count ();
    //abstract public function offsetExists ($offset);
    //abstract public function offsetGet ($offset);
    //abstract public function offsetSet ($offset, $value);
    //abstract public function offsetUnset ($offset);
}

class ArrayElement implements ArrayInterface{
    
   private $internal = [];
    
   public function offsetGet($offset)
   {
       return $this->internal[$offset];
   }
   public function offsetSet($offset, $value)
   {
       return $this->internal[$offset] = $value;
   }
   public function offsetExists($offset)
   {
       return isset($this->internal[$offset]);
   }
   public function offsetUnset($offset)
   {
       unset($this->internal[$offset]);
   }
   public function count()
   {        
        return count($this->internal);
   }

}

$array = new ArrayElement();
$array->offsetSet(1,2);
echo count($array);

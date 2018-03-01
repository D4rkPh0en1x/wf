<?php

//You must create a function called "divide" that take in first parameter an integer to divide, 
//and in second parameter, the divisor.

function divide(int $base, int $by) : float{
//$base= integer to divide - $by=divisor which is not allowed to be 0 - Output will be float
    
    if ($by == 0){
        //If the divisor is zero, you must throw a RuntimeException
        throw new RuntimeException('Division by 0 is not allowed');
    };
    
    return $base/$by;
};


//You must create a second function called "arrayDivide" that take in first parameter an array of value to divide, 
//and in second parameter, the divisor.

function arrayDivide(array $basearray, int $by) : array{
//$basearray= array of values to divide - $by=divisor which is not allowed to be 0 - output will be an array
    $result = [];
    
    foreach ($basearray as $base){ //for every array entry run the try
        try {
            $result [] = divide($base, $by); //call divide function to divide array value with the by value
        } catch(RuntimeException $exception) { //catch the runtimeerror - this comes when divided by 0
            $result [] = $base; //If the divisor is zero, you must catch the exception and return the array of value, as it.
        }
        
    }
    
    return $result;
};
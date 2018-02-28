<?php
//create the function asked for
function easterReverse($fileOrigin){
 
 //get the file content
 $fileContent = file_get_contents($fileOrigin); 
 
 //get the second part of the text
 $secondTextPart = substr($fileContent, floor(strlen($fileContent)/ 2)); 
 // get the first part of the text based on secondpart (-1 to not take the first char of the secondpart)
 $firstTextPart = substr($fileContent, 0, strlen($secondTextPart) -1); 

 //open file in read/write mode
 $file = fopen($fileOrigin, 'r+'); 
 
 //put the cursor at the end of the first part
 fseek($file, strlen($firstTextPart), SEEK_SET);
 
 //write the second text part but in string reverse mode
 fwrite($file, strrev($secondTextPart), strlen($secondTextPart)); 
 
 // close the file to not get shoot
 fclose ($file); 
}
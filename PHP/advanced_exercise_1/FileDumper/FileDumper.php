<?php
namespace FileDumper;
//One function to insert the data into a file 
function filedumper($filepath, $data){  //pass the filepath and content to the function
    $csvfile = fopen($filepath, 'w'); //open the file to write in
        //no foreach needed as we use fputcsv with an array - foreach would be needed with fwrite
    //var_dump($formattedContent);
    //die;
    //fputcsv($csvfile, $formattedContent); //fputcsv found over google
    foreach ($data as $line) {
        fputcsv($csvfile, $line); //fputcsv only takes out one line so a foreach is needed to fill the file row per row
    }
    fclose($csvfile); //close the csv file
}
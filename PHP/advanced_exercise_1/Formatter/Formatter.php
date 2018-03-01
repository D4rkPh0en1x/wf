<?php
namespace Formatter;
//One function to format the data
//We want in the csv file : the title of the prefered version info, 
//the prefered version description, the prefered version name, 
//the created entry and the prefered version update date in french format (d-m-Y H:i:s).
//$temperatureMin = $json['daily']['data'][0]['temperatureMin'];

function formatter($fileContentData){
   $formattedContent = [];
   foreach ($fileContentData as $element) { //every element needs to be choosen
        //date format coming from the json file
        $dateTimeFormat = 'Y-m-d\TH:i:s.u\Z';
        //choose the preferred version
        $preferred_version = $element['preferred'];
        //set preferred version as current one
        $current_version = $element['versions'][$preferred_version]; //error here
        //transform the json text date into a real date to transform later
        $createdDateTime = \DateTime::createFromFormat($dateTimeFormat, $element['added']);
        $updatedDateTime = \DateTime::createFromFormat($dateTimeFormat, $current_version['updated']);
        //get description
        $description = $current_version['info']['description'];
        //get title
        $title = $current_version['info']['title'];
        //put the asked content into an array
        $formattedContent[] = [
            $title,
            $description,
            $preferred_version,
            $createdDateTime->format('d-m-Y H:i:s'),
            $updatedDateTime->format('d-m-Y H:i:s')
        ];
    
    }

    return $formattedContent;
}

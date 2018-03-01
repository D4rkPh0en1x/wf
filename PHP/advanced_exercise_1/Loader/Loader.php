<?php
namespace Loader;
//One function to download the data

//'json_decode($response, true)'

function jsonloader($url) {
    $fileContent = file_get_contents($url, true); //get the file content
    $fileContentData = json_decode($fileContent, true); //decode the json file as array based
    return $fileContentData;
}

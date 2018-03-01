<?php

function getAllMondaysOfMonth($year, $month){
        $mondays = []; //Mondays array
        $date = DateTime::createFromFormat('Yn', $year.$month); //change date format (Y=year n=number of the month without leading 0)
        $date = new DateTime('first day of '.$date->format('F Y')); //change date format to first day of january 2018 (example)
        $interval = DateInterval::createFromDateString('next monday'); //interval will be always the next monday - createFromDateString=Sets up a DateInterval from the relative parts of the string
        if ($date->format('N') != 1) { //if date is not 1 -- N=day of the week without leading 0
            $date->add($interval); //add predefined interval
        }
        while($date->format('m') == $month) { //while date still in the given month add mondays to the array
            $mondays[] = $date->format('l j, M Y'); //this date format was asked by the todo file
            $date->add($interval); //add predefined interval
        }
    return $mondays; //return mondays array
}
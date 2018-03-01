<?php
$password;
$salt;

$saltedPassword = str_replace($passwordrest = substr($password, (ceil(strlen($password)/2))), 
    "$salt", "$password").$passwordrest = substr($password, (ceil(strlen($password)/2)));

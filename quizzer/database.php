<?php
//Database Credentials
$db_host = 'localhost';
$db_name = 'quizzer';
$db_user = 'root';
$db_pass = '1223ABab';

//Create mysqli object
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

//Error handler

if($mysqli->connect_error){
    printf("Connection Failed: %s\n", $mysqli->connect_error);
}

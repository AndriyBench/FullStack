<?php
include 'database.php';

//Check the form that we submitted

if (isset($_POST['submit']))
{
    $user = mysqli_real_escape_string($con, $_POST['user']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    //set timezone
    date_default_timezone_set('America/New_York');
    $time = date('h:i:s a', time());

    //validate the form
    if(!isset($user) || $user == '' || !isset($message) || $message == '')
    {
        $error = "Please fill in your name and a message";
        header("Location: index.php?error=".urlencode($error));
        exit();
    }
    else
    {
        $query = "INSERT INTO shouts (user, message, time)
                    VALUES ('$user', '$message', '$time')";
        if(!mysqli_query($con, $query))
        {
            die('Error: '.myqsli_error($con));
        }
        else
        {
            header("Location: index.php");
            exit();
        }
    }

}
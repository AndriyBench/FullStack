<?php include 'database.php';?>
<?php session_start(); ?>
<?php 
    //Check to see if score is set
    if(!isset($_SESSION['score']))
    {
        $_SESSION['score'] = 0;
    }

    if($_POST)
    {
        $number = $_POST['number'];
        $selected_choice = $_POST['choice'];
        $next = $number+1;

        /**
         * Get the total questions
         */

         $query = "SELECT * FROM `questions`";

         //Get Result
         $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
         $total = $result->num_rows;

        /**
         *  Get the Correct choice
         */
        $query = "SELECT * FROM `choices` 
                    WHERE question_number = $number AND is_correct = 1 ";

        //Get result
        $result = $mysqli->query($query) or die($mysqli->error.__LINE__);

        //Get row
        $row = $result->fetch_assoc();

        //Correct Choice
        $correct_choice = $row['id'];

        if($correct_choice == $selected_choice)
        {
            //Answer is Correct
            $_SESSION['score']++;
        }
        if($number == $total)
        {
            header("Location: final.php");
            exit();
        }
        else
        {
            header("Location: question.php?n=".$next);
        }
    }
<?php include 'database.php';?>
<?php
    if(isset($_POST['submit'])){

        //get the post variables
        $question_number = $_POST['question_number'];
        $question_text = $_POST['question_text'];
        $correct_choice = $_POST['correct_choice'];

        //Choices array
        $choices = array();
        $choices[1] = $_POST['choice1'];
        $choices[2] = $_POST['choice2'];
        $choices[3] = $_POST['choice3'];
        $choices[4] = $_POST['choice4'];
        $choices[5] = $_POST['choice5'];

        //Question querry
        $query = "INSERT INTO `questions` (question_number, text)
                    VALUES('$question_number', '$question_text')";

        //Run query
        $insert_row = $mysqli->query($query) or die ($mysqli->error.__LINE__);

        //Validate the insert
        if($insert_row)
        {
            foreach($choices as $choice => $value)
            {
                if($value != '')
                {
                    if($correct_choice == $choice)
                    {
                        $is_correct = 1;
                    }
                    else
                    {
                        $is_correct = 0;
                    }
                    //Choice querry
                    $query = "INSERT INTO `choices` (question_number, is_correct, text)
                                VALUES ('$question_number', '$is_correct', '$value')";

                    //Run the query
                    $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

                    //Validate insert
                    if($insert_row)
                    {
                        continue;
                    } 
                    else
                    {
                        die('Error: ('.$mysqli->errno . ') '.$mysqli->error);
                    }
                }
            }

            $msg = 'Question has been added';
        }
    }

    /**
     * Get Total Questions
     */

    $query = "SELECT * FROM questions";
    //Get results
    $questions = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $questions->num_rows;
    $next = $total+1;

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
    <header>
            <div class="container">
                    <a href="index.php"><h1>PHP Quizzer</h1></a>
            </div>
    </header>
    <main>
        <div class="container">
            <h2>Add a Question</h2>
            <?php 
                if(isset($msg))
                {
                    echo '<p>'.$msg.'</p>';
                }
            ?>
            <form method="post" action="add.php">
                <p>
                    <label>Question Number: </label>
                    <input type="number" value="<?php echo $next;?>" name="question_number"/>
                </p>
                <p>
                    <label>Question Text: </label>
                    <input type="text" name="question_text"/>
                </p>
                <p>
                    <label>Choice #1: </label>
                    <input type="text" name="choice1"/>
                </p>
                <p>
                    <label>Choice #2: </label>
                    <input type="text" name="choice2"/>
                </p>
                <p>
                    <label>Choice #3: </label>
                    <input type="text" name="choice3"/>
                </p>
                <p>
                    <label>Choice #4: </label>
                    <input type="text" name="choice4"/>
                </p>
                <p>
                    <label>Choice #5: </label>
                    <input type="text" name="choice5"/>
                </p>
                <p>
                    <label>Correct Choice Number: </label>
                    <input type="number" name="correct_choice"/>
                </p>
                <p>
                    <input class="start" type="submit" name='submit'  value="Submit"/>
                </p>
            </form>
        </div>
    </main>
    <footer>
        <div class="container">
            Copyright &copy; 2021, Andriy Bench
        </div>
    </footer>

</body>
</html>
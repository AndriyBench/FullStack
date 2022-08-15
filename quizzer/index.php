<?php include 'database.php';?>
<?php session_start(); ?>
<?php session_destroy(); ?>
<?php
    /**
     * Get Total Questions
     */

     $query = "SELECT * FROM questions";

     //Get results
     $results = $mysqli->query($query) or die($mysqli->error.__LINE__);

     $total = $results->num_rows;

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
            <h2>Test your PHP Knowledge</h2>
            <p>
                This is a multiple choice quiz to test you PHP knowledge
            </p>
            <ul>
                <li><b>Number of Questions: </b> <?php echo $total?></li>
                <li><b>Type: </b>Multiple Choice</li>
                <li><b>Estimated Time: </b> <?php echo $total * .5?> Minutes</li>
            </ul>
            <a class="start" href="question.php?n=1">Start Quiz</a>
            <a class="start" href="add.php">Add Question</a>
        </div>
    </main>
    <footer>
        <div class="container">
            Copyright &copy; 2021, Andriy Bench
        </div>
    </footer>

</body>
</html>
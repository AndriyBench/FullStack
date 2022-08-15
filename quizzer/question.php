<?php include 'database.php';?>
<?php session_start(); ?>
<?php
    //Set question number
    $number = (int) $_GET['n'];

    /**
     *  Get the question
     */

     $query ="SELECT * FROM `questions` WHERE question_number = $number";

     //Get the results form query
     $result = $mysqli->query($query) or die($mysqli->error.__LINE__);

     $question = $result->fetch_assoc();


     /**
      * Get the choices
      */

      $query ="SELECT * FROM `choices` WHERE question_number = $number";

    //Get the choices form query
     $choices = $mysqli->query($query) or die($mysqli->error.__LINE__);

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
            <div class="current">
                Question <?php echo $question['question_number'];?> of <?php echo $total;?>
            </div>
            <p class="question">
                <?php echo $question['text']?>
            </p>
            <form method="post" action="process.php">
                <ul class="choices">
                <?php while($row = $choices->fetch_assoc()) : ?>
                    <li><input name ="choice" type="radio" value="<?php echo $row['id'];?>" /><?php echo $row['text'];?></li>
                <?php endwhile; ?>
                </ul>
                <input type="submit" value="Submit" />
                <input type="hidden" name="number" value="<?php echo $number; ?>"/>
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
<?php include 'database.php';?>
<?php session_start(); ?>
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
            <h2>You are Done!</h2>
            <p> Congrats! You have Completed the test</p>
            <p>Final Score: <?php echo $_SESSION['score'] ?></p>
            <a href="index.php" class="start">Try Again</a>
        </div>
    </main>
    <footer>
        <div class="container">
            Copyright &copy; 2021, Andriy Bench
        </div>
    </footer>

</body>
</html>
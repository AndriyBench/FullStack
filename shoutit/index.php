<?php include 'database.php'; ?>
<?php 
    //create a query
    $query = "SELECT * FROM shouts";
    $shouts = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css" type="text/css" />
  <title>Document</title>
</head>
    <body>
        <div class="container">
            <div id="header">
                <h1>SHOUT IT!</h1>
            </div>
            <div id="shouts">
                <ul>
                    <?php while($row = mysqli_fetch_assoc($shouts)) : ?>
                        <li class="shout"><span><?php echo $row['time'] ?> -<b></span> <?php echo $row['user'] ?>:</b> <?php echo $row['message'] ?> </li>
                    <?php endwhile?>
                </ul>
            </div>
            <div id="input">
                <?php if(isset($_GET['error'])) :?>
                    <div class="error"><?php echo $_GET['error'] ?></div>
                <?php endif; ?>
                <form method="post" action="process.php">
                    <input type="text" name="user" placeholder="Enter Your Name" />
                    <input type="text" name="message" placeholder="Enter A Message" />
                    </br>
                    <input class="shout_btn" type="submit" name="submit"/>
                </form>
            </div>
        </div>
    </body>
</html>



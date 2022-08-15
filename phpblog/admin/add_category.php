<?php include 'includes/header.php';?>
<?php
    //Create DB object
    $db = new Database();

    if(isset($_POST['submit']))
    {
        //Assign some post variables
        $name = mysqli_real_escape_string($db->link, $_POST['name']);


        //Simple validation
        if($name == '')
        {
            $error = 'Please fill out all required fields';
        }
        else 
        {
            //insert query
            $query = "INSERT INTO `categories`
                        (name)
                        VALUES('$name')";
            //run query
            $update_row = $db->update($query);
        }

    }
?>
<form method="post" action="add_category.php">
<div class="form-group">
    <label>Category Name</label>
    <input name="name" type="text" class="form-control" placeholder="Enter Category">
  </div>
  
  <div style="margin-top:30px; margin-bottom:30px;">
        <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
        <a href="index.php" class="btn btn-primary">Cancel</a>
    </div>
</form>
<?php include 'includes/footer.php';?>
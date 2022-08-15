<?php include 'includes/header.php';?>
<?php
    $id = $_GET['id'];

    //Create DB object
    $db = new Database();

    //Create Query
    $query = "SELECT * FROM `categories` WHERE id = ".$id;

    //Run the query
    $category = $db->select($query)->fetch_assoc();

    //Create Query
    $query = "SELECT * FROM `categories`";

    //Run the query
    $categories = $db->select($query);
?>

<?php
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
         $query = "UPDATE `categories`
                    SET
                    name = '$name'
                    WHERE id =".$id;
         //run query
         $update_row = $db->update($query);
     }

 }
?>
<?php
if(isset($_POST['delete']))
{
    //Call delete method
    $query = "DELETE FROM `categories` 
                WHERE id=".$id;
    $delete_row = $db->delete($query);
}
?>
<form method="post" action="edit_category.php?id=<?php echo $id?>">
<div class="form-group">
    <label>Category Name</label>
    <input name="name" type="text" class="form-control" placeholder="Enter Category" value="<?php echo $category['name']; ?>">
  </div>
  
  <div style="margin-top:30px; margin-bottom:30px;">
        <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
        <a href="index.php" class="btn btn-primary">Cancel</a>
        <input type="submit" class="btn btn-danger" name="delete" value="Delete"/>
    </div>
</form>
<?php include 'includes/footer.php';?>
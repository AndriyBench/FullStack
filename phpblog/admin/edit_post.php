<?php include 'includes/header.php';?>
<?php
    $id = $_GET['id'];

    //Create DB object
    $db = new Database();

    //Create Query
    $query = "SELECT * FROM `posts` WHERE id = ".$id;

    //Run the query
    $post = $db->select($query)->fetch_assoc();

    //Create Query
    $query = "SELECT * FROM `categories`";

    //Run the query
    $categories = $db->select($query);
?>

<?php

    if(isset($_POST['submit']))
    {
        //Assign some post variables
        $title = mysqli_real_escape_string($db->link, $_POST['title']);
        $body = mysqli_real_escape_string($db->link, $_POST['body']);
        $category = mysqli_real_escape_string($db->link, $_POST['category']);
        $author = mysqli_real_escape_string($db->link, $_POST['author']);
        $tags = mysqli_real_escape_string($db->link, $_POST['tags']);

        //Simple validation
        if($title == '' || $body == '' || $category == '' || $author == '')
        {
            $error = 'Please fill out all required fields';
        }
        else 
        {
            //insert query
            $query = "UPDATE `posts`
                        SET 
                        category = '$category',
                        title = '$title',
                        body = '$body',
                        author = '$author',
                        tags = '$tags'
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
    $query = "DELETE FROM `posts` 
                WHERE id=".$id;
    $delete_row = $db->delete($query);
}
?>
<form method="post" action="edit_post.php?id=<?php echo $id?>">
    <div class="form-group">
        <label>Post Title</label>
        <input type="text" class="form-control" placeholder="Enter Title" value="<?php echo $post['title'];?>" name="title">
    </div>
    <div class="form-group">
        <label>Post Body</label>
        <textarea type="text" class="form-control" placeholder="Enter Body" name="body"><?php echo $post['body'];?></textarea>
    </div>
    <div class="form-group">
        <label>Category</label>
        <select class="form-control" name="category">
            <?php while($row=$categories->fetch_assoc()) : ?>
                <?php if($row['$id'] == $post['category']) 
                {
                    $selected = 'selected'; 
                    
                }
                else
                {
                    $selected = '';
                }
                ?>
            <option  value="<?php echo $row['id']; ?>" <?php echo $selected; ?>><?php echo $row['name'];?></option>
            <?php endwhile ; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Author</label>
        <input type="text" class="form-control" placeholder="Enter Author Name" name="author" value="<?php echo $post['author'];?>">
    </div>
    <div class="form-group">
        <label>Tags</label>
        <input type="text" class="form-control" placeholder="Enter Tags" name="tags" value="<?php echo $post['tags'];?>">
    </div>
    <div style="margin-top:30px; margin-bottom:30px;">
        <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
        <a href="index.php" class="btn btn-primary">Cancel</a>
        <input type="submit" class="btn btn-danger" name="delete" value="Delete"/>
    </div>
</form>

<?php include 'includes/footer.php';?>
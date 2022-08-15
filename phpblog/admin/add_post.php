<?php include 'includes/header.php';?>

<?php
    //Create DB object
    $db = new Database();

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
            $query = "INSERT INTO `posts`
                        (category, title, body, author, tags)
                        VALUES($category, '$title', '$body', '$author', '$tags')";
            //run query
            $insert_row = $db->insert($query);
        }

    }
?>

<?php
    //Create Query
    $query = "SELECT * FROM `categories`";

    //Run the query
    $categories = $db->select($query);
?>
<form method="post" action="add_post.php">
    <div class="form-group">
        <label>Post Title</label>
        <input type="text" class="form-control" placeholder="Enter Title" name="title">
    </div>
    <div class="form-group">
        <label>Post Body</label>
        <textarea type="text" class="form-control" placeholder="Enter Body" name="body"></textarea>
    </div>
    <div class="form-group">
        <label>Category</label>
        <select class="form-control" name="category">
            <?php while($row=$categories->fetch_assoc()) : ?>
                <?php if($row['id'] == $post['category']) 
                {
                    $selected = 'selected'; 
                    
                }
                else
                {
                    $selected = '';
                }
                ?>
            <option value="<?php echo $row['id']; ?>" <?php echo $selected; ?>><?php echo $row['name'];?></option>
            <?php endwhile;?>
        </select>
    </div>
    <div class="form-group">
        <label>Author</label>
        <input type="text" class="form-control" placeholder="Enter Author Name" name="author">
    </div>
    <div class="form-group">
        <label>Tags</label>
        <input type="text" class="form-control" placeholder="Enter Tags" name="tags">
    </div>
    <div style="margin-top:30px; margin-bottom:30px;">
        <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
        <a href="index.php" class="btn btn-primary">Cancel</a>
    </div>
</form>

<?php include 'includes/footer.php';?>
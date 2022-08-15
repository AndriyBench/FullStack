<?php include 'includes/header.php'?>
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

      <article class="blog-post">
        <h2 class="blog-post-title mb-1"><?php echo $post['title']; ?></h2>
        <p class="blog-post-meta"><?php echo formatDate($post['date']);?> by <a href="#"><?php echo $post['author'];?></a></p>
        <?php echo $post['body'];?>
      </article>
    </div>

    <?php include 'includes/footer.php'?>



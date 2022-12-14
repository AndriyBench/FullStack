<?php include 'includes/header.php';?>
<?php
    //Create DB object

    $db = new Database();

    //Create Query
    $query = "SELECT * FROM `posts` ORDER BY id DESC";

    //Run the query
    $posts = $db->select($query);

    //Create Query
    $query = "SELECT * FROM `categories`";

    //Run the query
    $categories = $db->select($query);
?>
<?php if($posts): ?>

  <?php while($row = $posts->fetch_assoc()) : ?>
      <article class="blog-post">
        <h2 class="blog-post-title mb-1"><?php echo $row['title'];?></h2>
        <p class="blog-post-meta"><?php echo formatDate($row['date']);?> by <a href="#"><?php echo $row['author'];?></a></p>

        <?php echo shortenText($row['body']);?>

      <a class="readmore" href="post.php?id=<?php echo urlencode($row['id']);?>">Read More</a>
      </article>
      <?php endwhile; ?>
    </div>
<?php else : ?>
    <p>There are no posts yet</p>
    </div>
<?php endif; ?>
<?php include 'includes/footer.php';?>

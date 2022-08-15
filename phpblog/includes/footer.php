    <div class="col-md-4">
        <div class="position-sticky" style="top: 2rem;">
            <div class="p-4 mb-3 bg-light rounded">
            <h4 class="fst-italic">About</h4>
            <p class="mb-0"><?php echo $site_description ?></p>
            </div>

            <div class="p-4">
            <h4 class="fst-italic">Categories</h4>
            <?php if ($categories) : ?>
                <ol class="list-unstyled mb-0">
                <?php while($row = $categories->fetch_assoc()) : ?>
                    <li><a href="posts.php?category=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></li>
                <?php endwhile; ?>
            <?php else : ?>
                <p>There are no categories yet</p>
            <?php endif; ?>
            </ol>
            </div>
        </div>
        </div>
    </div>

    </main>

    <footer class="blog-footer">
    <p>PHP Lovers Blog &copy; 2022</p>
    <p>
        <a href="#">Back to top</a>
    </p>
    </footer>
</body>
</html>

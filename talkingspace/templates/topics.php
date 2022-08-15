<?php include('includes/header.php') ?>

                            <ul id="topics">
                                <?php if($topics) :?>
                                <?php foreach($topics as $topic) : ?>
                                <li class="topic">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img class="avatar pull-left" src="images/avatars/<?php echo $topic->avatar; ?>" />
                                        </div>
                                        <div class="col-md-10">
                                            <div class="topic-content pull-right">
                                                <h3><a href="topic.php?id=<?php echo $topic->id; ?>"><?php echo $topic->title; ?></a></h3>
                                                <div class="topic-info">
                                                    <a href="topics.php?ctegory=<?php echo urlFormat($topic->category_id); ?>"><?php echo $topic->name; ?></a> >> 
                                                    <a href="topics.php?user=<?php echo urlFormat($topic->user_id); ?>"><?php echo $topic->username; ?></a> >> 
                                                    <div style="display:inline-block">Posted on: <?php echo formatDate($topic->create_date); ?></div>
                                                    <span class="badge pull-right"><?php echo replyCount($topic->id);?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                                <?php else : ?>
                                    <p>No Topics To Display</p>
                                <?php endif; ?>
                            </ul>
                            <h3>Forum Statistics</h3>
                            <ul>
                                <li>Total Number of Users <b>52</b></li>
                                <li>Total Number of Topics <b><?php echo $totalTopics?></b></li>
                                <li>Total Number of Catagories <b><?php echo $totalCategories?></b></li>

                            </ul>
 
<?php include('includes/footer.php') ?>
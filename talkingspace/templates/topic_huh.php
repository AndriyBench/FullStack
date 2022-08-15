<?php include('includes/header.php') ?>
                            <ul id="topics">
                            <li id="main-topic" class="topic topic">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="user-info">
                                                <img class="avatar pull-left" src="<?php echo BASE_URI; ?>images/avatars/<?php echo $topic->avatar; ?>" />
                                                <ul>
                                                    <li><b><?php echo $topic->username;?></b></li> 
                                                    <li><?php echo userPostCount($topic->user_id);?> Posts</li>
                                                    <li><a href="<?php echo BASE_URI; ?>topics.php?user=<?php $topic->user_id; ?>">Profile</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="topic-content pull-right">
                                                <p>
                                                    <?php echo $topic->body; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php foreach($replies as $reply) : ?>
                                <li class="topic topic">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="user-info">
                                                <img class="avatar pull-left" src="<?php echo BASE_URI; ?>images/avatars/<?php echo $reply->avatar; ?>" />
                                                <ul>
                                                    <li><b><?php echo $reply->username; ?></b></li>
                                                    <li><?php echo userPostCount($reply->user_id);?> Posts</li>
                                                    <li><a href="<?php echo BASE_URI; ?>topics.php?user=<?php $reply->user_id; ?>">Profile</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="topic-content pull-right">
                                                <p>
                                                    <?php echo $reply->body; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <h3>Reply To Topic </h3>
                            <?php if(isLoggedIn()) :?>
                            <form role="form" method="post" action="topic.php?id=<?php $topic->id; ?>">
                                <div class="form-group">
                                    <textarea id="reply" rows="10" cols="80" class="form-control" name="reply"></textarea>
                                    <script>CKEDITOR.replace('reply');</script>
                                </div>
                                <button type="submit" class="btn btn-default" name="do_reply">Submit</button>
                            </form>
                            <?php else : ?>
                                <p>Please login to reply.</p>
                            <?php  endif; ?>

                   
<?php include('includes/footer.php') ?>
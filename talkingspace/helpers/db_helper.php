<?php
/**
 *  Get # of replies per topic
 */
function replyCount($topic_id)
{
    $db = new Database;
    $db->query('SELECT * FROM replies WHERE topic_id = :topic_id');
    $db->bind(':topic_id', $topic_id);

    //Assign Rows
    $rows = $db->resultset();
    //Get Count 
    return $db->rowCount();
}

/**
 *  Get # of categories
 */
function getCategories()
{
    $db = new Database;
    $db->query('SELECT * FROM categories');

    //Assign Result Set
    $results = $db->resultset();

    return $results;
}

/**
 *  Get total # of posts from each user
 */

 function userPostCount($user_id)
 {
    $db = new Database;
    $db->query('SELECT * from topics
                WHERE user_id = :user_id'
                );

    $db->bind(':user_id', $user_id);

    //Assign Rows
    $rows = $db->resultset();
    //Get Count 
    $topic_count = $db->rowCount();

    $db->query('SELECT * from replies
                WHERE user_id = :user_id'
                );

    $db->bind(':user_id', $user_id);

    //Assign Rows
    $rows = $db->resultset();
    //Get Count 
    $reply_count = $db->rowCount();

    return $topic_count + $reply_count;

 }
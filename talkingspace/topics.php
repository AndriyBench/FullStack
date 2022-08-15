<?php require('core/init.php');?>

<?php
//Create Topic Object
$topic = new Topic;

//Get categoty From URL
$category = isset($_GET['category']) ? $_GET['category'] : null;

//Get user From URL
$user_id = isset($_GET['user']) ? $_GET['user'] : null;

//Get Template & Assign Vars
$template = new Template('templates/topics.php');

//Assign template Variables
if(isset($category))
{
    $template->topics = $topic->getByCategory($category);
    $template->title = 'Posts In "'.$topic->getCategory($category)->name.'"';
}

//Assign template Variables
if(isset($user_id))
{
    $template->topics = $topic->getByUser($user_id);
    //$template->title = 'Posts By "'.$user_id->getUser($user_id)->username.'"';
}

if(!isset($category) && !isset($user_id))
{
    //Assign vars
    $template->topics = $topic->getAllTopics();
}

$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();

//Display template
echo $template;


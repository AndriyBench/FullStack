<?php require('core/init.php');?>

<?php
//Create Topic Object
$topic = new Topic;

//Get ID From URL
$topic_id = $_GET['id'];

if(isset($_POST['do_reply']))
{


    //Create Data Array
    $data = array();
    $data['topic_id'] = $_GET['id'];
    $data['body'] = $_POST['reply'];
    $data['user_id'] = getUser()['user_id'];

    //Create a New Validator Object
    $validate = new Validator;

    //Required fields
    $field_array = array('body');

    if($validate->isRequired($field_array))
    {
    //Register User
        if($topic->reply($data))
        {
            redirect('topic.php?id='.$topic_id, 'Your reply has been posted', 'success');
        }
        else
        {
            redirect('topic.php?id='.$topic_id, 'Something went wrong with posting your reply', 'error');
        }
    }
    else
    {
        redirect('topic.php?id='.$topic_id, 'Your reply form is blank', 'error');
    }
}

//Get Template & Assign Vars
$template = new Template('templates/topic_huh.php');

//Assign vars
$template->topic = $topic->getTopic($topic_id);
$template->replies = $topic->getReplies($topic_id);
$template->title = $topic->getTopic($topic_id)->title;

//Display template
echo $template;


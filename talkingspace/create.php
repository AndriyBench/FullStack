<?php require('core/init.php');?>

<?php
//Create Topic Object
$topic = new Topic;

if(isset($_POST['do_create']))
{
    //Create a New Validator Object
    $validate = new Validator;

    //Create Data Array
    $data = array();
    $data['title'] = $_POST['title'];
    $data['body'] = $_POST['body'];
    $data['category_id'] = $_POST['category'];
    $data['user_id'] = getUser()['user_id'];
    $data['last_activity'] = date("Y-m-d H:i:s");

    //Required fields
    $field_array = array('title', 'body', 'category');

    if($validate->isRequired($field_array))
    {
        //Register User
        if($topic->create($data))
        {
            redirect('index.php', 'Your topic has been posted', 'success');
        }
        else
        {
            redirect('topic.php?id='.$topic_id, 'Something went wrong with posting your topic', 'error');
        }
    }
    else
    {
        redirect('create.php', 'Please fill in all required fields', 'error');
    }
}

//Get Template & Assign Vars
$template = new Template('templates/create.php');

//Assign vars

//Display template
echo $template;







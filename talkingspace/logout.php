<?php include('core/init.php'); ?>

<?php 
if(isset($_POST['do_logout']))
{
    //Create a new user object
    $user = new User;

    if($user->logout())
    {
        redirect('index.php', 'You are now logged out', 'sucess');
    }
} 
else
{
    redirect('index.php');
}
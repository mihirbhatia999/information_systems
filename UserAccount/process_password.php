<?php
/**
 * Created by PhpStorm.
 * User: mihirbhatia999
 * Date: 16-03-2018
 * Time: 10:42 PM
 */

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function Redirect($url, $permanent = false)
{
    if (headers_sent() === false)
    {
        header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = test_input($_POST["user_name"]);
    $password = test_input($_POST["user_pass"]);
}

$userListFile = "accounts_users.txt";
$passListFile = "accounts_passwords.txt";
$usernameList = file($userListFile,FILE_IGNORE_NEW_LINES);
$passwordList = file($passListFile,FILE_IGNORE_NEW_LINES);

$i = 0 ;
foreach($usernameList as $user){
    //if username and password match
    if($user == $username && $passwordList[$i]==$password){
        session_start();
        $_SESSION['uname'] = $username;
        echo "<script type='text/javascript'>window.top.location='http://localhost/todolist.php';</script>";
        exit;
    }
    $i = $i + 1;
}
echo "Username or password entered is incorrect. Please check the entries or create a new account to access your todo list";

?>


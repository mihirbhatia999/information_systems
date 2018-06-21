<?php
/**
 * Created by PhpStorm.
 * User: mihirbhatia999
 * Date: 16-03-2018
 * Time: 11:10 PM
 */
//function to remove spaces,slashes and special characters
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = test_input($_POST["user_name"]);
    $password = test_input($_POST["user_pass"]);
}
//only create account if conditions for username and password are satisfied
$userListFile = "accounts_users.txt";
$usernameList = file($userListFile,FILE_IGNORE_NEW_LINES);
$check = 0;
foreach($usernameList as $user1){
    if($user1 == $username){
        $check = 1;
        break;
    }
}
if(strlen($username)<7 || !ctype_alnum($username) || !ctype_alpha($username[0]) || strlen($password)<8 || !preg_match('/^[a-zA-Z0-9._]+$/', $password)) {
    echo "Invalid Username or Password";
}
elseif($check == 1){
    echo "Username already exists. Please try another username";
}
else {
    $text_user = $username . PHP_EOL;
    $text_password = $password . PHP_EOL;
//open the files in append mode so that we can add the new user ID and password
    $fp1 = fopen('accounts_users.txt', 'a+');
    $fp2 = fopen('accounts_passwords.txt', 'a+');
//write the contents into the text file
    if (fwrite($fp1, $text_user) && fwrite($fp2, $text_password)) {
        echo 'user account created';
    }
    //close the files containing the username and passwords
    fclose($fp1);
    fclose($fp2);
    //setting cookies for username and password that last for 30 days
    $username_cookie = "user";
    $password_cookie = "password";
    setcookie($username_cookie, $username, time() + (86400 * 30), "/"); // 86400 = 1 day
    setcookie($password_cookie, $password, time() + (86400 * 30), "/"); // 86400 = 1 day
}


?>


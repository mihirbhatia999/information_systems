<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="Password Protection.css">
</head>
<body>

<h1 id="Heading" align="center">To Do List</h1><br>

<div id="Notice" align="center">
<p>This is a password protected system and requires a user to enter their username and password.
    If you donot have an account then please click on "New User Account" to make an account </p><br>
</div>

<div id="form1" align="center">
<form action="process_password.php" method=post>
    Username:<br>
    <input type="text" name="user_name">
    <br>
    Password:<br>
    <input type="password" name="user_pass">
    <br><br>
    <input type="submit" value="Login">
    <br><br><br>
</form>
</div>

<br>

<div id="new user account" align="center">
    <a href="Create New Account.php">New User Account</a>
</div>
<br>
<div id="delete account" align="center">
    <a href="delete_account.php">Delete User Account</a>
</div>

</body>
<?php
/**
 * Created by PhpStorm.
 * User: mihirbhatia999
 * Date: 15-03-2018
 * Time: 05:49 PM
 */
?>

</html>
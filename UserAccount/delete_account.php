<html>
<body bgcolor="#E6E6FA">
<div id="form1" align="center">
    <h2>DELETE ACCOUNT</h2>
    <br>
    <form action="" method=post>
        Username:<br>
        <input type="text" name="user_name">
        <br>
        Password:<br>
        <input type="password" name="user_pass">
        <br><br>
        <input type="submit" value="Delete" name="SubmitButton">
        <br><br><br>
    </form>
    <a href="Password%20Protection.php">Back to Login Page</a>
</div>
</body>
</html>

<?php
if(isset($_POST['SubmitButton'])){ //check if form was submitted
    $username = test_input($_POST['user_name']);
    $password = test_input($_POST['user_pass']);

    $userListFile = "accounts_users.txt";
    $passListFile = "accounts_passwords.txt";
    $usernameList = file($userListFile,FILE_IGNORE_NEW_LINES);
    $passwordList = file($passListFile,FILE_IGNORE_NEW_LINES);

    $i = 0 ;
    foreach($usernameList as $user){
        //if username and password match--------------------------------------------
        if($user == $username && $passwordList[$i]==$password){
            $oldMessage1 = $username;
            $oldMessage2 = $password;
            $deletedMessage = "";
            //delete the contents --------------------------------------------------
            $str1 = file_get_contents($userListFile);
            $str2 = file_get_contents($passListFile);

            $str1 = str_replace("$oldMessage1","$deletedMessage",$str1);
            $str2 = str_replace("$oldMessage2","$deletedMessage",$str2);

            file_put_contents($userListFile,$str1);
            file_put_contents($passListFile,$str2);
            echo "             Account deleted";
            //-----------------------------------------------------------------------

            //delete the cookie------------------------------------------------------
            $username_cookie = "user";
            $password_cookie = "password";
            unset($_COOKIE[$username_cookie]);
            unset($_COOKIE[$password_cookie]);
            // empty value and expiration one hour before
            $res1 = setcookie($username_cookie, '', time() - 3600);
            $res2 = setcookie($password_cookie, '', time() - 3600);
            $file = $username.".json";
            //----------------------------------------------------------------------

            //delete the JSON file--------------------------------------------------
            if (file_exists($file)) {
                unlink($file);
            }
            exit;
            //-----------------------------------------------------------------------
        }
        $i = $i + 1;
    }
    echo "Username or password entered is incorrect. Please check the entries or create a new account to DELETE your todo list";

}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
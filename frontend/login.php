<?php
    include_once "MyHeader.php";
    include_once "..\backend\Helper.php";
?>

<?php
if (!isset($_SESSION['userId'])){
    if(array_key_exists("username", $_POST))
    {
        //They are not logged in yet, but have given credentials to log in.
        $username = $_POST['username'];
        $password = $_POST['password'];

        $id = Login($username, $password);
        echo $id;
        $_SESSION['userId'] = $id;
        echo $_SESSION['userId'];
        // header("Location: index.php");
    }
    else
    {
        //They are not logged in yet. Ask for their credentials
        echo '<form method="post" action="login">
        <label>Username:</label>
        <input type="text" name="username"/>
        <br>
        
        <label>Password:</label>
        <input type="password" name="password"/>
        <br>
        <button type="submit" value="Login">Login</button>
        </form>';
    }
}
else
{
    //They are logged in but are trying to log out.
    Logout();
    header("Location: index.php");
}


?>
<?php
    $title = "Login"; 
    include_once "MyHeader.php";
    ?>

<?php
echo '<html id="login-body">';
if (!isset($_SESSION['userId'])){
    if(array_key_exists("username", $_POST))
    {
        //They are not logged in yet, but have given credentials to log in.
        $username = $_POST['username'];
        $password = $_POST['password'];

        //Grabbing user id that matches username and password
        $id = Login($username, $password);

        //Takes user to home page after succesful loggin and session storage
        header("Location: index.php");
    }
    else
    {

        //They are not logged in yet. Ask for their credentials
        echo '<form method="post" action="login.php">
        <label>Username:</label>
        <input class="appt" type="text" name="username"/>
        <br>

        <label>Password:</label>
        <input class="appt" type="password" name="password"/>
        <br>
        <button class="appt" type="submit" value="Login">Login</button>
        </form>
        <a href="createAccount.php">Create New Account</a>';
    }
}
else
{
    //They are logged in but are trying to log out.
    Logout();
     header("Location: login.php");
}

echo '</html>'
?>


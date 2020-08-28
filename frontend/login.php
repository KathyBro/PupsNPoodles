<?php
    $title = "Login"; 
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
        echo "asfdsdafsdfasfasf";
        $id = Login($username, $password);
        $_SESSION['userId'] = $id;
        echo $_SESSION['userId'];
        header(`Location: login.php`);
        // header(`Location: /frontend/Index.php?saf`. $_SESSION['userId'] .``);
    }
    else
    {
        // echo "afkjskfjsklfslf";
        // echo $id;
        //They are not logged in yet. Ask for their credentials
        echo '<form method="post">
        <label>Username:</label>
        <input class="appt" type="text" name="username"/>
        <br>

        <label>Password:</label>
        <input class="appt" type="text" name="password"/>
        <br>
        <button class="appt" type="submit" value="Login">Login</button>
        </form>';
    }
}
else
{
    //They are logged in but are trying to log out.
    Logout();
     header("Location: login.php");
    //  header(`Location: /frontend/appointment.php?`. $_SESSION['userId'] .``);
}


?>


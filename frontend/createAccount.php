<?php
    $title = "Create Account";
    include_once "MyHeader.php";
    include_once "..\backend\Helper.php";
?>

<?php
    //If they have posted, then insert and log them in.
    echo '<html id="createAccount-body">';
    if(array_key_exists("username", $_POST))
    {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $isBusiness = $_POST['business'];

        $isBusiness = $isBusiness == "Yes" ? 1 : 0;
        InsertNewUser($name, $username, $password, $isBusiness);
        header("Location: index.php");
    }
    else
    {
        echo '<form method="post" action="createAccount.php">
        <label>Name</label>
        <input type="text" name="name" placeholder="Name"/><br>
        <label>Username</label>
        <input type="text" name="username" placeholder="Username"/><br>
        <label>Password</label>
        <input type="text" name="password" placeholder="Password"/><br>
        <label>Are you a business?</label><br/>
        <label>Yes</label>
        <input type="radio" value="Yes" name="business">
        <label>No</label>
        <input type="radio" value="No" name="business"><br>
        <button type="submit" value="submit">Create Account</button>
        </form>';
    }

echo '</html>'; 
?>
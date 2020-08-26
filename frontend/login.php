<?php
    include_once "MyHeader.php";
?>

<form method="post" action="/login">
<label>Username:</label>
<input type="text" name="username"/>
<br>

<label>Password:</label>
<input type="text" name="password"/>
<br>
<button type="submit" value="Login">Login</button>
</form>
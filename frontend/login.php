<?php
    include_once "MyHeader.php";
?>

<form method="post" action="/login">
<label>Username:</label>
<input class="appt" type="text" name="username"/>
<br>

<label>Password:</label>
<input class="appt" type="text" name="password"/>
<br>
<button class="appt" type="submit" value="Login">Login</button>
</form>
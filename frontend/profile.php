<?php
    $title = "Profile"; 
    include_once "MyHeader.php";
    include_once "..\backend\Helper.php";
    ?>

<html id="appointment-body">
<li style="list-style-type: none;"><a href="addPet.php">Add a Pet</a></li>
<h2>Pets</h2>
<?php
    DisplayOnlyPets();
?>
</html>
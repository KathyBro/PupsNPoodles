<?php
    $title = "Profile"; 
    include_once "MyHeader.php";
    include_once "..\backend\Helper.php";

    if(!isset($_SESSION['userId']) || $_SESSION['isBusiness'] == true)
    {
        header("Location: login.php");
    }
    ?>

<html id="addPet-body">
<li style="list-style-type: none;"><a href="addPet.php">Add a Pet</a></li>
<h2 id="petHeader">Pets</h2>
<?php
    DisplayOnlyPets();
?>
</html>
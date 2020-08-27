<!-- REMEMBER TO WRITE LOTS OF COMMENTS!!! -->
<?php
    $title = "Home"; 
    include_once "MyHeader.php";
?>

<?php
    //$appointments = getAppointments($user->userId);
    echo "<div class='appointment-list'>";
    /*for($appointment in $appointments) {
        echo <h3>$appointment->petName</h3>;
        echo <h4>$appointment->buissnessName</h4>;
        echo <p>$appointment->petSpecies</p>;
        echo <p>$appointment->appointTime</p>;
        echo <p><strong>$appointment->status</strong></p>
    }*/
    echo "</div>";
?>

<?php
    include_once "MyFooter.php";
?>

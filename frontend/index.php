<!-- REMEMBER TO WRITE LOTS OF COMMENTS!!! -->
<?php
    $title = "Home"; 
    include_once "MyHeader.php";
?>

<?php
echo '<html id="index-body">';
    //$appointments = getAppointments($user->userId);
    echo "<div class='appointment-list'>";
    /*for($appointment in $appointments) {
        echo <div class='appointment-listing'>
        echo <h3>$appointment->petName</h3>;
        echo <h4>$appointment->buissnessName</h4>;
        echo <p>$appointment->petSpecies</p>;
        echo <p>$appointment->appointTime</p>;
        echo <p><strong>$appointment->status</strong></p>
        echo </div>
    }*/
    echo "</div>";
    echo '</html>';
?>

<?php
    include_once "MyFooter.php";
?>

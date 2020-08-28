<?php
$title = "Create an Appointment";
include_once "MyHeader.php";
include_once "..\backend\Helper.php";
$businessArray = GetAllBusinesses();
?>
<html id="appointment-body">
<form method="post" action="appointment.php"> <label class="appt" for="date">Time (date and time):</label>
    <input type="datetime-local" id="date" name="date">
    <br />

    <label class="appt" for="location">Pick a Location:</label>
    <select class="appt" name="location" id="location">

      <!-- Dynamically create dropdown by checking userTable for business -->
    <?php  for ($i = 0; $i < sizeof($businessArray); $i++) {
        $name = $businessArray[$i][0];
        echo "<option value=\"" . $name . "\">"
            . $businessArray[$i][1] . "</option>";
    }?>
    </select>
    
    <br />
    <label class="appt" for="petName">Pet Name:</label>
    <?php
        //Dynamically grabbing pet info.
        $petInfo = RetrievePets();
        echo '<select class="appt" name="petName" id="petName">';
        foreach ($petInfo as $info)
        {
            echo '<option value="' . $info['name'] . '-' . $info['species'] . '">' . $info['name'] . '</option>';
        }
        echo '</select>';
    ?>
    <br />
    <button class="appt" value="Submit" type="submit">Submit</button>
    
</form>
</html>

<?php
    //Grabs currentUser's Id
    $currentOwner = $_SESSION['userId'];
    
    if (isset($_SESSION['userId'])){
        //only allow submit if data is present
        if(isset($_POST['date'])){
            
            //saving values from form
            $appointmentTime = $_POST['date'];
            
            $nameAndSpecies = explode("-", $_POST['petName']);
            $petName = $nameAndSpecies[0];
            $petSpecies = $nameAndSpecies[1];
            $businessId = $_POST['location'];
            $ownerId = $currentOwner;
            $status = 'pending';
            $appointmentTime = strftime('%y/%m/%d %H:%M', strtotime($appointmentTime));
            
            //Sends data to backend   
            InsertAppointment($businessId, $ownerId, $petName, $petSpecies, $appointmentTime, $status);
        }
        
    }
    
    ?>

</html>
<?php
// include_once "MyFooter.php";
?>
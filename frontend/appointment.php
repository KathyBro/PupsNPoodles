<?php
$title = "Create an Appointment";
include_once "MyHeader.php";
include_once "..\backend\Helper.php";
$businessArray = GetAllBusinesses();
?>
<html id="appointment-body">
<form method="post"> <label class="appt" for="date">Time (date and time):</label>
    <input type="datetime-local" id="date" name="date">
    <br />

    <label class="appt" for="location">Pick a Location:</label>
    <select class="appt" name="location" id="location">

      <!-- Dynamically create dropdown by checking userTable for business -->
    <?php  for ($i = 0; $i < sizeof($businessArray); $i++) {
        $name = $i + 1;
        echo "<option value=\"" . $name . "\">"
            . $businessArray[$i] . "</option>";
    }?>
    </select>
    
    <br />
    <label class="appt" for="petName">Pet Name:</label>
    <input type="text" class="appt" id="petName" name="petName">
    <br />

    <label class="appt" for="petSpecies">Pet Species:</label>
    <input type="text" class="appt" id="petSpecies" name="petSpecies">
    <br />
    <button class="appt" value="Submit" type="submit">Submit</button>
    
</form>
</html>

<?php
    //Grabs currentUser's Id
    $currentOwner = $_SESSION['userId'];

if (isset($_SESSION['userId'])){
    //only allow submit if data is present
    if(isset($_GET['date'])){

    //saving values from form
    $appointmentTime = $_GET['date'];
    $petName = $_GET['petName'];
    $petSpecies = $_GET['petSpecies'];
    $businessId = $_GET['location'];
    $ownerId = $currentOwner;
    $status = 'pending';
    $appointmentTime = strftime('%d/%m/%y %H:%M', strtotime($appointmentTime));
  
    //Sends data to backend   
    InsertAppointment($businessId, $ownerId, $petName, $petSpecies, $appointmentTime, $status);
    }
    
}

?>

<?php
include_once "MyFooter.php";
?>
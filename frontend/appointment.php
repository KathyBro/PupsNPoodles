<?php
$title = "Create an Appointment";
include_once "MyHeader.php";
include_once "..\backend\Helper.php";
?>

<form method=\"post\"> <label class="appt" for="date">Time (date and time):</label>
    <input type="datetime-local" id="date" name="date">
    <br />
    <label class="appt" for="location">Pick a Location:</label>
    <select class="appt" name="location" id="location">
        <option value="1">Placeholder 1</option>
        <option value="2">Placeholder 2</option>
        <option value="3">Placeholder 3</option>
        <option value="4">Placeholder 4</option>
    </select>
    <br />

    <label class="appt" for="petName">Pet Name:</label>
    <input type="text" class="appt" id="petName" name="petName">
    <br />

    <label class="appt" for="petSpecies">Pet Species:</label>
    <input type="text" class="appt" id="petSpecies" name="petSpecies">
    <br />
    <input class="appt" value="Submit" type="submit">
    
</form>

<?php
    //Grabs currentUser's Id
    $currentOwner = $_SESSION['userId'];

    //only allow submit if data is present
    if(isset($_GET['date'])){

    //saving values from form
    $appointmentTime = $_GET['date'];
    $petName = $_GET['petName'];
    $petSpecies = $_GET['petSpecies'];
    $businessId = 12;
    $ownerId = $currentOwner;
    $status = 'pending';
    $appointmentTime = strftime('%d/%m/%y %H:%M', strtotime($appointmentTime));
  
    //Sends data to backend   
    InsertAppointment($businessId, $ownerId, $petName, $petSpecies, $appointmentTime, $status);

    
}

?>

<?php
include_once "MyFooter.php";
?>
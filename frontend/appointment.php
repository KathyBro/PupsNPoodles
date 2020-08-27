<?php
$title = "Create an Appointment";
include_once "MyHeader.php";
?>

<form method=\"post\" action=\"/frontend/appointment.php\"> <label class="appt" for="date">Time (date and time):</label>
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

    <label class="appt" for="reason">Reason for Appointment:</label>
    <input class="appt" type="text" id="reason" name="reason">
    <br />
    <input class="appt" type="submit">
</form>


<?php
include_once "MyFooter.php";
?>
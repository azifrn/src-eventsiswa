<?php
$link = mysqli_connect("johnny.heliohost.org", "evsiswa_admin", "dcba1235", "evsiswa_maindb");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$ev_title = mysqli_real_escape_string($link, $_REQUEST['ev_title']);
$ev_desc = mysqli_real_escape_string($link, $_REQUEST['ev_desc']);
$level_id = mysqli_real_escape_string($link, $_REQUEST['level_id']);
$ev_date = mysqli_real_escape_string($link, $_REQUEST['ev_date']);
$ev_venue = mysqli_real_escape_string($link, $_REQUEST['ev_venue']);
$ev_contact = mysqli_real_escape_string($link, $_REQUEST['ev_contact']);
$ev_imgpath = mysqli_real_escape_string($link, $_REQUEST['ev_imgpath']);

// Attempt insert query execution
$sql = "INSERT INTO entry (ev_title, ev_desc, level_id, ev_date, ev_venue, ev_contact, ev_imgpath) VALUES ('$ev_title', '$ev_desc', '$level_id', '$ev_date', '$ev_venue', '$ev_contact', '$ev_imgpath')";
if(mysqli_query($link, $sql)){
    echo "<center>Event added successfully.<br><a href='index.php'>BACK TO MAIN PAGE</a></center>";
} else{
    echo "ERROR: Unable to add event. Please try again later.";
}

// Close connection
mysqli_close($link);
?>

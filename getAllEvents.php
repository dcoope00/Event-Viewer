<?php
  require_once('config.php');
  $host = DB_HOST;
  $username = DB_USER;
  $password = DB_PASSWORD;
  $database = DB_NAME;
  $con = new mysqli($host, $username, $password, $database);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = "SELECT ID, TITLE, DESCRIPTION, START_DATE , START_TIME, EVENT_IMAGE FROM EVENTS";
$result = $con->query($sql);

$events = array();
while ($row = $result->fetch_assoc()) {
    $events[] = $row;
}

$con->close();

header('Content-Type: application/json');
echo json_encode($events);
?>

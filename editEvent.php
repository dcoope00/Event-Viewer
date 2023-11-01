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


    $event_id = $_POST['eventID'];
    echo "event id is " . $event_id;

    $title = $_POST["title"];
    $desc = $_POST["description"];
    $datetime = $_POST["dateTime"];

    $newDatetime = new DateTime($datetime);
    $date = $newDatetime->format('Y-m-d');
    $time = $newDatetime->format('H:i:s');
    $sql = "UPDATE EVENTS SET TITLE = ?, DESCRIPTION = ?, START_DATE = ?, START_TIME = ?  WHERE ID = ?";
    $stmt = $con->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssssi", $title, $desc, $date, $time, $event_id);

        if ($stmt->execute()) {
            echo "Event with ID $event_id has been updated.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $con->error;
    }


$con->close();
?>

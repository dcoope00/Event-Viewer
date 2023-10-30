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

if (isset($_POST['eventID'])) {
    $event_id = $_POST['eventID'];
    echo $event_id;
    $sql = "DELETE FROM EVENTS WHERE ID = ?";
    $stmt = $con->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $event_id);

        if ($stmt->execute()) {
            echo "Event with ID $event_id has been deleted.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $con->error;
    }
} else {
    echo "Event ID is missing in the request.";
}

$con->close();
?>

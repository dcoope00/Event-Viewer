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
    $target_dir = "uploads/"; 
    print_r($_FILES);
    if (isset($_FILES["formFile"])) {
        $target_file = $target_dir . basename($_FILES["formFile"]["name"]);

        $check = getimagesize($_FILES["formFile"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["formFile"]["tmp_name"], $target_file)) {

                $title = $_POST["title"];
                $desc = $_POST["description"];
                $datetime = $_POST["dateTime"];

                $newDatetime = new DateTime($datetime);
                $date = $newDatetime->format('Y-m-d');
                $time = $newDatetime->format('H:i:s');

                $sql = "INSERT INTO EVENTS (TITLE, DESCRIPTION, START_DATE, START_TIME, EVENT_IMAGE) VALUES (?, ?, ?, ?, ?)";
                $stmt = $con->prepare($sql);

                if ($stmt) {
                    $stmt->bind_param("sssss", $title, $desc, $date, $time, $target_file);

                    if ($stmt->execute()) {
                        echo "Event added successfully!";
                    } else {
                        echo "Error: " . $stmt->error;
                    }

                    $stmt->close();
                } else {
                    echo "Error: " . $con->error;
                }
            } else {
                echo "Error uploading image.";
            }
        } else {
            echo "File is not an image.";
        }
    } else {
        echo "No image uploaded.";
    }


$con->close();
?>

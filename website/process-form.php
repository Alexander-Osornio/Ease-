<?php
// Include the database connection function
include 'db-connection.php';

// Function to generate a unique filename
function generateUniqueFilename($filename, $uploadDirectory)
{
    $pathinfo = pathinfo($filename);
    $basename = $pathinfo['filename'];
    $extension = strtolower($pathinfo['extension']);
    $count = 1;
    $newFilename = $filename;

    while (file_exists($uploadDirectory . $newFilename)) {
        $newFilename = $basename . '_' . $count . '.' . $extension;
        $count++;
    }

    return $newFilename;
}

// Open a database connection
$connection = openDatabaseConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eventTitle = $_POST["eventTitle"];
    $eventDate = $_POST["eventDate"];
    $eventStartTime = $_POST["eventStartTime"];
    $eventEndTime = $_POST["eventEndTime"];
    $eventDescription = $_POST["eventDescription"];
    $isAllDay = isset($_POST["allDayEvent"]) ? 1 : 0; // Check if the checkbox is checked
    $uploadDirectory = "images/";

    // Check if a file was uploaded
    if ($_FILES["eventImage"]["size"] > 0) {
        // File type validation
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $extension = strtolower(pathinfo($_FILES["eventImage"]["name"], PATHINFO_EXTENSION));

        if (!in_array($extension, $allowedExtensions)) {
            header("Location: confirmation.php?success=false&error=Invalid file format. Allowed formats: jpg, jpeg, png, gif");
            exit();
        }

        // File size validation (limit to 2MB)
        $maxFileSize = 2 * 1024 * 1024; // 2MB in bytes

        if ($_FILES["eventImage"]["size"] > $maxFileSize) {
            header("Location: confirmation.php?success=false&error=File size exceeds the allowed limit (2MB).");
            exit();
        }

        // Handle file upload
        $targetFile = $uploadDirectory . generateUniqueFilename($_FILES["eventImage"]["name"], $uploadDirectory);

        if (move_uploaded_file($_FILES["eventImage"]["tmp_name"], $targetFile)) {
            // Prepare and bind the SQL query with image file path
            $stmt = $connection->prepare("INSERT INTO info (EvtName, EvtDate, EvtStartTime, EvtEndTime, EvtDescription, IsAllDay, EvtImage) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssiss", $eventTitle, $eventDate, $eventStartTime, $eventEndTime, $eventDescription, $isAllDay, $targetFile);

            // Execute the prepared statement
            if ($stmt->execute()) {
                header("Location: confirmation.php?success=true");
                exit();
            } else {
                header("Location: confirmation.php?success=false&error=Error creating event. Please try again later.");
                exit();
            }

            // Close the prepared statement
            $stmt->close();
        } else {
            header("Location: confirmation.php?success=false&error=Error uploading file.");
            exit();
        }
    } else {
        // No file was uploaded, proceed without storing an image
        $stmt = $connection->prepare("INSERT INTO info (EvtName, EvtDate, EvtStartTime, EvtEndTime, EvtDescription, IsAllDay) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $eventTitle, $eventDate, $eventStartTime, $eventEndTime, $eventDescription, $isAllDay);

        // Execute the prepared statement
        if ($stmt->execute()) {
            header("Location: confirmation.php?success=true");
            exit();
        } else {
            header("Location: confirmation.php?success=false&error=Error creating event. Please try again later.");
            exit();
        }

        // Close the prepared statement
        $stmt->close();
    }
}

// Close the database connection
$connection->close();

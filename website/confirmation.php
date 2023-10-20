<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ease - Event Confirmation</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            background-color: #f4f4f4;
        }

        /* Style the header */
        .header {
            padding: 20px;
            text-align: center;
            background: #f76a33;
            color: white;
        }

        /* Increase the font size of the h1 element */
        .header h1 {
            font-size: 40px;
            margin: 0;
        }

        /* Style the top navigation bar */
        .navbar {
            overflow: hidden;
            background-color: #333;
            display: flex;
            align-items: center;
            padding: 10px 20px;
        }

        /* Style the navigation bar links */
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            margin-right: 10px;
        }

        .navbar .links {
            margin-right: auto;
        }

        /* Right-aligned search bar */
        .navbar .search-bar {
            display: flex;
            align-items: center;
        }

        /* Search input style */
        .navbar input[type="text"] {
            padding: 10px;
            border: none;
            border-radius: 5px;
            width: 150px;
            /* Adjusted width */
        }

        /* Change color on hover */
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .message {
            background-color: #4caf50;
            color: white;
            padding: 15px;
            border-radius: 5px;
            margin: 20px;
            text-align: center;
        }

        .error-message {
            background-color: #f44336;
        }

        /* Footer */
        .footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 20px;
        }

        .footer h2 {
            font-size: 1.5rem;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1><a style="text-decoration: none; color: white" href="index.php">EASE</a></h1>
        <p>A website created by Team 1.</p>
    </div>

    <div class="navbar">
        <div class="links">
            <a href="calendar.php">Calendar</a>
            <a href="event-form.php">Add Event</a>
            <a href="#">Link</a>
        </div>
        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Search..." />
        </div>
    </div>

    <div class="message <?php echo isset($_GET["error"]) ? "error-message" : ""; ?>">
        <?php
        if (isset($_GET["success"])) {
            if ($_GET["success"] == "true") {
                echo 'Event created successfully!';
            } elseif ($_GET["success"] == "false" && isset($_GET["error"])) {
                $errorMessage = urldecode($_GET["error"]);
                echo $errorMessage;
            }
        } else {
            echo 'Unknown error occurred. Please try again.';
        }
        ?>
    </div>

    <div class="footer">
        <h2>Footer</h2>
    </div>
</body>

</html>
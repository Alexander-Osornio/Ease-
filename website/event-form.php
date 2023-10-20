<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ease</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
        * {
            box-sizing: border-box;
        }

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
            /* Adjusted color */
            color: white;
            /* Adjusted text color */
        }

        /* Increase the font size of the h1 element */
        .header h1 {
            font-size: 40px;
            margin: 0;
            /* Remove margin to align with top of page */
        }

        /* Style the top navigation bar */
        .navbar {
            overflow: hidden;
            background-color: #333;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            /* Adjusted padding */
        }

        /* Style the navigation bar links */
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            /* Adjusted padding */
            margin-right: 10px;
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
            width: 100%;
            /* Make both search bars the same width */
        }

        /* Change color on hover */
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        /* Updated CSS styles for the event form */
        .event-form {
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            /* Increased padding for additional height */
            width: 90%;
            max-width: 500px;
            margin: 20px auto 0;
            text-align: center;
        }

        .form-group input[type="text"],
        .form-group input[type="date"],
        .form-group input[type="time"],
        .form-group textarea {
            width: calc(100% - 22px);
            padding: 12px;
            /* Increased height for input fields and textarea */
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 5px;
            margin-bottom: 15px;
        }

        button[type="submit"] {
            background-color: #f76a33;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            font-size: 16px;
            padding: 12px 20px;
            /* Increased height for the button */
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #333;
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

        .footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 20px;
        }

        /* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
        @media screen and (max-width: 400px) {
            .navbar a {
                float: none;
                width: 100%;
            }

            /* Style the search input */
            .navbar input[type="text"] {
                width: 100%;
                margin: 10px 0;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>
            <a style="text-decoration: none; color: white" href="index.php">EASE</a>
        </h1>
        <p>A website created by Team 1.</p>
    </div>

    <div class="navbar">
        <div>
            <a href="calendar.php">Calendar</a>
            <a href="event-form.php">Add Event</a>
            <a href="#">Link</a>
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Search..." />
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

    <div class="event-form">
        <h2>Add Event</h2>
        <form id="eventForm" method="post" action="process-form.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="eventTitle">Event Title:</label>
                <input type="text" id="eventTitle" name="eventTitle" required />
            </div>
            <div class="form-group">
                <label for="eventDate">Event Date:</label>
                <input type="date" id="eventDate" name="eventDate" required />
            </div>
            <div class="form-group">
                <label for="eventStartTime">Start Time:</label>
                <input type="time" id="eventStartTime" name="eventStartTime" required />
            </div>
            <div class="form-group">
                <label for="eventEndTime">End Time:</label>
                <input type="time" id="eventEndTime" name="eventEndTime" required />
            </div>
            <div class="form-group">
                <label for="allDayEvent">All Day Event:</label>
                <input type="checkbox" id="allDayEvent" name="allDayEvent" />
            </div>
            <div class="form-group">
                <label for="eventLocation">Event Location:</label>
                <input type="text" id="eventLocation" name="eventLocation" required />
            </div>
            <div class="form-group">
                <label for="eventDescription">Event Description:</label>
                <textarea id="eventDescription" name="eventDescription" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="eventImage">Event Image (Optional):</label>
                <input type="file" id="eventImage" name="eventImage" accept="image/*" />
            </div>
            <button type="submit">Add Event</button>
        </form>
    </div>


    <div class="footer">
        <h2>Footer</h2>
    </div>
</body>

</html>
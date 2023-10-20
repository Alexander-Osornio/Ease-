<?php
// Include the database connection function
include 'db-connection.php';

// Open a database connection
$connection = openDatabaseConnection();

// Fetch events from the database
$sql = "SELECT EvtID as id, EvtName as title, CONCAT(EvtDate, ' ', EvtStartTime) as start, CONCAT(EvtDate, ' ', EvtEndTime) as end, EvtLocation as location, EvtDescription as description FROM info";
$result = $connection->query($sql);

// Create an empty array to store events
$events = [];

// Fetch events and add them to the $events array
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Convert start and end dates to ISO 8601 format for FullCalendar
        $start = date('Y-m-d H:i', strtotime($row['start']));
        $end = date('Y-m-d H:i', strtotime($row['end']));

        // Determine if the event is all-day (you might want to adjust this logic based on your requirements)
        $isAllDay = false;

        // Add event to the $events array with allDay property
        $events[] = [
            'id' => $row['id'],
            'title' => $row['title'],
            'start' => $start,
            'end' => $end,
            'allDay' => $isAllDay,
            'location' => $row['location'],
            'description' => $row['description']
        ];
    }
}

// Close the database connection
$connection->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ease</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Include FullCalendar CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        .header {
            background: #f76a33;
            color: white;
            text-align: center;
            padding: 20px;
        }

        .header h1 {
            font-size: 2.5rem;
            margin: 0;
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            margin-right: 10px;
            font-size: 1rem;
        }

        .navbar .search-bar {
            display: flex;
            align-items: center;
        }

        .navbar input[type="text"] {
            padding: 10px;
            border: none;
            border-radius: 5px;
            width: 100%;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .calendar-container {
            max-width: 800px;
            margin: 20px auto;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        #calendar {
            max-width: 100%;
            margin: 20px;
        }

        .footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 20px;
        }

        .calendar-event img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
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


    <div class="calendar-container">
        <div id="calendarEvents"></div>
    </div>

    <div class="footer">
        <h2>Footer</h2>
    </div>

    <!-- Include jQuery, Moment.js, and FullCalendar JS after the main content -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script>
        // Initialize FullCalendar with the events fetched from the database
        $(document).ready(function() {
            $("#calendarEvents").fullCalendar({
                header: {
                    left: "prev,next today",
                    center: "title",
                    right: "month,agendaWeek",
                },
                defaultView: "month",
                events: <?php echo json_encode($events); ?>,
                eventClick: function(calEvent, jsEvent, view) {
                    // Redirect to the individual event page using the event ID
                    window.location.href = 'event-details.php?id=' + calEvent.id;
                }
            });
        });
    </script>
</body>

</html>
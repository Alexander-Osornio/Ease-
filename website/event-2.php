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

        /* Centered box for event details */
        .event-details {
            text-align: center;
            margin: 50px auto;
            max-width: 800px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            background-color: white;
        }

        /* Style for event title */
        .event-title {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #f76a33;
            /* Adjusted color */
        }

        /* Style for event date and location */
        .event-date-location {
            font-size: 18px;
            font-style: italic;
            margin-bottom: 10px;
        }

        /* Style for event image */
        .event-image {
            max-width: 100%;
            height: auto;
            margin: 20px 0;
            border-radius: 10px;
        }

        /* Style for event description */
        .event-description {
            font-size: 20px;
            margin-bottom: 20px;
        }

        .footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 20px;
        }

        img {
            width: auto;
            height: auto;
            max-width: 100%;
            /* Make sure images don't exceed their container */
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

    <!-- Centered box for event details -->
    <div class="event-details">
        <div class="event-title">Event Title 2</div>
        <div class="event-date-location">
            Date: September 27, 2023 | Location: Event Location
        </div>
        <img class="event-image" src="Images/event-flyer.png" alt="Event Image" />
        <p class="event-description">
            Event description goes here. Lorem ipsum dolor sit amet, consectetur
            adipiscing elit. Nullam vehicula magna et nunc dapibus, nec vestibulum
            metus tempor.
        </p>
    </div>

    <div class="footer">
        <h2>Footer</h2>
    </div>
</body>

</html>
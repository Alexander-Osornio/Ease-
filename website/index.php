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
            color: #333;
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
        }

        /* Change color on hover */
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .header {
            background: #f76a33;
            color: white;
            text-align: center;
            padding: 20px;
        }

        /* Increase the font size of the h1 element */
        .header h1 {
            font-size: 2.5rem;
            margin: 0;
        }

        /* Style the top navigation bar */
        .navbar {
            background-color: #333;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        /* Style the navigation bar links */
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            margin-right: 10px;
            font-size: 1rem;
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

        /* Main Content */
        .main {
            background-color: #fff;
            margin: 20px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-wrap: wrap;
        }

        .side {
            flex: 0 0 calc(25% - 20px);
            /* Adjusted width */
            background-color: #333;
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-right: 20px;
            /* Added margin to separate from events */
        }

        .events {
            flex: 1;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .event-container {
            text-align: center;
            margin: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: transform 0.3s ease-in-out;
            width: calc(50% - 20px);
            cursor: pointer;
            text-decoration: none;
            /* Removed text-decoration */
            color: #f76a33;
            /* Added color */
        }

        .event-container:hover {
            transform: scale(1.05);
        }

        .event-container img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
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

        /* Responsive layout */
        @media screen and (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .navbar input[type="text"] {
                width: 100%;
                margin: 10px 0;
            }

            .main {
                flex-direction: column;
            }

            .side {
                flex: 0 0 100%;
                /* Adjusted width for full width on small screens */
                margin-right: 0;
                /* Removed margin to make it full width */
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
            <input type="text" id="searchInput" placeholder="Search..." />
        </div>
    </div>

    <div class="main">
        <div class="side">
            <h2>About Team 1</h2>
            <h5>Photo of team:</h5>
            <div class="fakeimg" style="height: 200px">Image</div>
            <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
            <h3>More Text</h3>
            <p>Lorem ipsum dolor sit ame.</p>
            <div class="fakeimg" style="height: 60px">Image</div>
            <br />
            <div class="fakeimg" style="height: 60px">Image</div>
            <br />
            <div class="fakeimg" style="height: 60px">Image</div>
        </div>
        <div class="events">
            <a href="event-1.php" class="event-container">
                <h2 style="text-decoration: none; color: #f76a33">TITLE HEADING 1</h2>
                <h5>Date - time</h5>
                <img class="event-image" src="Images/event-flyer.png" alt="Event Image" />
            </a>
            <a href="event-2.php" class="event-container">
                <h2 style="text-decoration: none; color: #f76a33">TITLE HEADING 2</h2>
                <h5>Date - time</h5>
                <img class="event-image" src="Images/event-flyer.png" alt="Event Image" />
            </a>
            <a href="event-3.php" class="event-container">
                <h2 style="text-decoration: none; color: #f76a33">TITLE HEADING 3</h2>
                <h5>Date - time</h5>
                <img class="event-image" src="Images/event-flyer.png" alt="Event Image" />
            </a>
            <a href="event-4.php" class="event-container">
                <h2 style="text-decoration: none; color: #f76a33">TITLE HEADING 4</h2>
                <h5>Date - time</h5>
                <img class="event-image" src="Images/event-flyer.png" alt="Event Image" />
            </a>
        </div>
    </div>

    <div class="footer">
        <h2>Footer</h2>
    </div>
</body>

</html>
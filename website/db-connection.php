<?php
function openDatabaseConnection() {
    $hostname = 'localhost'; // Change this to your database server hostname
    $username = 'root'; // Change this to your database username
    $password = '1086493027@Amo'; // Change this to your database password
    $database_name = 'event'; // Change this to your database name
    
    // Create a database connection
    $connection = new mysqli($hostname, $username, $password, $database_name);
    
    // Check the connection
    if ($connection->connect_error) {
        die('Connection failed: ' . $connection->connect_error);
    }
    
    // Set charset to UTF-8
    $connection->set_charset('utf8');
    
    return $connection;
}

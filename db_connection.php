<?php
$servername = "localhost";
$username = "root"; // Change if necessary
$password = ""; // Change if necessary
$dbname = "slider_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Path to the SQL file
$sql_file = 'slider_db.sql';

// Read the SQL file
$query = file_get_contents($sql_file);

if ($query === false) {
    die('Error reading SQL file.');
}

// Execute the SQL commands in the file
if ($conn->multi_query($query)) {
    do {
        // Handle multiple result sets
        if ($result = $conn->store_result()) {
            $result->free();
        }
    } while ($conn->next_result());
} else {
    die("Error importing SQL file: " . $conn->error);
}
?>
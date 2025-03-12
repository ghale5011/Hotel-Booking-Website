<?php

// Database configuration
$host = 'localhost';  // Database host
$username = 'root';  // Database username
$password = '';  // Database password
$database = 'hbwebsite';  // Database name

// Create a connection to the database
$con = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (!$con) {
    die("Cannot connect to database: " . mysqli_connect_error());
}

/**
 * Function to sanitize and filter input data.
 *
 * @param array $data - The input data to be filtered.
 * @return array - The sanitized data.
 */
function filteration($data)
{
    foreach ($data as $key => $value) {
        $data[$key] = trim($value); // Remove whitespace from both sides of the string
        $data[$key] = stripslashes($value); // Remove backslashes from the string
        $data[$key] = htmlspecialchars($value); // Convert special characters to HTML entities
        $data[$key] = strip_tags($value); // Strip HTML and PHP tags from the string
    }
    return $data;
}

/**
 * Function to execute a prepared SELECT statement.
 *
 * @param string $sql - The SQL query string with placeholders.
 * @param array $values - The values to bind to the placeholders.
 * @param string $datatypes - A string specifying the data types of the values.
 * @return mysqli_result|false - The result set from the query or false on failure.
 */
function select($sql, $values, $datatypes)
{
    $con = $GLOBALS['con']; // Access the global database connection

    // Prepare the SQL statement
    if ($stmt = mysqli_prepare($con, $sql)) {
        // Bind parameters to the statement
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Fetch the result set
            $res = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt); // Close the statement
            return $res; // Return the result set
        } else {
            mysqli_stmt_close($stmt); // Close the statement on failure
            die("Query cannot be executed - Select");
        }
    } else {
        die("Query preparation failed - Select");
    }
}

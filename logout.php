<?php
session_start();
$servername = "localhost"; 
$username = "root";        
$password = "";            
$dbname = "signing_db";    

$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set the timezone to IST (Indian Standard Time)
date_default_timezone_set('Asia/Kolkata');

// Check if the session is active
if(isset($_SESSION['email'])) {

    // Retrieve the user's email from the session
    $email = $_SESSION['email'];

    // Get the current date and time for logout time
    $logout_time = date('Y-m-d H:i:s');

    // Prepare the query to update the logout time for the user
    $query = "UPDATE loginus SET logout_time = ? WHERE email = ?";

    // Prepare and execute the query
    if ($stmt = $conn->prepare($query)) {
        // Bind the parameters (logout_time and email)
        $stmt->bind_param("ss", $logout_time, $email); 
        $stmt->execute();
        $stmt->close(); // Close the prepared statement
    }

    // Clear session data and destroy the session
    session_unset();
    session_destroy();
    
    // Redirect to the sign.php page (login page)
    header("Location: sign.php"); 
    exit;

} else {
    // If no session exists, redirect to the sign.php page
    header("Location: sign.php"); 
    exit;
}

// Close the database connection
$conn->close();
?>

<?php
session_start();// session start is used to start the session , to end use session_destroy
error_reporting(E_ALL);// To report any error , error_reporting(E_ALL)
ini_set('display_errors', 1);// Inorder to debug the error and to interpret by seeing it ini_set(display_error,1)
//ini_set('display_errors)

//date_default_timezone_set() function is used to allocate the default time.
date_default_timezone_set('Asia/Kolkata');
if (isset($_SESSION['email'])) {   // To check the user is already logged in.
    // If the user is logged in, redirect to index.html
    header("Location: index.html"); // header() // acts as a router
    exit();// TO break use exit
}

$connect = new mysqli('localhost', 'root', '', 'signing_db');  // To connect use new mysqli ()

if ($connect->connect_error) {  // connect_> error is the default function, that checks for any error
    die('Connection failed: ' . $connect->connect_error); // If occurs , then throw
}
// if the form subkit method is send , this block of  code will be executed
if (isset($_POST['send'])) {
    $email = $connect->real_escape_string($_POST['email']); // It removes or won't consider the formmat of a string.
    $password = $connect->real_escape_string($_POST['password']);// thats why real_escape_string
    
    // Query to check if the email and password match an existing record. 
    $sql = "SELECT * FROM signinusers WHERE email = ? AND password = ?"; // It is actually fetching the data from the users table.
    $stmt = $connect->prepare($sql); // prepare is the function and it is default to convert string into sql form
    $stmt->bind_param("ss", $email, $password); // bind_param is used to allocate the datatype of the variable
    $stmt->execute();
    $result = $stmt->get_result();// get_result() // it is used to return and store the output

    if ($result->num_rows == 1) {     
        // Get the current time in Indian Standard Time
        $login_time = date('Y-m-d H:i:s'); // assigning // date format.
        
        // First check if the email already exists in the loginusers table
        $checkLoginSql = "SELECT * FROM loginus WHERE email = ?"; 
        $checkStmt = $connect->prepare($checkLoginSql);
        $checkStmt->bind_param("s", $email);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows == 0) {
            // If the email does not exist in the loginusers table, insert it
            $sql = "INSERT INTO loginus (email, login_time) VALUES (?, ?)";
            $stmt = $connect->prepare($sql);
            $stmt->bind_param("ss", $email, $login_time);
            $stmt->execute();
        }
        
        // Set session variable to track the logged-in user
        $_SESSION['email'] = $email;
        
        // Redirect to index.html after successful login
        header("Location: ./index.html");
        exit();
    } else {
        // If no match is found
        echo "Invalid email or password.";
    }

    // Close the statement and connection
    $stmt->close();
    $checkStmt->close();
}

$connect->close();
?>

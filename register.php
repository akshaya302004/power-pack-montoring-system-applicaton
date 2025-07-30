<?php
$connection = mysqli_connect('localhost','root','','signing_db'); 
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}
// Go through:: This is the connection for sql;
//$connection is a variable where mysqli_connect() is a function to connect it. syntax : 'server',username,'passw','dbname';

if (isset($_POST['register'])) {//isset() this function checks whether the variable is declared or not , here register
    $name = $_POST["username"];//Getting values through the names of components or inputs
    $email = $_POST["email"];
    $password = $_POST["userpassword"];
    $confirm = $_POST["confirm_password"];
//prepare() it is used to convert string into sql quries.
    $stmt = $connection->prepare("INSERT INTO signinusers (username, email, password, confirm_password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $password, $confirm);
//bind_param used to give values to the respective columns.'ssss'-> refers to string type
    if ($stmt->execute()) {// execute is used to execute the quries , here if executedf
        header('Location: login.html');// heads to the login.html
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Something went wrong.";
}

mysqli_close($connection);
?>

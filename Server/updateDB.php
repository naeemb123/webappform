<?php

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$name = $request->name;
$email = $request->email;
$message = $request->message;


//Need to connect to database
$servername = "localhost"; //<<--server
$username = "root"; //<--username needed
$password = "______"; //<--password needed<<<
$dbname = "simplewebform"; //<<--name of table in database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO formdata (name, email, message)
VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(1);
} else {
    echo json_encode(0);
}

$result = $conn->query("SELECT admin FROM admins");
$outp = "";
$headString=array();
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    $adminEmail = $rs['admin'];
}

$conn->close();

//mail submitter and admin (Bonus Feature)
mail($email,"Form Submission Complete","Hi " . $name . "\n\nYour form has been submitted to us! \nThank you for your time.
\n\nKind Regards,\[Company Name]"); //<<--used [Company Name] to not disclose the company this exercise is for
mail($adminEmail,"Form submission","User has completed a form. \n\nName: " . $name . "\nEmail: " . $email . "\nMessage: "
 . $message);

 ?>

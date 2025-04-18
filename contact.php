<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$conn = new mysqli('localhost', 'root', '', 'portfolio'); // <- Use your real DB name

if ($conn->connect_error){
    die('Connection Failed: '.$conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO contact(name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);
    $stmt->execute();
    echo "Message Sent Successfully";
    $stmt->close();
    $conn->close();
}
?>

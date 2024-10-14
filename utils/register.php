<?php
include "db_connection.php";

$firstName = ucfirst($_POST['firstName']);
$lastName = ucfirst($_POST['lastName']);
$email = $_POST['email'];
$password = $_POST['password'];
$eventSub = 0;

$password = password_hash($password, PASSWORD_DEFAULT);

$conn = OpenCon();

$statement = $conn->prepare('INSERT INTO accounts (first_name, last_name, email_address, password, event_subscribed) VALUES (?, ?, ?, ?, ?)');
$statement->bind_param('ssssi', $firstName, $lastName, $email, $password, $eventSub);

$statement->execute();

$statement->close();
$conn->close();

header("Location: ../pages/login.php");

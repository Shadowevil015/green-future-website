<?php
include "db_connection.php";

$firstName = ucfirst($_POST['firstName']);
$lastName = ucfirst($_POST['lastName']);
$email = $_POST['email'];
$password = $_POST['password'];

$password = password_hash($password, PASSWORD_DEFAULT);

$conn = OpenCon();

$statement = $conn->prepare('INSERT INTO accounts (first_name, last_name, email_address, password) VALUES (?, ?, ?, ?)');
$statement->bind_param('ssss', $firstName, $lastName, $email, $password);

$statement->execute();

$statement->close();
$conn->close();

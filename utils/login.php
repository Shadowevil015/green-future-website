<?php
include "db_connection.php";
session_start();

$conn = OpenCon();

$email = $_POST["email"];
$password = $_POST["password"];

if (($email === "" || $password === "")) {
    exit("Please fill out both fields!");
}

if ($statement = $conn->prepare("SELECT uid, password FROM accounts WHERE email_address = ?")) {
    $statement->bind_param('s', $email);
    $statement->execute();
    $statement->store_result();

    if ($statement->num_rows > 0) {
        $statement->bind_result($uid, $passworddb);
        $statement->fetch();

        if (password_verify($password, $passworddb)) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $emaildb;
            $_SESSION['uid'] = $uid;
            header('Location: ../pages/events.php');
        } else {
            echo 'Incorrect username and password!';
        }
    } else {
        echo 'Incorrect username and password!';
    }

    $statement->close();
}
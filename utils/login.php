<?php
include "db_connection.php";

$conn = OpenCon();

$email = $_POST["email"];
$password = $_POST["password"];

if (($email === "" || $password === "")) {
    exit("Please fill out both fields!");
}

if ($statement = $conn->prepare("SELECT uid, password, event_subscribed, carbon_footprint, first_name, last_name FROM accounts WHERE email_address = ?")) {
    $statement->bind_param('s', $email);
    $statement->execute();
    $statement->store_result();

    if ($statement->num_rows > 0) {
        $statement->bind_result($uid, $passworddb, $eventSubscribed, $carbonFootprint, $firstName, $lastName);
        $statement->fetch();

        if (password_verify($password, $passworddb)) {
            session_start();
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['email'] = $emaildb;
            $_SESSION['uid'] = $uid;
            $_SESSION['eventSubscribed'] = $eventSubscribed;
            $_SESSION['carbonFootprint'] = $carbonFootprint;
            $_SESSION['firstName'] = $firstName;
            $_SESSION['lastName'] = $lastName;
            header('Location: ../index.php');
        } else {
            echo 'Incorrect username and password!';
        }
    } else {
        echo 'Incorrect username and password!';
    }

    $statement->close();
}
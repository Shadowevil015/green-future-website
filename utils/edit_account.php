<?php

session_start();

include "db_connection.php";

$conn = OpenCon();

$value = $_POST['value'];
$type = $_POST['type'];

$uid = $_SESSION['uid'];

if ($type == 'firstName') {
    $firstName = ucfirst($value);

    $statement = $conn->prepare('UPDATE accounts SET first_name=? WHERE uid=?');
    $statement->bind_param('si', $firstName, $uid);

    $statement->execute();

    $statement->close();
    $conn->close();

    $_SESSION['firstName'] = $firstName;
}

if ($type == 'lastName') {
    $lastName = ucfirst($value);

    $statement = $conn->prepare('UPDATE accounts SET last_name=? WHERE uid=?');
    $statement->bind_param('si', $lastName, $uid);

    $statement->execute();

    $statement->close();
    $conn->close();

    $_SESSION['lastName'] = $lastName;
}

if ($type == 'email') {
    $email = $value;

    $statement = $conn->prepare('UPDATE accounts SET email=? WHERE uid=?');
    $statement->bind_param('si', $lastName, $uid);

    $statement->execute();

    $statement->close();
    $conn->close();

    $_SESSION['email'] = $email;
}

if ($type == 'password') {
    $password = $value;
    $password = password_hash($password, PASSWORD_DEFAULT);

    $statement = $conn->prepare('UPDATE accounts SET password=? WHERE uid=?');
    $statement->bind_param('si', $lastName, $uid);

    $statement->execute();

    $statement->close();
    $conn->close();
}

header('Location: ../pages/account.php');
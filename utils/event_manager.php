<?php
include 'db_connection.php';
session_start();

if ($_POST['signUp'] === "1"){
    $uid = $_SESSION['uid'];
    $event = $_POST['type'];
    $sesstype = 'event' . $event;

    $conn = OpenCon();

    $statement = $conn->prepare('INSERT INTO event_attending (event_uid, user_uid) VALUES (?, ?)');
    $statement->bind_param('ii', $event, $uid);

    $statement->execute();

    $statement->close();
    $conn->close();

    $_SESSION[$sesstype] = 1;

} else if ($_POST['value'] === '2') {
    $uid = $_SESSION['uid'];
    $event = 0;

    $conn = OpenCon();

    $statement = $conn->prepare('UPDATE accounts SET event_subscribed=? WHERE uid=?');
    $statement->bind_param('ii', $event, $uid);

    $statement->execute();

    $statement->close();
    $conn->close();

    $_SESSION['eventSubscribed'] = 0;
}
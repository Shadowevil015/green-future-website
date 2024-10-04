<?php
function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "website";
    $dbpass = "website";
    $db = "website";

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db, port: 3306) or die("Connect failed: %s\n" . $conn->error);
    return $conn;
}
function CloseCon($conn)
{
    $conn->close();
}

$test = OpenCon();
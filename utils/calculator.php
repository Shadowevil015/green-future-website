<?php
session_start();

include "db_connection.php";

$uid = $_SESSION['uid'];

$conn = OpenCon();

$mileage = $_POST['mileage'];
$flights = $_POST['flights'];
$energyUse = $_POST['energyUse'];
$waste = $_POST['waste'];
$meat = $_POST['meat'];

$travelEmissions = $mileage + $flights;
$housingEmissions = $energyUse + $waste + $meat;

$totalEmissions = $housingEmissions + $travelEmissions;

$carbonFootprint = $totalEmissions / 1000;

$statement = $conn->prepare('INSERT INTO carbon_footprints (footprint, user_uid) VALUES (?, ?)');
$statement->bind_param('si', $carbonFootprint, $uid);

$statement->execute();

$statement->close();
$conn->close();

$_SESSION['carbonFootprint'] = $carbonFootprint;

echo $carbonFootprint;
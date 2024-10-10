<?php

// TO-DO commit footprint to db and add "last calculation" to calc page
include "db_connection.php";

$mileage = $_POST['mileage'];
$flights = $_POST['flights'];
$energyUse = $_POST['energyUse'];
$waste = $_POST['waste'];
$meat = $_POST['meat'];

$travelEmissions = $mileage + $flights;
$housingEmissions = $energyUse + $waste + $meat;

$totalEmissions = $housingEmissions + $travelEmissions;

$carbonFootprint = $totalEmissions / 1000;



echo $carbonFootprint;
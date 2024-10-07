<?php
session_start();

if (isset($_SESSION['uid'])) {
    header('Location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Future</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400..900&display=swap" rel="stylesheet">
</head>
<body>
<div class="container">
<nav class="navbar navbar-expand-lg maven-pro sticky-top bg-white" style="font-size:larger">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <img src="../assets/environment-icon.svg" alt="logo" width="56" height="56">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="calculator.php">Carbon Footprint Calculator</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="events.php">Events</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
</nav>

<form action="../utils/register.php" method="POST">
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="mb-3">
            <label for="firstName" class="form-label">First Name</label>
            <input required type="text" class="form-control" id="firstName" name="firstName" aria-describedby="FirstName">
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="mb-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" required class="form-control" id="lastName" name="lastName" aria-describedby="LastName">
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" required class="form-control" id="email" name="email" aria-describedby="EmailAddress">
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" required class="form-control" id="password" name="password" aria-describedby="password">
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-4 justify-content-center">
            <div class="mb-3 justify-content-center">
            <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </div>
</form>


</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
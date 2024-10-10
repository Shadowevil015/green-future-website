<?php
session_start();

if (!isset($_SESSION['uid'])) {
    header('Location: login.php');
}

$uid = $_SESSION['uid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Future</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400..900&display=swap" rel="stylesheet">
    <style> body {font-family:"Maven Pro", sans-serif;}</style>
    <script>
      document.addEventListener('DOMContentLoaded', (event) => {
    const htmlElement = document.documentElement;
    const switchElement = document.getElementById('darkModeSwitch');

    // Set the default theme to dark if no setting is found in local storage
    const currentTheme = localStorage.getItem('bsTheme') || 'dark';
    htmlElement.setAttribute('data-bs-theme', currentTheme);
    switchElement.checked = currentTheme === 'dark';

    switchElement.addEventListener('change', function () {
        if (this.checked) {
            htmlElement.setAttribute('data-bs-theme', 'dark');
            localStorage.setItem('bsTheme', 'dark');
        } else {
            htmlElement.setAttribute('data-bs-theme', 'light');
            localStorage.setItem('bsTheme', 'light');
        }
    });
});
    </script>
</head>
<body>
<div class="container">
<nav class="navbar navbar-expand-lg maven-pro sticky-top" style="font-size:larger">
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
                        <a class="nav-link" href="../index.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="calculator.php">Carbon Footprint Calculator</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Events</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                <?php
                  if(!isset($_SESSION['uid'])) {
                    echo '
                    <li class="nav-item">
                        <a class="nav-link" href="pages/login.php">Login</a>
                    </li>';
                  } else {
                    echo '<ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="utils/logout.php">Log Out</a>
                    </li>';
                  } ?>
                    <li class="nav-item ps-2">
                      <!-- Bootstrap 5 switch -->
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="darkModeSwitch" checked>
                        <label class="form-check-label" for="darkModeSwitch">Dark Mode</label>
                      </div>
                    </li>
                  </ul>
            </div>
        </div>
</nav>
<h2 class="p-3">Upcoming Green Future Events</h2>
<div class="row mt-4 justify-content-center">
    <div class="col-md-3">
        <div class="card">
            <img src="../assets/eco-event-1.jpg" class="card-img" alt="...">
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <img src="../assets/eco-event-2.jpeg" height="202.66" class="card-img-top" alt="...">
        </div>
    </div>
    <div class="col-md-3">
        <div class="card" >
            <img src="../assets/eco-event-3.jpeg" class="card-img-top" alt="...">
        </div>
    </div>
</div>
<div class="row mt-4 justify-content-center">
    <div class="col-md-3">
        <div class="card">
            <img src="../assets/eco-event-4.webp" height="216" class="card-img-top" alt="...">
        </div>
    </div>
    <?php
    if ($_SESSION['eventSubscribed'] === 0 | $_SESSION['eventSubscribed'] === null) {
        echo 
    '<div class="col-md-3">
        <div class="card">
                <div class="card-body mb-4">
                    <h5 class="card-title">Sign Up</h5>
                    <p class="card-text">Click the button below to sign up for information & news about upcoming events!</p>
                    <button class="btn btn-primary" onclick="signUp()">Sign Up</button>
                </div>
        </div>
    </div>';} else {
        echo
    '<div class="col-md-3">
        <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Unsubscribe</h5>
                    <p class="card-text">Click the button below to unsubscribe for event notifications!</p>
                    <button class="btn btn-primary" onclick="unSub()">Unsubscribe</button>
                </div>
        </div>
    </div>';
    }
    ?>
    <div class="col-md-3">
        <div class="card" >
            <img src="../assets/eco-event-5.jpeg" height="216" class="card-img-top" alt="...">
        </div>
    </div>
</div>
<div class="row mt-4 justify-content-center">
    <div class="col-md-3">
        <div class="card">
            <img src="../assets/eco-event-6.webp" height="216" class="card-img-top" alt="...">
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <img src="../assets/eco-event-7.png" height="216" class="card-img-top" alt="...">
        </div>
    </div>
    <div class="col-md-3">
        <div class="card" >
            <img src="../assets/eco-event-8.jpg" height="216" class="card-img-top" alt="...">
        </div>
    </div>
</div>

</div>
<script>
    function signUp() {
        let formData = {"value": 1}
        $.ajax({
            type: "POST",
            data: formData,
            url: "../utils/event_manager.php",
            success: function(response) {
                alert("You have successfully subscribed!");
                location.reload()
            },
            error: function(error) {
                console.log("error", error);
                alert("error")
            }
        })

    }

    function unSub() {
        let formData = {"value": 2}
        $.ajax({
            type: "POST",
            data: formData,
            url: "../utils/event_manager.php",
            success: function(response) {
                alert("You have successfully unsubscribed!");
                location.reload()
            },
            error: function(error) {
                console.log("error", error);
                alert("error")
            }
        })
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
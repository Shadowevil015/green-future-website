<?php
session_start();

$carbonFootprint = $_SESSION['carbonFootprint'];

if (!isset($_SESSION['uid'])) {
    header('Location: login.php');
}
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" type="image/png" href="/favicon/favicon-48x48.png" sizes="48x48" />
<link rel="icon" type="image/svg+xml" href="/favicon/favicon.svg" />
<link rel="shortcut icon" href="/favicon/favicon.ico" />
<link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png" />
<link rel="manifest" href="/favicon/site.webmanifest" />

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
                        <a class="nav-link active" aria-current="page" href="#">Carbon Footprint Calculator</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="events.php">Events</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                <li class="nav-item align-self-center ps-2 me-3 mt-2">
                      <!-- Bootstrap 5 switch -->
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="darkModeSwitch" checked>
                        <label class="form-check-label" for="darkModeSwitch">Dark Mode</label>
                      </div>
                    </li>
                <?php
                  if(!isset($_SESSION['uid'])) {
                    echo '
                    <li class="nav-item">
                        <a class="nav-link" href="pages/login.php">Login</a>
                    </li>';
                  } else {
                    echo '
                    <li class="nav-item">
                        <a href="account.php"><i style="font-size: 3rem; color: #489f3a;" class="bi bi-person-circle"></i></a>
                    </li>';
                  } ?>
                  </ul>
            </div>
        </div>
</nav>

<div class="row ps-3 mt-2">
    <div class="col">
        <h2 class="">Carbon Footprint Calculator</h2>
    </div>
    <div class="col">
        <h3 id="prevResult">
        <?php 
            if($_SESSION['carbonFootprint'] !== NULL) {
                echo 'Previous Calculation: ' . $carbonFootprint . ' CO2/kg';
            } ?>
        </h3>
    </div>
</div>

<form action="" method="POST" id="mainForm">
    <div class="row">
        <h3 class="mt-5">Transportation</h3>
    <div class="col-4 mt-2">
        <div class="mb-3">
        <label for="mileage" class="form-label">Mileage (In Kilometers)</label>
        <input required type="number" class="form-control" id="mileage" name="mileage" aria-describedby="mileage">
        </div>
    </div>
    <div class="col-4 mt-2">
        <div class="mb-3">
        <label for="flights" class="form-label">Number of Flights</label>
        <input required type="number" class="form-control" id="flights" name="flights" aria-describedby="flights">
        </div>
    </div>
    </div>
    <div class="row">
    <h3 class="mt-3">Housing</h3>
    <div class="col-4 mt-2">
        <div class="mb-3">
        <label for="energyUse" class="form-label">Energy Usage (KW Hours)</label>
        <input required type="number" class="form-control" id="energyUse" name="energyUse" aria-describedby="energyUse">
        </div>
    </div>
    <div class="col-4 mt-2">
        <div class="mb-3">
        <label for="waste" class="form-label">Waste (In Kilograms)</label>
        <input required type="number" class="form-control" id="waste" name="waste" aria-describedby="waste">
        </div>
    </div>
    <h3 class="mt-3">Meat Consumption</h3>
    <div class="col-4 mt-2">
        <div class="mb-3">
        <label for="meat" class="form-label">Meat Consumption (Kilograms)</label>
        <input required type="number" class="form-control" id="meat" name="meat" aria-describedby="meat">
        </div>
    </div>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
    </div>
</form>

</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        
$(document).ready(function () {
    $("form").submit(function (event) {
      let formData = {
          mileage: $(mileage).val(),
          flights: $(flights).val(),
          energyUse: $(energyUse).val(),
          waste: $(waste).val(),
          meat: $(meat).val()
      };
      $.ajax({
          type: "POST",
          url: "../utils/calculator.php",
          data: formData,
          success: function(response) {
            $('#mainForm')[0].reset();
              $('#prevResult').replaceWith(
                `<h3 id="prevResult">Previous Calculation: ${response} CO2/kg</h3>`
              )
          },
          error: function(error) {
                  console.log("error", error);
                  alert("error")
              }
      })
      event.preventDefault();
    })
  })
    </script>
</body>
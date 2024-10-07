<?php
session_start();
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
            <a class="navbar-brand" href="#">
                <img src="assets/environment-icon.svg" alt="logo" width="56" height="56">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/calculator.php">Carbon Footprint Calculator</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/events.php">Events</a>
                    </li>
                </ul>
                <?php
                  if(!isset($_SESSION['uid'])) {
                    echo '<ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="pages/login.php">Login</a>
                    </li>
                </ul>';
                  } else {
                    echo '<ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="utils/logout.php">Log Out</a>
                    </li>
                </ul>';
                  } ?>
            </div>
        </div>
</nav>
<div class="row row-cols-1 row-cols-md-2 g-4">
  <div class="col">
    <div class="card">
      <img src="assets/wind-turbine.jpg" class="card-img-top" alt="..." width="544" height="305.906">
      <div class="card-body">
        <h5 class="card-title">Empowering a Sustainable Future</h5>
        <p class="card-text">Green Future is a non-profit organization dedicated to creating a cleaner, greener world by promoting sustainable living practices. Our mission is to raise awareness about environmental challenges and provide practical solutions that empower.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="assets/planet.avif" class="card-img-top" alt="..." width="544" height="305.906">
      <div class="card-body">
        <h5 class="card-title">Driving Positive Environmental Change</h5>
        <p class="card-text">At Green Future, we believe that every action counts when it comes to protecting the planet. Our organization works tirelessly to implement sustainability initiatives that address climate change, waste reduction, and resource conservation.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="assets/treehugger.webp" class="card-img-top" alt="..." width="544" height="305.906">
      <div class="card-body">
        <h5 class="card-title">Building a Community of Eco-Champions</h5>
        <p class="card-text">Green Future strives to cultivate a global community of environmentally-conscious individuals who are passionate about making a difference. Our platform offers resources, events, and interactive tools that help people learn about sustainable living.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="assets/eco-innovation.jpg" class="card-img-top" alt="..." width="544" height="305.906">
      <div class="card-body">
        <h5 class="card-title">Innovative Solutions for a Green Tomorrow</h5>
        <p class="card-text">We are committed to pushing the boundaries of sustainability through innovative projects that reduce waste, conserve energy, and promote biodiversity. Green Future’s initiatives focus on creating scalable solutions that are accessible to everyone.</p>
      </div>
    </div>
  </div>
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
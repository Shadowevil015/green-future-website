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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" type="image/png" href="/favicon/favicon-48x48.png" sizes="48x48" />
<link rel="icon" type="image/svg+xml" href="/favicon/favicon.svg" />
<link rel="shortcut icon" href="/favicon/favicon.ico" />
<link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png" />
<link rel="manifest" href="/favicon/site.webmanifest" />

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
// Credit for dark mode toggler code: https://github.com/404GamerNotFound/bootstrap-5.3-dark-mode-light-mode-switch
    </script>

    <style> body {font-family:"Maven Pro", sans-serif;}</style>
</head>
<body>
<div class="container">
<nav class="navbar navbar-expand-lg maven-pro sticky-top" style="font-size:larger">
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
                <ul class="navbar-nav ms-auto">
                <li class="nav-item align-self-center ps-2 me-3 mt-2">
                      <!-- Bootstrap 5 switch -->
                      <div class="form-check form-switch">
                      <label class="form-check-label" for="darkModeSwitch">Dark Mode</label>
                      <input class="form-check-input" type="checkbox" id="darkModeSwitch" checked>
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
                        <a href="pages/account.php"><i style="font-size: 3rem; color: #489f3a;" class="bi bi-person-circle"></i></a>
                    </li>';
                  } ?>
                  </ul>
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
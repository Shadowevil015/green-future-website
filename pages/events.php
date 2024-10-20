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
                        <a class="nav-link" href="calculator.php">Carbon Footprint Calculator</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Events</a>
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
    <h3 class="mt-3">Upcoming Environmental Events</h3>
    <div class="row mt-5">
<?php if ($_SESSION['event1'] === 0 | $_SESSION['event1'] === null) {
  echo '
  <div class="col-md-3 mb-3">
    <div class="card">
        <img src="../assets/eco-event-3.jpeg" height="259" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">Eco Festival 25\'</h5>
        <p class="card-text">Sign up for more information and updates about our Eco Festival!</p>
        <button class="btn btn-primary" onclick="signUp(1)">Click to Subscribe!</button>
      </div>
    </div>
  </div>';
} else {
  echo '
  <div class="col-md-3 mb-3">
    <div class="card">
        <img src="../assets/eco-event-3.jpeg" height="259" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">Eco Festival 25\'</h5>
        <p class="card-text">Sign up for more information and updates about our Eco Festival!</p>
        <button class="btn btn-primary disabled">You\'re already subscribed!</button>
      </div>
    </div>
  </div>';
}
if ($_SESSION['event2'] === 0 | $_SESSION['event2'] === null) {
  echo '
  <div class="col-md-3">
    <div class="card">
    <img src="../assets/eco-event-6.webp" height="259" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">Eco Con 25\'</h5>
        <p class="card-text">Eco Con 25\' is approaching fast! Subscribe for more info & updates!</p>
        <button class="btn btn-primary" onclick="signUp(2)">Click to Subscribe!</button>
      </div>
    </div>
  </div>';
} else {
  echo '
  <div class="col-md-3">
    <div class="card">
    <img src="../assets/eco-event-6.webp" height="259" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">Eco Con 25\'</h5>
        <p class="card-text">Eco Con 25\' is approaching fast! Subscribe for more info & updates!</p>
        <button class="btn btn-primary disabled">You\'re already subscribed!</button>
      </div>
    </div>
  </div>';
}
if ($_SESSION['event3'] === 0 | $_SESSION['event3'] === null) {
  echo '
  <div class="col-md-3">
    <div class="card">
    <img src="../assets/eco-event-8.jpg" height="259" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">Weekly Eco Activity Day</h5>
        <p class="card-text">Join the fun in the weekly eco fun day! Runs every Tuesday!</p>
        <button class="btn btn-primary" onclick="signUp(3)">Click to Subscribe!</button>
      </div>
    </div>
  </div>';
} else {
  echo '
  <div class="col-md-3">
    <div class="card">
    <img src="../assets/eco-event-8.jpg" height="259" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">Weekly Eco Activity Day</h5>
        <p class="card-text">Join the fun in the weekly eco fun day! Runs every Tuesday!</p>
        <button class="btn btn-primary disabled">You\'re already subscribed!</button>
      </div>
    </div>
  </div>';
}
if ($_SESSION['event4'] === 0 | $_SESSION['event4'] === null) {
  echo '
  <div class="col-md-3">
    <div class="card">
    <img src="../assets/eco-event-1.jpg" height="259" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">Daily Treehugger Event</h5>
        <p class="card-text">Join us between 5-8pm every day for a treehugging get together!</p>
        <button class="btn btn-primary" onclick="signUp(4)">Click to Subscribe!</button>
      </div>
    </div>
  </div>';
} else {
  echo '
  <div class="col-md-3">
    <div class="card">
    <img src="../assets/eco-event-1.jpg" height="259" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">Daily Treehugger Event</h5>
        <p class="card-text">Join us between 5-8pm every day for a treehugging get together!</p>
        <button class="btn btn-primary disabled">You\'re already subscribed!</button>
      </div>
    </div>
  </div>';
}?>
</div>
</div>
<script>
    function signUp(type) {
        let formData = {
          "type": type,
          "signUp": 1
        }
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
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
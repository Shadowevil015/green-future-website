<?php
session_start();

include "../utils/db_connection.php";

$firstName = $_SESSION['firstName'];
$lastName = $_SESSION['lastName'];
$email = $_SESSION['email'];
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

    <style> body {font-family:"Maven Pro", sans-serif;} .active {--bs-nav-pills-link-active-bg: #489f3a !important;}</style>
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
                        <a href="#"><i style="font-size: 3rem; color: #489f3a;" class="bi bi-person-circle"></i></a>
                    </li>';
                  } ?>
                  </ul>
            </div>
        </div>
</nav>

<div class="parent-container d-flex">
    <div class="container w-25">
        <div class="row">
            <div class="col">
                <ul class="nav flex-column nav-pills mt-5">
                    <li class="nav-item accounts">
                        <a onclick="return false;" id="acc" class="nav-link active" aria-current="page" href="">Account</a>
                    </li>
                    <li class="nav-item carbon">
                        <a onclick="return false;" id="carb" class="nav-link" href="" >Carbon History</a>
                    </li>
            </div>
        </div>
    </div>
    <div class="container accountManagement">
        <div class="row">
            <div class="col">
                <h3 class="mt-4 ms-2">Account Management</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">First Name</th>
                    <td><?php echo $firstName;?></td>
                    <td><button style="background-color: #489f3a; --bs-btn-border-color: #489f3a;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFirstName">Edit</button></td>
                    </tr>
                    <tr>
                    <th scope="row">Last Name</th>
                    <td><?php echo $lastName;?></td>
                    <td><button style="background-color: #489f3a; --bs-btn-border-color: #489f3a;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalLastName">Edit</button></td>
                    </tr>
                    <tr>
                    <th scope="row">Email Address</th>
                    <td><?php echo $email;?></td>
                    <td><button style="background-color: #489f3a; --bs-btn-border-color: #489f3a;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEmail">Edit</button></td>
                    </tr>
                    <tr>
                    <th scope="row">Password</th>
                    <td>**********</td>
                    <td><button style="background-color: #489f3a; --bs-btn-border-color: #489f3a;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPassword">Edit</button></td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <div class="container carbonHistory section">
        <div class="row">
            <div class="col">
                <h3 class="mt-4 ms-2">Carbon Footprint History</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">CO2/kg</th>
                    <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $conn = OpenCon();

                    if ($statement = $conn->prepare("SELECT footprint, date from carbon_footprints WHERE user_uid = ?")) {
                        $statement->bind_param('i', $_SESSION['uid']);
                        $statement->execute();
                        $result = $statement->get_result();
                    
                        if ($result->num_rows > 0) {
                            while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                echo '<tr>';
                                echo "<td>" . $rows["footprint"] . "</td>";
                                echo "<td>". $rows["date"] ."</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo 'You have no Carbon Footprint History!';
                        }
                    
                        $statement->close();
                    }
                    ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="modalFirstName" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalLabel">Edit First Name</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div>
            <div class="modal-body">
                  <form action="../utils/edit_account.php" method="POST">
                  <label class="mb-2" for="firstName">First Name</label>  
                  <input type="hidden" name="type" id="firstName" value="firstName">
                  <input required placeholder="<?php echo $firstName;?>" type="text" class="form-control" id="field" name="value" aria-describedby="firstName">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalLastName" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalLabel">Edit Last Name</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div>
            <div class="modal-body">
                  <form action="../utils/edit_account.php" method="POST">
                  <label class="mb-2" for="lastName">Last Name</label>
                  <input type="hidden" name="type" id="lastName" value="lastName">
                  <input required placeholder="<?php echo $lastName;?>" type="text" class="form-control" id="field" name="value" aria-describedby="lastName">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalEmail" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalLabel">Edit Email Address</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div>
            <div class="modal-body">
                  <form action="../utils/edit_account.php" method="POST">
                  <label class="mb-2" for="email">Email Address</label>
                  <input type="hidden" name="type" id="email" value="email">
                  <input required placeholder="<?php echo $email;?>" type="email" class="form-control" id="field" name="value" aria-describedby="email">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalPassword" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalLabel">Edit Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div>
            <div class="modal-body">
                  <form action="../utils/edit_account.php" method="POST">
                  <label class="mb-2" for="password">Password</label>
                  <input type="hidden" name="type" id="password" value="password">  
                  <input required placeholder="********" type="password" class="form-control" id="field" name="value" aria-describedby="password">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>/*
    $(document).ready(function () {
    $("form").submit(function (event) {
        event.preventDefault();
        let valueField = document.getElementById("field").value;
        let nameField =document.getElementById("field").name;
      let formData = {
          value: valueField,
          name: nameField 
      };
      $.ajax({
          type: "POST",
          url: "../utils/edit_account.php",
          data: formData,
          success: function(response) {
            alert(response)
          },
          error: function(error) {
            console.log("error", error);
            alert("error")
              }
      })
    })
  })*/

  $(document).ready(function () {
    $("li.carbon").click(function () {
        $("div.accountManagement").hide();
        $("div.carbonHistory").show();
        let element = document.getElementById("acc");
        element.classList.remove("active");
        element =document.getElementById("carb");
        element.classList.add("active");
    })
    $("li.accounts").click(function () {
        $("div.carbonHistory").hide();
        $("div.accountManagement").show();
        let element = document.getElementById("carb");
        element.classList.remove("active");
        element =document.getElementById("acc");
        element.classList.add("active");
    })
  })
</script>
</body>
</html>
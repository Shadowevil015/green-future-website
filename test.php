<?php

$dbhost = "localhost";
$dbuser = "website";
$dbpass = "website";
$db = "test";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <table class="table mt-5 table-hover">
        <thead>
            <div class="container"></div>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email Address</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if ($statement = $conn->prepare("SELECT firstName, lastName, emailAddress from users")) {
                    $statement->execute();
                    $result = $statement->get_result();
                    
                    if ($result->num_rows > 0) {
                        while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            echo '<tr>';
                            echo "<td>" . $rows["firstName"] . "</td>";
                            echo "<td>". $rows["lastName"] ."</td>";
                            echo "<td>". $rows["emailAddress"] ."</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo 'There are no users in this table!';
                    }
                    $statement->close();
                    }
            ?>
        </tbody>
    </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
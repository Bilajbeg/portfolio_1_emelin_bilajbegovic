<?php
require_once "db_connect.php";

$id = $_GET["id"];

$sql = "SELECT * FROM animal WHERE id = $id ";
$result = mysqli_query($connect, $sql);

$cards = "";

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row["vaccinated"] == 1) {
            $vaccinatedStatus = "YES";
        } else {
            $vaccinatedStatus = "NO";
        }

        $statusText = ($row["status"] > 0) ? "Available" : "Adopted";

        $buttonText = ($row["status"] > 0) ? "Take Me Home" : "Adopted";

        $cards .= "<div style='min-width: 500px; max-width: 700px;'>
            <div class='card border-3'>
                <img src='pictures/{$row["image"]}' class='card-img-top mx-3 mt-2' style='width: 200px; height: 250px; object-fit: cover;'>
                <div class='card-body shadow bg-body-tertiary rounded'>
                    <h4 class='card-title'><strong>{$row["name"]}</strong></h4>
                    <p class='card-text style'><strong>Age:</strong> {$row["age"]} years</p>
                    <p class='card-text style'><strong>Breed:</strong> {$row["breed"]}</p>
                    <hr>
                    <p class='card-text'> <strong>Location: </strong>{$row["location"]} </p>
                    <p class='card-text'> <strong>Vaccinated: </strong>{$vaccinatedStatus}</p>
                    <p class='card-text'> <strong>Size:</strong> <a href='sizes.php?size={$row["size"]}'>{$row["size"]}</a></p>
                    <p class='card-text style'><strong>Description: </strong><br> {$row["description"]}</p>
                    <p class='card-text'><strong>Status: </strong>{$statusText}</p>
                    <div>
                    <a href='home.php' class='btn btn-primary my-2' style='width: auto;'>{$buttonText}</a>
                    <a href='home.php' class='btn btn-secondary my-2' style='width: auto;'>Back</a>
                    </div>
                </div>
            </div>
        </div>";
    }
} else {
    $cards .= "<p>No Content</p>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <style>
        body {
            background-image: url('pictures/bg_3.jpg');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            /* Set the minimum height to cover the whole viewport */
            margin: 0;
            /* Remove default body margin */
            padding-bottom: 100px;
            /* Adjust as needed to create space for the footer */
        }
    </style>
</head>

<body class="bg-success text-dark bg-opacity-50" style="height: 200vh">
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="padding: 20px;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="pictures/<?= $row["picture"] ?>" alt="user pic" width="30" height="24">
            </a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="font-size: 24px;">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="senior.php">Seniors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="junior.php">Juniors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php?logout">Logout</a>
                </li>
            </ul>
        </div>
    </nav>


    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <?= $cards ?>
        </div>
    </div>

    <footer class="navbar navbar-expand-lg bg-body-tertiary fixed-bottom">
        <div class="container-fluid d-flex justify-content-center">
            <div class="text-center p-3" style="font-size: 18px;">
                <strong>© 2023 Copyright: Emelin Bilajbegovic</strong>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
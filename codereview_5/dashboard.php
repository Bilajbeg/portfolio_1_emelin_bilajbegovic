<?php
session_start();

if (isset($_SESSION["user"])) {
    header("Location: home.php");
}

if (!isset($_SESSION["user"]) && !isset($_SESSION["adm"])) {
    header("Location: login.php");
}

require_once "db_connect.php";

$sql = "SELECT * FROM users WHERE id = {$_SESSION["adm"]}";

$result = mysqli_query($connect, $sql);

$row = mysqli_fetch_assoc($result);

$sqlUsers = "SELECT * FROM users WHERE status != 'adm'";
$resultUsers = mysqli_query($connect, $sqlUsers);

$layout = "";

if (mysqli_num_rows($resultUsers) > 0) {
    while ($userRow = mysqli_fetch_assoc($resultUsers)) {
        $layout .= "<div>
            <div class='card mb-5' style='width: 18rem;'>
                <img src='pictures/{$userRow["picture"]}' class='card-img-top' alt='...' style='height: 300px; object-fit: cover;'>
                <div class='card-body'>
                    <h5 class='card-title'>{$userRow["first_name"]} {$userRow["last_name"]}</h5>
                    <p class='card-text'>{$userRow["email"]}</p>
                    <a href='update_user.php?id={$userRow["id"]}' class='btn btn-warning'>Update</a>
                    <a href='delete.php?id={$userRow["id"]}' class='btn btn-danger'>Delete</a>
                </div>
            </div>
        </div>";
    }
} else {
    $layout .= "No results found!";
}

$sqlAnimals = "SELECT * FROM animal";
$resultAnimals = mysqli_query($connect, $sqlAnimals);

$cards = "";

if (mysqli_num_rows($resultAnimals) > 0) {
    while ($animalRow = mysqli_fetch_assoc($resultAnimals)) {
        $cards .= "<div class='col-lg-4 col-md-6 col-sm-12 mb-3'>
            <div class='card mt-2' style='width: 320px;'>
                <img src='pictures/{$animalRow["image"]}' class='card-img-top' alt='...' style='height: 440px; object-fit: cover;'>
                <div class='card-body'>
                    <h4 class='card-title'>{$animalRow["name"]}</h4>
                    <p class='card-text'>Location: {$animalRow["location"]}</p> 
                    <p class='card-text'>Age: {$animalRow["age"]}</p> 
                    <p>Size: <a href='sizes.php?size={$animalRow["size"]}'>{$animalRow["size"]}</a></p>
                    <p class='card-text'>Description: <br>{$animalRow["description"]}</p> 
                    <a href='details.php?id={$animalRow["id"]}' class='btn btn-warning'>Details</a>
                    <a href='update.php?id={$animalRow["id"]}' class='btn btn-success'>Edit</a>
                    <a href='delete.php?id={$animalRow["id"]}' class='btn btn-danger'>Delete</a>
                </div>
            </div>
        </div>";
    }
} else {
    $cards = "<p>No results found</p>";
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?= $row["first_name"] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <style>
        .hr-custom {
            width: 80%;
            border: 3px solid #000;
            margin: 0 auto;
        }
    </style>

</head>

<body class="bg-success text-dark bg-opacity-50" style="height: 800vh">
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="padding: 20px;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="pictures/<?= $row["picture"] ?>" alt="user pic" width="30" height="24">
                <?= $row["email"] ?>
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
                    <a class="nav-link" href="edit.php?id=<?= $row["id"] ?>">Edit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php?logout">Logout</a>
                </li>
            </ul>
        </div>
    </nav>



    <div class="container">
        <div class="d-flex justify-content-between align-items-center my-4">
            <div>
                <a class="btn btn-secondary btn-lg" href="register.php">Add a new user</a>
            </div>
            <h2 class="text-center my-4 mx-4"><strong>Welcome <?= $row["first_name"] . " " . $row["last_name"] ?></strong></h2>
        </div>
    </div>

    <div class="container">
        <div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-xs-1">
            <?= $layout ?>
        </div>
    </div>
    <hr class="hr-custom">

    <div class="container">
        <div class="d-flex justify-content-between align-items-center my-5">
            <div>
                <a class="btn btn-secondary btn-lg" href="create.php">Add a new pet</a>
            </div>
        </div>
        <div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-xs-1">
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
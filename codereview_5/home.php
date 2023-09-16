<?php
session_start();

if (isset($_SESSION["adm"])) {
    header("Location: dashboard.php");
}

if (!isset($_SESSION["user"]) && !isset($_SESSION["adm"])) {
    header("Location: login.php");
}

require_once "db_connect.php";

// Function to handle pet adoption
function adoptPet($connect, $userId, $animalId)
{
    // Update the status of the pet to 'Adopted' (status = 0)
    $updateStatusSql = "UPDATE animal SET status = 0 WHERE id = $animalId";
    mysqli_query($connect, $updateStatusSql);

    // Insert a new record in the pet_adoption table
    $adoptionDate = date("Y-m-d"); // Get the current date

    $insertAdoptionSql = "INSERT INTO pet_adoption (user_id, pet_id, adoption_date) VALUES ($userId, $animalId, '$adoptionDate')";
    mysqli_query($connect, $insertAdoptionSql);
}

// Handle the form submission for pet adoption
if (isset($_POST['adopt'])) {
    $animalId = $_POST['animal_id'];
    $userId = $_SESSION["user"];

    adoptPet($connect, $userId, $animalId);

    // Refresh the page to reflect the updated status
    header("Location: home.php");
}

$sql = "SELECT * FROM users WHERE id = {$_SESSION["user"]}";

$result = mysqli_query($connect, $sql);

$row = mysqli_fetch_assoc($result);

$sqlProducts = "SELECT * FROM animal";
$resultProducts = mysqli_query($connect, $sqlProducts);

$cards = "";

if (mysqli_num_rows($resultProducts) > 0) {
    while ($rowProduct = mysqli_fetch_assoc($resultProducts)) {
        $adoptionStatus = ($rowProduct["status"] == 1) ? "Available" : "Adopted";
        $buttonText = ($rowProduct["status"] == 1) ? "Take me home" : "Adopted";

        $cards .= "<div class='col-lg-4 col-md-6 col-sm-12 mb-3'>
            <div class='card' style='width: 320px;'>
                <img src='pictures/{$rowProduct["image"]}' class='card-img-top' alt='...' style='height: 440px; object-fit: cover;'>
                <div class='card-body'>
                    <h4 class='card-title'>{$rowProduct["name"]}</h4>
                    <p class='card-text'>Location: {$rowProduct["location"]}</p> 
                    <p class='card-text'>Age: {$rowProduct["age"]}</p> 
                    <p>Size: <a href='sizes.php?size={$rowProduct["size"]}'>{$rowProduct["size"]}</a></p>
                    <p class='card-text'>Description: <br>{$rowProduct["description"]}</p> 
                    <p class='card-text'>Status: {$adoptionStatus}</p>
                    <div class='d-flex justify-content-between'>
                        <form method='post'>
                            <input type='hidden' name='animal_id' value='{$rowProduct["id"]}'>
                            <button type='submit' name='adopt' class='btn btn-primary'>{$buttonText}</button>
                        </form>
                        <a href='details.php?id={$rowProduct["id"]}' class='btn btn-warning'>Details</a>
                    </div>
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
        body {
            background-image: url('pictures/bg_3.jpg');
            background-size: cover;
            background-position: center;
        }

        .white-text {
            color: white;
        }
    </style>

</head>

<body class="text-dark">
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="padding: 20px;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="pictures/<?= $row["picture"] ?>" alt="user pic" width="40" height="30">
                <?= $row["email"] ?> <!-- Add the user's email next to the picture -->
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

    <h2 class="text-center my-5 white-text"><strong>Welcome <?= $row["first_name"] . " " . $row["last_name"] ?></strong></h2>

    <div class="container">
        <div class="row">
            <?= $cards ?>
        </div>
    </div>

    <footer class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid d-flex justify-content-center">
            <div class="text-center p-3" style="font-size: 18px;">
                <strong>© 2023 Copyright: Emelin Bilajbegovic</strong>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
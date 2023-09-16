<?php
require_once "db_connect.php";

$id = $_GET["id"];

$sql = "SELECT * FROM library WHERE id = $id ";
$result = mysqli_query($connect, $sql);

$cards = "";


if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $cards .= "<div style='min-width: 500px; max-width: 700px;'>
            <div class='card border-3'>
                <img src='{$row["image"]}' class='card-img-top mx-3 mt-2' style='width: 200px; height: 250px; object-fit: cover;'>
                <div class='card-body shadow bg-body-tertiary rounded'>
                    <h4 class='card-title'><strong>{$row["title"]}</strong></h4>
                    <p class='card-text style'>Type: {$row["type"]}</p>
                    <hr>
                    <p class='card-text'> <strong>Book is written by: </strong>{$row["author_first_name"]} {$row["author_last_name"]}</p>
                    <p class='card-text'> <strong>ISBN Nr: </strong>{$row["ISBN"]}</p>
                    <p class='card-text'> <strong>Publisher:</strong> <a href='publisher.php?publisher_name={$row["publisher_name"]}'>{$row["publisher_name"]}</a></p>
                    <p class='card-text'> <strong>Published on: </strong>{$row["publisher_date"]}</p>
                    <p class='card-text style'><strong>Description: </strong><br> {$row["short_description"]}</p>
                    <p class='card-text'>";
        if ($row["status"] > 0) {
            $cards .= "<p class='text-success'>Available</p>";
        } else {
            $cards .= "<p class='text-danger'>Reserved</p>";
        }
        $cards .= "</p>
        <a href='index.php' class='btn btn-primary my-2' style='width: auto;'>HOME PAGE</a>
        <a href='update.php?id={$row["id"]}' class='btn btn-success'>Edit</a>
        <a href='delete.php?id={$row["id"]}' class='btn btn-danger'>Delete</a>
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
    <title>Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body class="bg-success text-dark bg-opacity-50" style="height: 200vh">

    <nav class="navbar navbar-expand-lg bg-body-tertiary py-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php" style="font-size: 20px;">Home</a>
                    </li>
                    <!-- Add more menu items below -->
                    <li class="nav-item">
                        <a class="nav-link" href="https://codefactory.wien/en/contact-en/" style="font-size: 20px;" target="_blank">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://codefactory.wien/en/team-en/" style="font-size: 20px;" target="_blank">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://codefactory.wien/en/home-en/" style="font-size: 20px;" target="_blank">Impressium</a>
                    </li>
                </ul>
            </div>
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
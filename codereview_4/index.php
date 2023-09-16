<?php
require_once "db_connect.php";

$sql = "SELECT * FROM library";

$result = mysqli_query($connect, $sql);

$cards = "";

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $cards .= "<div class='col-lg-4 col-md-6 col-sm-12 mb-3'>
            <div class='card' style='width: 320px;'>
                <img src='{$row["image"]}' class='card-img-top' alt='...' style='height: 440px; object-fit: cover;'>
                <div class='card-body shadow bg-body-tertiary rounded'>
                    <h5 class='card-title'>{$row["title"]}</h5>
                    Publisher: <a href='publisher.php?publisher_name={$row["publisher_name"]}'>{$row["publisher_name"]}</a>
                    <p class='card-text'>Author: {$row["author_first_name"]} {$row["author_last_name"]}</p> 
                    <a href='details.php?id={$row["id"]}' class='btn btn-warning'>Details</a>
                    <a href='update.php?id={$row["id"]}' class='btn btn-success'>Edit</a>
                    <a href='delete.php?id={$row["id"]}' class='btn btn-danger'>Delete</a>
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


    <div class="container">
        <a class="btn btn-secondary btn-lg mt-5" href="create.php">Create a new titel</a>
        <div class="d-flex justify-content-center"> <!-- Use d-flex and justify-content-center to center the heading -->
            <h1 class="mt-5 mb-3 text-success-emphasis bg-info-subtle shadow p-3 mb-5 bg-body-tertiary rounded" style="max-width: 250px; padding-left:5px; padding-bottom:5px; text-shadow: 3px 3px 3px gray;">Library List</h1>
        </div>
        <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-1 row-cols-xs-1">
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
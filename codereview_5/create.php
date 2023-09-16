<?php

session_start();

require_once "db_connect.php";
require_once "upload.php";

if (isset($_POST["create"])) {
    $name = $_POST["name"];
    $image = upload($_FILES["image"]);
    $location = str_replace("'", "&#39;", $_POST["location"]);
    $description = str_replace("'", "&#39;", $_POST["description"]);
    $size = $_POST["size"];
    $age = $_POST["age"];
    $vaccinated = $_POST["vaccinated"];
    $breed = $_POST["breed"];
    $status = $_POST["status"];



    $sql = "INSERT INTO `animal` ( `name`, `image`, `location`, `description`, `size`, `age`, `vaccinated`, `breed`, `status`) VALUES ('$name', '$image[0]', '$location', '$description', '$size', '$age','$vaccinated', '$breed','$status')";

    if (mysqli_query($connect, $sql)) {
        echo "Success";
        header("refresh: 3; url = dashboard.php");
    } else {
        echo "Error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Add new animal</title>
    <style>
        body {
            background-image: url('pictures/erol_ahmed.jpg');
            background-size: cover;
            background-position: center;
        }


        .container {
            width: 800px;
        }
    </style>


</head>

<body class="bg-success text-dark bg-opacity-50" style="height: 100vh">

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
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h4 class="m-0">Add a new animal</h4>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control" id="location" name="location">
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image upload</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <div class="mb-3">
                                <label for="size" class="form-label">Size</label>
                                <input type="text" class="form-control" id="size" name="size">
                            </div>
                            <div class="mb-3">
                                <label for="age" class="form-label">Age</label>
                                <input type="text" class="form-control" id="age" name="age">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="vaccinated" class="form-label">Vaccinated</label>
                                <input type="text" class="form-control" id="vaccinated" name="vaccinated">
                            </div>
                            <div class="mb-3">
                                <label for="breed" class="form-label">Breed</label>
                                <input type="text" class="form-control" id="breed" name="breed">
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control" id="status" name="status" value="<?= $row["status"] ?>">
                                    <option value="0">Adopted</option>
                                    <option value="1">Available</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="6"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" name="create" class="btn btn-success btn-lg">Create</button>
                        <a href='dashboard.php' class='btn btn-primary btn-lg ms-2'>Dashboard</a>
                    </div>
                </form>
            </div>
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
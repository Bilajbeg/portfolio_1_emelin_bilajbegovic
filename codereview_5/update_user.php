<?php
require_once "db_connect.php";
require_once "upload.php";

$id = $_GET["id"];

$sql = "SELECT * FROM users WHERE id = $id ";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST["update_user"])) {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $picture = upload($_FILES["picture"]);
    $phone_number = $_POST["phone_number"];
    $address = $_POST["address"];

    if ($_FILES["picture"]["error"] === 4) {
        $sql = "UPDATE users SET first_name='$first_name', last_name='$last_name', phone_number='$phone_number', address='$address' WHERE id=$id";
    } else {
        $sql = "UPDATE users SET first_name='$first_name', last_name='$last_name', picture='$picture[0]', phone_number='$phone_number', address='$address' WHERE id=$id";
    }

    if (mysqli_query($connect, $sql)) {
        echo "<span class='text_1'>Success</span>";
        header("refresh: 3; url = dashboard.php");
    } else {
        echo "<span class='text_1'>Error</span>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Update Users</title>
    <style>
        body {
            background-image: url('pictures/erol_ahmed.jpg');
            background-size: cover;
            background-position: center;

        }

        .container {
            width: 700px;
        }

        .text-success {
            color: yellow;
        }

        .text_1 {
            color: yellow;
            font-size: 26px;
            font-weight: bold;
        }
    </style>


</head>

<body class="bg-success text-dark bg-opacity-50" style="height: 100vh">

    <nav class="navbar navbar-expand-lg bg-body-tertiary py-3">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php" style="font-size: 20px;">Home</a>
                    </li>
                    <!-- Add more menu items below -->
                    <li class="nav-item">
                        <a class="nav-link" href="senior.php" style="font-size: 20px;">Seniors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="junior.php" style="font-size: 20px;">Juniors</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h4 class="m-0">Update the user data</h4>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $row["first_name"] ?>">
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="last_name" class="form-label">Last Name/label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $row["last_name"] ?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="picture" class="form-label">Picture Upload</label>
                        <input type="file" class="form-control" id="picture" name="picture" value="<?= $row["picture"] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="size" class="form-label">Phone number</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= $row["phone_number"] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?= $row["address"] ?>">
                    </div>
                    <button type="submit" name="update_user" class="btn btn-success btn-lg">Update</button>
                    <a href='dashboard.php' class='btn btn-primary btn-lg' style='width: auto;'>Dashboard</a>
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
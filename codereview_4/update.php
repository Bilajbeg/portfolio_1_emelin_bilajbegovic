<?php
require_once "db_connect.php";

$id = $_GET["id"];

$sql = "SELECT * FROM library WHERE id = $id ";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST["update"])) {
    $title = $_POST["title"];
    $image = $_POST["image"];
    $ISBN = $_POST["ISBN"];
    $short_description = str_replace("'", "&#39;", $_POST["short_description"]);
    $type = $_POST["type"];
    $author = $_POST["author_first_name"];
    $author_1 = $_POST["author_last_name"];
    $publisher_name = $_POST["publisher_name"];
    $publisher_adress = $_POST["publisher_adress"];
    $publisher_date = $_POST["publisher_date"];
    $status = $_POST["status"];



    $sql = "UPDATE library SET title='$title', image='$image', ISBN='$ISBN', short_description='$short_description', type='$type', author_first_name='$author', author_last_name='$author_1', publisher_name='$publisher_name', publisher_adress='$publisher_adress', publisher_date='$publisher_date', status='$status' WHERE id=$id";

    if (mysqli_query($connect, $sql)) {
        echo "Success";
        header("refresh: 3; url = index.php");
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
    <title>Create</title>
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
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h4 class="m-0">Update the book</h4>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?= $row["title"] ?>">
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="author_first_name" class="form-label">Author First Name</label>
                            <input type="text" class="form-control" id="author_first_name" name="author_first_name" value="<?= $row["author_first_name"] ?>">
                        </div>
                        <div class="col">
                            <label for="author_last_name" class="form-label">Author Last Name</label>
                            <input type="text" class="form-control" id="author_last_name" name="author_last_name" value="<?= $row["author_last_name"] ?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image URL</label>
                        <input type="text" class="form-control" id="image" name="image" value="<?= $row["image"] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <input type="text" class="form-control" id="type" name="type" value="<?= $row["type"] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="publisher_name" class="form-label">Publisher Name</label>
                        <input type="text" class="form-control" id="publisher_name" name="publisher_name" value="<?= $row["publisher_name"] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="publisher_adress" class="form-label">Publisher Address</label>
                        <input type="text" class="form-control" id="publisher_adress" name="publisher_adress" value="<?= $row["publisher_adress"] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="publisher_date" class="form-label">Publisher Date</label>
                        <input type="date" class="form-control" id="publisher_date" name="publisher_date" value="<?= $row["publisher_date"] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="ISBN" class="form-label">ISBN</label>
                        <input type="text" class="form-control" id="ISBN" name="ISBN" value="<?= $row["ISBN"] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status" value="<?= $row["status"] ?>">
                            <option value="0">Reserved</option>
                            <option value="1">Available</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="short_description" class="form-label">Short Description</label>
                        <textarea class="form-control" id="short_description" name="short_description" rows="6"><?= $row["short_description"] ?></textarea>
                    </div>


                    <button type="submit" name="update" class="btn btn-success btn-lg">Update</button>
                    <a href='index.php' class='btn btn-primary btn-lg' style='width: auto;'>HOME PAGE</a>
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
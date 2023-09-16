<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Size of animals</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body class="bg-success text-dark bg-opacity-50" style="height: 330vh">

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

    <div class="d-flex justify-content-center">
        <h1 class="mt-5 mb-3 text-success-emphasis bg-info-subtle shadow p-3 mb-5 bg-body-tertiary rounded" style="max-width: 300px; padding-left:5px; padding-bottom:5px; text-shadow: 3px 3px 3px gray;">Animal List</h1>
    </div>

    <?php

    require_once "db_connect.php";

    if (isset($_GET['size'])) {
        $size = $_GET['size'];

        $sql = "SELECT * FROM `animal` WHERE `size` = '$size'";
        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "
      <div class='container d-flex justify-content-center'>
      <div class='row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-xs-1'>";

            while ($row = mysqli_fetch_assoc($result)) {
                $name = $row['name'];
                $image = $row['image'];
                $description = $row['description'];
                $location = $row['location'];
                $size = $row['size'];
                echo "
        <div class='card my-2 mx-5' style='width: 20rem;'>
        <img src='pictures/{$row["image"]}' class='card-img-top p-2 pt-3' alt='...' style='width: 220px; height: 300px; object-fit: cover;'>
        <div class='card-body'>
          <h5 class='card-title'>{$row["name"]}</h5>
          <hr>
          <li class='list-group-item'>Location: {$row["location"]}</li>
          <hr>
          <p class='card-text'>Description:<br> {$row["description"]}</p>
          <p class='card-text'>Size: {$row["size"]}</p>
        </div>
        <a href='details.php?id={$row["id"]}' class='btn btn-secondary mb-2' style='width: auto;'>Details</a>
        <a href='home.php' class='btn btn-primary my-2 mb-3' style='width: auto;'>HOME</a>

        </div>";
            }
            echo "
      </div>
      </div>";
        } else {
            echo 'Animal has no Entries.';
        }
    } else {
        echo 'Invalid request.';
    };

    ?>

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
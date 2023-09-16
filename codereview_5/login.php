<?php
session_start();
require_once "db_connect.php";


if (isset($_SESSION["adm"])) {
    header("Location: dashboard.php");
}

if (isset($_SESSION["user"])) {
    header("Location: home.php");
}

$email = $passError = $emailError = "";
$error = false;

function cleanInputs($input)
{
    $data = trim($input); // removing extra spaces, tabs, newlines out of the string
    $data = strip_tags($data); // removing tags from the string
    $data = htmlspecialchars($data); // converting special characters to HTML entities, something like "<" and ">", it will be replaced by "&lt;" and "&gt";

    return $data;
}

if (isset($_POST["login"])) {
    $email = cleanInputs($_POST["email"]);
    $password = $_POST["password"];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // if the provided text is not a format of an email, error will be true
        $error = true;
        $emailError = "Please enter a valid email address";
    }

    // simple validation for the "password"
    if (empty($password)) {
        $error = true;
        $passError = "Password can't be empty!";
    }

    if (!$error) {
        $password = hash("sha256", $password);

        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) == 1) {
            if ($row["status"] == "user") {
                $_SESSION["user"] = $row["id"];
                header("Location: home.php");
            } else {
                $_SESSION["adm"] = $row["id"];
                header("Location: dashboard.php");
            }
        } else {
            echo "<div class='alert alert-danger'>
                <p>Wrong credentials, please try again ...</p>
              </div>";
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        body {
            background-image: url('pictures/erol_ahmed.jpg');
            background-size: cover;
            background-position: center;
        }

        .welcome-text {
            width: 500px;
            background-color: #ffc0cb;
            /* Rose color */
            margin: 50px auto;
            /* Center the div horizontally */
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            font-family: 'Your Custom Font', sans-serif;
            /* Replace 'Your Custom Font' with the font name you want to use */
            font-size: 28px;
        }

        .container {
            max-width: 510px;
            margin: 0 auto;
            padding-top: 100px;
        }

        .card {
            border: none;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            padding: 30px;
            background-color: #fff;
        }

        .form-control:focus {
            box-shadow: none;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .register-link {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="welcome-text">
        <p>Welcome to our pet adoption website</p>
    </div>

    <div class="container">
        <div class="card">
            <h1 class="text-center mb-4">Login page</h1>
            <form method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email address" value="<?= $email ?>">
                    <span class="text-danger"><?= $emailError ?></span>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <span class="text-danger"><?= $passError ?></span>
                </div>
                <button name="login" type="submit" class="btn btn-primary">Login</button>
            </form>
            <a href="register.php" class="register-link">Don't have an account? Register here</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>







<!-- <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login page </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center m-3"><strong>Login page</strong></h1>
        <form method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email address </label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email address" value="<?= $email ?>">
                <span class="text-danger"><?= $emailError ?></span>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <span class="text-danger"><?= $passError ?></span>
            </div>
            <button name="login" type="submit" class="btn btn-primary">Login</button>

            <span>You don't have an account? <a href="register.php">Register Here </a></span>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html> -->
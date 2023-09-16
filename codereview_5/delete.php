<?php
require_once "db_connect.php";

$id = $_GET["id"];

$sql = "DELETE FROM `animal` WHERE id = $id";
$sql = "DELETE FROM `users` WHERE id = $id";

if (mysqli_query($connect, $sql)) {
    header("location: dashboard.php");
} else {
    echo "Error";
}

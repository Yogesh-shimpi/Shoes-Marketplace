<?php
$conn = mysqli_connect("localhost", "root", "", "shoes_marketplace");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
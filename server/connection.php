<?php
$conn = mysqli_connect("localhost", "root", "", "watch");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

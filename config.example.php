<?php
// Example only.
// Do NOT put real password in GitHub.

$host = "localhost";
$username = "YOUR_DATABASE_USERNAME";
$password = "YOUR_DATABASE_PASSWORD";
$database = "YOUR_DATABASE_NAME";

// This folder will be created in cPanel later.
// Example: /home/yourcpanelusername/private_fruit_images
$private_image_folder = "/home/YOUR_CPANEL_USERNAME/private_fruit_images";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    error_log("Database connection failed: " . $conn->connect_error);
    die("Something went wrong.");
}

$conn->set_charset("utf8mb4");
?>

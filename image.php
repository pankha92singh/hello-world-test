<?php
require_once __DIR__ . '/config.php';

if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    http_response_code(400);
    exit("Invalid request.");
}

$id = (int) $_GET['id'];

$stmt = $conn->prepare("SELECT image_file FROM people WHERE id = ?");
if (!$stmt) {
    error_log("Prepare failed: " . $conn->error);
    http_response_code(500);
    exit("Something went wrong.");
}

$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 0) {
    http_response_code(404);
    exit("Image not found.");
}

$row = $result->fetch_assoc();

// basename protects against folder tricks like ../../config.php
$image_file = basename($row['image_file']);

$folder = rtrim($private_image_folder, '/');
$file_path = $folder . '/' . $image_file;

$real_folder = realpath($folder);
$real_file = realpath($file_path);

if (!$real_folder || !$real_file || strpos($real_file, $real_folder) !== 0 || !is_file($real_file)) {
    http_response_code(404);
    exit("Image not found.");
}

$extension = strtolower(pathinfo($real_file, PATHINFO_EXTENSION));

if ($extension === "svg") {
    header("Content-Type: image/svg+xml");
} elseif ($extension === "jpg" || $extension === "jpeg") {
    header("Content-Type: image/jpeg");
} elseif ($extension === "png") {
    header("Content-Type: image/png");
} else {
    http_response_code(403);
    exit("File type not allowed.");
}

header("X-Content-Type-Options: nosniff");
readfile($real_file);
exit;
?>

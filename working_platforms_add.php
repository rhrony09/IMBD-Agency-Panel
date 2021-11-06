<?php
include 'includes/session.php';

if (isset($_POST['add'])) {
    $platform_name = $_POST['platform_name'];

    $sql = "INSERT INTO working_platforms (social_media) VALUES ('$platform_name')";
    if ($conn->query($sql)) {
        $_SESSION['success'] = $platform_name . ' added successfully';
    } else {
        $_SESSION['error'] = $conn->error;
    }
} else {
    $_SESSION['error'] = 'Fill up the form first';
}

header('location: working_platforms.php');

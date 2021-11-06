<?php
include 'includes/session.php';

if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM working_platforms WHERE id = '$id'";
    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Platform deleted successfully';
    } else {
        $_SESSION['error'] = $conn->error;
    }
} else {
    $_SESSION['error'] = 'Select Platform to delete first';
}

header('location: working_platforms.php');

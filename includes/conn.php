<?php
$conn = new mysqli('localhost', 'root', '', 'panel');

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

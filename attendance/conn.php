<?php

$conn = new mysqli('localhost', 'root', '', 'hris_applied_thermal');

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

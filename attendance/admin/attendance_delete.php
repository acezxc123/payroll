<?php
include 'includes/session.php';

if (isset($_POST['delete'])) {
	$id = $_POST['id'];
	$sql = "DELETE FROM attendance WHERE collab_id = '$id'";
	$sql2 = "DELETE FROM hectare_employee WHERE collab_id = '$id'";
	if ($conn->query($sql)) {
		$_SESSION['success'] = 'Attendance deleted successfully';
	} else {
		$_SESSION['error'] = $conn->error;
	}
	if ($conn->query($sql2)) {
		// $_SESSION['success'] = 'Hectare deleted successfully';
	} else {
		$_SESSION['error'] = $conn->error;
	}
} else {
	$_SESSION['error'] = 'Select item to delete first';
}

header('location: attendance.php');

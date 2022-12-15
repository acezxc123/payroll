<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		date_default_timezone_set('Asia/Manila');

		$id = $_POST['id'];
		$date = $_POST['edit_date'];
		$time_in = $_POST['edit_time_in'];
		$time_in = date('H:i:s', strtotime($time_in));
		$time_out = $_POST['edit_time_out'];
		$time_out = date('H:i:s', strtotime($time_out));

		$sql = "UPDATE attendance SET date = '$date', time_in = '$time_in', time_out = '$time_out' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Attendance updated successfully';

			$sql = "SELECT * FROM attendance WHERE id = '$id'";
			$query = $conn->query($sql);
			$row = $query->fetch_assoc();
			$emp = $row['employee_id'];

			$sql = "SELECT * FROM employees LEFT JOIN schedules ON schedules.id=employees.schedule_id WHERE employees.id = '$emp'";
			$query = $conn->query($sql);
			$srow = $query->fetch_assoc();
			
			// date of employee time in
			$date = $row['date'];

			// get time in of employee
			$time_in = $row['time_in'];
			// get time out of employee
			$time_out = $row['time_out'];
			
			// variables for time in and time out
			$time__in = $time_in;
			$time__out = $time_out;

			// full format of time in and time out
			$full_date1 = $date . ' ' . $time__in;
			$full_date2 = $date . ' ' . $time__out;	

			// convert to strtotime
			$timestamp1 = strtotime($full_date1);
			$timestamp2 = strtotime($full_date2);

			$int = abs($timestamp1 - $timestamp2)/(60*60);

			//updates
			$logstatus = ($time_in > $srow['time_in']) ? 0 : 1;

			// if($srow['time_in'] > $time_in){
			// 	$time_in = $srow['time_in'];
			// }

			// if($srow['time_out'] < $time_out){
			// 	$time_out = $srow['time_out'];
			// }

			// $time_in = new DateTime($time_in);
			// $time_out = new DateTime($time_out);
			// $interval = $time_in->diff($time_out);
			// $hrs = $interval->format('%h');
			// $mins = $interval->format('%i');
			// $mins = $mins/60;
			// $int = $hrs + $mins;
			// if($int > 4){
			// 	$int = $int - 1;
			// }


			$sql = "UPDATE attendance SET num_hr = '$int', status = '$logstatus' WHERE id = '$id'";
			$conn->query($sql);
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:attendance.php');

?>
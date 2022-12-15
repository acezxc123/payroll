<?php
if (isset($_POST['employee'])) {
	$output = array('error' => false);

	include 'conn.php';
	include 'timezone.php';

	function genRandomStringID($length = 10)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	$collab_id = genRandomStringID();

	$employee = $_POST['employee'];
	$status = $_POST['status'];

	$sql = "SELECT * FROM employees WHERE employee_id = '$employee'";
	$query = $conn->query($sql);

	if ($query->num_rows > 0) {
		$row = $query->fetch_assoc();
		$id = $row['emp_id'];

		$date_now = date('Y-m-d');

		if ($status == 'in') {
			$sql = "SELECT * FROM attendance WHERE employee_id = '$id' AND date = '$date_now' AND time_in IS NOT NULL";
			$query = $conn->query($sql);
			if ($query->num_rows > 0) {
				$output['error'] = true;
				$output['message'] = 'You have timed in for today';
			} else {

				// fetch hectare default price
				$sql2 = "SELECT * FROM hectare_price";
				$query = $conn->query($sql2);
				$drow = $query->fetch_assoc();
				$hectare_price = $drow['price'];

				//updates
				$sched = $row['schedule_id'];
				$lognow = date('H:i:s');
				$sql = "SELECT * FROM schedules WHERE id = '$sched'";
				$squery = $conn->query($sql);
				$srow = $squery->fetch_assoc();
				$logstatus = ($lognow > $srow['time_in']) ? 0 : 1;
				$sql = "INSERT INTO attendance (employee_id, date, time_in, status, status2, collab_id) VALUES ('$id', '$date_now', DATE_ADD( NOW(), INTERVAL 24 HOUR ), '$logstatus', 'in', '$collab_id')";
				if ($conn->query($sql)) {
					$output['message'] = 'Time in: ' . $row['first_name'] . ' ' . $row['last_name'];
				} else {
					$output['error'] = true;
					$output['message'] = $conn->error;
				}

				// add hectare
				$firstname = $row['first_name'];
				$lastname = $row['last_name'];
				$sql2 = "INSERT INTO hectare_employee (employee_id, firstname, lastname, hectare, employee_salary, date, collab_id) VALUES ('$id', '$firstname', '$lastname', 1, '$hectare_price', '$date_now', '$collab_id')";
				if ($conn->query($sql2)) {
					// done
				} else {
					$output['error'] = true;
					$output['message'] = $conn->error;
				}
			}
		} else {
			$sql = "SELECT *, attendance.id AS uid FROM attendance LEFT JOIN employees ON employees.emp_id=attendance.employee_id WHERE attendance.employee_id = '$id' AND date = '$date_now'";
			$query = $conn->query($sql);
			if ($query->num_rows < 1) {
				$output['error'] = true;
				$output['message'] = 'Cannot Timeout. No time in.';
			} else {
				$row = $query->fetch_assoc();
				if ($row['time_out'] != '00:00:00') {
					$output['error'] = true;
					$output['message'] = 'You have timed out for today';
				} else {

					$sql = "UPDATE attendance SET time_out = NOW() WHERE id = '" . $row['uid'] . "'";
					if ($conn->query($sql)) {
						$output['message'] = 'Time out: ' . $row['firstname'] . ' ' . $row['lastname'];

						$sql = "SELECT * FROM attendance WHERE id = '" . $row['uid'] . "'";
						$query = $conn->query($sql);
						$urow = $query->fetch_assoc();

						$time_in = $urow['time_in'];
						$time_out = $urow['time_out'];

						$sql = "SELECT * FROM employees LEFT JOIN schedules ON schedules.id=employees.schedule_id WHERE employees.emp_id = '$id'";
						$query = $conn->query($sql);
						$srow = $query->fetch_assoc();

						$date = $urow['date'];

						$full_date1 = $date . ' ' . $time_in;
						$full_date2 = $date . ' ' . $time_out;

						// convert to strtotime
						$timestamp1 = strtotime($full_date1);
						$timestamp2 = strtotime($full_date2);

						$int = abs($timestamp1 - $timestamp2) / (60 * 60);

						// if($srow['time_in'] > $urow['time_in']){
						// 	$time_in = $srow['time_in'];
						// }

						// if($srow['time_out'] < $urow['time_in']){
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

						$sql = "UPDATE attendance SET status2 = 'out', num_hr = '$int' WHERE id = '" . $row['uid'] . "'";
						$conn->query($sql);
					} else {
						$output['error'] = true;
						$output['message'] = $conn->error;
					}
				}
			}
		}
	} else {
		$output['error'] = true;
		$output['message'] = 'Employee ID not found';
	}
}

echo json_encode($output);

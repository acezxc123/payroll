<?php require_once(dirname(__FILE__) . '../hris_at_config.php'); 
if ( !isset($_SESSION['Admin_ID']) || $_SESSION['Login_Type'] != 'admin' ) {
   	header('location:' . BASE_URL);
} 





					?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title>Attendance - Payroll</title>
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>plugins/datatables/dataTables.bootstrap.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>plugins/datatables/jquery.dataTables_themeroller.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>dist/css/AdminLTE.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>dist/css/skins/_all-skins.min.css">

	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		
		<?php require_once(dirname(__FILE__) . '/partials/topnav.php'); ?>

		<?php require_once(dirname(__FILE__) . '/partials/sidenav.php'); ?>

		<div class="content-wrapper">
			<section class="content-header">
				<h1>
					Attendance
				</h1>
				<ol class="breadcrumb">
					<li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Attendance</li>
				</ol>
			</section>

			<section class="content">
				<div class="row">
        			<div class="col-xs-12">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Employee Attendance</h3>
								<?php $qry = $db->query("SELECT * from `wy_admin` where admin_id='".isset($_SESSION['Admin_ID'])."'");
								while($row = $qry->fetch_assoc()):
									?>
									<input type="hidden" id="company" value="<?php echo $row['company']?>">
								<?php endwhile; ?>
							</div>
							<div class="box-body">
								<div class="table-responsiove">
									<table id="attendancemod" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>DATE</th>
												<th>EMP CODE</th>
												<th>NAME</th>
												<th>TIME-IN</th>
												<th>TIME-OUT</th>
												<th>WORK HOURS</th>
											</tr>
										</thead>
										<tbody>
										<?php $qry = $db->query("SELECT * from `attendance` left join `employees` on attendance.employee_id=employees.emp_id");
										while($row = $qry->fetch_assoc()):
									    ?>
									    <tr>
									    	<td><?php echo date('M d, Y',strtotime($row['date']))?></td>
									    	<td><?php echo $row['emp_code']?></td>
									    	<td><?php echo $row['first_name'].' '.$row['last_name']?></td>
									    	<td><?php echo $row['time_in']?></td>
									    	<td><?php echo $row['time_out']?></td>
									    	<td><?php echo number_format($row['num_hr'],2)?></td>
									    </tr>

									<?php endwhile; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>

		
	</div>

	<script src="<?php echo BASE_URL; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
	<script src="<?php echo BASE_URL; ?>bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
	<script src="<?php echo BASE_URL; ?>dist/js/app.min.js"></script>
	<script type="text/javascript">var baseurl = '<?php echo BASE_URL; ?>';</script>
	<script src="<?php echo BASE_URL; ?>dist/js/script_ts.js?rand=<?php echo rand(); ?>"></script>
</body>
</html>
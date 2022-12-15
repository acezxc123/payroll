<?php
$page_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');

global $userData;
$attendanceSQL = mysqli_query($db, "SELECT * FROM `" . DB_PREFIX . "attendance` WHERE `emp_code` = '" . $userData['emp_code'] . "' AND `attendance_date` = '" . date('Y-m-d') . "'");
if ( $attendanceSQL ) {
	$attendanceROW = mysqli_num_rows($attendanceSQL);
	if ( $attendanceROW == 0 ) {
		$action_name = 'Log In';
	} else {
		$attendanceDATA = mysqli_fetch_assoc($attendanceSQL);
		if ( $attendanceDATA['action_name'] == 'punchin' ) {
			$action_name = 'Log Out';
		} else {
			$action_name = 'Log In';
		}
	}
} else {
	$attendanceROW = 0;
	$action_name = 'Log In';
} ?>

<aside class="main-sidebar">
	<section class="sidebar">
		<div class="user-panel">
			<div class="pull-left image">
					<img src="<?php echo BASE_URL; ?>dist/img/admin.png" class="img-circle" alt="User Image">

			</div>
			<div class="pull-left info">
					<p><?php echo $userData['admin_name']; ?></p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		<!-- <?php if ( $_SESSION['Login_Type'] != 'admin' ) { ?>
			<?php if ( $attendanceROW < 2 ) { ?>
				<form method="POST" class="employee sidebar-form" role="form" id="attendance-form">
	                <div class="">
	                	    <center>
	                    	<button type="submit" id="action_btn" class="btn btn-warning"><?php echo $action_name; ?></button>
	                    	</center>
	                </div>
	            </form>
	        <?php } ?>
	    <?php } ?> -->

		<ul class="sidebar-menu">
			<li class="header">EMPLOYEE MANAGEMENT</li>
			<?php if ( $_SESSION['Login_Type'] == 'admin' && $userData['company'] == 1) { ?>
<!-- 				<li class="<?php echo $page_name == "attendance_ts" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>attendance_ts/">
						<i class="fa fa-calendar"></i> <span>Attendance</span>
					</a>
				</li> -->
				<li class="<?php echo $page_name == "dashboard_ts" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>dashboard_ts/">
						<i class="fa fa-users"></i> <span>Dashboard</span>
					</a>
				</li>
				<li class="<?php echo $page_name == "employees_ts" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>employees_ts/">
						<i class="fa fa-users"></i> <span>Employees</span>
					</a>
				</li>
			    <li class="<?php echo $page_name == "users_ts" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>users_ts/">
						<i class="fa fa-users"></i> <span>Users Access</span>
					</a>
				</li>
				<li class="<?php echo $page_name == "department_ts" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>department_ts/">
						<i class="fa fa-users"></i> <span>Department</span>
					</a>
				</li>
				<li class="<?php echo $page_name == "branch_ts" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>branch_ts/">
						<i class="fa fa-users"></i> <span>Branch</span>
					</a>
				</li>
		        <li class="header">TRAININGS & MANAGEMENT</li>
				<li class="<?php echo $page_name == "trainings_ts" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>trainings_ts/">
						<i class="fa fa-calendar"></i> <span>Trainings</span>
					</a>
				</li>
			    <li class="header">PAYROLL</li>
				<li class="<?php echo $page_name == "salaries_ts" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>salaries_ts/">
						<i class="fa fa-money"></i> <span>Salary Slips</span>
					</a>
				</li>
				<li class="<?php echo $page_name == "leaves_ts" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>leaves_ts/">
						<i class="fa fa-sign-out"></i> <span>Leave Management</span>
					</a>
				</li>
				<li></li>
				<li class="<?php echo $page_name == "payheads_ts" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>payheads_ts/">
						<i class="fa fa-gratipay"></i> Pay Heads
					</a>
				</li>
				<li class="<?php echo $page_name == "holidays_ts" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>holidays_ts/">
						<i class="fa fa-calendar-check-o"></i> <span>List Holidays</span>
					</a>
				</li>
				
			<?php } else if( $_SESSION['Login_Type'] == 'admin' && $userData['company'] == 2) { ?>
				<li class="<?php echo $page_name == "dashboard_at" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>dashboard_at/">
						<i class="fa fa-home"></i> <span>Dashboard</span>
					</a>
				</li>
				<li class="<?php echo $page_name == "employees_at" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>employees_at/">
						<i class="fa fa-users"></i> <span>Employees</span>
					</a>
				</li>
				<li class="<?php echo $page_name == "attendance_list" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>attendance_list/">
						<i class="fa fa-calendar"></i> <span>Attendance</span>
					</a>
				</li>
			    <li class="<?php echo $page_name == "users_at" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>users_at/">
						<i class="fa fa-users"></i> <span>Users Access</span>
					</a>
				</li>
				<li class="<?php echo $page_name == "department_at" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>department_at/">
						<i class="fa fa-list"></i> <span>Department</span>
					</a>
				</li>
				<li class="<?php echo $page_name == "branch_at" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>branch_at/">
						<i class="fa fa-list"></i> <span>Branch</span>
					</a>
				</li>
			  <!--   <li class="header">COMPANY PROFILE</li> -->
			    <!-- <li class="<?php echo $page_name == "trainings_at" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>trainings_at/">
						<i class="fa fa-calendar"></i> <span>Company Profile</span>
					</a>
				</li> -->
		        <li class="header">TRAININGS & MANAGEMENT</li>
				<li class="<?php echo $page_name == "trainings_at" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>trainings_at/">
						<i class="fa fa-calendar"></i> <span>Trainings</span>
					</a>
				</li>
			    <li class="header">PAYROLL</li>
				<li class="<?php echo $page_name == "salaries_at" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>salaries_at/">
						<i class="fa fa-money"></i> <span>Salary Slips</span>
					</a>
				</li>
				<li class="<?php echo $page_name == "leaves_at" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>leaves_at/">
						<i class="fa fa-sign-out"></i> <span>Leave Management</span>
					</a>
				</li>
				<li></li>
				<li class="<?php echo $page_name == "payheads_at" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>payheads_at/">
						<i class="fa fa-gratipay"></i> Pay Heads
					</a>
				</li>
				<li class="<?php echo $page_name == "holidays_at" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>holidays_at/">
						<i class="fa fa-calendar-check-o"></i> <span>List Holidays</span>
					</a>
				</li>
			<?php } else if($_SESSION['Login_Type'] == 'hr-head' && $userData['company'] == 2) { ?>
				<li class="<?php echo $page_name == "dashboard_at" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>dashboard_at/">
						<i class="fa fa-home"></i> <span>Dashboard</span>
					</a>
				</li>
				<li class="<?php echo $page_name == "employees_at" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>employees_at/">
						<i class="fa fa-users"></i> <span>Employees</span>
					</a>
				</li>
				<li class="<?php echo $page_name == "attendance_list" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>attendance_list/">
						<i class="fa fa-calendar"></i> <span>Attendance</span>
					</a>
				</li>
			    <li class="<?php echo $page_name == "users_at" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>users_at/">
						<i class="fa fa-users"></i> <span>Users Access</span>
					</a>
				</li>
				<li class="<?php echo $page_name == "department_at" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>department_at/">
						<i class="fa fa-list"></i> <span>Department</span>
					</a>
				</li>
				<li class="<?php echo $page_name == "branch_at" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>branch_at/">
						<i class="fa fa-list"></i> <span>Branch</span>
					</a>
				</li>
				 <li class="header">TRAININGS & MANAGEMENT</li>
				<li class="<?php echo $page_name == "trainings_at" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>trainings_at/">
						<i class="fa fa-calendar"></i> <span>Trainings</span>
					</a>
				</li>


			<?php } else if($_SESSION['Login_Type'] == 'hr-assistant' || $_SESSION['Login_Type'] == 'hr-officer' && $userData['company'] == 2) { ?>
			   	<li class="<?php echo $page_name == "dashboard_at" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>dashboard_at/">
						<i class="fa fa-home"></i> <span>Dashboard</span>
					</a>
				</li>
				<li class="<?php echo $page_name == "employees_at" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>employees_at/">
						<i class="fa fa-users"></i> <span>Employees</span>
					</a>
				</li>
				 <li class="header">PAYROLL</li>
				<li class="<?php echo $page_name == "salaries_at" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>salaries_at/">
						<i class="fa fa-money"></i> <span>Salary Slips</span>
					</a>
				</li>
				<li class="<?php echo $page_name == "leaves_at" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>leaves_at/">
						<i class="fa fa-sign-out"></i> <span>Leave Management</span>
					</a>
				</li>
				<li></li>
				<li class="<?php echo $page_name == "payheads_at" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>payheads_at/">
						<i class="fa fa-gratipay"></i> Pay Heads
					</a>
				</li>
				<li class="<?php echo $page_name == "holidays_at" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>holidays_at/">
						<i class="fa fa-calendar-check-o"></i> <span>List Holidays</span>
					</a>
				</li>
			<?php } ?>
			    <li class="header">REPORTS</li>
				<li class="<?php echo $page_name == "emp_list" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>emp_list/">
						<i class="fa fa-list"></i> <span>Employee List</span>
					</a>
				</li>
			    <li class="<?php echo $page_name == "hmdf" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>hmdf/">
						<i class="fa fa-list"></i> <span>HMDF</span>
					</a>
				</li>
				 <li class="<?php echo $page_name == "sss" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>sss/">
						<i class="fa fa-list"></i> <span>SSS</span>
					</a>
				</li>
				 <li class="<?php echo $page_name == "philhealth" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>philhealth/">
						<i class="fa fa-list"></i> <span>Philhealth</span>
					</a>
				</li>
				 <li class="<?php echo $page_name == "journal" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>journal/">
						<i class="fa fa-list"></i> <span>Journal</span>
					</a>
				</li>
				<li class="<?php echo $page_name == "payroll_register" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>payroll_register/">
						<i class="fa fa-list"></i> <span>Payroll Register</span>
					</a>
				</li>
				<li class="<?php echo $page_name == "bir" ? 'active' : ''; ?>">
					<a href="<?php echo BASE_URL; ?>bir/">
						<i class="fa fa-list"></i> <span>BIR</span>
					</a>
				</li>


		</ul>
	</section>
</aside>

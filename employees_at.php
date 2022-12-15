<?php require_once(dirname(__FILE__) . '/hris_at_config.php'); 
if ( !isset($_SESSION['Admin_ID'])) {
   	header('location:' . BASE_URL);
} 

if (isset($_POST['upload'])) {

	$emp_id = stripslashes($_POST['emp_id']);
    $first_name = stripslashes($_POST['first_name']);
    $last_name = stripslashes($_POST['last_name']);
    $dob = stripslashes($_POST['dob']);
    $gender = stripslashes($_POST['gender']);
    $merital_status = stripslashes($_POST['merital_status']);
    $nationality = stripslashes($_POST['nationality']);
    $contact = stripslashes($_POST['contact']);
    $city = stripslashes($_POST['city']);
    $address = stripslashes($_POST['address']);
    $state = stripslashes($_POST['state']);
    $country = stripslashes($_POST['country']);
    $email = stripslashes($_POST['email']);
    $salary = stripslashes($_POST['salary']);





    $mid_name = stripslashes($_POST['mid_name']);
    $position = stripslashes($_POST['position']);
    $dept = stripslashes($_POST['dept']);
    $branch = stripslashes($_POST['branch']);
    $sss = stripslashes($_POST['sss']);
    $tin = stripslashes($_POST['tin']);
    $pagbig = stripslashes($_POST['pagbig']);
    $gsis = stripslashes($_POST['gsis']);
    $d_hired = stripslashes($_POST['d_hired']);
    $elementary = stripslashes($_POST['elementary']);
    $secondary = stripslashes($_POST['secondary']);
    $vocational = stripslashes($_POST['vocational']);
    $graduate = stripslashes($_POST['graduate']);
    $work_exp = stripslashes($_POST['work_exp']);


 
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./image/" . $filename;

$insertHoliday = mysqli_query($db, "INSERT INTO `employees`(`emp_code`,`employee_id`,`first_name`,`last_name`,`dob`,`gender`,`merital_status`,`nationality`,`address`,`city`,`state`,`country`,`email`,`mobile`,`middle_name`,`position`,`department`,`branch`,`gsis`,`sss`,`tin`,`pagibig`,`photo`)VALUES ('$emp_id','$emp_id','$first_name','$last_name','$dob','$gender','$merital_status','$nationality','$address','$city','$state','$country','$email','$contact','$mid_name','$position','$dept','$branch','$gsis','$sss','$tin','$pagbig','$filename')");

 
    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        echo '<script>alert("Successfully saved!")</script>';
    } else {
        echo '<script>alert("Error Saving")</script>';
    }
}

// =============================================================
if (isset($_POST['updateemp'])) {

	$emp_id = stripslashes($_POST['emp_code']);
    $first_name = stripslashes($_POST['first_name']);
    $last_name = stripslashes($_POST['last_name']);
    $dob = stripslashes($_POST['dob']);
    $gender = stripslashes($_POST['gender']);
    $merital_status = stripslashes($_POST['merital_status']);
    $nationality = stripslashes($_POST['nationality']);
    $address = stripslashes($_POST['address']);
    $city = stripslashes($_POST['city']);
    $state = stripslashes($_POST['state']);
    $country = stripslashes($_POST['country']);
    $email = stripslashes($_POST['email']);
    $position = stripslashes($_POST['position']);
    $dept = stripslashes($_POST['dept']);
    $branch = stripslashes($_POST['branch']);
    $sss = stripslashes($_POST['sss']);
    $tin = stripslashes($_POST['tin']);
    $pagbig = stripslashes($_POST['pagbig']);
    $gsis = stripslashes($_POST['gsis']);
    $d_hired = stripslashes($_POST['d_hired']);
    $elementary = stripslashes($_POST['elementary']);
    $secondary = stripslashes($_POST['secondary']);
    $vocational = stripslashes($_POST['vocational']);
    $graduate = stripslashes($_POST['graduate']);
    $work_exp = stripslashes($_POST['work_exp']);


 
    $filename = $_FILES["uploadfilen"]["name"];
    $tempname = $_FILES["uploadfilen"]["tmp_name"];
    $folder = "./image/" . $filename;

$insertHoliday = mysqli_query($db, "UPDATE `employees` SET `first_name` = '$first_name', `last_name` = '$last_name', `dob` = '$dob', `gender` = '$gender', `merital_status` = '$merital_status', `nationality` = '$nationality', `address` = '$address', `city` = '$city', `state` = '$state', `country` = '$country', `email` = '$email',`position` = '$position',`department` = '$dept',`branch` = '$branch',`sss` = '$sss',`tin` = '$tin',`pagibig` = '$pagbig',`gsis` = '$gsis',`d_hired` = '$d_hired',`elementary` = '$elementary',`secondary` = '$secondary',`vocational` = '$vocational',`graduate` = '$graduate',`work_exp` = '$work_exp',`photo` = '$filename' WHERE `emp_code`='$emp_id'");

 
    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        echo '<script>alert("Successfully saved!")</script>';
    } else {
        echo '<script>alert("Error Saving!")</script>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<title>Employees - Payroll</title>

	<link rel="stylesheet" href="<?php echo BASE_URL; ?>bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>plugins/datatables/dataTables.bootstrap.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>plugins/datatables/jquery.dataTables_themeroller.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>dist/css/AdminLTE.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>plugins/datepicker/datepicker3.css">
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
					Employees
				</h1>
				<ol class="breadcrumb">
					<li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Employees</li>
				</ol>
			</section>

			<section class="content">
				<div class="row">
        			<div class="col-xs-12">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">All Employee List</h3>

									<button type="button" class="btn btn-xs btn-primary pull-right" data-toggle="modal" data-target="#AddEmpModal">
										<i class="fa fa-plus"></i> Add Employee
									</button>
								<?php $qry = $db->query("SELECT * from `wy_admin` where admin_id='".isset($_SESSION['Admin_ID'])."'");
								while($row = $qry->fetch_assoc()):
									?>
									<input type="hidden" id="company" value="<?php echo $row['company']?>">
								<?php endwhile; ?>
							</div>
							  <ul class="nav nav-tabs">
							    <li class="active"><a data-toggle="tab" href="#home">Thermal Solutions Inc</a></li>
							    <li><a data-toggle="tab" href="#menu1">Maglev Air-Conditioning Company</a></li>
							    <li><a data-toggle="tab" href="#menu2">TS-I Energy Solutions Corp.</a></li>
							    <li><a data-toggle="tab" href="#menu3">Thermal Aircon Solutions Corp.</a></li>
							     <li><a data-toggle="tab" href="#menu4">Applied Thermal Technology Solutions Corp.</a></li>
							  </ul>

						     
							  <!-- ====================================== -->
							  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
     <div class="table-responsiove">
									<table id="employees" class="table table-bordered table-striped" style="overflow-x: scroll;">
										<thead>
											<tr>
												<th>ID#</th>
												<th>BRANCH</th>
												<th>IMAGE</th>
												<th>NAME</th>
												<th>EMAIL</th>
												<th>CONTACT</th>
												<th width="6%">ACTION</th>
											</tr>
										</thead>
									</table>
								</div>
    </div>
    <div id="menu1" class="tab-pane fade">
     <div class="table-responsiove">
									<table id="employees1" class="table table-bordered table-striped" style="overflow-x: scroll;">
										<thead>
											<tr>
												<th>ID#</th>
												<th>BRANCH</th>
												<th>IMAGE</th>
												<th>NAME</th>
												<th>EMAIL</th>
												<th>CONTACT</th>
												<th width="6%">ACTION</th>
											</tr>
										</thead>
									</table>
								</div>
    </div>
    <div id="menu2" class="tab-pane fade">
      <div class="table-responsiove">
									<table id="employees2" class="table table-bordered table-striped" style="overflow-x: scroll;">
										<thead>
											<tr>
												<th>ID#</th>
												<th>BRANCH</th>
												<th>IMAGE</th>
												<th>NAME</th>
												<th>EMAIL</th>
												<th>CONTACT</th>
												<th width="6%">ACTION</th>
											</tr>
										</thead>
									</table>
								</div>
    </div>
    <div id="menu3" class="tab-pane fade">
      <div class="table-responsiove">
									<table id="employees3" class="table table-bordered table-striped" style="overflow-x: scroll;">
										<thead>
											<tr>
												<th>ID#</th>
												<th>BRANCH</th>
												<th>IMAGE</th>
												<th>NAME</th>
												<th>EMAIL</th>
												<th>CONTACT</th>
												<th width="6%">ACTION</th>
											</tr>
										</thead>
									</table>
								</div>
    </div>
     <div id="menu4" class="tab-pane fade">
      <div class="table-responsiove">
									<table id="employees4" class="table table-bordered table-striped" style="overflow-x: scroll;">
										<thead>
											<tr>
												<th>ID#</th>
												<th>BRANCH</th>
												<th>IMAGE</th>
												<th>NAME</th>
												<th>EMAIL</th>
												<th>CONTACT</th>
												<th width="6%">ACTION</th>
											</tr>
										</thead>
									</table>
								</div>
    </div>
  </div>

						     <!-- =============================== -->


							
						</div>
					</div>
				</div>
			</section>
		</div>

		<div class="modal fade in" id="SalaryMonthModal" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title">Generate Payslip</h4>
					</div>
					<div class="modal-body">
						<div class="row">

								<div class="col-sm-3 <?php echo ($month == date('F') && $years[$key] == date('Y')) ? 'bg-danger' : ''; ?>">
									<a data-month="<?php echo date('F'); ?>" data-year="<?php echo date('Y'); ?>" data-cutoff="1" href="#">
									   1st<br>CUT-OFF
									</a>
								</div>
								<div class="col-sm-3 <?php echo ($month == date('F') && $years[$key] == date('Y')) ? 'bg-danger' : ''; ?>">
									<a data-month="<?php echo date('F'); ?>" data-year="<?php echo date('Y'); ?>" data-cutoff="2" href="#">
									   2nd<br>CUT-OFF
									</a>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade in" id="ManageModal" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title text-center">Add Payheads to Employee</h4>
					</div>
					<form method="post" role="form" data-toggle="validator" id="assign-payhead-form">
						<?php $qry = $db->query("SELECT * from `wy_admin` where admin_id='".isset($_SESSION['Admin_ID'])."'");
								while($row = $qry->fetch_assoc()):
									?>
									<input type="text" id="company" value="<?php echo $row['company']?>">
								<?php endwhile; ?>
						<div class="modal-body">
							<div class="row">
								<div class="col-sm-4">
									<label for="all_payheads">List of Pay Heads</label>
									<button type="button" id="selectHeads" class="btn btn-success btn-xs pull-right"><i class="fa fa-arrow-circle-right"></i></button>
									<select class="form-control" id="all_payheads" name="all_payheads[]" multiple size="10"></select>
								</div>
								<div class="col-sm-4">
									<label for="selected_payheads">Selected Pay Heads</label>
									<button type="button" id="removeHeads" class="btn btn-danger btn-xs pull-right"><i class="fa fa-arrow-circle-left"></i></button>
									<select class="form-control" id="selected_payheads" name="selected_payheads[]" data-error="Pay Heads is required" multiple size="10" required></select>
								</div>
								<div class="col-sm-4">
									<label for="selected_payamount">Enter Payhead Amount</label>
									<div id="selected_payamount"></div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<input type="hidden" name="empcode" id="empcode" />
							<button type="submit" name="submit" class="btn btn-primary">Add Pay Heads to Employee</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="modal fade in" id="AddEmpModal" tabindex="-1">
				<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title">Employee Details</h4>
					</div>

									<div class="modal-body">
		
       <form method="POST" action="" enctype="multipart/form-data">
       	<div class="form-group">
								<div class="row">
									<div class="col-sm-12" style="margin-bottom:10px;">
										<label for="emp_id">Emp. ID</label>
										<input type="text" class="form-control" name="emp_id" id="emp_id" required />
									</div>
									<div class="col-sm-4">
										<label for="first_name">First Name</label>
										<input type="text" class="form-control" name="first_name" id="first_name" required />
									</div>
									<div class="col-sm-4">
										<label for="last_name">Last Name</label>
										<input type="text" class="form-control" name="last_name" id="last_name" required />
									</div>
									<div class="col-sm-4">
										<label for="mid_name">Middle Name</label>
										<input type="text" class="form-control" name="mid_name" id="mid_name" required />
									</div>
								</div>
		</div>
									<div class="form-group">
								<div class="row">
									<div class="col-sm-4">
										<label for="dob">Date of Birth (MM/DD/YYYY)</label>
										<input type="text" class="form-control datepicker" name="dob" id="dob" required />
									</div>
									<div class="col-sm-4">
										<label for="gender">Gender</label>
										<select class="form-control" name="gender" id="gender" required>
											<option value="">Select Gender</option>
											<option value="male">Male</option>
											<option value="female">Female</option>
										</select>
									</div>
									<div class="col-sm-4">
										<label for="merital_status">Marital Status</label>
									    <select class="form-control" name="merital_status" id="merital_status" required>
											<option value=""> Select Marital Status</option>
											<option value="Single">Single</option>
											<option value="Married">Married</option>
											<option value="Widow">Widow</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-4">
										<label for="nationality">Nationality</label>
										<input type="text" class="form-control" name="nationality" id="nationality" required />
									</div>
									<div class="col-sm-4">
										<label for="blood_group">Contact</label>
										<input type="text" class="form-control" name="contact" id="contact" required />
									</div>
									<div class="col-sm-4">
										<label for="city">City</label>
										<input type="text" class="form-control" name="city" id="city" required />
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-12">
										<label for="address">Address</label>
										<textarea class="form-control" name="address" id="address" required></textarea>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-4">
										<label for="state">State</label>
										<input type="text" class="form-control" name="state" id="state" required />
									</div>
									<div class="col-sm-4">
										<label for="country">Country</label>
										<input type="text" class="form-control" name="country" id="country" required />
									</div>
									<div class="col-sm-4">
										<label for="email">Email</label>
										<input type="email" class="form-control" name="email" id="email" required />
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-4">
										<label for="position">Position</label>
										<input type="text" class="form-control" name="position" id="position" required />
									</div>
									<div class="col-sm-4">
										<label for="country">Department</label>
										<select class="form-control" name="dept" id="dept" required>
											<option value="">Please make a choice</option>
											<?php $qry = $db->query("SELECT * from `wy_department`");
								while($row = $qry->fetch_assoc()):
									?>
											<option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
											<?php endwhile; ?>
										</select>
									</div>
									<div class="col-sm-4">
										<label for="email">Branch</label>
										<select class="form-control" name="branch" id="branch" required>
											<option value="">Please make a choice</option>
											<?php $qry = $db->query("SELECT * from `wy_branch`");
								while($row = $qry->fetch_assoc()):
									?>
											<option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
											<?php endwhile; ?>
										</select>
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="row">
									<div class="col-sm-4">
										<label for="sss">SSS</label>
										<input type="text" class="form-control" name="sss" id="sss" required />
									</div>
									<div class="col-sm-4">
										<label for="tin">TIN</label>
										<input type="text" class="form-control" name="tin" id="tin" required />
									</div>
									<div class="col-sm-4">
										<label for="pagbig">HDMF/Pag-ibig</label>
										<input type="text" class="form-control" name="pagbig" id="pagbig" required />
									</div>
									<div class="col-sm-4">
										<label for="gsis">GSIS</label>
										<input type="text" class="form-control" name="gsis" id="gsis" required />
									</div>
                                    <div class="col-sm-4">
										<label for="d_hired">Date Hired</label>
										<input type="date" class="form-control" name="d_hired" id="d_hired" required />
									</div>
                                    <div class="col-sm-4">
										<label for="work_exp">Work Experience</label>
										<input type="text" class="form-control" name="work_exp" id="work_exp" required />
									</div>
							    </div>
							</div>

                            <div class="form-group">
								<div class="row">
                                <h2 class="modal-title">Educational Background</h2>
									<div class="col-sm-12">
										<label for="elementary">Elementary</label>
										<input type="text" class="form-control" name="elementary" id="elementary" required />
									</div>
									<div class="col-sm-12">
										<label for="secondary">Secondary</label>
										<input type="text" class="form-control" name="secondary" id="secondary" required />
									</div>
									<div class="col-sm-12">
										<label for="vocational">Vocational</label>
										<input type="text" class="form-control" name="vocational" id="vocational" required />
									</div>
									<div class="col-sm-12">
										<label for="graduate">Graduate</label>
										<input type="text" class="form-control" name="graduate" id="graduate" required />
									</div>
									</div>
							    </div>
							</div>

            <div class="form-group">
                <input class="form-control" type="file" name="uploadfile" value="" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
            </div>
        </form>
    </div>
				</div>
			</div>
		</div>
		<div class="modal fade in" id="EditEmpModal" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title">Update Employee Details</h4>
					</div>
					<form method="post" role="form" data-toggle="validator"  enctype="multipart/form-data">
						<div class="modal-body">
							<p><b>PERSONAL INFORMATION</b></p>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-4">
										<label for="emp_code">Emp. Code</label>
										<input class="form-control" type="text" name="emp_code" id="emp_code" />
									</div>
									<div class="col-sm-4">
										<label for="first_name">First Name</label>
										<input type="text" class="form-control" name="first_name" id="first_namen" required />
									</div>
									<div class="col-sm-4">
										<label for="last_name">Last Name</label>
										<input type="text" class="form-control" name="last_name" id="last_namen" required />
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-4">
										<label for="dob">Emp. DOB (MM/DD/YYYY)</label>
										<input type="text" class="form-control datepicker" name="dob" id="dobn" required />
									</div>
									<div class="col-sm-4">
										<label for="gender">Gender</label>
										<select class="form-control" name="gender" id="gendern" required>
											<option value="">Please make a choice</option>
											<option value="male">Male</option>
											<option value="female">Female</option>
										</select>
									</div>
									<div class="col-sm-4">
										<label for="merital_status">Merital Status</label>
										<input type="text" class="form-control" name="merital_status" id="merital_statusn" required />
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-4">
										<label for="nationality">Nationality</label>
										<input type="text" class="form-control" name="nationality" id="nationalityn" required />
									</div>
									<div class="col-sm-4">
										<label for="city">City</label>
										<input type="text" class="form-control" name="city" id="cityn" required />
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-12">
										<label for="address">Address</label>
										<textarea class="form-control" name="address" id="addressn" required></textarea>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-4">
										<label for="state">State</label>
										<input type="text" class="form-control" name="state" id="staten" required />
									</div>
									<div class="col-sm-4">
										<label for="country">Country</label>
										<input type="text" class="form-control" name="country" id="countryn" required />
									</div>
									<div class="col-sm-4">
										<label for="email">Email</label>
										<input type="email" class="form-control" name="email" id="emailn" required />
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-4">
										<label for="position">Position</label>
										<input type="text" class="form-control" name="position" id="positionn" required />
									</div>
									<div class="col-sm-4">
										<label for="country">Department</label>
										<select class="form-control" name="dept" id="deptn" required>
											<option value="">Please make a choice</option>
											<?php $qry = $db->query("SELECT * from `wy_department`");
								while($row = $qry->fetch_assoc()):
									?>
											<option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
											<?php endwhile; ?>
										</select>
									</div>
									<div class="col-sm-4">
										<label for="email">Branch</label>
										<select class="form-control" name="branch" id="branchn" required>
											<option value="">Please make a choice</option>
											<?php $qry = $db->query("SELECT * from `wy_branch`");
								while($row = $qry->fetch_assoc()):
									?>
											<option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
											<?php endwhile; ?>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-4">
										<label for="sss">SSS</label>
										<input type="text" class="form-control" name="sss" id="sssn" required />
									</div>
									<div class="col-sm-4">
										<label for="tin">TIN</label>
										<input type="text" class="form-control" name="tin" id="tinn" required />
									</div>
									<div class="col-sm-4">
										<label for="pagbig">HDMF/Pag-ibig</label>
										<input type="text" class="form-control" name="pagbig" id="pagbign" required />
									</div>
									<div class="col-sm-4">
										<label for="gsis">GSIS</label>
										<input type="text" class="form-control" name="gsis" id="gsisn" required />
									</div>
									<div class="col-sm-4">
										<label for="d_hired">Date Hired</label>
										<input type="date" class="form-control" name="d_hired" id="d_hiredn" required />
									</div>
                                    <div class="col-sm-4">
										<label for="work_exp">Work Experience</label>
										<input type="text" class="form-control" name="work_exp" id="work_expn" required />
									</div>
                                    <h2 class="modal-title">Educational Background</h2>
                                    <div class="col-sm-12">
										<label for="elementary">Elementary</label>
										<input type="text" class="form-control" name="elementary" id="elementaryn" required />
									</div>
                                    <div class="col-sm-12">
										<label for="secondary">Secondary</label>
										<input type="text" class="form-control" name="secondary" id="secondaryn" required />
									</div>
                                    <div class="col-sm-12">
										<label for="vocational">Vocational</label>
										<input type="text" class="form-control" name="vocational" id="vocationaln" required />
									</div>
                                    <div class="col-sm-12">
										<label for="graduate">Graduate</label>
										<input type="text" class="form-control" name="graduate" id="graduaten" required />
									</div>


									 <div class="form-group">
									 	<br>
									 	<div class="col-sm-12">
									 		<label for="gsis">Profile Photo</label>
						                <input onchange="readURL(this);" class="form-control" type="file" name="uploadfilen" id="uploadfilen" value="" />
						                <p>current photo</p>
						                <p id="cphoto"></p>
						                <img style="width: 50%;" id="ImdID" src="" alt="Image" />
						                </div>
						                

						            </div>
								</div>
							</div>
							

					
						<div class="modal-footer">
							<button type="submit" name="updateemp" class="btn btn-primary">Update Employee</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<footer class="main-footer">
		<strong> &copy; <?php echo date("Y");?> Payroll Management System</strong>
		</footer>
	</div>

	<script src="<?php echo BASE_URL; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
	<script src="<?php echo BASE_URL; ?>bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/jquery-validator/validator.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/datepicker/bootstrap-datepicker.js"></script>
	<script src="<?php echo BASE_URL; ?>dist/js/app.min.js"></script>
	<script type="text/javascript">var baseurl = '<?php echo BASE_URL; ?>';</script>
	<script src="<?php echo BASE_URL; ?>dist/js/script_at.js?rand=<?php echo rand(); ?>"></script>

	<script>
		$('#add-emp-form').submit(function(e){
		e.preventDefault();
		var _this = $(this)
		$.ajax({
            url      : baseurl + "company_two/?case=InsertEmployee",
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			 success  : function(result) {
                    if ( result.code == 0 ) {
                        $.notify({
                            icon: 'glyphicon glyphicon-ok-circle',
                            message: result.result,
                        },{
                            allow_dismiss: false,
                            type: "success",
                            placement: {
                                from: "top",
                                align: "right"
                            },
                            z_index: 9999,
                        });
                        holi_table.ajax.reload(null, false);
                        $('#AddEmpModal').modal('hide');
                    } else {
                        $.notify({
                            icon: 'glyphicon glyphicon-remove-circle',
                            message: result.result,
                        },{
                            allow_dismiss: false,
                            type: "danger",
                            placement: {
                                from: "top",
                                align: "right"
                            },
                            z_index: 9999,
                        });
                    }
                }
		})
	})



  


		
	</script>
	<script>
		  if ( $('#employees1').length > 0 ) {
        /* Employee Table Script Start */
        var emp_table = $('#employees1').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": baseurl + "company_two/?case=LoadingEmployees1",
            "columnDefs": [{
                "targets": 0,
                "className": "dt-center"
            }, {
                "targets": 1,
                "orderable": false,
                "className": "dt-center"
            }, {
                "targets": -1,
                "orderable": false,
                "data": null,
                "className": "dt-center",
                "defaultContent": '<button class="btn btn-warning btn-xs manageSalary"><i class="fa fa-money"></i></button> <button class="btn btn-primary btn-xs addSalary"><i class="fa fa-gratipay"></i></button> <button class="btn btn-success btn-xs editEmp"><i class="fa fa-edit"></i></button> <button class="btn btn-danger btn-xs deleteEmp"><i class="fa fa-trash"></i></button>'
            }]
        });
        /* End of Script */

        /* Pay Salary Script Start */
        $('#employees1 tbody').on('click', '.manageSalary', function(e) {
            e.preventDefault();

            var data = emp_table.row($(this).parents('tr')).data();
            var paylink = baseurl + 'pay-salary-at/' + data[0] + '/';
            $('#SalaryMonthModal a').each(function() {
                var month = $(this).data('month');
                var year = $(this).data('year');
                var cutoff = $(this).data('cutoff');
                $(this).attr('href', paylink + month + '/' + year + '/' + cutoff + '/');
            });
            $('#SalaryMonthModal').modal('show');
        });
        /* End of Script */

        /* Add Salary Script Start */
        $('#employees1 tbody').on('click', '.addSalary', function(e) {
            e.preventDefault();

            var data = emp_table.row($(this).parents('tr')).data();
            $('#empcode').val(data[0]);
            $.ajax({
                type     : "POST",
                dataType : "json",
                async    : true,
                cache    : false,
                url      : baseurl + "company_two/?case=GetAllPayheadsExceptEmployeeHave",
                data     : 'emp_code=' + data[0],
                success  : function(result) {
                    $('#all_payheads').html('');
                    if ( result.code == 0 ) {
                        for ( var i in result.result ) {
                            $('#all_payheads').append($("<option></option>")
                                .attr({
                                    "value": result.result[i].payhead_id
                                })
                                .text(
                                    result.result[i].payhead_name + ' (' + jsUcfirst(result.result[i].payhead_type) + ')')
                                .addClass((result.result[i].payhead_type=='earnings'?'text-success':'text-danger'))
                            ); 
                        }
                    }
                }
            });
            $.ajax({
                type     : "POST",
                dataType : "json",
                async    : true,
                cache    : false,
                url      : baseurl + "company_two/?case=GetEmployeePayheadsByID",
                data     : 'emp_code=' + data[0],
                success  : function(result) {
                    $('#selected_payheads, #selected_payamount').html('');
                    if ( result.code == 0 ) {
                        for ( var i in result.result ) {
                            $('#selected_payheads').append($("<option></option>")
                                .attr({
                                    "value": result.result[i].payhead_id,
                                    "selected": "selected"
                                })
                                .text(
                                    result.result[i].payhead_name + ' (' + jsUcfirst(result.result[i].payhead_type) + ')'
                                )
                                .addClass((result.result[i].payhead_type=='earnings'?'text-success':'text-danger'))
                            );
                            $('#selected_payamount').append($("<input />")
                                .attr({
                                    "type": "text",
                                    "name": "pay_amounts[" + result.result[i].payhead_id + "]",
                                    "id": "pay_amounts_" + result.result[i].payhead_id,
                                    "placeholder": result.result[i].payhead_name,
                                    "value": result.result[i].default_salary
                                })
                                .addClass('form-control')
                            );
                        }
                    }
                }
            });
            $('#ManageModal').modal('show');
        });
        /* End of Script */

        /* Delete Employee Script Start */
        $('#employees1 tbody').on('click', '.editEmp', function(e) {
            e.preventDefault();

            var data = emp_table.row($(this).parents('tr')).data();
            $.ajax({
                type     : "POST",
                dataType : "json",
                async    : true,
                cache    : false,
                url      : baseurl + "company_two/?case=GetEmployeeByID",
                data     : 'emp_code=' + data[0],
                success  : function(result) {
                    if ( result.code == 0 ) {
                        $('#emp_id').val(result.result.emp_code);
                        $('#emp_code').val(result.result.emp_code);
                        $('#first_namen').val(result.result.first_name);
                        $('#last_namen').val(result.result.last_name);
                        $('#dobn').val(result.result.dob).datepicker('update');
                        $('#gendern').val(result.result.gender);
                        $('#merital_statusn').val(result.result.merital_status);
                        $('#nationalityn').val(result.result.nationality);
                        $('#addressn').val(result.result.address);
                        $('#cityn').val(result.result.city);
                        $('#staten').val(result.result.state);
                        $('#countryn').val(result.result.country);
                        $('#emailn').val(result.result.email);
                        $('#mobilen').val(result.result.mobile);
                        $('#positionn').val(result.result.position);
                        $('#deptn').val(result.result.department);
                        $('#branchn').val(result.result.branch);
                        $('#sssn').val(result.result.sss);
                        $('#tinn').val(result.result.tin);
                        $('#pagbign').val(result.result.pagibig);
                        $('#gsisn').val(result.result.gsis);
                        $('#d_hiredn').val(result.result.d_hired);
                        $('#work_expn').val(result.result.work_exp);
                        $('#elementaryn').val(result.result.elementary);
                        $('#secondaryn').val(result.result.secondary);
                        $('#vocationaln').val(result.result.vocational);
                        $('#graduaten').val(result.result.graduate);
                        $('#cphoto').text(result.result.photo);
                        



                        $('#EditEmpModal').modal('show');
                    } else {
                        $.notify({
                            icon: 'glyphicon glyphicon-remove-circle',
                            message: result.result,
                        },{
                            allow_dismiss: false,
                            type: "danger",
                            placement: {
                                from: "top",
                                align: "right"
                            },
                            z_index: 9999,
                        });
                    }
                }
            });
        });
        /* End of Script */

        /* Delete Employee Script Start */
        $('#employees1 tbody').on('click', '.deleteEmp', function(e) {
            e.preventDefault();

            var conf = confirm('Are you sure you want to delete this employee?');
            if ( conf ) {
                var data = emp_table.row($(this).parents('tr')).data();
                $.ajax({
                    type     : "POST",
                    dataType : "json",
                    async    : true,
                    cache    : false,
                    url      : baseurl + "company_two/?case=DeleteEmployeeByID",
                    data     : 'emp_code=' + data[0],
                    success  : function(result) {
                        if ( result.code == 0 ) {
                            $.notify({
                                icon: 'glyphicon glyphicon-ok-circle',
                                message: result.result,
                            },{
                                allow_dismiss: false,
                                type: "success",
                                placement: {
                                    from: "top",
                                    align: "right"
                                },
                                z_index: 9999,
                            });
                            emp_table.ajax.reload(null, false);
                        } else {
                            $.notify({
                                icon: 'glyphicon glyphicon-remove-circle',
                                message: result.result,
                            },{
                                allow_dismiss: false,
                                type: "danger",
                                placement: {
                                    from: "top",
                                    align: "right"
                                },
                                z_index: 9999,
                            });
                        }
                    }
                });
            }
        });
        /* End of Script */

        /* Add Payhead To Employee Script Start */
        $(document).on('click', '#selectHeads', function() {
            $('#all_payheads').find(':selected').each(function() {
                var val = $(this).val();
                var name = $(this).text();
                $('#selected_payamount').append($("<input />")
                    .attr({
                        "type": "text",
                        "name": "pay_amounts[" + val + "]",
                        "id": "pay_amounts_" + val,
                        "placeholder": name
                    })
                    .addClass('form-control')
                );
            });
            moveItems('#all_payheads', '#selected_payheads');
        });
        $(document).on('click', '#removeHeads', function() {
            $('#selected_payheads').find(':selected').each(function() {
                var val = $(this).val();
                $('#pay_amounts_' + val).remove();
            });
            moveItems('#selected_payheads', '#all_payheads');
        });
        /* End of Script */
  }
	</script>
<!-- <script>
$(document).ready(function(){
  $("#add").click(function(){
  	var bla = $('#customFile').val();

    alert(bla);
  });
});
</script> -->

<script>
	  if ( $('#employees2').length > 0 ) {
        /* Employee Table Script Start */
        var emp_table1 = $('#employees2').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": baseurl + "company_two/?case=LoadingEmployees2",
            "columnDefs": [{
                "targets": 0,
                "className": "dt-center"
            }, {
                "targets": 1,
                "orderable": false,
                "className": "dt-center"
            }, {
                "targets": -1,
                "orderable": false,
                "data": null,
                "className": "dt-center",
                "defaultContent": '<button class="btn btn-warning btn-xs manageSalary"><i class="fa fa-money"></i></button> <button class="btn btn-primary btn-xs addSalary"><i class="fa fa-gratipay"></i></button> <button class="btn btn-success btn-xs editEmp"><i class="fa fa-edit"></i></button> <button class="btn btn-danger btn-xs deleteEmp"><i class="fa fa-trash"></i></button>'
            }]
        });
        /* End of Script */

        /* Pay Salary Script Start */
        $('#employees2 tbody').on('click', '.manageSalary', function(e) {
            e.preventDefault();

            var data = emp_table1.row($(this).parents('tr')).data();
            var paylink = baseurl + 'pay-salary-at/' + data[0] + '/';
            $('#SalaryMonthModal a').each(function() {
                var month = $(this).data('month');
                var year = $(this).data('year');
                var cutoff = $(this).data('cutoff');
                $(this).attr('href', paylink + month + '/' + year + '/' + cutoff + '/');
            });
            $('#SalaryMonthModal').modal('show');
        });
        /* End of Script */

        /* Add Salary Script Start */
        $('#employees2 tbody').on('click', '.addSalary', function(e) {
            e.preventDefault();

            var data = emp_table1.row($(this).parents('tr')).data();
            $('#empcode').val(data[0]);
            $.ajax({
                type     : "POST",
                dataType : "json",
                async    : true,
                cache    : false,
                url      : baseurl + "company_two/?case=GetAllPayheadsExceptEmployeeHave",
                data     : 'emp_code=' + data[0],
                success  : function(result) {
                    $('#all_payheads').html('');
                    if ( result.code == 0 ) {
                        for ( var i in result.result ) {
                            $('#all_payheads').append($("<option></option>")
                                .attr({
                                    "value": result.result[i].payhead_id
                                })
                                .text(
                                    result.result[i].payhead_name + ' (' + jsUcfirst(result.result[i].payhead_type) + ')')
                                .addClass((result.result[i].payhead_type=='earnings'?'text-success':'text-danger'))
                            ); 
                        }
                    }
                }
            });
            $.ajax({
                type     : "POST",
                dataType : "json",
                async    : true,
                cache    : false,
                url      : baseurl + "company_two/?case=GetEmployeePayheadsByID",
                data     : 'emp_code=' + data[0],
                success  : function(result) {
                    $('#selected_payheads, #selected_payamount').html('');
                    if ( result.code == 0 ) {
                        for ( var i in result.result ) {
                            $('#selected_payheads').append($("<option></option>")
                                .attr({
                                    "value": result.result[i].payhead_id,
                                    "selected": "selected"
                                })
                                .text(
                                    result.result[i].payhead_name + ' (' + jsUcfirst(result.result[i].payhead_type) + ')'
                                )
                                .addClass((result.result[i].payhead_type=='earnings'?'text-success':'text-danger'))
                            );
                            $('#selected_payamount').append($("<input />")
                                .attr({
                                    "type": "text",
                                    "name": "pay_amounts[" + result.result[i].payhead_id + "]",
                                    "id": "pay_amounts_" + result.result[i].payhead_id,
                                    "placeholder": result.result[i].payhead_name,
                                    "value": result.result[i].default_salary
                                })
                                .addClass('form-control')
                            );
                        }
                    }
                }
            });
            $('#ManageModal').modal('show');
        });
        /* End of Script */

        /* Delete Employee Script Start */
        $('#employees2 tbody').on('click', '.editEmp', function(e) {
            e.preventDefault();

            var data = emp_table1.row($(this).parents('tr')).data();
            $.ajax({
                type     : "POST",
                dataType : "json",
                async    : true,
                cache    : false,
                url      : baseurl + "company_two/?case=GetEmployeeByID",
                data     : 'emp_code=' + data[0],
                success  : function(result) {
                    if ( result.code == 0 ) {
                        $('#emp_id').val(result.result.emp_code);
                        $('#emp_code').val(result.result.emp_code);
                        $('#first_namen').val(result.result.first_name);
                        $('#last_namen').val(result.result.last_name);
                        $('#dobn').val(result.result.dob).datepicker('update');
                        $('#gendern').val(result.result.gender);
                        $('#merital_statusn').val(result.result.merital_status);
                        $('#nationalityn').val(result.result.nationality);
                        $('#addressn').val(result.result.address);
                        $('#cityn').val(result.result.city);
                        $('#staten').val(result.result.state);
                        $('#countryn').val(result.result.country);
                        $('#emailn').val(result.result.email);
                        $('#mobilen').val(result.result.mobile);
                        $('#positionn').val(result.result.position);
                        $('#deptn').val(result.result.department);
                        $('#branchn').val(result.result.branch);
                        $('#sssn').val(result.result.sss);
                        $('#tinn').val(result.result.tin);
                        $('#pagbign').val(result.result.pagibig);
                        $('#gsisn').val(result.result.gsis);
                        $('#d_hiredn').val(result.result.d_hired);
                        $('#work_expn').val(result.result.work_exp);
                        $('#elementaryn').val(result.result.elementary);
                        $('#secondaryn').val(result.result.secondary);
                        $('#vocationaln').val(result.result.vocational);
                        $('#graduaten').val(result.result.graduate);
                        $('#cphoto').text(result.result.photo);



                        $('#EditEmpModal').modal('show');
                    } else {
                        $.notify({
                            icon: 'glyphicon glyphicon-remove-circle',
                            message: result.result,
                        },{
                            allow_dismiss: false,
                            type: "danger",
                            placement: {
                                from: "top",
                                align: "right"
                            },
                            z_index: 9999,
                        });
                    }
                }
            });
        });
        /* End of Script */

        /* Delete Employee Script Start */
        $('#employees2 tbody').on('click', '.deleteEmp', function(e) {
            e.preventDefault();

            var conf = confirm('Are you sure you want to delete this employee?');
            if ( conf ) {
                var data = emp_table1.row($(this).parents('tr')).data();
                $.ajax({
                    type     : "POST",
                    dataType : "json",
                    async    : true,
                    cache    : false,
                    url      : baseurl + "company_two/?case=DeleteEmployeeByID",
                    data     : 'emp_code=' + data[0],
                    success  : function(result) {
                        if ( result.code == 0 ) {
                            $.notify({
                                icon: 'glyphicon glyphicon-ok-circle',
                                message: result.result,
                            },{
                                allow_dismiss: false,
                                type: "success",
                                placement: {
                                    from: "top",
                                    align: "right"
                                },
                                z_index: 9999,
                            });
                            emp_table.ajax.reload(null, false);
                        } else {
                            $.notify({
                                icon: 'glyphicon glyphicon-remove-circle',
                                message: result.result,
                            },{
                                allow_dismiss: false,
                                type: "danger",
                                placement: {
                                    from: "top",
                                    align: "right"
                                },
                                z_index: 9999,
                            });
                        }
                    }
                });
            }
        });
        /* End of Script */

        /* Add Payhead To Employee Script Start */
        $(document).on('click', '#selectHeads', function() {
            $('#all_payheads').find(':selected').each(function() {
                var val = $(this).val();
                var name = $(this).text();
                $('#selected_payamount').append($("<input />")
                    .attr({
                        "type": "text",
                        "name": "pay_amounts[" + val + "]",
                        "id": "pay_amounts_" + val,
                        "placeholder": name
                    })
                    .addClass('form-control')
                );
            });
            moveItems('#all_payheads', '#selected_payheads');
        });
        $(document).on('click', '#removeHeads', function() {
            $('#selected_payheads').find(':selected').each(function() {
                var val = $(this).val();
                $('#pay_amounts_' + val).remove();
            });
            moveItems('#selected_payheads', '#all_payheads');
        });
        /* End of Script */
  }
</script>
<script>
	  if ( $('#employees3').length > 0 ) {
        /* Employee Table Script Start */
        var emp_table2 = $('#employees3').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": baseurl + "company_two/?case=LoadingEmployees3",
            "columnDefs": [{
                "targets": 0,
                "className": "dt-center"
            }, {
                "targets": 1,
                "orderable": false,
                "className": "dt-center"
            }, {
                "targets": -1,
                "orderable": false,
                "data": null,
                "className": "dt-center",
                "defaultContent": '<button class="btn btn-warning btn-xs manageSalary"><i class="fa fa-money"></i></button> <button class="btn btn-primary btn-xs addSalary"><i class="fa fa-gratipay"></i></button> <button class="btn btn-success btn-xs editEmp"><i class="fa fa-edit"></i></button> <button class="btn btn-danger btn-xs deleteEmp"><i class="fa fa-trash"></i></button>'
            }]
        });
        /* End of Script */

        /* Pay Salary Script Start */
        $('#employees3 tbody').on('click', '.manageSalary', function(e) {
            e.preventDefault();

            var data = emp_table2.row($(this).parents('tr')).data();
            var paylink = baseurl + 'pay-salary-at/' + data[0] + '/';
            $('#SalaryMonthModal a').each(function() {
                var month = $(this).data('month');
                var year = $(this).data('year');
                var cutoff = $(this).data('cutoff');
                $(this).attr('href', paylink + month + '/' + year + '/' + cutoff + '/');
            });
            $('#SalaryMonthModal').modal('show');
        });
        /* End of Script */

        /* Add Salary Script Start */
        $('#employees3 tbody').on('click', '.addSalary', function(e) {
            e.preventDefault();

            var data = emp_table2.row($(this).parents('tr')).data();
            $('#empcode').val(data[0]);
            $.ajax({
                type     : "POST",
                dataType : "json",
                async    : true,
                cache    : false,
                url      : baseurl + "company_two/?case=GetAllPayheadsExceptEmployeeHave",
                data     : 'emp_code=' + data[0],
                success  : function(result) {
                    $('#all_payheads').html('');
                    if ( result.code == 0 ) {
                        for ( var i in result.result ) {
                            $('#all_payheads').append($("<option></option>")
                                .attr({
                                    "value": result.result[i].payhead_id
                                })
                                .text(
                                    result.result[i].payhead_name + ' (' + jsUcfirst(result.result[i].payhead_type) + ')')
                                .addClass((result.result[i].payhead_type=='earnings'?'text-success':'text-danger'))
                            ); 
                        }
                    }
                }
            });
            $.ajax({
                type     : "POST",
                dataType : "json",
                async    : true,
                cache    : false,
                url      : baseurl + "company_two/?case=GetEmployeePayheadsByID",
                data     : 'emp_code=' + data[0],
                success  : function(result) {
                    $('#selected_payheads, #selected_payamount').html('');
                    if ( result.code == 0 ) {
                        for ( var i in result.result ) {
                            $('#selected_payheads').append($("<option></option>")
                                .attr({
                                    "value": result.result[i].payhead_id,
                                    "selected": "selected"
                                })
                                .text(
                                    result.result[i].payhead_name + ' (' + jsUcfirst(result.result[i].payhead_type) + ')'
                                )
                                .addClass((result.result[i].payhead_type=='earnings'?'text-success':'text-danger'))
                            );
                            $('#selected_payamount').append($("<input />")
                                .attr({
                                    "type": "text",
                                    "name": "pay_amounts[" + result.result[i].payhead_id + "]",
                                    "id": "pay_amounts_" + result.result[i].payhead_id,
                                    "placeholder": result.result[i].payhead_name,
                                    "value": result.result[i].default_salary
                                })
                                .addClass('form-control')
                            );
                        }
                    }
                }
            });
            $('#ManageModal').modal('show');
        });
        /* End of Script */

        /* Delete Employee Script Start */
        $('#employees3 tbody').on('click', '.editEmp', function(e) {
            e.preventDefault();

            var data = emp_table2.row($(this).parents('tr')).data();
            $.ajax({
                type     : "POST",
                dataType : "json",
                async    : true,
                cache    : false,
                url      : baseurl + "company_two/?case=GetEmployeeByID",
                data     : 'emp_code=' + data[0],
                success  : function(result) {
                    if ( result.code == 0 ) {
                        $('#emp_id').val(result.result.emp_code);
                        $('#emp_code').val(result.result.emp_code);
                        $('#first_namen').val(result.result.first_name);
                        $('#last_namen').val(result.result.last_name);
                        $('#dobn').val(result.result.dob).datepicker('update');
                        $('#gendern').val(result.result.gender);
                        $('#merital_statusn').val(result.result.merital_status);
                        $('#nationalityn').val(result.result.nationality);
                        $('#addressn').val(result.result.address);
                        $('#cityn').val(result.result.city);
                        $('#staten').val(result.result.state);
                        $('#countryn').val(result.result.country);
                        $('#emailn').val(result.result.email);
                        $('#mobilen').val(result.result.mobile);
                        $('#positionn').val(result.result.position);
                        $('#deptn').val(result.result.department);
                        $('#branchn').val(result.result.branch);
                        $('#sssn').val(result.result.sss);
                        $('#tinn').val(result.result.tin);
                        $('#pagbign').val(result.result.pagibig);
                        $('#gsisn').val(result.result.gsis);
                        $('#d_hiredn').val(result.result.d_hired);
                        $('#work_expn').val(result.result.work_exp);
                        $('#elementaryn').val(result.result.elementary);
                        $('#secondaryn').val(result.result.secondary);
                        $('#vocationaln').val(result.result.vocational);
                        $('#graduaten').val(result.result.graduate);
                        $('#cphoto').text(result.result.photo);



                        $('#EditEmpModal').modal('show');
                    } else {
                        $.notify({
                            icon: 'glyphicon glyphicon-remove-circle',
                            message: result.result,
                        },{
                            allow_dismiss: false,
                            type: "danger",
                            placement: {
                                from: "top",
                                align: "right"
                            },
                            z_index: 9999,
                        });
                    }
                }
            });
        });
        /* End of Script */

        /* Delete Employee Script Start */
        $('#employees3 tbody').on('click', '.deleteEmp', function(e) {
            e.preventDefault();

            var conf = confirm('Are you sure you want to delete this employee?');
            if ( conf ) {
                var data = emp_table2.row($(this).parents('tr')).data();
                $.ajax({
                    type     : "POST",
                    dataType : "json",
                    async    : true,
                    cache    : false,
                    url      : baseurl + "company_two/?case=DeleteEmployeeByID",
                    data     : 'emp_code=' + data[0],
                    success  : function(result) {
                        if ( result.code == 0 ) {
                            $.notify({
                                icon: 'glyphicon glyphicon-ok-circle',
                                message: result.result,
                            },{
                                allow_dismiss: false,
                                type: "success",
                                placement: {
                                    from: "top",
                                    align: "right"
                                },
                                z_index: 9999,
                            });
                            emp_table.ajax.reload(null, false);
                        } else {
                            $.notify({
                                icon: 'glyphicon glyphicon-remove-circle',
                                message: result.result,
                            },{
                                allow_dismiss: false,
                                type: "danger",
                                placement: {
                                    from: "top",
                                    align: "right"
                                },
                                z_index: 9999,
                            });
                        }
                    }
                });
            }
        });
        /* End of Script */

        /* Add Payhead To Employee Script Start */
        $(document).on('click', '#selectHeads', function() {
            $('#all_payheads').find(':selected').each(function() {
                var val = $(this).val();
                var name = $(this).text();
                $('#selected_payamount').append($("<input />")
                    .attr({
                        "type": "text",
                        "name": "pay_amounts[" + val + "]",
                        "id": "pay_amounts_" + val,
                        "placeholder": name
                    })
                    .addClass('form-control')
                );
            });
            moveItems('#all_payheads', '#selected_payheads');
        });
        $(document).on('click', '#removeHeads', function() {
            $('#selected_payheads').find(':selected').each(function() {
                var val = $(this).val();
                $('#pay_amounts_' + val).remove();
            });
            moveItems('#selected_payheads', '#all_payheads');
        });
        /* End of Script */
  }
</script>
<script>
	  if ( $('#employees4').length > 0 ) {
        /* Employee Table Script Start */
        var emp_table3 = $('#employees4').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": baseurl + "company_two/?case=LoadingEmployees4",
            "columnDefs": [{
                "targets": 0,
                "className": "dt-center"
            }, {
                "targets": 1,
                "orderable": false,
                "className": "dt-center"
            }, {
                "targets": -1,
                "orderable": false,
                "data": null,
                "className": "dt-center",
                "defaultContent": '<button class="btn btn-warning btn-xs manageSalary"><i class="fa fa-money"></i></button> <button class="btn btn-primary btn-xs addSalary"><i class="fa fa-gratipay"></i></button> <button class="btn btn-success btn-xs editEmp"><i class="fa fa-edit"></i></button> <button class="btn btn-danger btn-xs deleteEmp"><i class="fa fa-trash"></i></button>'
            }]
        });
        /* End of Script */

        /* Pay Salary Script Start */
        $('#employees4 tbody').on('click', '.manageSalary', function(e) {
            e.preventDefault();

            var data = emp_table3.row($(this).parents('tr')).data();
            var paylink = baseurl + 'pay-salary-at/' + data[0] + '/';
            $('#SalaryMonthModal a').each(function() {
                var month = $(this).data('month');
                var year = $(this).data('year');
                var cutoff = $(this).data('cutoff');
                $(this).attr('href', paylink + month + '/' + year + '/' + cutoff + '/');
            });
            $('#SalaryMonthModal').modal('show');
        });
        /* End of Script */

        /* Add Salary Script Start */
        $('#employees4 tbody').on('click', '.addSalary', function(e) {
            e.preventDefault();

            var data = emp_table3.row($(this).parents('tr')).data();
            $('#empcode').val(data[0]);
            $.ajax({
                type     : "POST",
                dataType : "json",
                async    : true,
                cache    : false,
                url      : baseurl + "company_two/?case=GetAllPayheadsExceptEmployeeHave",
                data     : 'emp_code=' + data[0],
                success  : function(result) {
                    $('#all_payheads').html('');
                    if ( result.code == 0 ) {
                        for ( var i in result.result ) {
                            $('#all_payheads').append($("<option></option>")
                                .attr({
                                    "value": result.result[i].payhead_id
                                })
                                .text(
                                    result.result[i].payhead_name + ' (' + jsUcfirst(result.result[i].payhead_type) + ')')
                                .addClass((result.result[i].payhead_type=='earnings'?'text-success':'text-danger'))
                            ); 
                        }
                    }
                }
            });
            $.ajax({
                type     : "POST",
                dataType : "json",
                async    : true,
                cache    : false,
                url      : baseurl + "company_two/?case=GetEmployeePayheadsByID",
                data     : 'emp_code=' + data[0],
                success  : function(result) {
                    $('#selected_payheads, #selected_payamount').html('');
                    if ( result.code == 0 ) {
                        for ( var i in result.result ) {
                            $('#selected_payheads').append($("<option></option>")
                                .attr({
                                    "value": result.result[i].payhead_id,
                                    "selected": "selected"
                                })
                                .text(
                                    result.result[i].payhead_name + ' (' + jsUcfirst(result.result[i].payhead_type) + ')'
                                )
                                .addClass((result.result[i].payhead_type=='earnings'?'text-success':'text-danger'))
                            );
                            $('#selected_payamount').append($("<input />")
                                .attr({
                                    "type": "text",
                                    "name": "pay_amounts[" + result.result[i].payhead_id + "]",
                                    "id": "pay_amounts_" + result.result[i].payhead_id,
                                    "placeholder": result.result[i].payhead_name,
                                    "value": result.result[i].default_salary
                                })
                                .addClass('form-control')
                            );
                        }
                    }
                }
            });
            $('#ManageModal').modal('show');
        });
        /* End of Script */

        /* Delete Employee Script Start */
        $('#employees4 tbody').on('click', '.editEmp', function(e) {
            e.preventDefault();

            var data = emp_table3.row($(this).parents('tr')).data();
            $.ajax({
                type     : "POST",
                dataType : "json",
                async    : true,
                cache    : false,
                url      : baseurl + "company_two/?case=GetEmployeeByID",
                data     : 'emp_code=' + data[0],
                success  : function(result) {
                    if ( result.code == 0 ) {
                        $('#emp_id').val(result.result.emp_code);
                        $('#emp_code').val(result.result.emp_code);
                        $('#first_namen').val(result.result.first_name);
                        $('#last_namen').val(result.result.last_name);
                        $('#dobn').val(result.result.dob).datepicker('update');
                        $('#gendern').val(result.result.gender);
                        $('#merital_statusn').val(result.result.merital_status);
                        $('#nationalityn').val(result.result.nationality);
                        $('#addressn').val(result.result.address);
                        $('#cityn').val(result.result.city);
                        $('#staten').val(result.result.state);
                        $('#countryn').val(result.result.country);
                        $('#emailn').val(result.result.email);
                        $('#mobilen').val(result.result.mobile);
                        $('#positionn').val(result.result.position);
                        $('#deptn').val(result.result.department);
                        $('#branchn').val(result.result.branch);
                        $('#sssn').val(result.result.sss);
                        $('#tinn').val(result.result.tin);
                        $('#pagbign').val(result.result.pagibig);
                        $('#gsisn').val(result.result.gsis);
                        $('#d_hiredn').val(result.result.d_hired);
                        $('#work_expn').val(result.result.work_exp);
                        $('#elementaryn').val(result.result.elementary);
                        $('#secondaryn').val(result.result.secondary);
                        $('#vocationaln').val(result.result.vocational);
                        $('#graduaten').val(result.result.graduate);
                        $('#cphoto').text(result.result.photo);



                        $('#EditEmpModal').modal('show');
                    } else {
                        $.notify({
                            icon: 'glyphicon glyphicon-remove-circle',
                            message: result.result,
                        },{
                            allow_dismiss: false,
                            type: "danger",
                            placement: {
                                from: "top",
                                align: "right"
                            },
                            z_index: 9999,
                        });
                    }
                }
            });
        });
        /* End of Script */

        /* Delete Employee Script Start */
        $('#employees4 tbody').on('click', '.deleteEmp', function(e) {
            e.preventDefault();

            var conf = confirm('Are you sure you want to delete this employee?');
            if ( conf ) {
                var data = emp_table3.row($(this).parents('tr')).data();
                $.ajax({
                    type     : "POST",
                    dataType : "json",
                    async    : true,
                    cache    : false,
                    url      : baseurl + "company_two/?case=DeleteEmployeeByID",
                    data     : 'emp_code=' + data[0],
                    success  : function(result) {
                        if ( result.code == 0 ) {
                            $.notify({
                                icon: 'glyphicon glyphicon-ok-circle',
                                message: result.result,
                            },{
                                allow_dismiss: false,
                                type: "success",
                                placement: {
                                    from: "top",
                                    align: "right"
                                },
                                z_index: 9999,
                            });
                            emp_table3.ajax.reload(null, false);
                        } else {
                            $.notify({
                                icon: 'glyphicon glyphicon-remove-circle',
                                message: result.result,
                            },{
                                allow_dismiss: false,
                                type: "danger",
                                placement: {
                                    from: "top",
                                    align: "right"
                                },
                                z_index: 9999,
                            });
                        }
                    }
                });
            }
        });
        /* End of Script */

        /* Add Payhead To Employee Script Start */
        $(document).on('click', '#selectHeads', function() {
            $('#all_payheads').find(':selected').each(function() {
                var val = $(this).val();
                var name = $(this).text();
                $('#selected_payamount').append($("<input />")
                    .attr({
                        "type": "text",
                        "name": "pay_amounts[" + val + "]",
                        "id": "pay_amounts_" + val,
                        "placeholder": name
                    })
                    .addClass('form-control')
                );
            });
            moveItems('#all_payheads', '#selected_payheads');
        });
        $(document).on('click', '#removeHeads', function() {
            $('#selected_payheads').find(':selected').each(function() {
                var val = $(this).val();
                $('#pay_amounts_' + val).remove();
            });
            moveItems('#selected_payheads', '#all_payheads');
        });
        /* End of Script */
  }
</script>
<script>
	function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#ImdID').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
</script>

</body>
</html>
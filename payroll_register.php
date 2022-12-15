<?php
 require_once(dirname(__FILE__) . '/hris_at_config.php');
	
	$post_at = "";
	$post_at_to_date = "";
	
	$queryCondition = "";
		
		$post_at = date('Y-m-d',strtotime($_POST["search"]["post_at"]));
		list($fid,$fim,$fiy) = explode("-",$post_at);


		
		$post_at_todate = date('Y-m-d');
		if(!empty($_POST["search"]["post_at_to_date"])) {
			$post_at_to_date = date('Y-m-d',strtotime($_POST["search"]["post_at_to_date"]));
			list($tid,$tim,$tiy) = explode("-",$_POST["search"]["post_at_to_date"]);
			$post_at_todate = "$tiy-$tim-$tid";
		}
		

		$datestart= (date('Y-m-d',strtotime($post_at)));
		$dateend= (date('Y-m-d',strtotime($post_at_todate)));



		


	$sql = "SELECT * from wy_salaries WHERE `cut-off-from-to` BETWEEN '".$datestart."' AND '" .$dateend. "'  group by emp_code ORDER BY generate_date desc";
	$result = mysqli_query($db,$sql);

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
					Payroll Register
				</h1>
				<ol class="breadcrumb">
					<li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Payroll Register</li>
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
							  <form name="frmSearch" method="post" action="">
	 <p class="search_input">
		<input type="date" placeholder="From Date" id="post_at" name="search[post_at]"  value="<?php echo $post_at; ?>" class="input-control" />
	    <input type="date" placeholder="To Date" id="post_at_to_date" name="search[post_at_to_date]" style="margin-left:10px"  value="<?php echo $post_at_to_date; ?>" class="input-control"  />			 
		<input type="submit" name="go" value="Search" >
	</p>
							<div class="box-body">
								<div class="table-responsiove" style="overflow-x: scroll;">
									<table id="attendancemod" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>EE ID</th>
												<th>Complete Name</th>
												<th>Employee Last Name</th>
												<th>Employee First Name</th>
												<th>Employee Middle Name</th>
												<th>Pay Frequency</th>
												<th>Date Hired</th>
												<th>SSS Number</th>
												<th>T I N</th>
												<th>HDMF No</th>
												<th>PhilHealth</th>
												<th>Position</th>
												<th>Department</th>
												<th>Cost Center</th>
												<th>GL Account</th>
												<th>Tax Type</th>
												<th>Base Pay</th>
												<th>Base Pay Unit</th>
												<th>Pay Frequency</th>
												<th>Days In a Year</th>
												<th>Hours In a Day</th>
												<th>Monthly Rate</th>
												<th>Daily Rate</th>
												<th>Hourly Rate</th>
												<th>Scheduled Hours</th>
												<th>Full Pay</th>
												<th>Deduction</th>
												<th>Net Pay</th>

											</tr>
										</thead>
										<tbody>
										<?php
										while($row = mysqli_fetch_array($result)) {
														$empcode = $row['emp_code'];
										?>

<?php $qry1 = $db->query("SELECT * from `employees` where emp_code='".$empcode."'");
								while($row1 = $qry1->fetch_assoc()):
									?>

									<?php $qry2 = $db->query("SELECT * from `wy_salaries` where emp_code='".$empcode."' and pay_type='deductions' group by emp_code ");
								while($row2 = $qry2->fetch_assoc()):
									$sum += $row2['pay_amount'];
									?>

									    <tr>
									    	<td><?php echo $row['emp_code']?></td>
									    	<td><?php echo $row1['first_name'].' '.$row['middle_name'].' '.$row['last_name'] ?></td>
									    	<td><?php echo $row1['last_name']?></td>
									    	<td><?php echo $row1['first_name']?></td>
									    	<td><?php echo $row1['middle_name']?></td>
									    	<td>Semi-monthly</td>
									    	<td>312</td>
									    	<td><?php echo $row1['sss']?></td>
									    	<td><?php echo $row1['tin']?></td>
									    	<td><?php echo $row1['pagibig']?></td>
									    	<td><?php echo $row1['middle_name']?></td>
									    	<td><?php echo $row1['position']?></td>
									    	<td><?php echo $row1['department']?></td>
									    	<td>TSI Cost</td>
									    	<td>Salaries & Wages</td>
									    	<td>Minimum Wage</td>
									    	<td><?php echo $row1['employee_salary']?></td>
									    	<td>Per Month</td>
									    	<td>Semi-monthly</td>
									    	<td><?php echo $row1['employee_salary']?></td>
									    	<td>8</td>
									    	<td><?php echo $row1['employee_salary']?></td>
									    	<td><?php echo $row1['employee_salary']*12/312?></td>
									    	<td><?php echo $row1['employee_salary']*12/312/8?></td>
									    	<td>0</td>
									    	<td><?php echo $row1['employee_salary']/2?></td>
									    	<td><?php echo $sum ?></td>
									    	<td><?php echo $row1['employee_salary']-$sum?></td>

									    </tr>
<?php endwhile; ?>
<?php endwhile; ?>
									   <?php
		}
   ?>
										</tbody>
									</table>
									 <button class="btn-primary" type="button" onclick="tableToCSV()">
            download CSV
        </button>
								</div>
							</div>
						</form>
						</div>
					</div>
				</div>
			</section>
		</div>

		<footer class="main-footer">
			<strong> &copy; <?php echo date("Y");?> Payroll Management System | </strong>
		</footer>
	</div>

	<script src="<?php echo BASE_URL; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
	<script src="<?php echo BASE_URL; ?>bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
	<script src="<?php echo BASE_URL; ?>dist/js/app.min.js"></script>
	<script type="text/javascript">var baseurl = '<?php echo BASE_URL; ?>';</script>
	<script src="<?php echo BASE_URL; ?>dist/js/script_ts.js?rand=<?php echo rand(); ?>"></script>
	<script type="text/javascript">
        function tableToCSV() {
 
            // Variable to store the final csv data
            var csv_data = [];
 
            // Get each row data
            var rows = document.getElementsByTagName('tr');
            for (var i = 0; i < rows.length; i++) {
 
                // Get each column data
                var cols = rows[i].querySelectorAll('td,th');
 
                // Stores each csv row data
                var csvrow = [];
                for (var j = 0; j < cols.length; j++) {
 
                    // Get the text data of each cell
                    // of a row and push it to csvrow
                    csvrow.push(cols[j].innerHTML);
                }
 
                // Combine each column value with comma
                csv_data.push(csvrow.join(","));
            }
 
            // Combine each row data with new line character
            csv_data = csv_data.join('\n');
 
            // Call this function to download csv file 
            downloadCSVFile(csv_data);
 
        }
 
        function downloadCSVFile(csv_data) {
 
            // Create CSV file object and feed
            // our csv_data into it
            CSVFile = new Blob([csv_data], {
                type: "text/csv"
            });
 
            // Create to temporary link to initiate
            // download process
            var temp_link = document.createElement('a');
 
            // Download csv file
            temp_link.download = "GfG.csv";
            var url = window.URL.createObjectURL(CSVFile);
            temp_link.href = url;
 
            // This link should not be displayed
            temp_link.style.display = "none";
            document.body.appendChild(temp_link);
 
            // Automatically click the link to
            // trigger download
            temp_link.click();
            document.body.removeChild(temp_link);
        }
    </script>

            <style>
    	input{border-radius: 0;
    box-shadow: none;
    border-color: #d2d6de;
height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;margin-left: 20px;}
    </style>
</body>
</html>
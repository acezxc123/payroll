<?php require_once(dirname(__FILE__) . '/hris_at_config.php');
if ( !isset($_SESSION['Admin_ID']) ) {
   	header('location:' . BASE_URL);
}
if ( !isset($_GET['emp_code']) || empty($_GET['emp_code']) || !isset($_GET['month']) || empty($_GET['month']) || !isset($_GET['year']) || empty($_GET['year'])  ) {
	header('location:' . BASE_URL);
}

$empData = GetEmployeeDataByEmpCode($_GET['emp_code']);
$month = $_GET['month'] . ', ' . $_GET['year'];
$co = $_GET['cutoff'];
if($co == 1){
$comonth = $_GET['month'] . ' 1-15, ' . $_GET['year'];	
$c1 = date('Y-m-d',strtotime($_GET['month'] . ' 1, ' . $_GET['year']));
$c2 = date('Y-m-d',strtotime($_GET['month'] . ' 15, ' . $_GET['year']));	
}else{
$comonth = $_GET['month'] . ' 16-30, ' . $_GET['year'];
$c1 = date('Y-m-d',strtotime($_GET['month'] . ' 16, ' . $_GET['year']));
$c2 = date('Y-m-d',strtotime($_GET['month'] . ' 30, ' . $_GET['year']));		
}
$empLeave = GetEmployeeLWPDataByEmpCodeAndMonth($_GET['emp_code'], $month);
$flag = 0;
$totalEarnings = 0;
$totalDeductions = 0;
$checkSalarySQL = mysqli_query($db, "SELECT * FROM `" . DB_PREFIX . "salaries` WHERE `emp_code` = '" . $empData['emp_code'] . "' AND `pay_month` = '$comonth'");
if ( $checkSalarySQL ) {
	$checkSalaryROW = mysqli_num_rows($checkSalarySQL);
	if ( $checkSalaryROW > 0 ) {
		$flag = 1;
		$empSalary = GetEmployeeSalaryByEmpCodeAndMonth($_GET['emp_code'], $comonth);
	} else {
		$empHeads = GetEmployeePayheadsByEmpCode($_GET['emp_code']);
	}
} ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<title>Salary for <?php echo $comonth; ?> - Payroll</title>

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
			<h1>Employee Payslip</h1>
				<p style="padding-top:10px;">Salary for <?php echo $comonth; ?></p>`
				<ol class="breadcrumb">
					<li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Salary for <?php echo $comonth; ?></li>
				</ol>
			</section>

			<section class="content">
				<div class="row">
        			<div class="col-xs-12">
						<div class="box">
							<div class="box-body">
								<?php if ( $flag == 0 ) { ?>
									<form method="POST" role="form" id="payslip-form">
										<input type="hidden" name="emp_code" value="<?php echo $empData['emp_code']; ?>" />
										<input type="hidden" name="pay_month" value="<?php echo $comonth; ?>" />
									    <input type="hidden" name="c1" value="<?php echo $c1; ?>" />
										<input type="hidden" name="c2" value="<?php echo $c2; ?>" />

										<div class="table-responsive">
											<table class="table table-bordered">
												<tr>
										    		<td width="20%">Cut-off Period</td>
										    		<td width="30%"><?php echo $comonth; ?></td>
										    		<td width="20%"></td>
										    		<td width="30%"></td>
										    	</tr>
										    	<tr>
										    		<td width="20%">Employee Code</td>
										    		<td width="30%"><?php echo strtoupper($empData['emp_code']); ?></td>
										    		<td width="20%">Position</td>
										    		<td width="30%"><?php echo ucwords($empData['position']); ?></td>
										    	</tr>
											    <tr>
										    		<td>Employee Name</td>
										    		<td><?php echo ucwords($empData['first_name'] . ' ' . $empData['last_name']); ?></td>
										    		<td>SSS Number</td>
										    		<td><?php echo $empData['sss']; ?></td>
										    	</tr>
											    <tr>
												    <td>Gender</td>
												    <td><?php echo ucwords($empData['gender']); ?></td>
												    <td>HDMF/Pag-ibig</td>
												    <td><?php echo strtoupper($empData['pagibig']); ?></td>
											    </tr>
											    <tr>
												    <td>Location</td>
												    <td><?php echo ucwords($empData['city']); ?></td>
												    <td>TIN</td>
												    <td><?php echo strtoupper($empData['tin']); ?></td>
											    </tr>
											    <tr>
												    <td>Department</td>
												    <td><?php echo ucwords($empData['department']); ?></td>
												    <td>GSIS</td>
												    <td><?php echo strtoupper($empData['gsis']); ?></td>
												    <!-- <?php echo ($empLeave['workingDays'] - $empLeave['withoutPay']); ?>/<?php echo $empLeave['workingDays']; ?>  -->
											    </tr>
											   <!--  <tr>
												    <td>Date of Joining</td>
												    <td><?php echo date('d-m-Y', strtotime($empData['joining_date'])); ?></td>
												    <td>Taken/Remaining Leaves</td>
												    <td><!-- <?php echo $empLeave['payLeaves']; ?>/<?php echo ($empLeave['totalLeaves'] - $empLeave['payLeaves']); ?> Days --></td>
											    </tr>
										    </table>
											<table class="table table-bordered">
												<thead>

													<tr>
														<th width="35%">Earnings</th>
														<th width="15%" class="text-right">Amount (PHP)</th>
														<th width="35%">Deductions</th>
														<th width="15%" class="text-right">Amount (PHP)</th>
													</tr>
												</thead>
												<tbody>
													<?php if ( !empty($empHeads) ) { ?>
														<tr>
															<td colspan="2" style="padding:0">
																<table class="table table-bordered table-striped" style="margin:0">
																	<?php foreach ( $empHeads as $head ) { ?>
																		<?php if ( $head['payhead_type'] == 'earnings' ) { ?>
																			<?php $totalEarnings += $head['default_salary']; ?>
																			<tr>
																				<td width="70%">
																					<?php echo $head['payhead_name']; ?>
																				</td>
																				<td width="30%" class="text-right">
																					<input type="hidden" name="earnings_heads[]" value="<?php echo $head['payhead_name']; ?>" />
																					<input type="text" name="earnings_amounts[]" value="<?php echo number_format($head['default_salary'], 2, '.', ''); ?>" class="form-control text-right" />
																				</td>
																			</tr>
																		<?php } ?>
																	<?php } ?>
																</table>
															</td>
															<td colspan="2" style="padding:0">
																<table class="table table-bordered table-striped" style="margin:0">
																	<?php foreach ( $empHeads as $head ) { ?>
																		<?php if ( $head['payhead_type'] == 'deductions' ) { ?>
																			<?php $totalDeductions += $head['default_salary']; ?>
																			<tr>
																				<td width="70%">
																					<?php echo $head['payhead_name']; ?>
																				</td>
																				<td width="30%" class="text-right">
																					<input type="hidden" name="deductions_heads[]" value="<?php echo $head['payhead_name']; ?>" />
																					<input type="text" name="deductions_amounts[]" value="<?php echo number_format($head['default_salary'], 2, '.', ''); ?>" class="form-control text-right" />
																				</td>
																			</tr>
																		<?php } ?>
																	<?php } ?>
																</table>
															</td>
														</tr>
													<?php } else { ?>
														<tr>
															<td colspan="4">No payheads are assigned for this employee</td>
														</tr>
													<?php } ?>
												</tbody>
												<tfoot>
													<tr>
														<td><strong>Total Earnings</strong></td>
														<td class="text-right">
															<strong id="totalEarnings">
																<?php echo number_format($totalEarnings, 2, '.', ''); ?>
															</strong>
														</td>
														<td><strong>Total Deductions</strong></td>
														<td class="text-right">
															<strong id="totalDeductions">
																<?php echo number_format($totalDeductions, 2, '.', ''); ?>
															</strong>
														</td>
													</tr>
												</tfoot>
											</table>
										</div>
										<div class="row">
											<div class="col-sm-6">
												<h3 class="text-success" style="margin-top:0">
													Net Pay:
													<span id="netSalary"><?php echo number_format(($totalEarnings - $totalDeductions), 2, '.', ''); ?></span>
												</h3>
											</div>
											<div class="col-sm-6 text-right">
												<?php if ( !empty($empHeads) ) { ?>
													    <button data-toggle="modal" data-target="#AddEmpModal" type="button" class="btn btn-success">
													 	<i class="fa fa-plus"></i> Compute Attendance
													   </button>

													<button type="submit" class="btn btn-info">
													 	<i class="fa fa-plus"></i> Generate PaySlip
													</button>
												<?php } ?>
											</div>
										</div>
									</form>
								<?php } else { ?>
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead>
												<tr>
										    		<td width="20%">Salary for</td>
										    		<td width="30%"><?php echo $month; ?></td>
										    		<td width="20%"></td>
										    		<td width="30%"></td>
										    	</tr>
												<tr>
										    		<td width="20%">Employee Code</td>
										    		<td width="30%"><?php echo strtoupper($empData['emp_code']); ?></td>
										    		<td width="20%">Position</td>
										    		<td width="30%"><?php echo ucwords($empData['position']); ?></td>
										    	</tr>
											    <tr>
										    		<td>Employee Name</td>
										    		<td><?php echo ucwords($empData['first_name'] . ' ' . $empData['last_name']); ?></td>
										    		<td>SSS Number</td>
										    		<td><?php echo $empData['sss']; ?></td>
										    	</tr>
											    <tr>
												    <td>Gender</td>
												    <td><?php echo ucwords($empData['gender']); ?></td>
												    <td>HDMF/Pag-ibig</td>
												    <td><?php echo strtoupper($empData['pagibig']); ?></td>
											    </tr>
											    <tr>
												    <td>Location</td>
												    <td><?php echo ucwords($empData['city']); ?></td>
												    <td>TIN</td>
												    <td><?php echo strtoupper($empData['tin']); ?></td>
											    </tr>
											    <tr>
												    <td>Department</td>
												    <td><?php echo ucwords($empData['department']); ?></td>
												    <td>GSIS</td>
												    <td><?php echo strtoupper($empData['gsis']); ?></td>
												    <!-- <?php echo ($empLeave['workingDays'] - $empLeave['withoutPay']); ?>/<?php echo $empLeave['workingDays']; ?>  -->
											    </tr>
												<tr>
													<th width="20%">Earnings</th>
													<th width="15%" class="text-right">Amount (PHP)</th>
													<th width="35%">Deductions</th>
													<th width="15%" class="text-right">Amount (PHP)</th>
												</tr>
											</thead>
											<tbody>
												<?php if ( !empty($empSalary) ) { ?>
													<tr>
														<td colspan="2" style="padding:0">
															<table class="table table-bordered table-striped" style="margin:0">
																<?php foreach ( $empSalary as $salary ) { ?>
																	<?php if ( $salary['pay_type'] == 'earnings' ) { ?>
																		<?php $totalEarnings += $salary['pay_amount']; ?>
																		<tr>
																			<td width="70%">
																				<?php echo $salary['payhead_name']; ?>
																			</td>
																			<td width="30%" class="text-right">
																				<?php echo number_format($salary['pay_amount'], 2, '.', ','); ?>
																			</td>
																		</tr>
																	<?php } ?>
																<?php } ?>
															</table>
														</td>
														<td colspan="2" style="padding:0">
															<table class="table table-bordered table-striped" style="margin:0">
																<?php foreach ( $empSalary as $salary ) { ?>
																	<?php if ( $salary['pay_type'] == 'deductions' ) { ?>
																		<?php $totalDeductions += $salary['pay_amount']; ?>
																		<tr>
																			<td width="70%">
																				<?php echo $salary['payhead_name']; ?>
																			</td>
																			<td width="30%" class="text-right">
																				<?php echo number_format($salary['pay_amount'], 2, '.', ','); ?>
																			</td>
																		</tr>
																	<?php } ?>
																<?php } ?>
															</table>
														</td>
													</tr>
												<?php } else { ?>
													<tr>
														<td colspan="4">No payheads are assigned for this employee</td>
													</tr>
												<?php } ?>
											</tbody>
											<tfoot>
												<tr>
													<td><strong>Total Earnings</strong></td>
													<td class="text-right">
														<strong id="totalEarnings">
															<?php echo number_format($totalEarnings, 2, '.', ','); ?>
														</strong>
													</td>
													<td><strong>Total Deductions</strong></td>
													<td class="text-right">
														<strong id="totalDeductions">
															<?php echo number_format($totalDeductions, 2, '.', ','); ?>
														</strong>
													</td>
												</tr>
											</tfoot>
										</table>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<h3 class="text-success" style="margin-top:0">
												Net Pay:
												PHP <?php echo number_format(($totalEarnings - $totalDeductions), 2, '.', ','); ?>
												<!-- <small>(In words: <?php echo ucfirst(ConvertNumberToWords(($totalEarnings - $totalDeductions))); ?>)</small> -->
											</h3>
										</div>
										<div class="col-sm-6 text-right">
											<button type="button" class="btn btn-success" onclick="window.print();"></i> Employee PaySlip
											</button>
											<!-- <button type="button" class="btn btn-info" onclick="sendPaySlipByMail('<?php echo $empData['emp_code']; ?>', '<?php echo $month; ?>');">
												<i class="fa fa-envelope"></i> Send to Employee
											</button> -->
										</div>
									</div>
								<?php } ?>

							</div>
						</div>
					</div>
				</div>
			</section>
		</div>

		<div class="modal fade in" id="AddEmpModal" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title">Attendance Record</h4>
					</div>
					<form method="post" role="form" data-toggle="validator" id="add-emp-form">
						<div class="modal-body">
							<div class="form-group">
								<div class="row table-responsiove">
									<table class="table table-bordered table-striped">
									<tr>
										<th><center>Date</center></th>
										<th><center>Time in</center></th>
										<th><center>Time Out</center></th>
										<th><center>Total Hours</center></th>
									</tr>
									<?php $qry = $db->query("SELECT * from `attendance` ");
								    while($row = $qry->fetch_assoc()):
								    	$totalhr += $row['num_hr'];
									?>

									<tr>
										<td><center><?php echo date('M-d-Y', strtotime($row['date']));?></center></td>
										<td><center><?php echo $row['time_in'];?></center></td>
										<td><center><?php echo $row['time_out'];?></center></td>
										<td><center><?php echo $row['num_hr'];?></center></td>
									</tr>
									<?php endwhile; ?>
									<tr>
										<td></td>
										<td></td>
										<td style="text-align: right;">Total Hours</td>
										<td><input style="text-align:center;" type="" name="" id="tot" value="<?php echo number_format($totalhr,2);?>"></td>
									</tr>
									<tr style="display: none;">
										<td></td>
										<td></td>
										<td style="text-align: right;">Basic Salary</td>
										<td><input type="text" id="basic" value="<?php echo $empData['employee_salary'] ?>"><br>
											<input type="hidden" id="basicold" value="<?php echo $empData['employee_salary']?>"></td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td style="text-align: right;">Enter Number of Days in a year</td>
										<td><input type="number" id="numdays"><br>
											<input type="hidden" id="hrld"><br>
											<input type="hidden" id="hrldn">
											<input type="hidden" id="basicold" name="emp_code" value="<?php echo $empData['emp_code']?>"></td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td style="text-align: right;">Number of Working Days</td>
										<td><input type="number" id="numworkdays"></td>

									</tr>
									<tr>
										<td></td>
										<td></td>
										<td style="text-align: right;">Total Tardiness</td>
										<td><input type="number" id="numworkdayscom" name="tardiness"></td>

									</tr>
									<tr>
										<td></td>
										<td></td>
										<td style="text-align: right;">Total OT</td>
										<td><input type="number" id="numworkot" name="ot"></td>

									</tr>
									</table>
								</div>
							</div>

						</div>
						<div class="modal-footer">
							<button type="submit" name="submit" class="btn btn-primary">Compute</button>
						</div>
					</form>
				</div>
			</div>
		</div>


		<footer class="main-footer">
		<strong> &copy; <?php echo date("Y");?> Payroll Management System  </strong> 
		</footer>
	</div>

	<script src="<?php echo BASE_URL; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
	<script src="<?php echo BASE_URL; ?>bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/jquery-validator/validator.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
	<script src="<?php echo BASE_URL; ?>dist/js/app.min.js"></script>
	<script type="text/javascript">var baseurl = '<?php echo BASE_URL; ?>';</script>
	<script src="<?php echo BASE_URL; ?>dist/js/script_at.js?rand=<?php echo rand(); ?>"></script>
	<?php if ( isset($_SESSION['PaySlipMsg']) ) { ?>
		<script type="text/javascript">
		$.notify({
            icon: 'glyphicon glyphicon-ok-circle',
            message: '<?php echo $_SESSION['PaySlipMsg']; ?>',
        },{
            allow_dismiss: false,W
            type: "success",
            placement: {
                from: "top",
                align: "right"
            },
            z_index: 9999,
        });
		</script>
	<?php } ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#numdays").change(function(){
  	var days = $("#numdays").val();
  	var basic = $("#basic").val();

  	var numworkdays = $("#numworkdays").val();


  	
  	var dly = basic*12;
  	var dlynew = dly/days;
  	var dlynewn = dly/days/8;
        $("#hrld").val(dlynew);
        $("#hrldn").val(dlynewn);
        $("#numworkdayscom").val(numworkdays);
  });

   $("#numworkdays").change(function(){
   	 var days = $("#numdays").val();
  	var basic = $("#basic").val();
  	var numworkdays = $("#numworkdays").val();
  	  	var tothr = $("#tot").val();

  	var multiplyhors = numworkdays * 8;

  	var tot = multiplyhors - $("#tot").val();



  	var dly = basic*12;
  	var dlynew = dly/days;
  	var dlynewn = dly/days/8;
        $("#hrld").val(dlynew);
        $("#hrldn").val(dlynewn);
        
       if(tothr < multiplyhors){
        tardiness = tot * dlynewn ;
        $("#numworkdayscom").val(tardiness.toFixed(2));
        $("#numworkot").val('0'.toFixed(2));
       }else{
       	$("#numworkdayscom").val('0'.toFixed(2));
       	$("#numworkot").val(tot.toFixed(2));
       }
  });

});
</script>

	<script>
		 $('#payslip-form').on('submit', function(e) {
            e.preventDefault();
            alert('test');
            var form = $(this);
            $.ajax({
                type     : "POST",
                dataType : "json",
                async    : true,
                cache    : false,
                url      : baseurl + "company_two/?case=GeneratePaySlip",
                data     : form.serialize(),
                success  : function(result) {
                    if ( result.code == 0 ) {
                        window.location.reload();
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

		    $('#add-emp-form').on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            $.ajax({
                type     : "POST",
                dataType : "json",
                async    : true,
                cache    : false,
                url      : baseurl + "company_two/?case=InsertAttComp",
                data     : form.serialize(),
                success  : function(result) {
                    if ( result.code == 0 ) {
						location.reload();
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
	</script>


</body>
</html>
<?php unset($_SESSION['PaySlipMsg']); ?>

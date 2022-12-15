<?php
 require_once(dirname(__FILE__) . '/hris_at_config.php');
	
	$post_at = "";
	$post_at_to_date = "";
	
	$queryCondition = "";
	if(!empty($_POST["search"]["post_at"])) {			
		$post_at = date('Y-m-d',strtotime($_POST["search"]["post_at"]));
		list($fid,$fim,$fiy) = explode("-",$post_at);


		
		$post_at_todate = date('Y-m-d');
		if(!empty($_POST["search"]["post_at_to_date"])) {
			$post_at_to_date = date('Y-m-d',strtotime($_POST["search"]["post_at_to_date"]));
			list($tid,$tim,$tiy) = explode("-",$_POST["search"]["post_at_to_date"]);
			$post_at_todate = "$tiy-$tim-$tid";
		}
		
		$queryCondition .= "WHERE generate_date BETWEEN '$post_at' AND '" .$post_at_to_date. "'";
	}

	$sql = "SELECT * from wy_salaries  ". $queryCondition ." ORDER BY generate_date desc LIMIT 1";
	$result = mysqli_query($db,$sql);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title>Journal - Report</title>
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
					Journal Report
				</h1>
				<ol class="breadcrumb">
					<li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Journal Report</li>
				</ol>
			</section>

			<section class="content">
				<div class="row">
        			<div class="col-xs-12">
						<div class="box">
							<div class="box-header">
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
								<div class="table-responsive" style="overflow-x: scroll;">
								

								

										<?php
										while($row = mysqli_fetch_array($result)) {
														$empcode = $row['emp_code'];
														$date = date('M d, Y',strtotime($post_at)).'-'.date('M d, Y',strtotime($post_at_to_date));
										?>
									<!-- salary -->
								   <?php $qrys = $db->query("SELECT * from `wy_salaries` where payhead_name='Basic Salary' and `cut-off-from-to` BETWEEN '$post_at' AND '" .$post_at_to_date. "'");
									while($rows = $qrys->fetch_assoc()):
										   $sumsal += $rows['pay_amount'];
										?>
									<?php endwhile; ?>

									 <?php $qrysss = $db->query("SELECT * from `wy_salaries` where payhead_name='SSS Contribution' and `cut-off-from-to` BETWEEN '$post_at' AND '" .$post_at_to_date. "'");
									while($rowsss = $qrysss->fetch_assoc()):
										   $sumsss += $rowsss['pay_amount'];
										?>
									<?php endwhile; ?>

									 <?php $qryh = $db->query("SELECT * from `wy_salaries` where payhead_name='HMDF Contribution' and `cut-off-from-to` BETWEEN '$post_at' AND '" .$post_at_to_date. "'");
									while($rowh = $qryh->fetch_assoc()):
										   $sumhmdf += $rowh['pay_amount'];
										?>
									<?php endwhile; ?>

									 <?php $qryp = $db->query("SELECT * from `wy_salaries` where payhead_name='HMDF PHIC Contribution' and `cut-off-from-to` BETWEEN '$post_at' AND '" .$post_at_to_date. "'");
									while($rowhp = $qryp->fetch_assoc()):
										   $sump += $rowp['pay_amount'];
										?>
									<?php endwhile; ?>

									 <?php $qryt = $db->query("SELECT * from `wy_salaries` WHERE  `cut-off-from-to` BETWEEN '$post_at' AND '" .$post_at_to_date. "'");
									while($rowt = $qryt->fetch_assoc()):
										   $sumt += $rowt['pay_amount'];
										?>
									<?php endwhile; ?>

									<?php $sumcont = $sumsss + $sumhmdf + $sump  ?>



											<table id="attendancemod" class="table table-bordered">
										<tr>
											<td>TERMAL SOLUTION INC</td>
										</tr>
										<tr>
											<td>PAYROLL ENTRY</td>
										</tr>
									   </table>
									   	<table id="attendancemod" class="table table-bordered">
										<tr>
											<td>Cut-off Period: </td>
											<td><?php echo $date ?></td>
											<td></td>
											<td></td>
											<td>Accrued 13th Month Entry</td>
											<td></td>
											<td></td>
											<td></td>
											<td>1601C Reporting</td>
											<td></td>
											<td></td>
										</tr>
																				<tr>
											<td> </td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td>EFPS Reference</td>
											<td>Amount</td>
										</tr>
									    <tr>
									    	<td>Account Title</td>
									    	<td>JO</td>
									    	<td>Debit</td>
									    	<td>Credit</td>
									    	<td>Salaries & Wages</td>
									    	<td>TSI Cost</td>
									    	<td></td>
									    	<td></td>
									    	<td>Total Compensation</td>
									    	<td>BIR#15</td>
									    	<td><?php echo $sumt ?></td>
									    </tr>
									    <tr>
									    	<td>Salaries and Wages</td>
									    	<td>TSI Cost</td>
									    	<td><?php echo $sumsal?></td>
									    </tr>
									    <tr>
									    	<td>SSS Payable - EE</td>
									    	<td>TSI Cost</td>
									    	<td></td>
									    	<td><?php echo $sumsss?></td>
									    	<td>Total</td>
									    	<td><?php echo $sumcont?></td>
									    	<td></td>
									    	<td></td>
									    	<td>Non-Taxable Compensation</td>

									    </tr>
									    <tr>
									    	<td>HDMF Payable - EE</td>
									    	<td>TSI Cost</td>
									    	<td></td>
									    	<td><?php echo $sumhmdf ?></td>
									    	<td></td>
									    	<td></td>
									    	<td></td>
									    	<td></td>
									    	<td>Non-Taxable Compensation</td>
									    	<td>BIR#16C</td>
									    </tr>
									    <tr>
									    	<td>PHIC Payable - EE</td>
									    	<td>TSI Cost</td>
									        <td></td>
									    	<td><?php echo $sump ?></td>
									    	<td></td>
									    	<td></td>
									    	<td></td>
									    	<td></td>
									    	<td>Minimum Wage</td>
									    	<td>BIR#16A</td>
									    	<td></td>
									    </tr>
									    <tr>
									    	<td>WHT - Compensation</td>
									    	<td>TSI Cost</td>
									    	<td></td>
									    	 		<td></td>
									    	<td></td>
									    	<td></td>
									    	<td></td>
									    	<td></td>
									    	<td>SSS/PHIC/HDMF</td>
									    	<td>BIR#16C</td>
									    	<td><?php echo $sumcont?></td>
									    </tr>
									    <tr>
									    	<td>P-Other Deductions</td>
									    	<td>TSI Cost</td>
									    	<td></td>
									    		

									    </tr>
									    <tr>
									    	<td>SSS Loan</td>
									    	<td>TSI Cost</td>
									    	<td></td>
									    	<td></td>
									    	<td></td>
									    	<td></td>
									    	<td></td>
									    	<td></td>
									    	<td>Total Non-Taxable Compensation</td>
									    	<td></td>
									    	<td><?php echo $sumcont?></td>
									    </tr>
									    <tr>
									    	<td>HDMF Loan</td>
									    	<td>TSI Cost</td>
									    	<td></td>
									    </tr>
									    <tr>
									    	<td>P-City Savings</td>
									    	<td>TSI Cost</td>
									    	<td></td>
									    		<td></td>
									    	<td></td>
									    	<td></td>
									    	<td></td>
									    	<td></td>
									    	<td>Total Taxable</td>
									    	<td></td>
									    	<td></td>
									    </tr>
									    <tr>
									    	<td>U-Uploan</td>
									    	<td>TSI Cost</td>
									    	<td></td>
									    	<td></td>
									    	<td></td>
									    	<td></td>
									    	<td></td>
									    	<td></td>
									    	<td>R&F / Managers</td>
									    	<td> BIR#17</td>
									    	<td><?php echo $sumt-$sumcont?></td>
									    </tr>
									    <tr>
									    	<td>P-HMO EE</td>
									    	<td>TSI Cost</td>
									    	<td></td>
									    </tr>
									    <tr>
									    	<td>P-HMO DD</td>
									    	<td>TSI Cost</td>
									    	<td></td>
									    	<td></td>
									    	<td></td>
									    	<td></td>
									    	<td></td>
									    	<td></td>
									    	<td>Tax Withheld</td>
									    	<td>BIR#18</td>
									    	<td><?php echo $sumt*0.2?></td>
									    </tr>
									    <tr>
									    	<td>P-Personal Advances</td>
									    	<td>Mgrs Non-Tax</td>
									    	<td></td>
									    </tr>
									     <tr>
									    	<td>Cash in Bank</td>
									    	<td>Mgrs Non-Tax</td>
									    	<td></td>
									    </tr>
									     <tr>
									    	<td>Cash in Bank</td>
									    	<td>R&F</td>
									    	<td></td>
									    </tr>

									   <?php
		}
   ?>

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
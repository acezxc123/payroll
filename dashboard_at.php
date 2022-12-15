<?php require_once(dirname(__FILE__) . '/hris_at_config.php');  
if ( !isset($_SESSION['Admin_ID']) || !isset($_SESSION['Login_Type']) ) {
   	header('location:' . BASE_URL);
} ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<title>Dashboard</title>

	<link rel="stylesheet" href="<?php echo BASE_URL; ?>bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>plugins/datatables/dataTables.bootstrap.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>plugins/datatables/jquery.dataTables_themeroller.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>dist/css/AdminLTE.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>plugins/iCheck/all.css">
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
				<h1>Dashboard</h1>
				<ol class="breadcrumb">
					<li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Dashboard</li>
				</ol>
			</section>

			<section class="content">
				<div class="row">
        			<div class="col-xs-12">
						<div class="box" style="padding: 10px;">
							<div class="box-body">
								<div class="table-responsiove">
								    <div class="row">
<!-- 
								    	====== -->
									      <div class="col-lg-3 col-md-6">
									        <div class="panel panel-primary">
									          <div class="panel-heading">
									            <div class="row">
									              <div class="col-xs-3"><i class="fa fa-users fa-3x"></i></div>
									              <div class="col-xs-9 text-right">
									              	<?php $qry = $db->query("SELECT count(*) as cn from `wy_employees`");
																	while($row = $qry->fetch_assoc()):
																		?>
																    <div class="huge" style="font-size:20px;"><?php echo  $row['cn']?></div>
																	<?php endwhile; ?>

									                <div>Employee</div>
									              </div>
									            </div>
									          </div><a href="#">
									            <div class="panel-footer"><a href="<?php echo BASE_URL; ?>employees_at"><span class="pull-left">View Details</span><span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></a>
									              <div class="clearfix"></div>
									            </div></a>
									        </div>
									      </div>
									    </div>
									    <!-- 
								    	====== -->
								    	 <div class="row">
								    	 	 <div style="hieght:20%;text-align:center" class="col-xs-4 col-lg-4">
								            <h5 class="page-header"  style="font-size: 16px;">Total Employee Attendance For the Day</h5>
								            <p style="align:center;"><canvas  id="chartjs_bar2"></canvas></p>
								        </div>
								    	 <div style="hieght:20%;text-align:center" class="col-xs-4 col-lg-4">
								            <h5 class="page-header" style="font-size: 16px;">Total Employee Hours For The Month</h5>
								            <p style="align:center;"><canvas  id="chartjs_bar"></canvas></p>
								        </div>
								         <div style="hieght:20%;text-align:center" class="col-xs-4 col-lg-4">
								            <h5 class="page-header" style="font-size: 16px;">Total Employee Attendance For the Month</h5>
								            <p style="align:center;"><canvas  id="chartjs_bar1"></canvas></p>
								        </div>

								         <div style="hieght:20%;text-align:center" class="col-xs-6 col-lg-6">
								            <h5 class="page-header" style="font-size: 16px;">Total Employee Earnings For the Month</h5>
								            <p style="align:center;"><canvas  id="chartjs_baren"></canvas></p>
								        </div>
								          <div style="hieght:20%;text-align:center" class="col-xs-6 col-lg-6">
								            <h5 class="page-header" style="font-size: 16px;">Total Employee Deduction For the Month</h5>
								            <p style="align:center;"><canvas  id="chartjs_bardd"></canvas></p>
								        </div>
								        
									      </div>
									    </div>


								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>


		<footer class="main-footer">
		<strong> &copy; <?php echo date("Y");?> Payroll Management System</strong>
		</footer>
	</div>

	<?php
$date = date('F');

$daten = date('Y-m-1');
$datem = date('Y-m-31');
	 $qry = $db->query("SELECT SUM(num_hr) as total from `attendance` where `date` BETWEEN '".$daten."' AND '" .$datem. "' ");
	 $chart_data="";
	    while($row = $qry->fetch_assoc()){															
            $productname[]  = $date ;
            $sales[] = number_format($row['total'],2);
        }

         $qryen = $db->query("SELECT SUM(earning_total) as totaln from `wy_salaries` where `generate_date` BETWEEN '".$daten."' AND '" .$datem. "' ");
	        $chart_data="";
	        while($rowen = $qryen->fetch_assoc()){															
            $productnameen[]  = $date ;
            $salesen[] = $rowen['totaln'];
           }

            $qrydd = $db->query("SELECT SUM(deduction_total) as totaln from `wy_salaries` where `generate_date` BETWEEN '".$daten."' AND '" .$datem. "' ");
	        $chart_data="";
	        while($rowdd = $qrydd->fetch_assoc()){															
            $productnameddd[]  = $date ;
            $saleseddd[] = $rowdd['totaln'];
           }




     $qry1 = $db->query("SELECT COUNT(status2) as total from `attendance` where status2='in' AND `date` BETWEEN '".$daten."' AND '" .$datem. "'  ");
	 $chart_data="";
	    while($row1 = $qry1->fetch_assoc()){															
            $productnamen[]  = $date ;
            $salesn[] = number_format($row1['total'],2);
        }


$datenow = date('Y-m-d');
$datenowtxt = date('F d, Y');

     $qry2 = $db->query("SELECT COUNT(status2) as total from `attendance` where status2='in' AND `date`='".$datenow."' ");
	 $chart_data="";
	    while($row2 = $qry2->fetch_assoc()){															
            $productname2[]  = $datenowtxt ;
            $productnamedd[]  = $datenowtxt ;
            $sales2[] = number_format($row2['total'],2);
        }


	


 
     ?>

	<script src="<?php echo BASE_URL; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
	<script src="<?php echo BASE_URL; ?>bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/jquery-validator/validator.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/datepicker/bootstrap-datepicker.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/iCheck/icheck.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
	<script src="<?php echo BASE_URL; ?>dist/js/app.min.js"></script>
	<script type="text/javascript">var baseurl = '<?php echo BASE_URL; ?>';</script>
	<script src="<?php echo BASE_URL; ?>dist/js/script_at.js?rand=<?php echo rand(); ?>"></script>
	<script src="<?php echo BASE_URL; ?>js/jquery.js"></script>
  <script src="<?php echo BASE_URL; ?>js/Chart.min.js"></script>
<script>
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($productname); ?>,
                        datasets: [{
                            backgroundColor: [
                               "#5969aa",
                                "#43657r",
                                "#331523",
                                "#ffc750"
                            ],
                            data:<?php echo json_encode($sales); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: false,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
                }
                });
    </script>

    <script>
      var ctx = document.getElementById("chartjs_bar1").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($productnamen); ?>,
                        datasets: [{
                            backgroundColor: [
                               "#ffc750",
                                "#ff407b",
                                "#331523",
                                "#ffc750"
                            ],
                            data:<?php echo json_encode($salesn); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: false,
                        position: 'bottom',
 
                        labels: {
                            fontColor: 'green',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
                }
                });
    </script>

      <script>
      var ctx = document.getElementById("chartjs_bar2").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($productname2); ?>,
                        datasets: [{
                            backgroundColor: [
                               "#331523",
                                "#ff407b",
                                "#331523",
                                "#ffc750"
                            ],
                            data:<?php echo json_encode($sales2); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: false,
                        position: 'bottom',
 
                        labels: {
                            fontColor: 'green',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
                }
                });
    </script>
     <script>
      var ctx = document.getElementById("chartjs_baren").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($productnameen); ?>,
                        datasets: [{
                            backgroundColor: [
                               "red",
                                "#ff407b",
                                "#331523",
                                "#ffc750"
                            ],
                            data:<?php echo json_encode($salesen); ?>,
                        }]

                    },
                    options: {
                           legend: {
                        display: false,
                        position: 'bottom',
 
                        labels: {
                            fontColor: 'green',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
                }
                });
    </script>
     <script>
      var ctx = document.getElementById("chartjs_bardd").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($productnameddd); ?>,
                        datasets: [{
                            backgroundColor: [
                               "#337ab7",
                                "#ff407b",
                                "#331523",
                                "#ffc750"
                            ],
                            data:<?php echo json_encode($saleseddd); ?>,
                        }]

                    },
                    options: {
                           legend: {
                        display: false,
                        position: 'bottom',
 
                        labels: {
                            fontColor: 'green',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
                }
                });
    </script>
    <style>
    	@media only screen and (max-width: 767px) {
    	.col-xs-6 {
    width: 100%;
}

    	.col-xs-4{
    width: 100%;
}
}
    </style>

</body>
</html>
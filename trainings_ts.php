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

	<title>Training</title>

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
				<h1>Trainings</h1>
				<ol class="breadcrumb">
					<li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Trainings</li>
				</ol>
			</section>

			<section class="content">
				<div class="row">
        			<div class="col-xs-12">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">List of Trainings</h3>
								<?php if ( $_SESSION['Login_Type'] == 'admin' ) { ?>
									<button type="button" class="btn btn-xs btn-primary pull-right" data-toggle="modal" data-target="#TrainingModal">
										<i class="fa fa-plus"></i> Add Training
									</button>
								<?php } ?>
							</div>
							<div class="box-body">
								<div class="table-responsiove">
									<?php if ( $_SESSION['Login_Type'] == 'admin' ) { ?>
										<table id="trainings_ts" class="table table-bordered table-striped">
											<thead>
												<tr>
													<th class="text-center">ID #</th>
													<th>TRAINING TITLE</th>
													<th>TRAINING DESCRIPTION</th>
													<th class="text-center">TRAINING DATE</th>
													<th class="text-center">TRAINING TIME</th>
													<th class="text-center">FACILITATOR</th>
													<th class="text-center">ACTION</th>
												</tr>
											</thead>
										</table>
									<?php } else { ?>
										<table id="empholidays" class="table table-bordered table-striped">
											<thead>
												<tr>
													<th class="text-center">HOLIDAY #</th>
													<th>HOLIDAY TITLE</th>
													<th>HOLIDAY DESCRIPTION</th>
													<th class="text-center">HOLIDAY DATE</th>
													<th class="text-center">HOLIDAY TYPE</th>
												</tr>
											</thead>
										</table>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>

		<?php if ( $_SESSION['Login_Type'] == 'admin' ) { ?>
			<div class="modal fade in" id="TrainingModal" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title">Training</h4>
						</div>
						<form method="post" role="form" data-toggle="validator" id="training-form">
							<div class="modal-body">
								<?php $qry = $db->query("SELECT * from `wy_admin` where admin_id='".isset($_SESSION['Admin_ID'])."'");
								while($row = $qry->fetch_assoc()):
									?>
									<input type="hidden" id="company" value="<?php echo $row['company']?>">
								<?php endwhile; ?>
								<div class="form-group">
									<label for="holiday_title">Training Title</label>
									<input type="text" class="form-control" id="training_title" name="training_title"  required />
								</div>
								<div class="form-group">
									<label for="holiday_desc">Description</label>
									<textarea class="form-control" id="training_desc" name="training_desc"  required></textarea>
								</div>
								<div class="form-group">
					                <label for="holiday_date">Training  Date (MM/DD/YYYY)</label>
					                <div class="input-group date">
					                  	<div class="input-group-addon">
					                    	<i class="fa fa-calendar"></i>
					                  	</div>
					                  	<input type="text" class="form-control datepicker pull-right" name="training_date" id="training_date"  required />
					                </div>
					            </div>
					            <div class="form-group">
									<label for="holiday_title">Training Time</label>
									<input type="text" class="form-control" id="training_time" name="training_time"  required />
								</div>

								 <div class="form-group">
									<label for="holiday_title">Facilitator</label>
									<input type="text" class="form-control" id="training_fac" name="training_fac"  required />
								</div>


							</div>
							<div class="modal-footer">
								<input type="hidden" name="id" id="id" />
								<button type="submit" name="submit" class="btn btn-primary">Save Holiday</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		<?php } ?>

		<footer class="main-footer">
		<strong> &copy; <?php echo date("Y");?> Payroll Management System</strong>
		</footer>
	</div>

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
	<script src="<?php echo BASE_URL; ?>dist/js/script.js?rand=<?php echo rand(); ?>"></script>

<script>
if ( $('#trainings_ts').length > 0 ) {
        /* Holiday Table Script Start */
        var holi_table = $('#trainings_ts').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": baseurl + "company_one/?case=LoadingTrainings",
            "columnDefs": [{
                "targets": 0,
                "className": "dt-center"
            }, {
                "targets": 3,
                "className": "dt-center"
            }, {
                "targets": 4,
                "className": "dt-center"
            }, {
                "targets": -1,
                "orderable": false,
                "data": null,
                "className": "dt-center",
                "defaultContent": '<button class="btn btn-success btn-xs editTraining"><i class="fa fa-edit"></i></button> <button class="btn btn-danger btn-xs deleteTraining"><i class="fa fa-trash"></i></button>'
            }]
        });
        /* End of Script */

        /* Edit Holiday Script Start */
        $('#trainings_ts tbody').on('click', '.editTraining', function(e) {
            e.preventDefault();

            var data = holi_table.row($(this).parents('tr')).data();
            $.ajax({
                type     : "POST",
                dataType : "json",
                async    : true,
                cache    : false,
                url      : baseurl + "company_one/?case=GetTrainingByID",
                data     : 'id=' + data[0],
                success  : function(result) {
                    if ( result.code == 0 ) {
                        $("#id").val(result.result.id);
                        $("#training_title").val(result.result.name);
                        $("#training_desc").val(result.result.description);
                        $("#training_date").val(result.result.date).datepicker('update');
                        $("#training_time").val(result.result.time);
                        $("#training_fac").val(result.result.facilitator);
                        $("#TrainingModal").modal('show');
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

        /* Delete Holiday Script Start */
        $('#trainings_ts tbody').on('click', '.deleteTraining', function(e) {
            e.preventDefault();

            var conf = confirm('Are you sure you want to delete this holiday?');
            if ( conf ) {
                var data = holi_table.row($(this).parents('tr')).data();
                $.ajax({
                    type     : "POST",
                    dataType : "json",
                    async    : true,
                    cache    : false,
                    url      : baseurl + "company_one/?case=DeleteTrainingByID",
                    data     : 'id=' + data[0],
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

        $('#training-form').on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            $.ajax({
                type     : "POST",
                dataType : "json",
                async    : true,
                cache    : false,
                url      : baseurl + "company_one/?case=InsertUpdateTrainings",
                data     : form.serialize(),
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
                        $('#TrainingModal').modal('hide');
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
    }
	</script>
</body>
</html>
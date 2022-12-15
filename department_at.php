<?php require_once(dirname(__FILE__) . '/hris_at_config.php'); 
if ( !isset($_SESSION['Admin_ID'])) {
   	header('location:' . BASE_URL);
}




if (isset($_POST['deletebtn'])) {

    $delid = stripslashes($_POST['delid']);

      $insertHolidayn = mysqli_query($db, "UPDATE `wy_department` set delete_flag='1' where id='".$delid."'");
	  if ($insertHoliday) {
		echo '<script>alert("Successfully deleted!")</script>';
		} else {
			echo '<script>alert("Error Saving")</script>';
		}
}


if (isset($_POST['updatebtn'])) {

    $id = stripslashes($_POST['id']);
    $name = stripslashes($_POST['name']);

      $insertHolidayn = mysqli_query($db, "UPDATE `wy_department` set name='$name' where id='".$id."'");
	   if ($insertHolidayn) {
		echo '<script>alert("Successfully saved!")</script>';
		} else {
			echo '<script>alert("Error Saving")</script>';
		}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<title>Department</title>

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
					Department
				</h1>
				<ol class="breadcrumb">
					<li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Department</li>
				</ol>
			</section>

			<section class="content">
				<div class="row">
        			<div class="col-xs-12">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">All Department List</h3>

									<button type="button" class="btn btn-xs btn-primary pull-right" data-toggle="modal" data-target="#AddDeptModal">
										<i class="fa fa-plus"></i> Add Department
									</button>
							
							</div>
							<div class="box-body">
								<div class="table-responsiove">
									<table id="department" class="table table-bordered table-striped">
										<thead>
										
							
											<tr>
												<th>ID#</th>
												<th>Name</th>
												<th width="6%">ACTION</th>
											</tr>
										</thead>
										<tbody>
								<?php $qry = $db->query("SELECT * from `wy_department` where delete_flag=0");
								while($row = $qry->fetch_assoc()):
									?>
									<tr>
										<td><?php echo $row['id']?></td>
										<td><?php echo $row['name']?></td>
										<td><button class="btn btn-success btn-xs editTraining" data-toggle="modal" data-name="<?php echo $row['name']?>" data-id="<?php echo $row['id']?>" data-target="#update" ><i class="fa fa-edit"></i></button> <button class="btn btn-danger btn-xs deleteTraining" data-toggle="modal" data-idd="<?php echo $row['id']?>" data-target="#delete"><i class="fa fa-trash"></i></button></td>
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

		<div class="modal fade in" id="SalaryMonthModal" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title">Select Month for Salary</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<?php 
							$months = array(); $years = array();
							$before2Month = (int)date('m') - 3;
							for ( $i = $before2Month; $i < $before2Month + 20; $i++ ) {
							    $months[$i] = date('F', mktime(0, 0, 0, $i, 1));
							    $years[$i] = date('Y', mktime(0, 0, 0, $i, 1));
							}
							foreach ( $months as $key => $month ) { ?>
								<div class="col-sm-3 <?php echo ($month == date('F') && $years[$key] == date('Y')) ? 'bg-danger' : ''; ?>">
									<a data-month="<?php echo $month; ?>" data-year="<?php echo $years[$key]; ?>" href="#">
										<?php echo strtoupper($month); ?><br /><?php echo $years[$key]; ?>
									</a>
								</div>
							<?php 
							} ?>
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

		<div class="modal fade in" id="AddDeptModal" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title">Add Department</h4>
					</div>
					<form method="post" role="form" data-toggle="validator" id="add-dept-form">
						<div class="modal-body">
							<div class="form-group">
								<div class="row">
									<div class="col-sm-12" style="margin-bottom:10px;">
										<label for="name">Name</label>
										<input type="text" class="form-control" name="name" id="name" required />
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" name="submit" class="btn btn-primary">Add Department</button>
						</div>
					</form>
				</div>
			</div>
		</div>


<!--======================== -->
<div class="modal" tabindex="-1" role="dialog" id="delete">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">DELETE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form method="POST" action="" enctype="multipart/form-data">
      <div class="modal-body">
         <input type="hidden" class="form-control" id="delid" name="delid"  required />
       Are you sure you want to delete this data?
      </div>
      <div class="modal-footer">
         <button type="submit" name="deletebtn" class="btn btn-primary">Save changes</button>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!--======================== -->
<div class="modal" tabindex="-1" role="dialog" id="update">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">UPDATE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form method="POST" action="" enctype="multipart/form-data">
      <div class="modal-body">
         <input type="hidden" class="form-control" id="id" name="id"  required />
        <div class="form-group">
                                    <label for="pass">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"  required />
        </div>
      </div>
      <div class="modal-footer">
         <button type="submit" name="updatebtn" class="btn btn-primary">Save changes</button>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
			$('#department').DataTable();

		    $('#add-dept-form').on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            $.ajax({
                type     : "POST",
                dataType : "json",
                async    : true,
                cache    : false,
                url      : baseurl + "company_two/?case=InsertDept",
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
                        $('#AddDeptModal').modal('hide');
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
	<script>
		$('#delete').on('show.bs.modal', function(e) {
              var id = $(e.relatedTarget).data('idd');

              $(e.currentTarget).find('input[name="delid"]').val(id);
        });

        $('#update').on('show.bs.modal', function(e) {
              var name = $(e.relatedTarget).data('name');
              var id = $(e.relatedTarget).data('id');

              $(e.currentTarget).find('input[name="name"]').val(name);
              $(e.currentTarget).find('input[name="id"]').val(id);
        });
		
	</script>
</body>
</html>
<?php require_once(dirname(__FILE__) . '/hris_at_config.php');  
if ( !isset($_SESSION['Admin_ID']) || !isset($_SESSION['Login_Type']) ) {
   	header('location:' . BASE_URL);
} 


if (isset($_POST['update'])) {
    $email = stripslashes($_POST['email']);
    $uname = stripslashes($_POST['uname']);
    $id = stripslashes($_POST['id']);
    $code = stripslashes($_POST['code']);
     $type = stripslashes($_POST['role']);

     $password = stripslashes($_POST['password']);
if(!empty($password)){
   $pass=sha1($password);
   $insertHoliday = mysqli_query($db, "UPDATE `wy_admin` set admin_code='$code', admin_email='$email',admin_name='$uname',admin_type='$type',admin_password='$pass'  where admin_id='".$id."'");
   if ($insertHoliday) {
    echo '<script>alert("Successfully saved!")</script>';
    } else {
        echo '<script>alert("Error Saving")</script>';
    }
}else{
    $insertHoliday = mysqli_query($db, "UPDATE `wy_admin` set admin_code='$code', admin_email='$email',admin_name='$uname',admin_type='$type' where admin_id='".$id."'");
   if ($insertHoliday) {
    echo '<script>alert("Successfully saved!")</script>';
    } else {
        echo '<script>alert("Error Saving")</script>';
    }
}
}

if (isset($_POST['deletebtn'])) {

    $delid = stripslashes($_POST['delid']);

      $insertHolidayn = mysqli_query($db, "UPDATE `wy_admin` set delete_flag='1' where admin_id='".$delid."'");
}



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<title>Users</title>

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
				<h1>Users</h1>
				<ol class="breadcrumb">
					<li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Users</li>
				</ol>
			</section>

			<section class="content">
				<div class="row">
        			<div class="col-xs-12">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">List of Users</h3>
									<button type="button" class="btn btn-xs btn-primary pull-right" data-toggle="modal" data-target="#UserModal">
										<i class="fa fa-plus"></i> Add User
									</button>
							</div>
							<div class="box-body">
								<div class="table-responsiove">
										<table id="usersn" class="table table-bordered table-striped">
											<thead>
												<tr>
													<th class="text-center">ID #</th>
													<th>USERNAME</th>
													<th>NAME</th>
													<th class="text-center">EMAIL</th>
													<th class="text-center">ROLE</th>
													<th class="text-center">ACTION</th>
												</tr>
											</thead>
                                            <tbody>
                                          <?php $qry = $db->query("SELECT * from `wy_admin` where delete_flag=0");
                                           while($row = $qry->fetch_assoc()):
                                          ?>
                                                <tr>
                                                    <td><?php echo $row['admin_id']?></td>
                                                    <td><?php echo $row['admin_code']?></td>
                                                    <td><?php echo $row['admin_name']?></td>
                                                    <td><?php echo $row['admin_email']?></td>
                                                    <td><?php echo $row['admin_type']?></td>
                                                    <td><button class="btn btn-success btn-xs" data-id="<?php echo $row['admin_id']?>"  data-code="<?php echo $row['admin_code']?>" data-uname="<?php echo $row['admin_name']?>"  data-password="<?php echo $row['admin_password']?>"  data-email="<?php echo $row['admin_email']?>" data-type="<?php echo $row['admin_type']?>"  data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit"></i></button> <button class="btn btn-danger btn-xs" data-toggle="modal" data-idd="<?php echo $row['admin_id']?>" data-target="#delete"><i class="fa fa-trash"></i></button></td>
                                                    
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


			<div class="modal fade in" id="UserModal" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title">User Access</h4>
						</div>
						<form method="post" role="form" data-toggle="validator" id="user-form">
							<div class="modal-body">
								<?php $qry = $db->query("SELECT * from `wy_admin` where admin_id='".isset($_SESSION['Admin_ID'])."'");
								while($row = $qry->fetch_assoc()):
									?>
									<input type="hidden" id="company" value="<?php echo $row['company']?>">
								<?php endwhile; ?>
								<div class="form-group">
									<label for="holiday_title">ID</label>
									<input type="text" class="form-control" id="id" name="id"  />
								</div>
								<div class="form-group">
									<label for="uname">Username</label>
									<input type="text" class="form-control" id="uname" name="uname"  required />
								</div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"  required />
                                </div>
                                <div class="form-group">
                                    <label for="pass">Password</label>
                                    <input type="password" class="form-control" id="pass" name="pass"  required />
                                </div>
								<div class="form-group">
					                <label for="name">Name</label>
					                <input type="text" class="form-control" id="name" name="name"  required />
					            </div>
					            <div class="form-group">
									<label for="role">Role</label>
									<select class="form-control" name="role">
                                        <option value="admin">Admin</option>
                                        <option value="hr-head">HR Head</option>  
                                        <option value="hr-assistant">HR Assistant </option> 
                                        <option value="hr-officer">HR Officer </option>                                
                                    </select>
								</div>

							</div>
							<div class="modal-footer">
								<button type="submit" name="submit" class="btn btn-primary">Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>

            <div class="modal fade in" id="UsereditModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title">User Access</h4>
                        </div>
                        <form method="post" role="form" data-toggle="validator" id="user-form">
                            <div class="modal-body">
                                <?php $qry = $db->query("SELECT * from `wy_admin` where admin_id='".isset($_SESSION['Admin_ID'])."'");
                                while($row = $qry->fetch_assoc()):
                                    ?>
                                    <input type="hidden" id="company" value="<?php echo $row['company']?>">
                                <?php endwhile; ?>
                                <div class="form-group">
                                    <label for="holiday_title">ID</label>
                                    <input type="text" class="form-control" id="id" name="id"  />
                                </div>
                                <div class="form-group">
                                    <label for="uname">Username</label>
                                    <input type="text" class="form-control" id="uname" name="uname"  required />
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"  required />
                                </div>
                                <div class="form-group">
                                    <label for="pass">Password</label>
                                    <input type="password" class="form-control" id="pass" name="pass"  required />
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"  required />
                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select class="form-control" name="role">
                                        <option value="admin">Admin</option>
                                        <option value="hr-head">HR Head</option>  
                                        <option value="hr-assistant">HR Assistant </option> 
                                        <option value="hr-officer">HR Officer </option>                                
                                    </select>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


<!-- dfdf -->
<div class="modal" tabindex="-1" role="dialog" id="exampleModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
           <form method="POST" action="" enctype="multipart/form-data">
      <div class="modal-body">
         <div class="form-group">
                <label for="uname">Username</label>
                <input type="text" class="form-control" id="code" name="code"  required />
                <input type="hidden" class="form-control" id="id" name="id"  required />

         </div>

          <div class="form-group">
                <label for="uname">Name</label>
                <input type="text" class="form-control" id="uname" name="uname"  required />
         </div>

         <div class="form-group">
                <label for="uname">Email</label>
                <input type="text" class="form-control" id="email" name="email"  required />
         </div>

          <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" class="form-control" id="password" name="password" />
                <p style="font-style:italic;font-size:9px;color:blue;">Leave this blank if you dont want to change the password.</p>
         </div>
         <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" name="role">
                    <option value="admin">Admin</option>
                    <option value="hr-head">HR Head</option>  
                    <option value="hr-assistant">HR Assistant </option> 
                    <option value="hr-officer">HR Officer </option>                                
                </select>
        </div>

      </div>
  
      <div class="modal-footer">
        <button type="submit" name="update" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
         </form>
    </div>
  </div>
</div>
<!-- 
======================== -->
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
	<script src="<?php echo BASE_URL; ?>dist/js/script_at.js?rand=<?php echo rand(); ?>"></script>

<script>
if ( $('#users').length > 0 ) {
        /* Holiday Table Script Start */
        var holi_table = $('#users').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": baseurl + "company_two/?case=LoadingUsers",
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
                "defaultContent": '<button class="btn btn-success btn-xs" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit"></i></button> <button class="btn btn-danger btn-xs deleteTraining"><i class="fa fa-trash"></i></button>'
            }]
        });
        /* End of Script */

        /* Edit Holiday Script Start */
        $('#users tbody').on('click', '.editTraining', function(e) {
            e.preventDefault();

            var data = holi_table.row($(this).parents('tr')).data();
            $.ajax({
                type     : "POST",
                dataType : "json",
                async    : true,
                cache    : false,
                url      : baseurl + "company_one/?case=GetUserID",
                data     : 'id=' + data[0],
                success  : function(result) {
                    if ( result.code == 0 ) {
                        $("#id").val(result.result.id);
                        $("#training_title").val(result.result.id);
                        $("#training_desc").val(result.result.id);
                        $("#UsereditModal").modal('show');
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
        $('#users tbody').on('click', '.deleteTraining', function(e) {
            e.preventDefault();

            var conf = confirm('Are you sure you want to delete this holiday?');
            if ( conf ) {
                var data = holi_table.row($(this).parents('tr')).data();
                $.ajax({
                    type     : "POST",
                    dataType : "json",
                    async    : true,
                    cache    : false,
                    url      : baseurl + "company_two/?case=DeleteTrainingByID",
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

        $('#user-form').on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            $.ajax({
                type     : "POST",
                dataType : "json",
                async    : true,
                cache    : false,
                url      : baseurl + "company_two/?case=InsertUsers",
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

    <script>
    $(document).ready(function(){
        $('#exampleModal').on('show.bs.modal', function(e) {
              var id       = $(e.relatedTarget).data('id');
              var code    = $(e.relatedTarget).data('code');
              var uname    = $(e.relatedTarget).data('uname');
            //   var password = $(e.relatedTarget).data('password');
              var email    = $(e.relatedTarget).data('email');
              var type    = $(e.relatedTarget).data('type');

              $(e.currentTarget).find('input[name="uname"]').val(uname);
              $(e.currentTarget).find('input[name="code"]').val(code);
              $(e.currentTarget).find('input[name="id"]').val(id);
              $(e.currentTarget).find('input[name="email"]').val(email);
            //   $(e.currentTarget).find('input[name="password"]').val(password);
              $(e.currentTarget).find('input[name="unamen"]').val(uname);
              $(e.currentTarget).find('select[name="role"]').val(type);
        });

         $('#delete').on('show.bs.modal', function(e) {
              var id = $(e.relatedTarget).data('idd');

              $(e.currentTarget).find('input[name="delid"]').val(id);
        });
    });
    </script>
</body>
</html>
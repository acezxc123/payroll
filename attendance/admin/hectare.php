<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/menubar.php'; ?>

        <div class="content-wrapper">
            <!-- Hectare Editable Content -->
            <section class="content-header">
                <h1>
                    Hectare
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li>Employees</li>
                    <li class="active">Hectare</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <?php
                if (isset($_SESSION['error'])) {
                    echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              " . $_SESSION['error'] . "
            </div>
          ";
                    unset($_SESSION['error']);
                }
                if (isset($_SESSION['success'])) {
                    echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              " . $_SESSION['success'] . "
            </div>
          ";
                    unset($_SESSION['success']);
                }
                ?>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header with-border">
                                Employee Hectare Lists
                            </div>
                            <div class="box-body">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <th>Hectare</th>
                                        <th>Employee Name</th>
                                        <th>Employee Salary</th>
                                        <th>Date</th>
                                        <th>Tools</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // $sql = "SELECT *, employees.id AS empid FROM employees LEFT JOIN hectare_employee ON hectare_employee.employee_id=employees.id";
                                        $sql = "SELECT * FROM hectare_employee";

                                        $query = $conn->query($sql);
                                        while ($row = $query->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['hectare']; ?></td>
                                                <td><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></td>
                                                <td><?php echo $row['employee_salary']; ?></td>
                                                <td><?php echo $row['date']; ?></td>
                                                <td>
                                                    <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['collab_id']; ?>"><i class="fa fa-edit"></i> Edit</button>
                                                    <!-- <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['empid']; ?>"><i class="fa fa-trash"></i> Delete</button> -->
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary btn-sm btn-flat refresh_data" data-id="1"><i class="fa fa-refresh"></i> Refresh Data</button>
                <br>
            </section>

            <!-- Hectare Editable Price -->
            <section class="content-header">
                <h1>
                    Edit Salary Price
                </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header with-border">
                                Hectare Price
                            </div>
                            <div class="box-body">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <th>Price</th>
                                        <th>Tools</th>

                                    </thead>
                                    <tbody>
                                        <?php
                                        // $sql = "SELECT *, employees.id AS empid FROM employees LEFT JOIN hectare_employee ON hectare_employee.employee_id=employees.id";
                                        $sql = "SELECT * FROM hectare_price";

                                        $query = $conn->query($sql);
                                        while ($row = $query->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['price']; ?></td>
                                                <td>
                                                    <button class="btn btn-success btn-sm btn-flat edit_price" data-id="<?php echo $row['id']; ?>"><i class="fa fa-edit"></i> Edit</button>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php include 'includes/footer.php'; ?>
        <?php include 'includes/hectare_modal.php'; ?>
        <?php include 'includes/hectare_price_modal.php'; ?>
        <?php include 'includes/hectare_refresh_modal.php'; ?>
    </div>
    <?php include 'includes/scripts.php'; ?>
    <script>
        $(function() {
            $('.edit').click(function(e) {
                e.preventDefault();
                $('#edit').modal('show');
                var id = $(this).data('id');
                getRow(id);
            });

            $('.edit_price').click(function(e) {
                e.preventDefault();
                $('#edit_price').modal('show');
                var id = $(this).data('id');
                getRow2(id);
            });

            $('.refresh_data').click(function(e) {
                e.preventDefault();
                $('#refresh_data').modal('show');
                var id = $(this).data('id');
            });
        });

        function getRow(id) {
            $.ajax({
                type: 'POST',
                url: 'hectare_row.php',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    $('.empid').val(response.hecID);
                    $('.collab_id').val(response.collab_id);
                    $('.fname').html(response.firstname)
                    $('.lname').html(response.lastname)
                    $('.employee_id').html(response.employee_id);
                    $('#edit_hectare').val(response.hectare);

                }
            });
        }

        function getRow2(id) {
            $.ajax({
                type: 'POST',
                url: 'hectare_price_row.php',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    $('.priceId').val(response.id);
                    $('#edit_price').val(response.price);

                }
            });
        }
    </script>
    <?php include 'includes/datatable_initializer.php'; ?>
</body>

</html>
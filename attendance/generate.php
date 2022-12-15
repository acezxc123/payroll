<!DOCTYPE html>
<html>

<head>
    <script type="text/javascript" src="js/adapter.min.js"></script>
    <script type="text/javascript" src="js/vue.min.js"></script>
    <script type="text/javascript" src="js/instascan.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="script.js"> </script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quattrocento:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&family=Raleway+Dots&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body">
    <section>
        <div class=" container-fluid">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="">
                        <span class="text-warning" style="font-size: 20px; ;"><img style="width:30px;height: 30px" src="http://localhost/payroll/image/transparent.png"></span>

                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navmenu">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a href="http://localhost/payroll/index.php" class="nav-link">Home</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </section>
    <br>
    <br>
    <br>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <span style="line-height: 1%;">
                        <h1 class="display-3 text-start">Generate Qr Code</h1>
                        <p class="text-muted" style="font-family: 'Raleway', sans-serif;">Qr code Generator by Google</p>
                    </span>
                    <br>
                    <div class="row">
                        <div class="col-sm-3 col-sm-offset-3">
                            <form method="POST">
                                <div class="form-group">
                                    <label for="">Convert Text to Qr Code</label>
                                    <input type="text" class="form-control" name="text_code" placeholder="input text">
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary" name="generate"><i class="bi bi-qr-code"> Generate Qr Code</i></button>
                            </form>
                        </div>
                        <div class="col-sm-3">
                            <div class="card" style="height: 40.3vh;">
                                <?php
                                if (isset($_POST['generate'])) {
                                    $code = $_POST['text_code'];
                                    echo "
						<img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$code&choe=UTF-8'>
					";
                                }
                                ?>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
   
    </body>

</html>
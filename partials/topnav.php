<header class="main-header">
	<a href="<?php echo BASE_URL; ?>" class="logo">
		<span class="logo-mini"><b><?php echo $userData['company_name']; ?></b></span>
		<span class="logo-lg"><b><?php echo $userData['company_name']; ?></b></span>
	</a>
	<nav class="navbar navbar-static-top" role="navigation">
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="<?php echo BASE_URL; ?>dist/img/admin-bg.png" class="user-image" alt="User Image">
							<span class="hidden-xs"><?php echo $userData['admin_name']; ?></span>
					</a>
					<ul class="dropdown-menu">
						<li class="user-header">
								<img src="<?php echo BASE_URL; ?>dist/img/admin-bg.png" class="img-circle" alt="User Image">
							<p>
								<?php echo $_SESSION['Login_Type'] ?>

								<small><?php echo COMPANY_NAME; ?></small>
							</p>
						</li>
						<li class="user-footer">
							<div class="pull-left">
								<a href="<?php echo BASE_URL; ?>profile/" class="btn btn-default btn-flat">Profile</a>
							</div>
							<div class="pull-right">
								<a href="<?php echo BASE_URL; ?>logout/" class="btn btn-default btn-flat">Logout</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>
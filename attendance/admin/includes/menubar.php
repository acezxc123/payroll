<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <style>
      .user-panel {
        background: url('https://products.ls.graphics/mesh-gradients/images/46.-Watusi_1.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
      }
    </style>
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($user['photo'])) ? '../images/' . $user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $user['firstname'] . ' ' . $user['lastname']; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">SUMMARY</li>
      <li class=""><a href="home.php"><i class="fa fa-bar-chart"></i> <span>Dashboard</span></a></li>
      <li class="header">MANAGE FUNCTIONS</li>

      <li><a href="attendance.php"><i class="fa fa-calendar-check-o"></i> <span>Attendance List</span></a></li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-id-badge"></i>
          <span>Employees Information</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="employee.php"><i class="fa fa-circle-o"></i> Employee List</a></li>
          <li><a href="overtime.php"><i class="fa fa-circle-o"></i> Overtime</a></li>
          <li><a href="cashadvance.php"><i class="fa fa-circle-o"></i> Cash Advance</a></li>
          <li><a href="hectare.php"><i class="fa fa-circle-o"></i> Hectare</a></li>
          <li><a href="schedule.php"><i class="fa fa-circle-o"></i>Work Schedules</a></li>
        </ul>
      </li>
      <li><a href="deduction.php"><i class="fa fa-bookmark"></i> <span>Deductions</span></a></li>
      <li><a href="position.php"><i class="fa fa-briefcase"></i> <span>Work Positions</span></a></li>
      <li class="header">PRINTABLES REPORT</li>
      <li><a href="payroll.php"><i class="fa fa-files-o"></i> <span>Payroll</span></a></li>
      <li><a href="schedule_employee.php"><i class="fa fa-clock-o"></i> <span>Work Schedule</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
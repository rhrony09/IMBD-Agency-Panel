<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($user['photo'])) ? './library/images/' . $user['photo'] : './library/images/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $user['firstname'] . ' ' . $user['lastname']; ?></p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">REPORTS</li>
      <li class=""><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li class="header">MANAGE</li>

      <li><a href="plan_create.php"><i class="fa fa-plus-circle"></i> <span>Create Plan</span></a></li>
      <li><a href="working_platforms.php"><i class="fa fa-chevron-right"></i> <span>Working Platforms</span></a></li>

      <!-- <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i>
          <span>Factory Employees</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="cutting_master.php"><i class="fa fa-circle-o"></i> Cutting Master</a></li>
          <li><a href="embroidery_master.php"><i class="fa fa-circle-o"></i> Embroidery Master</a></li>
          <li><a href="swing_master.php"><i class="fa fa-circle-o"></i> Swing Master</a></li>
        </ul>
      </li> -->

      <?php if ($user['role'] == 1) : ?>
        <li class="header">Admin Area</li>
        <li><a href="admin.php"><i class="fa fa-bug"></i> <span>Admins</span></a></li>
      <? endif ?>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
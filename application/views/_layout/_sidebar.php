<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url(); ?>assets/img/<?php echo $userdata->foto; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $userdata->nama; ?></p>
        <!-- Status -->
        <a href="<?php echo base_url(); ?>assets/#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">LIST MENU</li>
      <!-- Optionally, you can add icons to the links -->

      <li <?php if ($page == 'home') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Home'); ?>">
          <i class="fa fa-home"></i>
          <span>Home</span>
        </a>
      </li>
      
      <li <?php if ($page == 'destinasi') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Destinasi'); ?>">
          <i class="fa fa-user"></i>
          <span>Data Destinasi</span>
        </a>
      </li>

      <li <?php if ($page == 'pemandu') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Pemandu'); ?>">
          <i class="fa fa-bars"></i>
          <span>Data Pemandu</span>
        </a>
      </li>

      <li <?php if ($page == 'pengguna') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Pengguna'); ?>">
          <i class="fa fa-users"></i>
          <span>Data Pengguna</span>
        </a>
      </li>

      <li <?php if ($page == 'transaksi') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Transaksi'); ?>">
          <i class="fa fa-heart"></i>
          <span>Data Transaksi</span>
        </a>
      </li>

      <li <?php if ($page == 'ulasan') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Ulasan'); ?>">
          <i class="fa fa-tag"></i>
          <span>Data Ulasan</span>
        </a>
      </li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
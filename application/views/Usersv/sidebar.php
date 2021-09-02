<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
          <a class="sidebar-brand brand-logo" href="<?php echo base_url('Userc/index') ?>"><img src="<?php echo base_url() ?>/BootstrapTemplate/template/assets/images/logo.svg" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="<?php echo base_url('Userc/index') ?>"><img src="<?php echo base_url() ?>/BootstrapTemplate/template/assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="<?php echo base_url('Userc/index') ?>" class="nav-link">
              <div class="nav-profile-image">
                <img src="<?php echo base_url() ?>/BootstrapTemplate/template/assets/images/faces/face1.jpg" alt="profile" />
                <span class="login-status online"></span>
                <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex flex-column pr-3">
                <span class="font-weight-medium mb-2">Payal Patel</span>
              </div>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Userc/index') ?>">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Userc/registerform') ?>">
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              <span class="menu-title">Sign Up</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Userc/loginform') ?>">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">Log In</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Userc/displayuser') ?>">
              <i class="mdi mdi-table-large menu-icon"></i>
              <span class="menu-title">Registered Users</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Userc/resetpwd') ?>">
              <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              <span class="menu-title">Reset Password</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Userc/forgotpwd_email') ?>">
              <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              <span class="menu-title">Forgot Password ?</span>
            </a>
          </li>

          <?php
       if($this->session->userdata('Reg_id')){?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Userc/logout') ?>">
              <i class="mdi mdi-logout mr-2 text-primary"></i>
              <span class="menu-title">Sign Out</span>
            </a>
          </li>
          <?php }?>


          <?php
       if($_SESSION['token']){?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Userc/logoutgoogle') ?>">
              <i class="mdi mdi-logout mr-2 text-primary"></i>
              <span class="menu-title">Sign Out</span>
            </a>
          </li>
          <?php }?>
        </ul>
      </nav>
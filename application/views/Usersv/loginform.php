<?php include "C:/xampp/htdocs/payal/CodeIgniterCRUD/setup.php";?>

<!DOCTYPE html>
<html lang="en">
  <?php include "header1.php"; ?>
  <body>
    <div class="container-scroller">
      <?php include "sidebar.php"; ?>
      <div class="container-fluid page-body-wrapper">
        <?php include "headertop.php" ?>
        <div class="main-panel">
          <div class="content-wrapper">
          <?php if($err=$this->session->flashdata('register_success')){ ?>
          <div class='alert alert-success'><?php echo $err; ?></div><?php } ?>

      
          <?php if($error=$this->session->flashdata('login_failed')) {?>
            <div class="alert alert-danger"><?php echo $error; ?></div><?php  }?>
            <div class="page-header">
           
              <h3 class="page-title">Log In</h3>
              
            </div>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <?php echo form_open('Userc/loginform')  ?>
                      <div class="form-group">
                        <label >Email address</label>
                        <?php echo form_input(['name'=>'email','class'=>'form-control','placeholder'=>'Enter Email','value'=>set_value('email')]) ?>
                        <span><?php echo form_error('email') ?></span>
                      </div>
                      
                     <div class="form-group">
                        <label >Password</label>
                        <?php echo form_password(['name'=>'pwd','class'=>'form-control','placeholder'=>'Enter Password','value'=>set_value('pwd')]) ?>
                        <span><?php echo form_error('pwd') ?></span>
                      </div>
                      
                        <button type="submit" class="btn btn-primary mr-2"> Login </button>
                        
                        
                          <div class="btn btn-light">
                          <img src="<?php echo site_url('Assets/image/logo.jpg'); ?>" width="50px">
                          <a href="<?php echo $google->createAuthUrl(); ?>">LOGIN WITH GOOGLE</a>
                          </div>
                    </form>
                  </div>
                </div>
              </div>
           </div>
        </div>
          <?php include "footer1.php"; ?>
        </div>
      </div>
    </div>
   <?php include "footerlast.php"; ?>
  </body>
</html>
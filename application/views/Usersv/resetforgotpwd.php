<!DOCTYPE html>
<html lang="en">
  <?php include "header1.php"; ?>
  <body>
    <div class="container-scroller">
      <?php include "sidebar.php"; ?>
      <div class="container-fluid page-body-wrapper">
        <?php include "headertop.php" ?>
        <div class="main-panel">
        <?php if ($rr=$this->session->flashdata('pwdsuccess')) { ?>
    <div class='alert alert-success'><?php echo $rr; ?></div>
<?php }?>


<?php if ($this->session->flashdata('pwderror')) { ?>
    <div class="alert alert-danger"><?php	echo $this->session->flashdata('pwderror'); ?></div>
 <?php } ?>
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Reset Password</h3>
              
            </div>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <?php echo form_open('Userc/updatepwd')  ?>
                     
                      <div class="form-group">
                        <label for="exampleInputPassword1">New Password</label>
                        <input type="password" name="Password" class="form-control"  placeholder="New Password" />
                        <span><?php echo form_error('npwd') ?></span> 
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" name="Cpassword" class="form-control"  placeholder="Confirm Password" />
                        <span><?php echo form_error('cfpwd') ?></span> 

                      </div>
                        <button type="submit" class="btn btn-primary mr-2">Reset Password </button>
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
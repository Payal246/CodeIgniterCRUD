<!DOCTYPE html>
<html lang="en">
  <?php include "header1.php"; ?>
  <body>
    <div class="container-scroller">
      <?php include "sidebar.php"; ?>
      <div class="container-fluid page-body-wrapper">
        <?php include "headertop.php" ?>
        <div class="main-panel">
              <?php if($error=$this->session->flashdata('error')) {?>
              <div class="alert alert-danger"><?php echo $error; ?></div>
              <?php  }?>

              <?php if($erro=$this->session->flashdata('successemail')) {?>
              <div class="alert alert-success"><?php echo $erro; ?></div>
              <?php  }?>


              <?php if($err=$this->session->flashdata('erroremail')) {?>
              <div class="alert alert-danger"><?php echo $err; ?></div>
              <?php  }?>
            <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Forgot Password</h3>
              
            </div>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <?php echo form_open('Userc/forgotpwd_email')  ?>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <?php echo form_input(['name'=>'email','class'=>'form-control','placeholder'=>'Enter Email']) ?>
                        <span><?php echo form_error('email') ?></span>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Send Email </button>
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
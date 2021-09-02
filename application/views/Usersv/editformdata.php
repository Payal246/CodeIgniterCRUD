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
            <div class="page-header">
              <h3 class="page-title">Update User</h3>
              
            </div>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  
                  <?php echo form_open('Userc/editrecord')  ?>
                    <div class="form-group">
                        <?php echo form_hidden('Reg_id',$row->Reg_id) ?>   
                    </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Firstname</label>
                        <?php echo form_input(['name'=>'Firstname','class'=>'form-control','placeholder'=>'Enter Firstname','value'=>set_value('Firstname',$row->Firstname)]) ?>
                        <span><?php echo form_error('Firstname') ?></span>
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputUsername1">Lastname</label>
                        <?php echo form_input(['name'=>'Lastname','class'=>'form-control','placeholder'=>'Enter Lastname','value'=>set_value('Lastname',$row->Lastname)]) ?> 
                        <span><?php echo form_error('Lastname') ?></span>
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <?php echo form_input(['name'=>'Email','class'=>'form-control','placeholder'=>'Enter Email','value'=>set_value('Email',$row->Email)]) ?>
                        <span><?php echo form_error('Email') ?></span>
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputUsername1">Username</label>
                        <?php echo form_input(['name'=>'Username','class'=>'form-control','placeholder'=>'Enter Username','value'=>set_value('Username',$row->Username)]) ?>
                        <span><?php echo form_error('Username') ?></span>
                      </div>
                      
                    <button type="submit" class="btn btn-primary mr-2"> Update </button>
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
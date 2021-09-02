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
              <h3 class="page-title">Sign Up</h3>
              
            </div>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  
                  <?php echo form_open('Userc/registerform')  ?>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Firstname</label>
                        <?php echo form_input(['name'=>'fname','class'=>'form-control','placeholder'=>'Enter Firstname','value'=>set_value('fname')]) ?>
                        <span><?php echo form_error('fname') ?></span>
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputUsername1">Lastname</label>
                        <?php echo form_input(['name'=>'lname','class'=>'form-control','placeholder'=>'Enter Lastname','value'=>set_value('lname')]) ?> 
                        <span><?php echo form_error('lname') ?></span>
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <?php echo form_input(['name'=>'email','class'=>'form-control','placeholder'=>'Enter Email','value'=>set_value('email')]) ?>
                        <span><?php echo form_error('email') ?></span>
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputUsername1">Username</label>
                        <?php echo form_input(['name'=>'uname','class'=>'form-control','placeholder'=>'Enter Username','value'=>set_value('uname')]) ?>
                        <span><?php echo form_error('uname') ?></span>
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <?php echo form_password(['name'=>'pwd','class'=>'form-control','placeholder'=>'Enter Password','value'=>set_value('pwd')]) ?>
                        <span><?php echo form_error('pwd') ?></span>
                      </div>
                      
                      
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Gender</label>
                            <div class="col-sm-2">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="gender" value="Male"/>Male </label>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="gender" value="Female"/> Female </label>
                              </div>
                            </div>
                            <span><?php echo form_error('gender') ?></span> 
                          </div>
                      
                        <div class="form-group row">
                            <label >Country</label>
                            <select class="form-control" name="country" id="countryid" >
                            <option disabled selected hidden>Select Country</option>
                            <?php foreach($country as $row){
                                echo '<option value="'.$row->c_id.'">'.$row->c_name.'</option>';
                              } 
                              ?>
                            </select>
                            <span><?php echo form_error('country') ?></span>
                        </div>
                        <div class="form-group row">
                            <label >State</label>
                            <select class="form-control" name="state" id="stateid" >
                            <option disabled selected hidden>Select State</option>
                            </select>
                            <span><?php echo form_error('state') ?></span>
                        </div>
                        <div class="form-group row">
                            <label >City</label>
                            <select class="form-control" name="city" id="cityid">
                            <option disabled selected hidden>Select City</option>
                            </select>
                            <span><?php echo form_error('city') ?></span>

                        </div>
                        <div class="form-group">
                        <label>Contact</label>
                        <input type="text" name="Contact" class="form-control" id="exampleInputPassword1" placeholder="Contact(+91)" />
                        <span><?php echo form_error('Contact') ?></span>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                      
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
   <script>
     <script>
$(document).ready(function(){
$('#countryid').on('change',function(){
var country_id=$('#countryid').val();
$.ajax({
        url:"<?php echo base_url();?>Userc/fetch_stateC",
      type:"POST",
      data:{country_id:country_id},
      cache:false,
      success:function(data)
      {
        $('#stateid').html(data);
      }
    });
  });

  $('#stateid').on('change',function(){
var state_id=$('#stateid').val();
$.ajax({
        url:"<?php echo base_url();?>Userc/fetch_cityC",
      type:"POST",
      data:{state_id:state_id},
      cache:false,
      success:function(data)
      {
        $('#cityid').html(data);
      }
    });
  });
});
</script>
     </script>
  </body>
</html>
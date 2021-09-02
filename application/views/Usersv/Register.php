<?php include "header.php" ?>

<div class="container" style="margin-top:20px;">
<h3>Registration</h3>
<?php if($ss=$this->session->flashdata('register_failed')){ ?>
<div class="alert alert-danger"><?php echo $ss; ?></div>
<?php } ?>

<?php echo form_open('Userc/registerform')  ?>
<div class="row">
    <div class="col-sm-6">

    <div class="form-group">
        <lable>First Name</lable>
        <?php echo form_input(['name'=>'fname','class'=>'form-control','placeholder'=>'Enter Firstname','value'=>set_value('fname')]) ?>   
    </div>
    <span><?php echo form_error('fname') ?></span>

    <div class="form-group">
        <lable>Last Name</lable>
        <?php echo form_input(['name'=>'lname','class'=>'form-control','placeholder'=>'Enter Lastname','value'=>set_value('lname')]) ?>    
    </div>
    <span><?php echo form_error('lname') ?></span>

    <div class="form-group">
        <lable>Email</lable>
        <?php echo form_input(['name'=>'email','class'=>'form-control','placeholder'=>'Enter Email','value'=>set_value('email')]) ?>   
    </div>
    <span><?php echo form_error('email') ?></span>

    <div class="form-group">
        <lable>User Name</lable>
        <?php echo form_input(['name'=>'uname','class'=>'form-control','placeholder'=>'Enter Username','value'=>set_value('uname')]) ?>    
    </div>
    <span><?php echo form_error('uname') ?></span>

    <div class="form-group">
        <lable>Password</lable>
        <?php echo form_password(['name'=>'pwd','class'=>'form-control','placeholder'=>'Enter Password','value'=>set_value('pwd')]) ?>    
    </div>
    <span><?php echo form_error('pwd') ?></span> 

    <div class="form-group">
        <label >Gender</label>
        
        <input type="radio"  name="gender" value="Male">Male
        <input type="radio" name="gender"  value="Female">Female
    </div>
    <span><?php echo form_error('gender') ?></span> 
     <div class="form-group">
    <lable>Country</lable>
        <select name="country" id="countryid" class="form-select">
            <option disabled selected hidden>Select Country</option>
            <?php foreach($country as $row){
                echo '<option value="'.$row->c_id.'">'.$row->c_name.'</option>';
            } 
            ?>
        </select>
    </div>
    <span><?php echo form_error('country') ?></span>

    <div class="form-group">
    <lable>State</lable>
        <select name="state" id="stateid" class="form-select">
            <option disabled selected hidden>Select State</option>
        </select>
    </div>
    <span><?php echo form_error('state') ?></span>

    <div class="form-group">
    <lable>City</lable>
        <select name="city" id="cityid" class="form-select">
            <option disabled selected hidden>Select City</option>
        </select>
    </div>
    <span><?php echo form_error('city') ?></span>

    <div class="form-group">
       <label>Contact</label>
       <?php echo form_input(['name'=>'Contact','class'=>'form-control','placeholder'=>'Enter Contact number(+91)','value'=>set_value('Contact')]) ?> 
         
    </div>
    <span><?php echo form_error('Contact') ?></span>

    <!-- <div class="form-group">
    <label>Upload Profile</label>
    <?php echo form_input(['type'=>'file','name'=>'image','class'=>'form-control']) ?>
    </div>
    <span><?php echo form_error('image') ?></span>

    </div>
    </div> -->
    <?php  echo form_submit(['class'=>'btn btn-primary','value'=>'Register','style'=>'margin-top:10px;'])?>
    
</div>

<?php include "footer.php" ?>

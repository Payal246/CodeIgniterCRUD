<?php include "header.php" ?>

<div class="container" style="margin-top:20px;">
<h3>Reset Password</h3>
<?php if ($rr=$this->session->flashdata('pwdsuccess')) { ?>
    <div class='alert alert-success'><?php echo $rr; ?></div>
<?php }?>


<?php if ($this->session->flashdata('pwderror')) { ?>
    <div class="alert alert-danger"><?php	echo $this->session->flashdata('pwderror'); ?></div>
 <?php } ?>

<?php echo form_open_multipart('Userc/resetpwd')  ?>
<div class="row">
    <div class="col-sm-6">
    <div class="form-group">
    <div class="form-group">
        <lable>Email</lable>
        <?php echo form_input(['name'=>'email','class'=>'form-control','placeholder'=>'Enter Email','value'=>set_value('email')]) ?>   
    </div>
    <span><?php echo form_error('email') ?></span>
        <lable>Old Password</lable>
        <input type="password" name="pwd" class="form-control" placeholder="Enter Password">
            
    </div>
    <span><?php echo form_error('pwd') ?></span> 

    <div class="form-group">
        <lable>New Password</lable>
        <input type="password" name="npwd" class="form-control" placeholder="Enter Password">
    </div>
    <span><?php echo form_error('npwd') ?></span> 

    <div class="form-group">
        <lable>Confirm Password</lable>
        <input type="password" name="cfpwd" class="form-control" placeholder="Enter Password">    
    </div>
    <span><?php echo form_error('cfpwd') ?></span> 

    

    
    <?php  echo form_submit(['class'=>'btn btn-primary','value'=>'Reset','style'=>'margin-top:10px;'])?>
    
</div>

<?php include "footer.php" ?>

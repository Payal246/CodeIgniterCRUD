
<?php error_reporting(0);
include "header.php" ?>

<?php include "C:/xampp/htdocs/payal/CodeIgniterCRUD/setup.php";?> 
<?php

if(isset($_GET['code'])){
  
    $token=$google->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['token']=$token;
    if(!isset($token["error"])){
    
        $google->setAccessToken($token['access_token']);
        $service=new Google_Service_Oauth2($google);
        $data=$service->userinfo->get();
        $email=$data['email'];
        $_SESSION['email']=$email;
    }
}
?>
<html>
    <head></head>
<body>
<?php if($su=$this->session->flashdata('login_success')){?>
<div class="alert alert-success">
<?php echo $su;?>
</div>
<?php } ?>

<?php if($_SESSION['token']){ ?>
<div class='alert alert-success'><?php echo "Login with Google Successfull"; ?></div>
    <?php } else{?>
        <!-- <div class='alert alert-danger'><?php echo "Logout"; ?></div> -->

       <?php }?>

    <h3>Welcome</h3>
    
</body>
    </html>

<?php include "footer.php" ?>
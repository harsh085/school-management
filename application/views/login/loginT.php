<?php if($this->session->userdata('user') != ''){
    
redirect(base_url('dashboard'));  }

else{
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Page</title>

	<!-- <link rel="stylesheet" href="<?php //echo base_url('assets/css/login/sidenav.css'); ?>"> -->

    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap4/bootstrap.min.css'); ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/login/mystyle.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/fonts/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login/Login-Form-Clean.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login/Registration-Form-with-Photo.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login/Login-Form-Dark.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login/Navigation-with-Button.css'); ?>">
    <!-- <link rel="stylesheet" href="<?php //echo base_url('assets/css/login/styles.css'); ?>"> -->
    
</head>
<body>

<style type="text/css">
  .card{
    width: 40%;
    float: none;
    left: 30%;
  }
  @media screen and (max-width: 450px){
    .card{
      width: 90%;
      left: 5%;
    }
  }
</style>
<body>

<div class="login-clean">
        <form action="<?php echo base_url('login/login_validationT'); ?>" method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration">
            <i class="fa fa-user" style="color:#22367f;"></i>
            </div>
            <div class="form-group">
            <input class="form-control" type="text" name="usr" placeholder="Employee ID" required>
            <span class="text-danger"><?php echo form_error("usr");?>
            </div>
            <div class="form-group">
            <input class="form-control" type="password" name="pass" placeholder="Password" required>
            <span class="text-danger"><?php echo form_error("pass");?>
            </div>
            <div class="form-group"><span class="text-danger"> <?php echo $this->session->flashdata('error'); ?> </span>
            <button class="btn btn-primary btn-block" type="submit" style="background-color:#22367f;">Log In</button>
            </div><a href="" class="forgot">Forgot your ID or password? -> Contact School Management</a>
           
            </form>
    </div>

 <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
 <script src="<?php echo base_url('assets/js/bootstrap4/bootstrap.min.js') ?>"></script>
</body>
<?php } ?>

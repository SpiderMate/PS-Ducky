<?php session_start(); 
if(isset($_POST['Submit'])){
$logins = array('root' => 'toor','spidersec' => 'spidersec');
$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
$Password = isset($_POST['Password']) ? $_POST['Password'] : '';
if (isset($logins[$Username]) && $logins[$Username] == $Password){
$_SESSION['UserData']['Username']=$logins[$Username];
header("location:index.php");
exit;
} else {
$msg="<span style='color:red'>Invalid Login Details</span>";
}
}
?>

<html>
    <head>
    <title>Ps-Duck | Login</title>

    </head>
<body>

<style>

body {
	background: #ddd !important;	
}

.wrapper {	
	margin-top: 130px;
  margin-bottom: 130px;
}

.form-signin {
  max-width: 280px;
  padding: 25px 0px 10px 0px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid #1d2030;  
}

.button {
    background-color: #79c455;
    -webkit-transition-duration: 0.4s; 
    transition-duration: 0.4s;
    color: black; 
    border: 2px solid #79c455;
    padding: 5px 10px 5px 10px;
    border-radius: 4px;
}

.fc {
	  position: relative;
	  font-size: 13px;
	  height: auto;
	  padding: 5px;
	}

.panel-heading {
    padding: 12px 15px;
    max-width: 250px;
    margin: 0 auto;
    background-color: #1d2030;
    border: 1px solid #1d2030;  
}

.avatar {
    display: block;
    border-radius: 200px;
    box-sizing: border-box;
    border: 2px solid #1d2030;
}

</style>

<style>
.alignleft {
	float: left;
}
.alignright {
	float: right;
}
</style>

<div class="wrapper">
<div class="panel-heading" style="padding-top: 4px;padding-bottom: 4px;"><b><font color="#fff">LOGIN</font></b></div>
<form action="" method="post" name="Login_Form" class="form-signin">
    <?php if(isset($msg)){?>
    <?php echo $msg;?>
    <?php } ?>
    <div class="alignleft" style="padding-bottom: 15px; padding-top: 10px;padding-left: 20px"><img class="avatar" src="img/logo.png" hight="70" width="70"></div>
    <div class="alignrightt">
    <center>
    <div style="padding-bottom: 10px;"><input name="Username" type="text" class="fc"></div>
    <div style="padding-bottom: 10px;"><input name="Password" type="password" class="fc"></div>
    <input name="Submit" type="submit" value="Login" class="button">
    </center>
    </div>
</form>
<div>
</body>
</html>
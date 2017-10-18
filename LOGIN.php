<?php
echo "<link rel='stylesheet' type='text/css' href='nanozon.css'>";
echo "<title>";
echo "Nanozon | Login";
echo "</title>";
echo <<< _END

<img src="Jack-O-Lantern.jpg" style='position:fixed;top:0px;left:0px;width:100%;height:100%;z-index:-1;'>

<head>
    <br><br>
	<div style = "background-color:#000000;padding-top:0.25cm;">
    	<center>
			<img src="nanozon.jpg" style="width:200px;height:60px;">
			<!--vertical-align:middle-->
			</div>
			<br><br>
		</center>
		
<html class="lt-ie9 lt-ie8 lt-ie7" lang="en">
<html class="lt-ie9 lt-ie8" lang="en">
<html class="lt-ie9" lang="en">

<head>
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Login Form</title>
  <link rel="stylesheet" href="css/style.css">
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
</head>

<center>
	<div style="width:350px;height:460px;padding:10px;border:10px solid coral;background-color:white;">
            <p class="nanozon2">
                WELCOME
            </p>
		<div class="nanozon" align="left">Email</div>
		<form method = "post">
			<input class='text' type = "email" name="email" style="width:345px;height:25px;vertical-align:middle;">
			<br><br>
		<div class="nanozon" align="left">Password</div>
			<input type = "password" name="password" style="width:345px;height:25px;vertical-align:middle;">
			<br><br>
			<button class="button" type="submit" formmethod="post" formaction="NZ_loginCheck.php">&nbsp&nbspLOGIN&nbsp&nbsp</button>
		</form>
		<td style="text-align:right;padding-right:15px;">
_END;

if ( isset($_GET['error']) && $_GET['error'] == 1 )
{
	echo "<script type='text/javascript'>alert('Invalid login.');</script>";
	echo '<span style="color:#FF0000;text-align:center;"> Please try again. </span>';
	echo "<br>\n" . "<br>\n";
}

echo <<< _END
      <a class="nanozon" href="NZ_NewUser.php" style="color:#FFA500;">
			<b>
                  New User?
			</b> 
      </a>
  </td>
		</center>
				</div>

_END;

?>


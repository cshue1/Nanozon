<?php
echo "<link rel='stylesheet' type='text/css' href='nanozon.css'>";
echo "<title>";
echo "Nanozon | New User";
echo "</title>";
echo <<< _END

<img src="Jack-O-Lantern.jpg" style='position:fixed;top:0px;left:0px;width:100%;height:100%;z-index:-1;'>

<head>
	<div style = "background-color:#000000;padding-top:0.25cm;">
    	<center>
			<img src="nanozon.jpg" style="width:200px;height:60px;">
			</div>
			<br><br>
		</center>
		<center>
				<div style="width:350px;height:600px;padding:10px;border:10px solid coral;background-color:white;">
                	<p class='nanozon2'>Create Account</p>
        <div class='nanozon'>
		<form method = "post">
        <div align="left">Your Name (First Last)</div>
			<input class='text' type = "text" name="name" style="width:345px;height:25px;vertical-align:middle;">
			<br><br>
		<div align="left">Email</div>
			<input class='text' type = "email" name="email" style="width:345px;height:25px;vertical-align:middle;">
			<br><br>
		<div align="left">Password</div>
			<input class='text' type = "password" name="password1" style="width:345px;height:25px;vertical-align:middle;">
			<br><br>
		<div align="left">Password again</div>
			<input class='text' type = "password" name="password2" style="width:345px;height:25px;vertical-align:middle;">
			<br><br>
			<button class='button' type="submit" formmethod="post" formaction="NZ_NewUserCheck.php">CREATE ACCOUNT</button>
		</form>
        </div>
_END;
if ( isset($_GET['error']) && $_GET['error'] == 1)
{
	echo "<script type='text/javascript'>alert('Please complete all fields.');</script>";
	echo '<center><span style="color:#FF0000;text-align:center;font-size:13px"> Please try again. </span></center>';
}
elseif ( isset($_GET['error']) && $_GET['error'] == 2)
{
	echo "<script type='text/javascript'>alert('We already have an account associated with that email.');</script>";
	echo '<center><span style="color:#FF0000;text-align:center;font-size:13px"> Please try again. </span></center>';
}
elseif ( isset($_GET['error']) && $_GET['error'] == 3)
{
	echo "<script type='text/javascript'>alert('Passwords do not match.');</script>";
	echo '<center><span style="color:#FF0000;text-align:center;font-size:13px"> Please try again. </span></center>';
}
elseif ( isset($_GET['error']) && $_GET['error'] == 4)
{
	echo "<script type='text/javascript'>alert('Password must be at least 8 characters in length.');</script>";
	echo '<center><span style="color:#FF0000;text-align:center;font-size:13px"> Please try again. </span></center>';
}
echo <<< _END
		<p class='nanozon3'>Already have an account?
        <a class='nanozon3' href = "LOGIN.php">Sign In</a>
        </p>
		</center>
				</div>
</body>
_END;
?>
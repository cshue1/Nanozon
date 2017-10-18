<?php
require_once 'NZ_SearchBar.php';
echo "<title>";
echo "Nanozon | Delete Account";
echo "</title>";
echo <<< _END
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

<img src="Jack-O-Lantern.jpg" style='position:fixed;top:0px;left:0px;width:100%;height:100%;z-index:-1;'>

		<center>
				<div style="width:350px;height:550px;padding:10px;border:10px solid coral;background-color:white;">
					<p class='nanozon2'>
                        Delete Your Account
                    </p>
        <div class='nanozon'>
		<div align="left">Email</div>
        <form method = "post">
			<input class = "text" type = "email" name="email" style="width:345px;height:25px;vertical-align:middle;">
			<br><br>
		<div align="left">Password</div>
			<input class = "text" type = "password" name="password" style="width:345px;height:25px;vertical-align:middle;">
			<br><br>
        </div>
<script>
    function ConfirmDelete()
    {
      var x = confirm("Are you sure you want to delete?");
      if (x)
          return true;
      else
        return false;
    }
</script>   
			<button class='button' Onclick="return ConfirmDelete();" type="submit" formmethod="post" formaction="DeleteAccountCheck.php">DELETE ACCOUNT</button>

            
		</form>
     
_END;

if ( isset($_GET['error']) && $_GET['error'] == 1 )
{
	echo "<br>";
	echo "<script type='text/javascript'>alert('Please enter your email and password to delete your account.');</script>";
	echo '<center><span style="color:#FF0000;text-align:center;font-size:13px"> Please try again. </span></center>';
}
elseif ( isset($_GET['error']) && $_GET['error'] == 2 )
{
	echo "<br>";
	echo "<script type='text/javascript'>alert('Invalid credentials.');</script>";
	echo '<span style="color:#FF0000;text-align:center;font-size:13px"> Please try again. </span>';
    echo "<br>";
}

echo <<< _END
<br><br>

<a class='nanozon3' href = "myaccount.php">Back to My Account</a>
  </body>
		</center>
				</div>
</body>
_END;

?>
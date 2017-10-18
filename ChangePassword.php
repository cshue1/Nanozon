<?php
require_once 'NZ_SearchBar.php';
echo "<title>";
echo "Nanozon | Change Password";
echo "</title>";
echo <<< _END

<img src="Jack-O-Lantern.jpg" style='position:fixed;top:0px;left:0px;width:100%;height:100%;z-index:-1;'>

<body>	    
    <center>
            <div style="width:350px;height:600px;padding:10px;border:10px solid coral;background-color:white;">
                <p class='nanozon2'>Change Password</p>
    <div class='nanozon'>
        <div align="left">Current Password</div>
        <form method = "post">
            <input class = "text" type = "password" name="oldPass" style="width:345px;height:25px;vertical-align:middle;">
            <br><br>
        <div align="left">New Password</div>
            <input class = "text" type = "password" name="pass1" style="width:345px;height:25px;vertical-align:middle;">
            <br><br>
        <div align="left">New Password Again</div>
            <input class = "text" type = "password" name="pass2" style="width:345px;height:25px;vertical-align:middle;">
            <br><br>
            <button class='button' type="submit" formmethod="post" formaction="ChangePasswordCheck.php">Change Password</button>
        </form>
    </div>
_END;
if ( isset($_GET['error']) && $_GET['error'] == 1)
{
	echo "<br>";
	echo "<script type='text/javascript'>alert('Please complete all fields.');</script>";
	echo '<center><span style="color:#FF0000;text-align:center;font-size:13px"> Please try again. </span></center>';
}
elseif ( isset($_GET['error']) && $_GET['error'] == 2)
{
	echo "<br>";
	echo "<script type='text/javascript'>alert('Password must be at least 8 characters in length.');</script>";
	echo '<center><span style="color:#FF0000;text-align:center;font-size:13px"> Please try again. </span></center>';
}
elseif ( isset($_GET['error']) && $_GET['error'] == 3)
{
	echo "<br>";
	echo "<script type='text/javascript'>alert('Passwords do not match.');</script>";
	echo '<center><span style="color:#FF0000;text-align:center;font-size:13px"> Please try again. </span></center>';
}
elseif ( isset($_GET['error']) && $_GET['error'] == 4)
{
	echo "<br>";
	echo "<script type='text/javascript'>alert('Invalid credentials.');</script>";
	echo '<center><span style="color:#FF0000;text-align:center;font-size:13px"> Please try again. </span></center>';
}
echo <<< _END
		<a class='nanozon3' href = "myaccount.php">CANCEL</a>
		</center>
				</div>
</body>
_END;
?>
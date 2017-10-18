<?php
	require_once 'NZ_SearchBar.php';
	echo "<link rel='stylesheet' type='text/css' href='nanozon.css'>";
	echo "<title>";
    echo "Nanozon | My Account";
    echo "</title>";
	
    session_start();
    $first = $_SESSION['firstname'];
    $last = $_SESSION['lastname'];
    $email = $_SESSION['email'];

echo <<< _END

<img src="Jack-O-Lantern.jpg" style='position:fixed;top:0px;left:0px;width:100%;height:100%;z-index:-1;'>

<head>
		
			<br><br>
		</center>
		<center>
				<div style="width:350px;height:450px;padding:30px;border:10px solid coral;background-color:white;">
                	<p class='nanozon2'>Your Account</p>
					<div class='nanozon3' align="left"> Name: $first $last <br>
						Email: $email </div>
						<br><br><br>
					<div class='nanozon'>
					<a class='nanozon2' href = "NZ_search.php" style="color:orange">Back to Shopping</a>
					</div>
					<br>
					 <a class='nanozon2' href = "ChangePassword.php" style="color:green">Change My Password</a> <br> <br>
						<BODY LINK="PURPLE" VLINK="PURPLE">
					   <a class='nanozon2' href = "DeleteAccount.php">Delete Account</a>
						<br>\n
						<br>\n
						</body>
						
				
						</center>
				</div>
</body>
_END;

if ( isset($_GET['updatedpass']) && $_GET['updatedpass'] == 1 )
{
	echo "<script type='text/javascript'>alert('Your password has been updated.');</script>";
}

?>

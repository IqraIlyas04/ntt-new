<?php 
include_once('includes/header.php');
include_once('partial_breadcrumbs.php');

if(isset($_POST['submit']))
{
    extract($_POST);
    // print_r($_POST);
	$username = mysqli_real_escape_string($conn, $username);
	$password = mysqli_real_escape_string($conn, $password);
	$confirmpassword = mysqli_real_escape_string($conn, $confirmpassword);
	$message="";

	if($password != $confirmpassword)
	{
		echo "Passwords do not match !";
	}
    else
    {    
		if(!isset($error))
		{
		$user = $db_handler->edit_user_setting($username, $password, $user_id);
		$location="index.php";
			if($user)
      		{
              		$message = "User edited";
            }
            else
            {
            	$message = "Error Occurred.";
            }
		}
 	}
 	?>
<p><?php echo $message;?></p>
<a class="btn btn-primary" href="<?php echo $location;?>"> Back to View</a>
<?php
exit;
}  
?>
<div class="container">
	<div class="bgc-white p-20 bd">
	<h1 class="page-header">Edit-Admin/User</h1>
	<br>
	<form action="" method="post">
		<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
		<label>Enter User Name</label>
			<input type="text" name="username" id="username" class="form-control" placeholder="@username" required="required" value='<?php echo $_SESSION['username']; ?>' />
			<br>
		<label>Enter Password</label>
			<input type="password" name="password" id="password" class="form-control" placeholder="Password" required="required" value='' />
			<br>
		<label>Confirm Password</label>
			<input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder=" Confirm Password" required="required" value=''/>
			<br>
			<input id="submit" class="btn btn-primary btn-md" type="submit" name="submit" value="Save Changes"/> 
			<a class= "btn btn-danger" href="index.php">Cancel</a>
	</form>
</div>
</div>
<?php include_once('includes/footer.php');?>
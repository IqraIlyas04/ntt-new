<?php
include_once('includes/header.php');

if(isset($_POST['submit']))
{
	extract($_POST);

	$result=$db_handler->add_contact($first_name, $last_name, $phn_no);
	if(!$result)
	{
		echo "Error";
	}
}
?>
<br><br><br><br><br><br><br><br><br><br><br><br>
<!-- <form name="myForm" id="myForm" action=""  onsubmit="" method="post" enctype="multipart/form-data"  > -->
	<input type="text" placeholder="First Name" name="first_name" class="form-control"/><br/>
						<input type="text" placeholder="Last Name" name="last_name" class="form-control"/><br/>
						<input type="text" placeholder="Phone Number" name="phn_no" class="form-control"/><br/>
						<input id="submittype" class="btn btn-md" role="button" type="submit" name="submit" value="Submit"/>
	<!-- </form> -->
<?php include_once('includes/footer.php'); ?>
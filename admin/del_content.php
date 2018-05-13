<?php
 include_once('includes/header.php');
 if(isset($_GET['id']) && isset($_GET['section']))
{
	 $contact_id=$_GET['id'];
	 $sm_id=$_GET['id'];
	 $user_id=$_GET['id'];
	 $dest_id=$_GET['id'];
	 $offer_id=$_GET['id'];
	 $partner_id=$_GET['id'];
	 $section=$_GET['section'];
}

if($section == "CONTACT")
{
	 $result=$db_handler->delete_contact($contact_id);
	 $location="view-contact.php";
	 $message="Contact Deleted.";
}
else if($section == "SM") 
{
	 $result=$db_handler->delete_sm($sm_id);
	 $location="view-sm.php";
	 $message="Social Media Deleted.";
}
else if($section == "USER")
{
	$result=$db_handler->del_user($user_id);
	$location="view-admin.php";
	$message="User Deleted.";
}
else if($section == "DEST")
{
	$result=$db_handler->del_destination($dest_id);
	$location="view-destination.php";
	$message="Destination Deleted.";
}
else if($section == "OFF")
{
	$result=$db_handler->del_offer($offer_id);
	$location="view-offers.php";
	$message="Offer Deleted.";
}
else if($section == "PARTNER") 
{
	 $result=$db_handler->delete_partner($partner_id);
	 $location="view-partner.php";
	 $message="Partner Deleted.";
}

	if(!$result)
	{
		$message="Error Occured";
	}
?>
<br><br>
<p><?php echo $message;?></p>
<a class="btn btn-primary" href="<?php echo $location;?>"> Back to View</a>
<?php
exit;
?>
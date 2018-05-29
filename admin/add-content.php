<?php 
include_once('includes/header.php');
include_once('partial_breadcrumbs.php');

if(isset($_GET['section']))
{
	$section=$_GET['section'];
}
if($section == "SM")
{
	$location="view-sm.php";
}
else if($section == "USER")
{
	$location="view-admin.php";
}
else if($section == "DEST")
{
	$location="view-destination.php";
}
else if($section == "OFF")
{
	$location="view-offers.php";
}
else if($section == "PARTNER")
{
	$location = "view-partner.php";
}

if(isset($_POST['submit']))
{
	extract($_POST);

	$exist=false;
	$message="";

	if($section == "SM")
	{
		$location="view-sm.php";
		if($db_handler->check_sm_exist($sm_title))
		{
			$exist=true;
		}
		else
		{
			$result=$db_handler->add_sm($sm_title, $sm_link);
		}		
	}
	else if($section == "USER")
	{
		$password = mysqli_real_escape_string($conn, $password);
        $confirmpassword = mysqli_real_escape_string($conn, $confirmpassword);       
        if($password != $confirmpassword)
        {
            $exist=true;
            $location="add-content.php?section=USER";
        }
        else
        {
			$location="view-admin.php";
			if($db_handler->check_username_exist($username))
			{
				$exist=true;
			}
			else
			{
				$result=$db_handler->add_user($username, $password, $is_admin);
			}
		}
	}
	else if($section == "DEST")
	{
		if($db_handler->check_city_exist($dest_city_id))
		{
			$exist=true;
		}
		else
		{
			$ImageName = $_FILES['dest_img']['name'];
	        $path = 'img/destination/'.$dest_city_id.'-img'; 
	        $dest_img = $path . $_FILES['dest_img']['name']; 
	        move_uploaded_file($_FILES['dest_img']['tmp_name'], $dest_img);

			$result=$db_handler->add_dest($dest_img, $dest_country_id, $dest_city_id, $dest_id);
		}
	}
	else if($section == "OFF")
	{
		
			$ImageName = $_FILES['offer_img']['name'];
	        $path = 'img/offer/'.$offer_package.'-img'; 
	        $offer_img = $path . $_FILES['offer_img']['name']; 
	        move_uploaded_file($_FILES['offer_img']['tmp_name'], $offer_img);

			$result=$db_handler->add_offer($offer_img, $dest_id, $offer_package, $offer_days, $offer_nights, $offer_price, $offer_desc);
		
	}
	if($section == "PARTNER")
	{
		$location="view-partner.php";
		if($db_handler->check_partner_exist($partner_name))
		{
			$exist=true;
		}
		else
		{
			$ImageName = $_FILES['partner_img']['name'];
          	$path = 'img/partners/'.$partner_name.'-img'; 
          	$partner_img = $path . $_FILES['partner_img']['name']; 
          	move_uploaded_file($_FILES['partner_img']['tmp_name'], $partner_img);

			$result=$db_handler->add_partner($partner_name, $partner_img, $partner_web_url);
		}		
	}


	if($exist == true)
	{
		switch ($section) 
		{
			case "SM":
			$message = "Social Media title already exists.";
			break;

			case "USER":
			$message = "Username already exist/Incorrect Password.";
			break;

			case "PARTNER":
			$message = "Partner title already exist.";
			break;

			case "DEST":
			$message = "City Name already exist.";
			break;
			
		}
	}
	else
	{
		if($result)
		{
			switch ($section) 
			{
				case "SM":
				$message="Social Media Added.";
				break;

				case "USER":
				$message = "Users Added.";
				break;

				case "DEST":
				$message = "Destination Added.";
				break;

				case "OFF":
				$message="Offers Added.";
				break;

				case "PARTNER":
				$message = "Partner Added.";
				break;				
			}			
		}
		else
		{
			$message="Error Occured.";
		}
	}
?>
<br><br>
<p><?php echo $message;?></p>
<a class="btn btn-primary" href="<?php echo $location;?>"> Back to View</a>
<?php
exit;
}
?>
<br>
<div class="container">
	<div class="bgc-white p-20 bd">
		<div style="display:none;" id="error_msg_box" class="alert alert-danger"></div>
			<form name="myForm" id="myForm" action=""  onsubmit="" method="post" enctype="multipart/form-data"  >
	  			<!-- javascript validation id -->
				<input type="hidden" id="sectionType" value='<?php echo $section;?>'/>
				<?php
					if($section == "SM")
					{
						include_once('includes/partial_view/add_content/add_sm.php');
					}

					else if($section == "USER")
					{
						include_once('includes/partial_view/add_content/add_user.php');	
					}

					else if($section == "DEST")
					{
						include_once('includes/partial_view/add_content/add_destination.php');		
					}

					else if($section == "OFF")
					{
						include_once('includes/partial_view/add_content/add_offer.php');
					}

					else if($section == "PARTNER")
					{
						include_once('includes/partial_view/add_content/add_partner.php');	
					}
				?>
				<br>
				<input id="submittype" class="btn btn-outline-primary" role="button" type="submit" name="submit" value="Submit"/>
				<a class= "btn btn-outline-danger" role="button" href="<?php echo $location; ?>">Cancel</a>
     	</form>  
 	</div>
</div>  

<?php include_once('includes/footer.php');?>

<?php 
include_once('includes/header.php');
include_once('partial_breadcrumbs.php');

if(isset($_GET['id']) && isset($_GET['section']))
{
    $sm_id=$_GET['id'];
    $section=$_GET['section'];
    $user_id=$_GET['id'];
    $dest_id=$_GET['id'];
    $partner_id=$_GET['id'];
    $offer_id=$_GET['id'];
}

if($section == "SM")
{
	 $location="view-sm.php";
	 $sm=$db_handler->get_sm($sm_id);
}

else if($section == "USER")
{
	 $location="view-admin.php";
	 $user=$db_handler->get_users_edit($user_id);	
}

else if($section == "DEST")
{
    $location="view-destination.php";
    $dest=$db_handler->get_destination($dest_id);
}

else if($section == "OFF")
{
    $location="view-offers.php";
    $offer=$db_handler->get_offer($offer_id);
}

else if($section == "PARTNER")
{
    $location="view-partner.php";
    $partner=$db_handler->get_partner($partner_id);
}

if(isset($_POST['submit']))
{
	extract($_POST);
    $exist=false;

    if($section == "SM")
    {
        $result=$db_handler->edit_sm($sm_title, $sm_link, $sm_id);
        $location="view-sm.php";
    }

    else if($section == "USER")
    {
        $password = mysqli_real_escape_string($conn, $password);
        $confirmpassword = mysqli_real_escape_string($conn, $confirmpassword);
        if($password != $confirmpassword)
        {                  
            $exist=true;
            $location="edit-content.php?section=USER&id=$user_id";
        }
        else
        { 
    	   $result = $db_handler->edit_user($username, $password, $is_admin, $user_id);
    	   $location="view-admin.php";
        }
    }

    else if($section == "DEST")
    {
        $ImageName = $_FILES['dest_img']['name'];
        if($ImageName == "")
        {
          //keep old one
            $dest_img = $dest[0]['dest_img'];
        }
        else
        {
            //upload image
            $path = 'img/destination/'.$dest_city_id.'-img'; 
            $dest_img = $path . $_FILES['dest_img']['name']; 
            move_uploaded_file($_FILES['dest_img']['tmp_name'], $dest_img);
        }
        $result=$db_handler->edit_dest($dest_img, $dest_country_id, $dest_city_id, $dest_id);
    }

    else if($section == "OFF")
    {
        $ImageName = $_FILES['offer_img']['name'];
        if($ImageName == "")
        {
            //keep old one
            $offer_img = $offer[0]['offer_img'];
        }
        else
        {
            //upload image
            $path = 'img/offer/'.$offer_package.'-img'; 
            $offer_img = $path . $_FILES['offer_img']['name']; 
            move_uploaded_file($_FILES['offer_img']['tmp_name'], $offer_img);
        }
        $result=$db_handler->edit_offer($offer_img, $dest_id, $offer_package, $offer_days, $offer_nights, $offer_price, $offer_desc, $offer_id);
    }

    else if($section == "PARTNER")
    {
        $ImageName = $_FILES['partner_img']['name'];
        if($ImageName == "")
        {
            //keep old one
            $partner_img = $partner[0]['partner_img'];
        }
        else
        {
            //upload image
            $path = 'img/partner/'.$partner_name.'-img'; 
            $partner_img = $path . $_FILES['partner_img']['name']; 
            move_uploaded_file($_FILES['partner_img']['tmp_name'], $partner_img);
        }
        $result=$db_handler->edit_partner($partner_name, $partner_img, $partner_web_url, $partner_id);
    }

    if($exist == true)
    {
        switch($section)
        {
            case "USER":
            $message = "Password do not match!";
            break;
        }
    }
    else
    {
        if($result)
        {
            switch($section)
            {
                case "SM":
                $message = "Social Media Edited.";
                break;

                case "USER":
                $message = "User Edited.";
                break;

                case "DEST":
                $message = "Destination Edited.";
                break;

                case "OFF":
                $message = "Offer Edited.";
                break;

                case "PARTNER":
                $message = "Partner Edited.";
                break;
            }
        }
        else
        {
            $message = "Error Occurred.";
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
            <input type="hidden" id="sectionType" value='<?php echo $section;?>'/>
            <?php
                if($section == "SM")
                {
                    include_once('includes/partial_view/edit_content/edit_sm.php');
                }

                else if($section == "USER")
                {
                    include_once('includes/partial_view/edit_content/edit_user.php');
                }

                else if($section == "DEST")
                {
                    include_once('includes/partial_view/edit_content/edit_destination.php');
                }

                else if($section == "OFF")
                {
                    include_once('includes/partial_view/edit_content/edit_offer.php');
                }

                else if($section == "PARTNER")
                {
                    include_once('includes/partial_view/edit_content/edit_partner.php');
                }
            ?>
            <br>
            <input id="submittype" class="btn btn-outline-primary" role="button" type="submit" name="submit" value="Submit"/>
            <a class= "btn btn-outline-danger" role="button" href="<?php echo $location; ?>">Cancel</a>
        </form>
    </div>
</div>

<?php include_once('includes/footer.php');?>
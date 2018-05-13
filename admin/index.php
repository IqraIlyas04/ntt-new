<?php  
include_once('includes/header.php');
include_once('partial_breadcrumbs.php');
 $main=array();

 switch ($_SESSION['is_admin']) {
    case 1:
   	$main=array
    (
        array
        (
            'title'=>'Admin',
            'img'=>'img/icons/user.svg',
            'href'=>'view-admin.php'
         ),
        array
        (
            'title'=>'Destinations',
            'img'=>'img/icons/dest.svg',
            'href'=>'view-destination.php'
        ), 
        array
        (
            'title'=>'Social Media',
            'img'=>'img/icons/social-media.svg',
            'href'=>'view-sm.php'
        ),
        array
        (
            'title'=>'Contacts',
            'img'=>'img/icons/phone-book.svg',
            'href'=>'view-contact.php'
        ),          
        array
        (
            'title'=>'Partners',
            'img'=>'img/icons/collaboration.svg',
            'href'=>'view-partner.php'
        ),
        array
        (
            'title'=>'Special Offers',
            'img'=>'img/icons/discount.svg',
            'href'=>'view-offers.php'
        ),                           
    );
    break;

    case 2:
    $main=array
    (
        array
        (
            'title'=>'Destinations',
            'img'=>'img/icons/dest.svg',
            'href'=>'view-destination.php'
        ), 
        array
        (
            'title'=>'Social Media',
            'img'=>'img/icons/social-media.svg',
            'href'=>'view-sm.php'
        ),
        array
        (
            'title'=>'Contacts',
            'img'=>'img/icons/phone-book.svg',
            'href'=>'view-contact.php'
        ),          
        array
        (
            'title'=>'Partners',
            'img'=>'img/icons/collaboration.svg',
            'href'=>'view-partner.php'
        ),
        array
        (
            'title'=>'Special Offers',
            'img'=>'img/icons/discount.svg',
            'href'=>'view-offers.php'
        ),            
    );
    break;
   
   default:
     break;
 }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Naresco Travels</title>
<style>
	  .head
	  {
	    color: #31708f;
	    margin-top: 6px;
	    font-size: 16px;
	  }
	  .dashboard-links-main:hover
	  {
	    text-decoration: none;
	  }
</style>
</head>
<body>
<div class="bgc-white p-20 bd">
<div class="row text-center pad-top">
   <?php 
      for($i=0; $i<count($main); $i++)
      {
    ?>
  <div class="col-md-2">
      <div class="div-square" >      
         <a class="dashboard-links-main" href="<?php echo $main[$i]['href'];?>" >
            <img src="<?php echo $main[$i]['img'];?>" style="height:60px; width:85px;" alt="admin">
            <h4 class="head"><?php echo $main[$i]['title'];?></h4>        
          </a>
      </div>
  </div>
    <?php
       }
    ?>
</div>
</div>
</body>
</html>

<?php include_once('includes/footer.php');?>



<?php
session_start();
include_once('db_connect.php');
include_once('db_handler.php');
include_once('utility.php');
   
$db = new DB_CONNECT();
$conn = $db->connect();
 
$db_handler = new DB_HANDLER($conn);
$utility_handler = new UTILITY();
   

//view all destinations and offers onload
if($_POST['action'] == "fetch_destinations")
{
extract($_POST);
$rowperpage = 8;
$dest=$db_handler->get_cust_cols("SELECT * from destination_offers ORDER BY country LIMIT 0,".$rowperpage);
$query=$db_handler->get_cust_cols("SELECT count(*) as allcount from destination_offers");
$allcount=$query[0]['allcount'];
?>
<div class="col-md-10">
<h3 class="heading" class="heading" style=" ">View the latest destinations and offers! </h3>
<div class="grid">
<?php
for($i=0; $i<count($dest); $i++)
{?>
<div class="main_class col-xs-6 col-sm-6 col-md-6 col-lg-3">
	<div style="background: linear-gradient(to top, rgba(0,0,0,0.25), rgba(0,0,0,0.75)), url('admin/<?php echo $dest[$i]['img']; ?>'); background-size: cover; height: 280px; margin-bottom: 45px;" class="item">
		<div class="item-header">
			<p class="title"><?php echo $dest[$i]['package_name'];?></p>
			<?php
			if($dest[$i]['type'] == "special offers")
			{?>
			    <p class="off_title"><?php echo $dest[$i]['city'];?>, <?php echo $dest[$i]['country']; ?></p>
			<?php
			}
			else
			{?>
			    <p class="title"><?php echo $dest[$i]['city'];?>, <?php echo $dest[$i]['country']; ?></p>
			<?php
			}?>
		</div>
		<div class="item-footer">
			<?php
			if($dest[$i]['type'] == "special offers")
			{?>
			    <p class="offers">View Special Offer</p>
			<?php
			}
			else
			{?>
			    <p class="offers">View Destination</p>
			<?php
			}?>
		</div>
	</div>
</div>
<?php
}
?>
</div>

<center>
   <input class="load-more"  id="show_dest" type="button" value="Show More"> 
   <input type="hidden" id="row" value="0">
   <input type="hidden" id="all" value="<?php echo $allcount; ?>"> 
</center>
</div> 
<?php
exit;
}

//previous and next pagination
elseif($_POST['action'] == "fetch_more")
{
extract($_POST);
$q=$_POST['search'];
$row = $_POST['row'];
$rowperpage = 8;
$dest=$db_handler->get_cust_cols("SELECT * from destination_offers WHERE city LIKE '%$q%' or country LIKE '%$q%'or package_name LIKE '%$q%' or type LIKE '%$q%' ORDER BY country  LIMIT "  .$row. "," .$rowperpage);

for($i=0; $i<count($dest); $i++)
{?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
    <div style="background: linear-gradient(to top, rgba(0,0,0,0.25), rgba(0,0,0,0.75)), url('admin/<?php echo $dest[$i]['img']; ?>'); background-size: cover; height: 280px; margin-bottom: 45px;" class="item">
	    <div class="item-header">
	        <p class="title"><?php echo $dest[$i]['package_name'];?></p>
	        <?php
	        if($dest[$i]['type'] == "special offers")
	        {?>
	        	<p class="off_title"><?php echo $dest[$i]['city'];?>, <?php echo $dest[$i]['country']; ?></p>
	        <?php
	        }
	        else
	        {?>
	        	<p class="title"><?php echo $dest[$i]['city'];?>, <?php echo $dest[$i]['country']; ?></p>
	        <?php
	        }?>			
	    </div>
	    <div class="item-footer">
	        <?php
	        if($dest[$i]['type'] == "special offers")
	        {?>
	        	<p class="offers">View Special Offer</p>
	        <?php
	        }
	        else
	        {?>
	        	<p class="offers">View Destination</p>
	        <?php
	        }?>
	    </div>
    </div>
</div>
<?php
}
exit;
}

//filter only destinations 
else if($_POST['action'] == "fetch_only_destinations")
{
extract($_POST);
$dest=$db_handler->view_dest();
?>
<div class="dgrid col-md-10" id="grid">
<h3 class="heading" style=" ">View the latest destinations and offers! </h3>
<?php
for($i=0; $i<count($dest); $i++)
{?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
    <div style="background: linear-gradient(to top, rgba(0,0,0,0.25), rgba(0,0,0,0.75)), url('admin/<?php echo $dest[$i]['img']; ?>'); background-size: cover; height: 280px; margin-bottom: 45px;" class="item">
	    <div class="item-header">
	        <p class="title"><?php echo $dest[$i]['package_name'];?></p>
	        <p class="title"><?php echo $dest[$i]['city'];?>, <?php echo $dest[$i]['country']; ?></p>
	    </div>
	    <div class="item-footer">
		    <?php
		    if($dest[$i]['type'] == "special offers")
		    {?>
		        <p class="offers">View Special Offer</p>
		    <?php
		    }
		    else
		    {?>
		        <p class="offers">View Destination</p>
		    <?php
		    }?>
	    </div>
    </div>
</div>
<?php
}
?>
</div>
<?php
exit;
}

//live search
elseif ($_POST['action'] == "live_search") 
{
extract($_POST);
$q=$_POST['search'];
$rowperpage = 8;
$dest=$db_handler->get_cust_cols("SELECT * from destination_offers WHERE city LIKE '%$q%' or country LIKE '%$q%'or package_name LIKE '%$q%' or type LIKE '%$q%' ORDER BY country LIMIT 0,".$rowperpage);
$query=$db_handler->get_cust_cols("SELECT count(*) as allcount from destination_offers WHERE city LIKE '%$q%' or country LIKE '%$q%'or package_name LIKE '%$q%' or type LIKE '%$q%'");
$allcount=$query[0]['allcount'];
?>
<div class="col-md-10">
<h3 class="heading" style="">Search Keywords: <?php echo $q; ?></h3>
<div class="sgrid">
<?php
for($i=0; $i<count($dest); $i++)
{?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
   <div style="background: linear-gradient(to top, rgba(0,0,0,0.25), rgba(0,0,0,0.75)), url('admin/<?php echo $dest[$i]['img']; ?>'); background-size: cover; height: 280px; margin-bottom: 45px;" class="item">
	    <div class="item-header">
	        <p class="title"><?php echo $dest[$i]['package_name'];?></p>
	        <?php
	        if($dest[$i]['type'] == "special offers")
	        {?>
	        	<p class="off_title"><?php echo $dest[$i]['city'];?>, <?php echo $dest[$i]['country']; ?></p>
	        <?php
	        }
	        else
	        {?>
	        	<p class="title"><?php echo $dest[$i]['city'];?>, <?php echo $dest[$i]['country']; ?></p>
	        <?php
	        }?>		
	    </div>
	    <div class="item-footer">
	        <?php
	        if($dest[$i]['type'] == "special offers")
	        {?>
	        	<p class="offers">View Special Offer</p>
	        <?php
	        }
	        else
	        {?>
	        	<p class="offers">View Destination</p>
	        <?php
	        }?>
	    </div>
   </div>
</div>
<?php
}
?>
</div>
</div>
<center>
<div id="show-more" style="display: none;">
   <input class="show-more"  id="show_dest" type="button" value="Show More" > 
</div>
   <input type="hidden" id="row" value="0">
   <input type="hidden" id="all" value="<?php echo $allcount; ?>"> 
</center>

<?php
exit;
}

//fetch filter by destination country to view destinations/offers cards based on that country
elseif ($_POST['action'] == "fetch_country")
{
extract($_POST);
$rowperpage = 8;
$dest=$db_handler->preparedStatement($conn, "get", "SELECT * from destination_offers WHERE country_id=? ORDER BY country LIMIT 0," .$rowperpage, array("i",$country_id));
$query=$db_handler->preparedStatement($conn, "get", "SELECT count(*) as allcount from destination_offers WHERE country_id=? ORDER BY country", array("i",$country_id));
$allcount=$query[0]['allcount'];
?>
<div class="col-md-10">
<h3 class="heading" style=" ">Filter Country: <?php echo $dest[0]['country'];?></h3>
<div id="country_grid">
<?php
   for($i=0; $i<count($dest); $i++)
   {?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
   <div style="background: linear-gradient(to top, rgba(0,0,0,0.25), rgba(0,0,0,0.75)), url('admin/<?php echo $dest[$i]['img']; ?>'); background-size: cover; height: 280px; margin-bottom: 45px;" class="item">
	    <div class="item-header">
	        <p class="title"><?php echo $dest[$i]['package_name'];?></p>
	        <?php
	        if($dest[$i]['type'] == "special offers")
	        {?>
	        	<p class="off_title"><?php echo $dest[$i]['city'];?>, <?php echo $dest[$i]['country']; ?></p>
	        <?php
	        }
	        else
	        {?>
	        	<p class="title"><?php echo $dest[$i]['city'];?>, <?php echo $dest[$i]['country']; ?></p>
	        <?php
	        }?>			
	    </div>
	    <div class="item-footer">
	        <?php
	        if($dest[$i]['type'] == "special offers")
	        {?>
	        	<p class="offers">View Special Offer</p>
	        <?php
	        }
	        else
	        {?>
	        	<p class="offers">View Destination</p>
	        <?php
	        }?>
	    </div>
   </div>
</div>
<?php
}
?>
</div>
</div>
<center>
<div id="more" style="display: none;">
      <input class="show-more"  id="show_dest" type="button" value="Show More" > 
</div>
   <input type="hidden" id="row" value="0">
   <input type="hidden" id="all" value="<?php echo $allcount; ?>"> 
</center>
<?php
exit;
}

//fetch city for drop down filter
else if($_POST['action'] == "fetch_city")
{
extract($_POST);

$city=$db_handler->get_offers_by_countryid($country_id);
	if(!$city)
	{
		echo "null";
		exit;
	}
	else
	{
		echo "<option>Select City</option>";
	    for($i=0;$i<count($city);$i++)
	    {
	        echo '<option value="'.$city[$i]['dest_city_id'].'">'.$city[$i]['city_name'].'</option>';
	    }
	exit;
	}
}

//fetch filter by offer city cards for viewing
else if($_POST['action'] == "fetch_city_offers")
{
extract($_POST);
$rowperpage = 8;
$offer=$db_handler->preparedStatement($conn, "get", "SELECT * from destination_offers where city_id=? ORDER BY country LIMIT 0," .$rowperpage, array("i",$city_id));
$query=$db_handler->preparedStatement($conn, "get", "SELECT count(*) as allcount from destination_offers where city_id=? ORDER BY country", array("i",$city_id));
$allcount=$query[0]['allcount'];
?>
<div class="city col-md-10">
<h3 class="heading" style=" ">Filter City: <?php echo $offer[0]['city'];?> </h3>
<div id="f_city">
<?php
for($i=0; $i<count($offer); $i++)
{?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
   <div style="background: linear-gradient(to top, rgba(0,0,0,0.25), rgba(0,0,0,0.75)), url('admin/<?php echo $offer[$i]['img']; ?>'); background-size: cover; height: 280px; margin-bottom: 45px;" class="item">
	    <div class="item-header">
	        <p class="title"><?php echo $offer[$i]['package_name'];?></p>
	        <?php
	        if($offer[$i]['type'] == "special offers")
	        {?>
	        	<p class="off_title"><?php echo $offer[$i]['city'];?>, <?php echo $offer[$i]['country']; ?></p>
	        <?php
	        }
	        else
	        {?>
	        <p class="title"><?php echo $offer[$i]['city'];?>, <?php echo $offer[$i]['country']; ?></p>
	        <?php
	        }?>			
	    </div>
	    <div class="item-footer">
	        <?php
	        if($offer[$i]['type'] == "special offers")
	        {?>
	        	<p class="offers">View Special Offer</p>
	        <?php
	        }
	        else
	        {?>
	        	<p class="offers">View Destination</p>
	        <?php
	        }?>
	    </div>
    </div>
</div>
<?php
   }
   ?>
</div>
</div>
<center>
<div id="show-more" style="display: none;">
      <input class="show-more"  id="show_dest" type="button" value="Show More" > 
</div>
   <input type="hidden" id="row" value="0">
   <input type="hidden" id="all" value="<?php echo $allcount; ?>"> 
</center>
   <?php
   exit;
   }
   
//filter by special offers only
else if($_POST['action'] == "fetch_special_offers")
{
extract($_POST);
$offer=$db_handler->get_cust_cols("SELECT * from destination_offers where type='special offers' LIMIT 0,8");;
?>
<div class="col-md-10">
<h3 class="heading" style="">View the latest Special Offers!</h3>
<?php
for($i=0; $i<count($offer); $i++)
{?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
   <div style="background: linear-gradient(to top, rgba(0,0,0,0.25), rgba(0,0,0,0.75)), url('admin/<?php echo $offer[$i]['img']; ?>'); background-size: cover; height: 280px; margin-bottom: 45px;" class="item">
	    <div class="item-header">
	        <p class="title"><?php echo $offer[$i]['package_name'];?></p>
	        <p class="off_title"><?php echo $offer[$i]['city'];?>, <?php echo $offer[$i]['country']; ?></p>
	    </div>
	    <div class="item-footer">
	        <?php
	        if($offer[$i]['type'] == "special offers")
	        {?>
	         	<p class="offers">View Special Offer</p>
	        <?php
	        }?>
	    </div>
   </div>
</div>
<?php
}
?>
</div>
<?php
exit;
}
?>
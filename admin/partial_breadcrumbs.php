<?php
$location=basename($_SERVER['PHP_SELF']);
$breadcrumbs=array();

switch ($location) 
{
	case 'index.php':
		$breadcrumbs=array
		(
			array
			(
				'title'=>'Dashboard',
				'href'=>'index.php'
			)

		);
	break;

	case 'view-admin.php':
		$breadcrumbs=array
		(
			array
			(
				'title'=>'Dashboard',
				'href'=>'index.php'
			),
			array
			(
				'title'=>'Admin',
				'href'=>'view-admin.php'
			),
		);
	break;

	case 'view-destination.php':
		$breadcrumbs=array
		(
			array
			(
				'title'=>'Dashboard',
				'href'=>'index.php'
			),
			array
			(
				'title'=>'Destinations',
				'href'=>'view-destination.php'
			),
		);
	break;

	case 'view-sm.php':
		$breadcrumbs=array
		(
			array
			(
				'title'=>'Dashboard',
				'href'=>'index.php'
			),
			array
			(
				'title'=>'Social Media',
				'href'=>'view-sm.php'
			),
		);
	break;

	case 'view-contact.php':
		$breadcrumbs=array
		(
			array
			(
				'title'=>'Dashboard',
				'href'=>'index.php'
			),
			array
			(
				'title'=>'Contacts',
				'href'=>'view-contact.php'
			),
		);
	break;

	case 'view-partner.php':
		$breadcrumbs=array
		(
			array
			(
				'title'=>'Dashboard',
				'href'=>'index.php'
			),
			array
			(
				'title'=>'Partners',
				'href'=>'view-partner.php'
			),
		);
	break;

	case 'view-offers.php':
		$breadcrumbs=array
		(
			array
			(
				'title'=>'Dashboard',
				'href'=>'index.php'
			),
			array
			(
				'title'=>'Special Offers',
				'href'=>'view-offers.php'
			),
		);
	break;

	case 'add-content.php':
	$section = $_GET['section'];
		if($section == "SM")
		{
			$breadcrumbs=array
			(
				array
				(
					'title'=>'Dashboard',
					'href'=>'index.php'
				),
				array
				(
					'title'=>'Social Media',
					'href'=>'view-sm.php'
				),
				array
				(
					'title'=>'Add',
					'href'=>'add-content.php?section=SM'
				),
			);		
		}
		elseif ($section == "USER")
		{
			$breadcrumbs=array
			(
				array
				(
					'title'=>'Dashboard',
					'href'=>'index.php'
				),
				array
				(
					'title'=>'Admin',
					'href'=>'view-admin.php'
				),
				array
				(
					'title'=>'Add',
					'href'=>'add-content.php?section=USER'
				),
			);
		}
		elseif ($section == "PARTNER")
		{
			$breadcrumbs=array
			(
				array
				(
					'title'=>'Dashboard',
					'href'=>'index.php'
				),
				array
				(
					'title'=>'Partners',
					'href'=>'view-partner.php'
				),
				array
				(
					'title'=>'Add',
					'href'=>'add-content.php?section=PARTNER'
				),
			);
		}
		elseif ($section == "DEST")
		{
			$breadcrumbs=array
			(
				array
				(
					'title'=>'Dashboard',
					'href'=>'index.php'
				),
				array
				(
					'title'=>'Destinations',
					'href'=>'view-destination.php'
				),
				array
				(
					'title'=>'Add',
					'href'=>'add-content.php?section=DEST'
				),
			);
		}
		elseif ($section == "OFF") 
		{
			$breadcrumbs=array
			(
				array
				(
					'title'=>'Dashboard',
					'href'=>'index.php'
				),
				array
				(
					'title'=>'Special Offers',
					'href'=>'view-offers.php'
				),
				array
				(
					'title'=>'Add',
					'href'=>'add-content.php?section=OFF'
				),
			);
		}
	break;

	case 'edit-content.php':	
    $sm_id=$_GET['id'];
    $section=$_GET['section'];
    $user_id=$_GET['id'];
    $dest_id=$_GET['id'];
    $partner_id=$_GET['id'];
    $offer_id=$_GET['id'];

		if($section == "SM")
		{
			$breadcrumbs=array
			(
				array
				(
					'title'=>'Dashboard',
					'href'=>'index.php'
				),
				array
				(
					'title'=>'Social Media',
					'href'=>'view-sm.php'
				),
				array
				(
					'title'=>'Edit',
					'href'=>"edit-content.php?section=SM&id=$sm_id"
				),
			);		
		}
		elseif ($section == "USER")
		{
			$breadcrumbs=array
			(
				array
				(
					'title'=>'Dashboard',
					'href'=>'index.php'
				),
				array
				(
					'title'=>'Admin',
					'href'=>'view-admin.php'
				),
				array
				(
					'title'=>'Edit',
					'href'=>"edit-content.php?section=USER&id=$user_id"
				),
			);
		}
		elseif ($section == "PARTNER")
		{
			$breadcrumbs=array
			(
				array
				(
					'title'=>'Dashboard',
					'href'=>'index.php'
				),
				array
				(
					'title'=>'Partners',
					'href'=>'view-partner.php'
				),
				array
				(
					'title'=>'Edit',
					'href'=>"edit-content.php?section=PARTNER&id=$partner_id"
				),
			);
		}
		elseif ($section == "DEST")
		{
			$breadcrumbs=array
			(
				array
				(
					'title'=>'Dashboard',
					'href'=>'index.php'
				),
				array
				(
					'title'=>'Destinations',
					'href'=>'view-destination.php'
				),
				array
				(
					'title'=>'Edit',
					'href'=>"edit-content.php?section=DEST&id=$dest_id"
				),
			);
		}
		elseif ($section == "OFF") 
		{
			$breadcrumbs=array
			(
				array
				(
					'title'=>'Dashboard',
					'href'=>'index.php'
				),
				array
				(
					'title'=>'Special Offers',
					'href'=>'view-offers.php'
				),
				array
				(
					'title'=>'Edit',
					'href'=>"edit-content.php?section=OFF&id=$offer_id"
				),
			);
		}
	break;
}

?>

<ol class="breadcrumb">
    <?php 
    for ($i=0; $i <count($breadcrumbs) ; $i++) 
    {
    ?>
<li class="breadcrumb-item active" style="text-decoration: none;  display: inline-block; "><a href="<?php echo $breadcrumbs[$i]['href']; ?>">
    <?php 
        echo  $breadcrumbs[$i]['title'];
    ?> 
</a>
    <?php
    }
    ?>
</li>
</ol>
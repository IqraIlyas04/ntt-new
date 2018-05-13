<?php
include_once('includes/header.php');
$dest=$db_handler->view_all_dest();
$offer=$db_handler->view_all_offers();
if(isset($_POST['submit']))
{
	extract($_POST);

	$result=$db_handler->add_contact($first_name, $last_name, $phone_no);
	if(!$result)
	{
		echo "Error";
	}
}
?>

<style type="text/css">
.partners{margin-bottom: 60px;}
.box{margin-right: auto; margin-bottom: 40px; height: 245px; padding:10px;}
.box-icons{position: relative; width: 80px; height: 80px; margin: 0px 0px 30px 0px;}
.box-icons img{height: 80px; width: 80px;}
.box-icons p{margin-left: 100px;}
.curved-bg-top {background-color: rgba(0,0,0,0.03);}

@media(max-width: 767px) 
{
  header{height: 414px;}
  header .intro-text{
     padding-top: 162px;
    padding-bottom: 76px;
  }
  header .intro-text .intro-lead-in{
    font-family: "Droid Serif", 'Open Sans', sans-serif;
    font-family: 'Open Sans', sans-serif;
    font-style: normal;
    font-size: 15px;
    line-height: 1.5;
    margin-bottom: 12px;
  }
  header .intro-text .intro-heading{
    font-family: "Montserrat", 'Open Sans', sans-serif;
    text-transform: none;
    font-weight: 700;
    font-size: 25px;
    line-height: 50px;
    margin-bottom: 25px;
  }

  h2{font-size: 22px;}
  .pad-left {padding-left: 0px; margin-top: 15px;}
  .btn-md{font-size: 12px;
    padding: 12px 18px;}

  .pad-right h2{
    font-size: 22px;
    padding: 8px;
    }
   .banner h2{font-size: 22px;}
  .pad-right{padding-right: 0px;}
  .pad-right p {
    font-size: 13px;
    line-height: 1.75;
    padding: 8px;
    }
   .box{margin-bottom: 35px;
    height: 215px;}

  section{
    padding: 45px 0;
          }
 
}
</style>
<header>
    <div class="container">
        <div class="intro-text">
            <div class="intro-lead-in">Lorem ipsum dolor sit amet</div>
            <div class="intro-heading">Donec feugiat pulvinar justo, id fermentum.</div>
            <a href="#services" class="page-scroll btn btn-md"><i class="icon-info icons"></i> Learn more</a>
        </div>
    </div>
</header>

<section>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="pad-right">
					<h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam lacinia diam et dapibus scelerisque. Nam vel urna ac orci rhoncus pellentesque sit amet eu orci. Morbi tempus placerat lectus, non pretium sem placerat eu. Proin ipsum dui, condimentum non suscipit id, mattis at nibh.</p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="">
					<img class="img-responsive" src="img/destinations/london.jpg" style="box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);"/>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
$values = array(
			array("title" => "Global Flight Reservations",
				  "desc" => "Flight reservations and ticketing world-wide along with budget carriers all around the world",
				  "img" => "img/icons/sky.svg"
				),
			array(
					"title" => "Hotel Reservations",
					"desc" => "Global hotel and appartment reservations world wide",
					"img" => "img/icons/hotel.svg"
				),
			array(
					"title" => "Car Rental",
					"desc" => "We offer exclusive range of vehicles with chauffer driven as well as self-drive option for fast and easy car rental bookings world wide.",
					"img" => "img/icons/locked-car.svg"
				),
			array(
					"title" => "Meet and Greet",
					"desc" => "This service is available for individual as well as groups also guides n interpreters can be provided upon request.",
					"img" => "img/icons/meeting.svg"
				),
			array(
					"title" => "Global Visa Assistance",
					"desc" => "We can guide and assist you on visa processing all around the world, including taking appointments for our clients",
					"img" => "img/icons/travel.svg"
				),
			array(
					"title" => "Hajj & Umrah",
					"desc" => "Pilgrimage trips, Hajj, Umarah and Visa packages.",
					"img" => "img/icons/mosque.svg"
				),
				array(
					"title" => "Holiday Packages",
					"desc" => "We suggest expert itineraries and packages to invent a new world of relaxing holiday with family and friends which may include islands, nature, forests, wild safari, beaches, golf courses etc.",
					"img" => "img/icons/world.svg"
				),
				array(
					"title" => "Travel Insurance",
					"desc" => "We offer a wide range of insurance products to meet your essential travel safety of your loved ones and safety of your belongings as well …",
					"img" => "img/icons/insurance (1).svg"
				),
				array(
					"title" => "Inbound and Outbound Tours",
					"desc" => "We provide a unique way to experience the local attractions in UAE , which includes Desert Safari, Dhow Cruise, Burj Khalifa reservation, wild wide, Atlantis Aqua Venture, Shopping Tours..",
					"img" => "img/icons/gps.svg"
				),
				array(
					"title" => "Groups/Mice/Incentives",
					"desc" => "We are personally accountable for delivering on our commitments",
					"img" => "img/icons/feedback.svg"
				)
			);
?>
<section class="" style="border-radius: 100% 0% 0% 0%;">
	<div class="container">
		<h2 style="">Services we offer</h2>
		<hr class="small-line"/>
		<br/>
		<div class="row">
			<?php
			for($i=0; $i<count($values); $i++)
			{ 	$title =$values[$i]['title'];
				$desc =$values[$i]['desc'];
				$img = $values[$i]['img'];
			?>
			<div class="col-md-3 col-sm-6">
				<div class="box">
					<div class="box-icons">
						<a class="img-responsive">
							<i><img src="<?php echo $img;?>"></i>
						</a>
						</div>
						<h5 style="text-align: left;"><?php echo $title;?></h5>
						<p style="font-size: 12px;"><?php echo $desc;?></p>
					</div>
				</div>
			<?php 
		}?>
	</div>
</div>
</section>

<section class="curved-bg-right">
	<div class="container">
		<h2>Take a look at our destinations!</h2>
		<p style="color:#3474FD;font-weight: 700;">View more</p>
		<hr class="small-line"/>
		
		<div class="custom-wrapper gl-1">
			<?php for($i=0; $i<count($dest); $i++)
		{
		?>
			<div style="background: linear-gradient(to top, rgba(255,0,0,0), rgba(0,0,0,0.75)), url('admin/<?php echo $dest[$i]['dest_img']; ?>'); background-size: cover;" class="item">
				<div class="item-header">
					<p class="title"><?php echo $dest[$i]['dest_city'];?>, <?php echo $dest[$i]['dest_country']; ?></p>
					<p class="duration"><?php echo $dest[$i]['dest_days'];?> day/s, <?php echo $dest[$i]['dest_nights'];?> Night/s</p>
					<hr class="small-line line-nomargin"/>
					<p class="price">Starting from AED <?php echo $dest[$i]['dest_price'];?></p>
				</div>

				<div class="item-footer">
					
				</div>
			</div>
			<!-- <div style="background: linear-gradient(to top, rgba(255,0,0,0), rgba(0,0,0,0.75)), url('img/destinations/greece.jpg'); background-size: cover;" class="item">
				<div class="item-header">
					<p class="title">Athens, Greece</p>
					<p class="duration">2 days, 1 Night</p>
					<hr class="small-line line-nomargin"/>
					<p class="price">Starting from AED 1250</p>
				</div>

				<div class="item-footer">
					
				</div>
			</div>
			<div style="background: linear-gradient(to top, rgba(255,0,0,0), rgba(0,0,0,0.75)), url('img/destinations/rome.jpg'); background-size: cover;" class="item">
				<div class="item-header">
					<p class="title">Rome, Italy</p>
					<p class="duration">2 days, 1 Night</p>
					<hr class="small-line line-nomargin"/>
					<p class="price">Starting from AED 1250</p>
				</div>

				<div class="item-footer">
					
				</div>
			</div>
			<div style="background: linear-gradient(to top, rgba(255,0,0,0), rgba(0,0,0,0.75)), url('img/destinations/india.jpg'); background-size: cover;" class="item">
				<div class="item-header">
					<p class="title">Mumbai, India</p>
					<p class="duration">2 days, 1 Night</p>
					<hr class="small-line line-nomargin"/>
					<p class="price">Starting from AED 1250</p>
				</div>

				<div class="item-footer">
					
				</div>
			</div>
			<div style="background: linear-gradient(to top, rgba(255,0,0,0), rgba(0,0,0,0.75)), url('img/destinations/korea.jpg'); background-size: cover;" class="item">
				<div class="item-header">
					<p class="title">Jeju Island, South Korea</p>
					<p class="duration">2 days, 1 Night</p>
					<hr class="small-line line-nomargin"/>
					<p class="price">Starting from AED 1250</p>
				</div>

				<div class="item-footer">
					
				</div>
			</div>
			<div style="background: linear-gradient(to top, rgba(255,0,0,0), rgba(0,0,0,0.75)), url('img/destinations/japan.jpg'); background-size: cover;" class="item">
				<div class="item-header">
					<p class="title">Tokyo, Japan</p>
					<p class="duration">2 days, 1 Night</p>
					<hr class="small-line line-nomargin"/>
					<p class="price">Starting from AED 1250</p>
				</div>

				<div class="item-footer">
					
				</div>
			</div>
			<div style="background: linear-gradient(to top, rgba(255,0,0,0), rgba(0,0,0,0.75)), url('img/destinations/thailand.jpg'); background-size: cover;" class="item">
				<div class="item-header">
					<p class="title">Bangkok, Thailand</p>
					<p class="duration">2 days, 1 Night</p>
					<hr class="small-line line-nomargin"/>
					<p class="price">Starting from AED 1250</p>
				</div>

				<div class="item-footer">
					
				</div>
			</div> -->
				<?php
	}
	?>
		</div>

	</div>
</section>

<section class="banner">
	<h2>Lorem ipsum dolor sit amet</h2>
</section>

<section class="curved-bg-left">
	<div class="container">
		<h2>Latest Special Offers!</h2>
		<p style="color:#3474FD;font-weight: 700;">View more</p>
		<hr class="small-line"/>
		<div class="custom-wrapper gl-2">
			<?php
			for($i=0; $i<count($offer); $i++)
			{
				?>
			<div style="background: linear-gradient(to top, rgba(255,0,0,0), rgba(0,0,0,0.75)), url('admin/<?php echo $offer[$i]['offer_img']; ?>'); background-size: cover;" class="item">
				<div class="item-header">
					<p class="title"><?php echo $offer[$i]['offer_city'];?>, <?php echo $offer[$i]['offer_country']; ?></p>
					<p class="duration"><?php echo $offer[$i]['offer_days']; ?> day/s, <?php echo $offer[$i]['offer_nights'];?> Night/s</p>
					<hr class="small-line line-nomargin"/>
					<p class="price">Starting from AED <?php echo $offer[$i]['offer_price'] ?></p>
				</div>

				<div class="item-footer">
					
				</div>
			</div>
			<?php
		}
		?>
			<!-- <div style="background: linear-gradient(to top, rgba(255,0,0,0), rgba(0,0,0,0.75)), url('img/destinations/greece.jpg'); background-size: cover;" class="item">
				<div class="item-header">
					<p class="title">Athens, Greece</p>
					<p class="duration">2 days, 1 Night</p>
					<hr class="small-line line-nomargin"/>
					<p class="price">Starting from AED 1250</p>
				</div>

				<div class="item-footer">
					
				</div>
			</div>
			<div style="background: linear-gradient(to top, rgba(255,0,0,0), rgba(0,0,0,0.75)), url('img/destinations/rome.jpg'); background-size: cover;" class="item">
				<div class="item-header">
					<p class="title">Rome, Italy</p>
					<p class="duration">2 days, 1 Night</p>
					<hr class="small-line line-nomargin"/>
					<p class="price">Starting from AED 1250</p>
				</div>

				<div class="item-footer">
					
				</div>
			</div>
			<div style="background: linear-gradient(to top, rgba(255,0,0,0), rgba(0,0,0,0.75)), url('img/destinations/india.jpg'); background-size: cover;" class="item">
				<div class="item-header">
					<p class="title">Mumbai, India</p>
					<p class="duration">2 days, 1 Night</p>
					<hr class="small-line line-nomargin"/>
					<p class="price">Starting from AED 1250</p>
				</div>

				<div class="item-footer">
					
				</div>
			</div>
			<div style="background: linear-gradient(to top, rgba(255,0,0,0), rgba(0,0,0,0.75)), url('img/destinations/korea.jpg'); background-size: cover;" class="item">
				<div class="item-header">
					<p class="title">Jeju Island, South Korea</p>
					<p class="duration">2 days, 1 Night</p>
					<hr class="small-line line-nomargin"/>
					<p class="price">Starting from AED 1250</p>
				</div>

				<div class="item-footer">
					
				</div>
			</div>
			<div style="background: linear-gradient(to top, rgba(255,0,0,0), rgba(0,0,0,0.75)), url('img/destinations/japan.jpg'); background-size: cover;" class="item">
				<div class="item-header">
					<p class="title">Tokyo, Japan</p>
					<p class="duration">2 days, 1 Night</p>
					<hr class="small-line line-nomargin"/>
					<p class="price">Starting from AED 1250</p>
				</div>

				<div class="item-footer">
					
				</div>
			</div> -->
		</div>
	</div>
</section>

<section>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="">
					<img class="img-responsive" src="img/destinations/london.jpg" style="box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);"/>
				</div>
			</div>
			<div class="col-md-6">
				<div class="pad-left">
					<h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam lacinia diam et dapibus scelerisque. Nam vel urna ac orci rhoncus pellentesque sit amet eu orci. Morbi tempus placerat lectus, non pretium sem placerat eu. Proin ipsum dui, condimentum non suscipit id, mattis at nibh.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="curved-bg-left2">
	<div class="container">
		<h2>Want to know more?</h2>
		<p style="color:#3474FD;font-weight: 700;">We're just a phone call away!</p>
		<hr class="small-line"/>
		<div class="row">
			<div class="col-md-6">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3608.6457679843143!2d55.30130331501055!3d25.248853383872085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f43262145d7a1%3A0x6d3d0bebe8101d33!2sNaresco+Travel+%26+Tourism+LLC!5e0!3m2!1sen!2sae!4v1524546928360" width="100%" height="500px" frameborder="0" style="border:0;border-radius:4px;box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);" allowfullscreen></iframe>
			</div>

			<div class="col-md-6">
				<div class="pad-left">
					<div>
						<p style="font-size:17px;font-weight: 700;"><i style="font-size:17px;font-weight:700;color:#3474FD;" class="icon-phone icons"></i>+971 4 123 4567</p>
						<p style="font-size:17px;font-weight: 700;"><i style="font-size:17px;font-weight:700;color:#3474FD;" class="icon-envelope icons"></i>info@ntt.ae</p>
						<p style="font-size:17px;font-weight: 700;"><i style="font-size:17px;font-weight:700;color:#3474FD;" class="icon-map icons"></i>Street #4B, Al Karama, Dubai, U.A.E</p>
					</div>
					<hr class="small-line"/>
					<div>
						<p style="font-weight: 700;">If you have any queries, please provide us your details and we will get back to you as soon as possible!</p>
						<br/>
						<form name="myForm" id="myForm" action=""  onsubmit="" method="post" enctype="multipart/form-data"  >
							<input type="text" placeholder="First Name" name="first_name" class="form-control"/><br/>
							<input type="text" placeholder="Last Name" name="last_name" class="form-control"/><br/>
							<input type="number" placeholder="Phone Number" name="phone_no" class="form-control"/><br/>
							<button class="btn btn-md" type="submit" name="submit"><i class="icon-phone icons"></i> Contact us!</a>
							<!-- <input id="submittype" class="btn btn-md" role="button" type="submit" name="submit" value="Submit"/> -->
						</form>
						<!-- <button class="btn btn-md"><i class="icon-phone icons"></i> Contact us!</a> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
include_once('includes/footer.php');
?>
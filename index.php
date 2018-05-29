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
.curved-bg-top {background-color: rgba(0,0,0,0.03);}
.box_desc{width: 206px;float: left;}



@media only screen and (max-width: 767px) and (min-width: 320px)
{
  header{height: 414px;}
  header .intro-text{
     padding-top: 155px;
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
 .pad-left{padding: 0px 10px 20px 10px;}
 .pad-right{padding: 0px 10px 20px 10px;}
  section {
	    padding: 26px 0;
	   }
  .col-pad-left{padding-left: 10px; padding-right: 10px;}

  .btn-md {font-size: 12px; padding: 12px 18px;}
  .banner h2{font-size: 22px;}
  .banner{padding:26px 0px;}
  .pb-26{padding: 0px 0px 50px 0px;}
  .pt-20{padding-top: 20px;}
  .pt-pb{padding:45px 0px 36px 0px}
  .box{margin-bottom: 25px; height: 215px;}
  iframe{height:350px;}
 .white{padding:15px;}
}

@media only screen and (max-width: 480px) and (min-width: 320px){
	.cardadmin{height: 220px;}
    .box_desc{width: 189px;}
    .box_img img{height: 50px;
    width: 40px;}
}
@media only screen and (max-width: 767px) and (min-width: 481px){
	.cardadmin{ height: 200px; padding:25px; }
    .box_desc{width: 255px;}
    .box_img img{height: 60px;
    width: 60px;}
}

@media only screen and (max-width: 991px) and (min-width: 768px)
{
	header .intro-text {
    padding-top: 300px;
    padding-bottom: 200px;
  }
  header .intro-text .intro-lead-in {
    font-family: "Droid Serif", 'Open Sans', sans-serif;
    font-family: 'Open Sans', sans-serif;
    font-style: normal;
    font-size: 18px;
    line-height: 1.5;
    margin-bottom: 20px;
  }
  header .intro-text .intro-heading {
    font-family: "Montserrat", 'Open Sans', sans-serif;
    text-transform: none;
    font-weight: 700;
    font-size: 75px;
    line-height: 75px;
    margin-bottom: 50px;
  }
  
  .pad-left{padding: 0px 10px 20px 10px;}
 .pad-right{padding: 0px 10px 20px 10px;}
 section{padding: 40px 0;}
  .col-pad-left{padding-left: 10px; padding-right: 10px;}
  .pt-20{padding-top: 20px;}
  .pad-btm{padding-bottom: 0px;}
  .pb-0{padding-bottom: 0;}
  .cardadmin{
  	height: 205px;
		}
  .box_desc{width: 176px;}
}

@media only screen and (max-width: 1199px) and (min-width: 992px)
{
	.pad-right {padding-right: 12px;}
	.pad-left {padding-left: 48px;}
	h2{margin-top: 0px;}
	hr{margin-bottom: 40px;}
	section{padding: 60px 0;}
	.cardadmin{height: 215px;
    padding:16px;}
    .cardadmin h4{font-size: 16px;}
    .box_desc{width:155px;}

}
</style>
<header>
    <div class="container">
        <div class="intro-text">
            <div class="intro-lead-in">Always take the scenic route for</div>
            <div class="intro-heading">Your journey is the destination.</div>
            <a href="#services" class="page-scroll btn btn-md"><i class="icon-info icons"></i> Learn more</a>
        </div>
    </div>
</header>

<section>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="pad-right">
					<h2>Travel the world, the right way.</h2>
					<p>Here at Naresco Travels & Tourism we believe in our motto “Your satisfaction is our Success”. We are committed to providing you the best of service, value for money and a stress free vacation. Make memories that will last you a lifetime and go on adventures that fill your soul.</p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="pad-left">
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
					"desc" => "We offer exclusive range of vehicles with chauffer driven as well as self-drive option",
					"img" => "img/icons/locked-car.svg"
				),
			array(
					"title" => "Meet and Greet",
					"desc" => "This service is available for individual as well as groups also guides n interpreters",
					"img" => "img/icons/meeting.svg"
				),
			array(
					"title" => "Global Visa Assistance",
					"desc" => "We can guide and assist you on visa processing all around the world, ",
					"img" => "img/icons/travel.svg"
				),
			array(
					"title" => "Hajj & Umrah",
					"desc" => "Pilgrimage trips, Hajj, Umarah and Visa packages.",
					"img" => "img/icons/mosque.svg"
				),
				array(
					"title" => "Holiday Packages",
					"desc" => "We suggest expert itineraries and packages to invent a new world of relaxing holiday with family",
					"img" => "img/icons/world.svg"
				),
				array(
					"title" => "Travel Insurance",
					"desc" => "We offer a wide range of insurance products to meet your essential travel safety",
					"img" => "img/icons/insurance (1).svg"
				),
				array(
					"title" => "Inbound and Outbound Tours",
					"desc" => "We provide a unique way to experience the local attractions in UAE , which includes Desert Safari",
					"img" => "img/icons/gps.svg"
				),
				array(
					"title" => "Groups or Mice or Incentives",
					"desc" => "We are personally accountable for delivering on our commitments",
					"img" => "img/icons/feedback.svg"
				)
			);
?>
<section class="" style="border-radius: 100% 0% 0% 0%;">
	<div class="container">
		<div class="col-pad-left">
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
			<div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="cardadmin">
                            <div class="box_desc">
                                    <h4><?php echo $title;?></h4>
                                    <p><?php echo $desc;?></p>
                                </div>
                                <div class="box_img">
                                   <img src="<?php echo $img;?>" alt="user">
                                </div>
                            </div>
                        </div>
			<?php 
		}?>
	</div>
</div>
</div>
</section>

<section class="curved-bg-right pb-26">
	<div class="container">
		<h2>Take a look at our destinations!</h2>
		<p style="color:#3474FD;font-weight: 700; "><a style="text-decoration: none;" href="view-destination.php">View more</a></p>
		<hr class="small-line"/>
		<div class="custom-wrapper gl-1">
			
		<?php for($i=0; $i<count($dest) && $i<7; $i++)
		{
		?>	
			<div style="background: linear-gradient(to top, rgba(255,0,0,0), rgba(0,0,0,0.75)), url('admin/<?php echo $dest[$i]['dest_img']; ?>'); background-size: cover;" class="item">
					<a class="white" href="view-offers.php?id=<?php echo $dest[$i]['dest_country_id'];?>">
					<div class="item-header">
						<p class="title"><?php echo $dest[$i]['city_name'];?>, <?php echo $dest[$i]['country_name']; ?></p>
						<!-- <p class="duration"><?php //echo $dest[$i]['dest_days'];?> day/s, <?php //echo $dest[$i]['dest_nights'];?> Night/s</p>
						<hr class="small-line line-nomargin"/>
						<p class="price">Starting from AED <?php //echo $dest[$i]['dest_price'];?></p> -->
					</div>
					<div class="item-footer">
						
					</div>
				</a>
			</div>
			
		<?php
		}
		?>
		</div>
	</div>
</section>

<section class="banner">
	<h2>Lorem ipsum dolor sit amet</h2>
</section>

<section class="curved-bg-left pt-pb">
	<div class="container">
		<h2>Latest Special Offers!</h2>
		<p style="color:#3474FD;font-weight: 700;">View more</p>
		<hr class="small-line"/>
		<div class="custom-wrapper gl-2">
			<?php
			for($i=0; $i<count($offer) && $i<9; $i++)
			{
				?>
			<div style="background: linear-gradient(to top, rgba(255,0,0,0), rgba(0,0,0,0.75)), url('admin/<?php echo $offer[$i]['offer_img']; ?>'); background-size: cover;" class="item">
				<a class="white" href="view-pkgs.php?id=<?php echo $offer[$i]['offer_id'];?>">
				<div class="item-header">
					<p class="title"><?php echo $offer[$i]['city_name'];?>, <?php echo $offer[$i]['country_name']; ?></p>
					<p class="duration"><?php echo $offer[$i]['offer_days']; ?> day/s, <?php echo $offer[$i]['offer_nights'];?> Night/s</p>
					<hr class="small-line line-nomargin"/>
					<p class="price">Starting from AED <?php echo $offer[$i]['offer_price'] ?></p>
				</div>

				<div class="item-footer">
					
				</div>
			</a>
			</div>
			<?php
		}
		?>
		</div>
	</div>
</section>

<section class="pad-btm">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="pad-right">
					<img class="img-responsive" src="img/destinations/london.jpg" style="box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);"/>
				</div>
			</div>
			<div class="col-md-6">
				<div class="pad-left">
					<h2>Collect moments, not things.</h2>
					<p>Indulge yourself with the delicacies the world has to offer, we can guarantee that wherever you go, you can go with all your heart. Leave second thoughts, hic-ups, interruptions and stress behind – it will be just you, peace of mind and value for money that you’ll be taking with you to your destination. Oh and your best smile of course.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="curved-bg-left2 pb-0">
	<div class="container">
		
		<h2>Want to know more?</h2>
		<p style="color:#3474FD;font-weight: 700;">We're just a phone call away!</p>
		<hr class="small-line"/>
		<div class="row">
			<div class="col-md-6">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3608.6457679843143!2d55.30130331501055!3d25.248853383872085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f43262145d7a1%3A0x6d3d0bebe8101d33!2sNaresco+Travel+%26+Tourism+LLC!5e0!3m2!1sen!2sae!4v1524546928360" width="100%" height="500px" frameborder="0" style="border:0;border-radius:4px;box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);" allowfullscreen></iframe>
			</div>

			<div class="col-md-6">
				<div class="pad-left pt-20">
					<div>
						<p style="font-size:17px;font-weight: 700;"><i style="font-size:17px;font-weight:700;color:#3474FD;" class="icon-phone icons"></i>+971 4 3968888</p>
						<p style="font-size:17px;font-weight: 700;"><i style="font-size:17px;font-weight:700;color:#3474FD;" class="icon-envelope icons"></i>info@nttdubai.ae</p>
						<p style="font-size:17px;font-weight: 700;"><i style="font-size:17px;font-weight:700;color:#3474FD;" class="icon-map icons"></i>Street #4B, Al Karama, Dubai, U.A.E</p>
					</div>
					<hr class="small-line"/>
					<div>
						<p style="font-weight: 700;">If you have any queries, please provide us your details and we will get back to you as soon as possible!</p>
						<br/>
						<div style="display: none;" id="error_msg_box" class="alert alert-danger"></div>
						<form name="myForm" id="myForm" action=""  onsubmit="" method="post" enctype="multipart/form-data"  >
							<input type="text" placeholder="First Name" name="first_name" id="fname" class="form-control" required/><br/>
							<input type="text" placeholder="Last Name" name="last_name" id="lname" class="form-control" required/><br/>
							<input type="number" id="phone" placeholder="Phone Number" name="phone_no" class="form-control" required/><br/>
							<button class="btn btn-md" type="submit" name="submit" id="submit"><i class="icon-phone icons"></i> Contact us!</a>
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

<script>
  var form= document.myForm;


function validate_form()
{
   var errormsg="";

    var firstname = document.myForm.fname;
    var lastname = document.myForm.lname;
    var phoneno = document.myForm.phone;

   if(firstname.value == "")
          {
                 errormsg += '<p>Enter your first name!<p>';
                $("#fname").focus();
          }

    if(lastname.value == "")
          {
                 errormsg += '<p>Enter your last name!<p>';
                $("#lname").focus();
          }

     if(phoneno.value == "")
          {
                 errormsg += '<p>Enter your phone number!<p>';
                $("#phone").focus();
          }

    return errormsg;
}


    $(document).on('click', '#submit', function(e){
     //e.preventDefault();

      var errormsg = "";

      errormsg = validate_form();

      if(errormsg == "")
      {
          //something
      }
      else
      {
          document.getElementById("error_msg_box").innerHTML = errormsg;
          $("#error_msg_box").show().delay(10000).hide(0);
      }
    });


</script>
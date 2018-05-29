<?php
include_once('includes/header.php');
?>

<style>

header.about_h{
  background: linear-gradient(to bottom, rgba(255,0,0,0), rgba(0,0,0,0.75)), url('img/b4.jpeg');
  background-repeat: no-repeat;
  background-attachment: scroll;
  background-position: center center;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  background-size: cover;
  -o-background-size: cover;
  text-align: left;
  color: white;
  height:450px;
}

header.about_h .intro-text{padding-top: 215px;}
header.about_h .intro-heading{font-size: 50px;  margin-bottom: 80px;}
.partners img{height: 130px; width:130px;}

/*.contact_title{ margin: 0 0 24px; }*/
.curved-bg-top {background-color: rgba(0,0,0,0.03);border-radius: 0% 100% 0% 0%;}
.partners{margin-bottom: 60px;}
.padd-top{padding-bottom: 0px;}
.box_desc{width: 196px;float: left;}



@media only screen and (max-width: 767px) and (min-width: 320px)
{
	  header.about_h .intro-heading {
	    font-family: "Montserrat", 'Open Sans', sans-serif;
	    text-transform: none;
	    font-weight: 700;
	    font-size: 40px;
	    line-height: 15px;
	    margin-left: 20px;
	  }

	  header.about_h{
	    height: 330px;
	  }

	  header.about_h .intro-text {
	    padding-top: 175px;}

	  .btn-md{
	  font-size: 13px;
	  padding: 15px 12px;}

	  section {
	    padding: 26px 0;
	    padding-bottom: 0px;}

	  .pad-left{padding: 0px 10px 20px 10px;}
	  .pad-right{padding: 0px 10px 20px 10px;}
	  .ta-center{text-align: center;}
	   h2{font-size: 22px;}
	  .col-pad-left{padding-left: 10px; padding-right: 10px;}
	  .partners img{height: 110px; width:110px;}
	  .partners{margin-bottom: 40px;}
	   hr{margin-bottom: 40px;}

	   
}
@media only screen and (max-width: 480px) and (min-width: 320px){
	.cardadmin.about{height: 215px;}
    .box_desc{width: 191px;}
    .box_img img{height: 52px;
    width: 39px;}
}
@media only screen and (max-width: 767px) and (min-width: 481px){
	.cardadmin.about{ height: 200px; padding:25px; }
    .box_desc{width: 235px;}
    .box_img img{height: 52px;
    width: 60px;}
}
@media only screen and (max-width: 991px) and (min-width: 768px)
{

	  header.about_h .intro-heading {
	    font-family: "Montserrat", 'Open Sans', sans-serif;
	    text-transform: none;
	    font-weight: 700;
	    font-size: 55px;
	    line-height:95px;
	    margin-bottom: 50px;
	  }

	  header.about_h .intro-text {
	    padding-top: 175px;}

	  .btn-md{
	  font-size: 14px;
	  padding: 15px 22px;
	  }

	  .box{padding-right: 30px;}

	  section {padding: 45px 0; padding-bottom: 0px;}
	  .pad-left{padding:0px 10px 20px 10px;}
	  .pad-right{padding: 0px 10px 20px 10px;}
	  .col-pad-left{padding-left: 10px; padding-right: 10px;}
	  .partners{margin-bottom:40px; padding:20px;}
	  .ta-center{text-align: center;}
	   hr{margin-bottom: 40px;}
      .box_desc{width: 190px;}
	  
}
@media only screen and (max-width: 1199px) and (min-width: 992px)
{
	.pad-right {padding-right: 12px;}
	.pad-left {padding-left: 48px;}
	h2{margin-top: 0px;}
	hr{margin-bottom: 40px;}
	section{padding: 60px 0;}

	.box_desc{width:170px;}
	.box_img img{height: 55px;
    width: 55px;}

}

</style>

<header class="about_h">
    <div class="container">
        <div class="intro-text">
            <div class="intro-heading">About us</div>
        </div>
    </div>
</header>

<section class="curved-bg-top">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="pad-right">
					<img class="img-responsive" src="img/about/about.jpg" style="box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);">
				</div>
			</div>
			<div class="col-md-6">
				<div class="pad-left">
					<h2 class="contact_title">Little about us</h2>
					<p>We have been pioneers in the UAE market over a myriad of industries and now Trave and Tourism, using our extensive network we can guarantee you get the best out of your hard earned money and make memories you are fond to revisit.</p><br>
					<p>At our company you will find that you are treated with the upmost respect and professionalism, we live and breathe on the satisfaction of your journey. Our staff are well equipped and trained to ensure that you are provided your vision of perfect when it comes to your vacation.</p><br>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="curved-bg-top" style="border-radius: 0% 0% 0% 100%;">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="pad-right">
					<h2 class="contact_title">Company Profile</h2>
					<p>We have a long standing history in the UAE, having indulged in the business of Contracting, Real Estate, Concrete Products, Information Technology, Computers and Hotel System and Travels and Tourism LLC. We at Naresco are pioneers, driving to provide only the best to our customers.
					</p><br>
					 <button type="submit" class="btn btn-md">Download Profile
                </button>
				</div>
			</div>
			<div class="col-md-6">
				<div class="pad-left">
					<img class="img-responsive" src="img/about/profile.jpeg" style="box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);">
				</div>
			</div>
		</div>
	</div>
</section>

<?php 
$partners = array(
				array(
					"img" => "img/logos/Emirates_logo.svg"
					),
				array(
					"img" => "img/logos/Fly_Dubai_logo_2.svg"
				),
				array(
					"img" => "img/logos/Indigo_Logo.svg"
				),
				array(
					"img" => "img/logos/Oman_Air_logo.svg"
				),
				array(
					"img" => "img/logos/Air_India_Express.svg"
				),
				array(
					"img" => "img/logos/Air_India.svg"
				),
				array(
					"img" => "img/logos/Spicejet_logo-2.jpg"
				)

				);
?>
<section class="" style="border-radius: 0% 100% 0% 0%;">
	<div class="container">
		<div class="col-pad-left">
		<h2 class="contact_title">Our Partners</h2>
		<hr class="small-line"/>
		<div class="row">
			<?php
			for($i=0;$i<count($partners);$i++)
			{	
				$img = $partners[$i]['img'];
				?>
				<div class="col-xs-6 col-sm-4 col-md-3 ta-center">
					<div class="partners">
						<img src="<?php echo $img;?>">
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	</section>


<section class="curved-bg-top" style="border-radius: 0% 0% 0% 100%;">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="pad-right">
					<img class="img-responsive" src="img/destinations/london.jpg" style="box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);">
				</div>
			</div>
			<div class="col-md-6">
				<div class="pad-left">
					<h2 class="contact_title">Chairman's message</h2>
					<p>We at Naresco are the pioneers in the UAE market indulged in the business of Contracting, Real Estate, Concrete Products, Information
					Technology, Computers and Hotel System and Travels & Tourism LLC
					</p><br>
					<p>We have been an established and popular company with an excellent track record for the best customer satisfaction. We have never compromised on the 
					quality and the services provided to the customer. We have an excellent staffs who will guide you with their best ideas by keeping in constant touch with your 
					company and informing about any promotion fares, etc...</p><br>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
$values = array(
				array(
					"title" => "Customer Commitment",
					"desc" => "We develop relationships that make a positve difference in our customer's lives",
					"img" => "img/icons/like.svg"
				),
				array(
					"title" => "Quality",
					"desc" => "We provide outstanding products and unsurpassed service that deliver premium value to our customers",
					"img" => "img/icons/premium.svg"
				),
				array(
					"title" => "Integrity",
					"desc" => "We uphold the highest standards of integrity in all of our actions",
					"img" => "img/icons/growth.svg"
				),
				array(
					"title" => "Teamwork",
					"desc" => "We work together, across boundaries, to meet the needs of our customers and to help the company win",
					"img" => "img/icons/teamwrk.svg"
				),
				array(
					"title" => "Respect for People",
					"desc" => "We value our people, encourage their development and reward their performance",
					"img" => "img/icons/respect.svg"
				),
				array(
					"title" => "Good Citizenship",
					"desc" => "We are good citizens in the communities in which we live and work",
					"img" => "img/icons/celebration.svg"
				),
				array(
					"title" => "A will to win",
					"desc" => "We exhibit a strong will to win the market place and in every aspect of our business",
					"img" => "img/icons/podium.svg"
				),
				array(
					"title" => "Personal Accountabilitiy",
					"desc" => "We are personally accountable for delivering on our commitments",
					"img" => "img/icons/curriculum.svg"
				)

);?>

<section class="curved-bg-top padd-top" style="border-radius: 0% 100% 0% 0%;">
	<div class="container">
		<div class="col-pad-left">
		<h2>Our Values</h2>
		<hr class="small-line"/>
		<div class="row">
			<?php
			for($i=0; $i<count($values); $i++)
				{ 	$title =$values[$i]['title'];
			$desc = $values[$i]['desc'];
			$img = $values[$i]['img'];
			?>
		
			<div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="cardadmin about">
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

<?php
include_once('includes/footer.php');
?>


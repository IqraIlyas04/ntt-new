<?php
include_once('includes/header.php');
?>

<style>

header {
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
/*.contact_title{ margin: 0 0 24px; }*/
.curved-bg-top {background-color: rgba(0,0,0,0.03);border-radius: 0% 100% 0% 0%;}
h4{margin-left: 100px;margin-bottom: 20px;}
.partners{margin-bottom: 60px;}
.box{padding: 10px;height: 130px; margin-bottom: 60px;}
.box-icons{height: 80px;}
.box-icons img{height: 90px; width: 90px;}
.box-icons p{margin-left: 100px;}
.padd-top{padding-bottom: 0px;}
</style>

<header>
    <div class="container">
        <div class="intro-text" style="padding-top: 215px;">
            <div class="intro-heading" style="font-size: 50px;  margin-bottom: 80px;">About us</div>
        </div>
    </div>
</header>

<section class="curved-bg-top">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="pad-right">
					<img class="img-responsive" src="img/about/about2.jpg">
				</div>
			</div>
			<div class="col-md-6">
				<div class="pad-left">
					<h2 class="contact_title">Little about us</h2>
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

<section class="curved-bg-top" style="border-radius: 0% 0% 0% 100%;">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="pad-right">
					<h2 class="contact_title">Company Profile</h2>
					<p>We at Naresco are the pioneers in the UAE market indulged in the business of Contracting, Real Estate, Concrete Products, Information
					Technology, Computers and Hotel System and Travels & Tourism LLC
					</p><br>
					 <a href="download/Company Profile.pdf" download class="btn btn-md" type="button">Download Profile</a>
                </button>
				</div>
			</div>
			<div class="col-md-6">
				<div class="pad-left">
					<img class="img-responsive" style="padding-top: 35px;" src="img/about/about.jpg">
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
		<h2 class="contact_title">Our Partners</h2>
		<hr class="small-line"/>
		<div class="row">
			<?php
			for($i=0;$i<count($partners);$i++)
			{	
				$img = $partners[$i]['img'];
				?>
				<div class="col-md-3">
					<div class="partners">
						<img src="<?php echo $img;?>" style="height: 130px; width:130px;">
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>


<section class="curved-bg-top" style="border-radius: 0% 0% 0% 100%;">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="pad-right">
					<img class="img-responsive" src="img/destinations/london.jpg">
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
					"title" => "Integrity",
					"desc" => "We uphold the highest standards of integrity in all of our actions",
					"img" => "img/icons/growth.svg"
				),
				array(
					"title" => "Commitment",
					"desc" => "We develop relationships that make a positve difference in our customer's lives",
					"img" => "img/icons/deal.svg"
				),
				array(
					"title" => "Quality",
					"desc" => "We provide outstanding products and unsurpassed service that, together, deliver, premium value to our customers",
					"img" => "img/icons/medal.svg"
				),
				array(
					"title" => "Respect",
					"desc" => "We value our people, encourage their development and reward their performance",
					"img" => "img/icons/teamwork.svg"
				),
				array(
					"title" => "Team Work",
					"desc" => "We work together, across boundaries, to meet the needs of our customers and to help the company win",
					"img" => "img/icons/networking.svg"
				),
				array(
					"title" => "Good Citizenship",
					"desc" => "We are good citizens in the communities in which we live and work",
					"img" => "img/icons/reunion.svg"
				),
				array(
					"title" => "A will to win",
					"desc" => "We exhibit a strong will to win the market place and in every aspect of our business",
					"img" => "img/icons/profits.svg"
				),
				array(
					"title" => "Personal Accountabilitiy",
					"desc" => "We are personally accountable for delivering on our commitments",
					"img" => "img/icons/curriculum.svg"
				)

);?>

<section class="curved-bg-top padd-top" style="border-radius: 0% 100% 0% 0%;">
	<div class="container">
		<h2>Our Values</h2>
		<hr class="small-line"/>
		<div class="row">
			<?php
			for($i=0; $i<count($values); $i++)
				{ 	$title =$values[$i]['title'];
			$desc = $values[$i]['desc'];
			$img = $values[$i]['img'];
			?>
			<div class="col-md-4">
				<div class="box">
					<div class="box-icons" style="float: left;">
						<a class="img-responsive">
							<i><img src="<?php echo $img;?>"></i>
						</a>
						<div class="left" style="position: relative;top: -90px; left: 30px;">
							<h4><?php echo $title;?></h4>
							<p style="font-size: 13px;"><?php echo $desc;?></p>
						</div>
					</div>
				</div>
			</div>
			<?php 
			}?>
		</div>
	</div>
</section>

<?php
include_once('includes/footer.php');
?>


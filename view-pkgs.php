<?php
include_once('includes/header.php');
if(isset($_GET['id']))
{
$offer_id=$_GET['id'];
}
 $dest=$db_handler->get_pkg_by_offerid($offer_id);
?>

<style type="text/css">
header.offer_h {
  background: linear-gradient(to left, rgba(255,0,0,0), rgba(0,0,0,0.75)), url('admin/<?php echo $dest[0]['offer_img']; ?>');
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
header.offer_h .intro-text{padding-top: 215px;}
header.offer_h .intro-heading{font-size: 50px;  margin-bottom: 80px;}

@media only screen and (max-width: 767px) and (min-width: 320px)
{
    header.offer_h .intro-heading {
      font-family: "Montserrat", 'Open Sans', sans-serif;
      text-transform: none;
      font-weight: 700;
      font-size: 35px;
      line-height: 40px;
      margin-left: 20px;
    }

    header.offer_h{
      height: 330px;
    }

    header.offer_h .intro-text {
      padding-top: 155px;}

    section {
      padding: 26px 0;}

      h2{font-size: 22px;}
    .pad-left{padding: 0px 10px 20px 10px;}
    .pad-right{padding: 0px 10px 20px 10px;}
    .col-pad-left{padding-left: 10px; padding-right: 10px;}
  }

@media only screen and (max-width: 991px) and (min-width: 768px)
{
    header.offer_h .intro-heading {
      font-family: "Montserrat", 'Open Sans', sans-serif;
      text-transform: none;
      font-weight: 700;
      font-size: 35px;
      line-height: 40px;
      margin-left: 20px;
    }

    header.offer_h{
      height: 330px;
    }

    header.offer_h .intro-text {
      padding-top: 155px;}

    section {
      padding: 26px 0;}

     
    .pad-left{padding: 0px 10px 20px 10px;}
    .pad-right{padding: 0px 10px 20px 10px;}
    .col-pad-left{padding-left: 10px; padding-right: 10px;}
  }

  @media only screen and (max-width: 1199px) and (min-width: 992px)
{
  .pad-right {padding-right: 12px;}
  .pad-left {padding-left: 48px;}
  h2{margin-top: 0px;}
  hr{margin-bottom: 40px;}
  section{padding: 60px 0;}
</style>
<header class="offer_h">
    <div class="container">
        <div class="intro-text">
            <div class="intro-heading"><?php echo $dest[0]['offer_package']; ?>, <?php echo $dest[0]['country_name']; ?></div>
        </div>
    </div>
</header>


  <section class="curved-bg-top padd-top" style="border-radius: 0% 100% 0% 0%; ">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="pad-right">
            <div class="col-pad-left">
              <h2>What's in the Package?</h2>
              <hr class="small-line"/>
              <p class="price"><i class="fa fa-money" aria-hidden="true" style="font-size:17px; font-weight:700; color:#44bd32; margin-top: 10px; margin-right: 20px;"></i>Prices range from <span style="color: #3474FD; font-weight: 700;"> AED <?php echo $dest[0]['offer_price']; ?></span> onwards</p>
              <p class="duration"><i class="fa fa-calendar" aria-hidden="true" style="font-size:17px;font-weight:700; color:#eb4d4b; margin-right: 20px;"></i>For <span style="color: #3474FD; font-weight: 700;"><?php echo $dest[0]['offer_days']; ?> day(s) </span> and <span style="color: #3474FD; font-weight: 700;"><?php echo $dest[0]['offer_nights']; ?> night(s) </span></p>
              <div class="" style="padding-left: 0px; margin-top: 20px;">
                <p><?php echo $dest[0]['offer_desc']; ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="pad-left">
            <h2>Intrested in this Package?</h2>
            <p style="color:#3474FD; font-weight: 700;">Reach out to us to hear more about this package!</p>
            <div style="margin-top: 30px;">
              <p style="font-size:17px;font-weight: 700;"><i style="font-size:17px;font-weight:700;color:#3474FD; margin-right:10px;" class="icon-phone icons"></i>+971 4 3968888</p>
              <p style="font-size:17px;font-weight: 700;"><i style="font-size:17px;font-weight:700;color:#3474FD;  margin-right:10px;" class="icon-envelope icons"></i>info@nttdubai.ae</p>
              <p style="font-size:17px;font-weight: 700;"><i style="font-size:17px;font-weight:700;color:#3474FD;  margin-right:10px;" class="icon-map icons"></i>Street #4B, Al Karama, Dubai, U.A.E</p>
            </div>
            <hr class="small-line"/>
            <div>
              <p style="font-weight: 700;">Want to Know more about this package? please provide us your details and we will get back to you as soon as possible!</p>
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
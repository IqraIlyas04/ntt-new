<?php
include_once('includes/header.php');
if(isset($_GET['id']))
{
$country_id=$_GET['id'];
}
 $dest=$db_handler->get_offers_by_countryid($country_id);
?>

<style type="text/css">
header.offer_h {
  background: linear-gradient(to left, rgba(255,0,0,0), rgba(0,0,0,0.75)), url('admin/<?php echo $dest[0]['dest_img']; ?>');
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
            <div class="intro-heading"><?php echo $dest[0]['city_name'];?>, <?php echo $dest[0]['country_name']; ?></div>
        </div>
    </div>
</header>

<section class="curved-bg-top padd-top" style="border-radius: 0% 100% 0% 0%; padding-bottom: 40px;">
   <div class="container">
    <div class="row">
    <div class="col-md-6">
      <div class="pad-right">
      <div style="background: linear-gradient(to top, rgba(255,0,0,0), rgba(0,0,0,0.75)), url('admin/<?php echo $dest[0]['dest_img']; ?>'); height:300px; background-size: cover;  background-position: center center; " class="img-responsive item">
      </div>
    </div>
    </div>
      <div class="col-md-6">
        <div class="pad-left">
        <h2>About <?php echo $dest[0]['city_name'];?>, <?php echo $dest[0]['country_name']; ?></h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam lacinia diam et dapibus scelerisque. Nam vel urna ac orci rhoncus pellentesque sit amet eu orci. Morbi tempus placerat lectus, non pretium sem placerat eu. Proin ipsum dui, condimentum non suscipit id, mattis at nibh.Nam vel urna ac orci rhoncus pellentesque sit amet eu orci. Morbi tempus placerat lectus, non pretium sem placerat eu. Proin ipsum dui, condimentum non suscipit id.</p>
    </div>
  </div>
</div>
</div>
</section>

<section class="curved-bg-top padd-top" style="border-radius: 0% 100% 0% 0%; padding-top:0px;">
  <div class="container">
    <div class="col-pad-left">
    <h2>Pacakages offered</h2>
    <hr class="small-line"/>
    <div class="container" style="padding-left: 0px;">
     
     <div class="autoplay">
      <?php 
      for($i=0; $i<count($dest); $i++)
      {?> 
      <div class="item  slider-card" style="background: linear-gradient(to top, rgba(255,0,0,0), rgba(0,0,0,0.75)), url('admin/<?php echo $dest[$i]['offer_img']; ?>');" >
      <a class="white" href="view-pkgs.php?id=<?php echo $dest[$i]['offer_id'];?>">
      <p class="title"><?php echo $dest[$i]['offer_package']; ?></p>
          <p class="duration"><?php echo $dest[$i]['offer_days']; ?> day/s, <?php echo $dest[$i]['offer_nights']; ?> Night/s</p>
          <hr class="small-line line-nomargin"/>
          <p class="price">Starting from AED <?php echo $dest[$i]['offer_price']; ?></p>
          <div class="item-footer">
          <p class="viewoffer" style="position: absolute;bottom: 50px;font-size: 12px;border-top: 1px solid;padding-top: 2px;">View Offer</p>
        </div>
        </a>
    </div>
    <?php
  }
    ?>
     
  
  </div>

</div>
</div>
</div>
</section>





<?php
include_once('includes/footer.php');
?>
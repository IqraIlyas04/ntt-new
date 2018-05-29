<?php
include_once('includes/header.php');
$count= $db_handler->get_cust_cols("SELECT count(*) as allcount FROM destination_offers");
$allcount=$count[0]['allcount'];
// echo $allcount;
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
  height:300px;
}
.dest {
  display: grid;
  grid-template-columns: repeat(4, [col] 1fr); /* 12 column */
  grid-gap: 10px;
}
.load-more
{
   
    width: 150px;
    height: 50px;
    color: brown;
    background-color: #3474FD;
    border-radius: 3px;
    color: white;
    border: none;
    font-size: 18px;

}
.show-more
{
    
    width: 150px;
    height: 50px;
    color: brown;
    background-color: #3474FD;
    border-radius: 3px;
    color: white;
    border: none;
    font-size: 18px;

}
</style>
<header>
    <div class="container">
        <div class="intro-text" style="padding-top: 215px;">
            <div class="intro-heading" style="font-size: 50px;  margin-bottom: 80px;">Destinations</div>
        </div>
    </div>
</header>
<div class="main">
	<div class="container ">
		<div class="row">
			<div class="col-md-2" style="padding-top: 76px;">
				<label style="letter-spacing: 1px; font-weight: 500;">Search</label>
            <div class="input-group search">
               <input type="text" class="form-control" placeholder="Search for..." style="padding: 16px;" name="search_text" id="search_text" >
                  <span class="input-group-btn">
                     <button class="btn btn-default" type="button" style="padding: 6px;"> <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                  </span>
            </div>
            <br>
            <div class="form-group">
              <label style="letter-spacing: 1px; font-weight: 500;">Filter By Country</label>
                <select id="dest_country" class="form-control" name="dest_id" required="required">
                  <option value="">-- Select Country --</option>
                  <?php 
                  $country = $db_handler->get_dest_country();
                  for($i=0; $i<count($country); $i++)
                  {?>
                    <option value="<?php echo $country[$i]['dest_country_id'];?>"><?php echo $country[$i]['country_name'];?></option>
                  <?php
                  }?>
                </select>
            </div>
            <div class="form-group" id="destination" style="display: none;">
              <label style="letter-spacing: 1px; font-weight: 500;">Filter By City</label>
                <select id="dest_city" class="form-control">
                  <option>Select City</option>
                </select>
            </div>
            <!-- <div class="form-group">
              <label style="letter-spacing: 1px; font-weight: 500;">Filters</label>
                <select name="" id="offers" class="special_offer form-control">
                  <option value="all">Select Filter</option>
                  <option value="destinations">Destinations</option>
                  <option value="special_offer">Special Offers</option>
                </select>
            </div> -->
      </div>
      <div class="container">
        <div class="row">
         <!--  <div class="col-md-10"> -->   
            <div id="dest_grid" style="margin-top: 72px; padding-left: 15px;"></div>
          <!-- </div> -->
        </div>  
      </div>        
	</div>
  <!-- <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-10">
      <div id="page">
        <input type="hidden" id="txt_rowid" value="0">
        <input type="hidden" id="txt_allcount" value='<?php //echo $count[0]['allcount'];?>'>
        <input type="button" class="previous" style="display: block;" value="Previous" id="but_prev" />
        <input type="button" class="next" style="display: block;" value="Next" id="but_next" />
      </div>
    </div>
  </div> -->
</div>
</div>
<?php
include_once('includes/footer.php');
?>
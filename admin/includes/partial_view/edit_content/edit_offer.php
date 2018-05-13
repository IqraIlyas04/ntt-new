<label>Offer Image: </label>
  <img src="<?php echo $offer[0]['offer_img'];?>" style="width:160px;height:160px;"/>
<input type="file" name="offer_img" id="offer_img" class="form-control"  />
<br>
<div class="row">
<div class="col-md-6">
<label>Offer Country</label>
<select id="dest_country" class="form-control" name="dest_id" required="required">
<?php 
  $country = $db_handler->get_dest_country();
  for($i=0; $i<count($country); $i++)
  {
    //If this array contains the same COUNTRY name as
    //the result, highlight that option in the list
    if($country[$i]['country_id'] == $offer[0]['dest_id'])
    {?>
      <option selected="selected" value="<?php echo $country[$i]['country_id'];?>"><?php echo $country[$i]['offer_country'];?></option>
    <?php
    }
    //Otherwise, display as usual
    else
    {?>
    <option value="<?php echo $country[$i]['country_id'];?>"><?php echo $country[$i]['offer_country'];?></option>
    <?php
    }
  }
?>
</select>
</div>
<div class="col-md-6">
<label>Offer City</label>
<!-- <div class="dropdown">
<input type="text" name="offer_city" id="offer_city" class="offer_city form-control" placeholder="City" required="required" value="<?php //echo $offer[0]['offer_city'];?>"/>
<div id="city" class="dropdown-content"></div>

</div> -->
<select name="offer_city_id" id="dest_city" class="form-control">
  <?php
$city=$db_handler->get_city($offer[0]['dest_id']);

   echo "<option>Select City</option>";
   for($i=0;$i<count($city);$i++)
   {
    if($offer[0]['offer_city_id'] == $city[$i]['city_id'])
    {
      echo '<option selected="selected" value="'.$city[$i]['city_id'].'">'.$city[$i]['city_name'].'</option>';
    }
    else
    {
      echo '<option value="'.$city[$i]['city_id'].'">'.$city[$i]['city_name'].'</option>';
    }
   }
   ?>
</select>
</div>
</div>
<br>
<div class="row">
  <div class="col-md-4">
<label>Offer Days</label>
<select id="offer_days" class="duration form-control" name="offer_days">
 <option><?php echo $offer[0]['offer_days'];?></option> 
</select>

</div>
<div class="col-md-4">
<label>Offer Nights</label>
<select id="offer_nights" class="duration form-control" name="offer_nights">
   <option><?php echo $offer[0]['offer_nights'];?></option> 
</select>
</div>
<div class="col-md-4">
<label>Offer Price</label>
<input type="number" step="any" name="offer_price" id="offer_price" class="form-control" placeholder="price" required="required" value="<?php echo $offer[0]['offer_price'];?>" />
</div>
</div>

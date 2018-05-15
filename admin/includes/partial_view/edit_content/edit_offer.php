<label>Offer Image: </label>
  <img src="<?php echo $offer[0]['offer_img'];?>" style="width:160px;height:160px;"/>
<input type="file" name="offer_img" id="offer_img" class="form-control"  />
<br>
<div class="row">
<div class="col-md-6">
  <label>Package Name</label>
<input type="text" name="offer_package" id="offer_package" class="form-control" required="required" value='<?php echo $offer[0]['offer_package'];?>' />
</div>
<div class="col-md-6">
<label>Offer Country</label>
<select id="dest_country" class="form-control" name="dest_id" required="required">
<?php 
  $country = $db_handler->get_dest_country();
  for($i=0; $i<count($country); $i++)
  {
    //If this array contains the same COUNTRY name as
    //the result, highlight that option in the list
    if($country[$i]['dest_id'] == $offer[0]['dest_id'])
    {?>
      <option selected="selected" value="<?php echo $country[$i]['dest_id'];?>"><?php echo $country[$i]['city_name'];?>,      <?php echo $country[$i]['country_name'];?></option>
    <?php
    }
    //Otherwise, display as usual
    else
    {?>
    <option value="<?php echo $country[$i]['dest_id'];?>"><?php echo $country[$i]['city_name'];?>, <?php echo $country[$i]['country_name'];?></option>
    <?php
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

<label>Offer Image</label>
<input type="file" name="offer_img" id="offer_img" class="form-control" required="required" value='' />
<br>
<div class="row">
<div class="col-md-6">
<label>Offer Country</label>
<select id="dest_country" class="form-control" name="dest_id" required="required">
   <option value="">Select Country</option>
   <?php 
      $country = $db_handler->get_dest_country();
      for($i=0; $i<count($country); $i++)
      {?>
   <option value="<?php echo $country[$i]['country_id'];?>"><?php echo $country[$i]['offer_country'];?></option>
   <?php
      }
      ?>
</select>
</div>
<div class="col-md-6">
<label>Offer City</label>
<!-- <div class="dropdown">
<input type="text" name="offer_city" id="dest_city" class="offer_city form-control" placeholder="City" required="required" />
<div id="city" class="dropdown-content"></div>
</div>
</div> -->
<select name="offer_city_id" id="dest_city" class="form-control">
   
</select>
</div>
</div>
<br>
<div class="row">
	<div class="col-md-4">
<label>Offer Days</label>
<select id="offer_days" class="duration form-control" name="offer_days"></select>
</div>
<div class="col-md-4">
<label>Offer Nights</label>
<select id="offer_nights" class="duration form-control" name="offer_nights"></select>
</div>
<div class="col-md-4">
<label>Offer Price</label>
<input type="number" step="any" name="offer_price" id="offer_price" class="form-control" placeholder="price" required="required" value='' />
</div>
</div>
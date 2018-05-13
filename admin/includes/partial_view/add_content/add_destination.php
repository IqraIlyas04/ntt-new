<label>Destination Image</label>
<input type="file" name="dest_img" id="dest_img" class="form-control" required="required" value='' />
<br>
<div class="row">
<div class="col-md-6">
<label>Destination Country</label>
<select id="dest_country" class="form-control" name="dest_country_id" required="required">
   <option value="">Select Country</option>
   <?php 
      $country = $db_handler->get_all_countries();
      for($i=0; $i<count($country); $i++)
      {?>
   <option value="<?php echo $country[$i]['country_id'];?>"><?php echo $country[$i]['country_name'];?></option>
   <?php
      }
      ?>
</select>
</div>
<div class="col-md-6">
<label>Destination City</label>
<!-- <div class="dropdown">
<input type="text" name="dest_city" id="dest_city" class="dest_city form-control" placeholder="City" required="required"  />
<div id="city" class="dropdown-content"></div>
</div> -->
<select name="dest_city_id" id="dest_city" class="form-control">
   
</select>
</div>
</div>
<br>
<div class="row">
	<div class="col-md-4">
<label>Destination Days</label>
<select id="dest_days" class="duration form-control" name="dest_days"></select>
</div>
<div class="col-md-4">
<label>Destination Nights</label>
<select id="dest_nights" class="duration form-control" name="dest_nights"></select>
</div>
<div class="col-md-4">
<label>Destination Price</label>
<input type="number" step="any" name="dest_price" id="dest_price" class="form-control" placeholder="price" required="required" value='' />
</div>
</div>
<label>Destination Image: </label>
  <img src="<?php echo $dest[0]['dest_img'];?>" style="width:160px;height:160px;"/>
<input type="file" name="dest_img" id="dest_img" class="form-control"  />
<br>
<div class="row">
<div class="col-md-6">
<label>Destination Country</label>
<select id="dest_country" class="form-control" name="dest_country_id" required="required">
<?php 
  $country = $db_handler->get_all_countries();
  for($i=0; $i<count($country); $i++)
  {
    //If this array contains the same COUNTRY name as
    //the result, highlight that option in the list
    if($country[$i]['country_id'] == $dest[0]['dest_country_id'])
    {?>
      <option selected="selected" value="<?php echo $country[$i]['country_id'];?>"><?php echo $country[$i]['country_name'];?></option>
    <?php
    }
    //Otherwise, display as usual
    else
    {?>
      <option value="<?php echo $country[$i]['country_id'];?>"><?php echo $country[$i]['country_name'];?></option>
    <?php
    }
  }
?>
</select>
</div>
<div class="col-md-6">
<label>Destination City</label>
<select name="dest_city_id" id="dest_city" class="form-control">
  <?php
$city=$db_handler->get_city($dest[0]['dest_country_id']);

   echo "<option>Select City</option>";
   for($i=0;$i<count($city);$i++)
   {
    if($dest[0]['dest_city_id'] == $city[$i]['city_id'])
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
<label>Destination Days</label>
<select id="dest_days" class="duration form-control" name="dest_days">
 <option><?php echo $dest[0]['dest_days'];?></option> 
</select>

</div>
<div class="col-md-4">
<label>Destination Nights</label>
<select id="dest_nights" class="duration form-control" name="dest_nights">
   <option><?php echo $dest[0]['dest_nights'];?></option> 
</select>
</div>
<div class="col-md-4">
<label>Destination Price</label>
<input type="number" step="any" name="dest_price" id="dest_price" class="form-control" placeholder="price" required="required" value="<?php echo $dest[0]['dest_price'];?>" />
</div>
</div>
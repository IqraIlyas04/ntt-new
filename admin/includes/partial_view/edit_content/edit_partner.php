<label>Partner Image</label>
<img src="<?php echo $partner[0]['partner_img'];?>" style="width:160px;height:160px;"/>
<input type="file" name="partner_img" id="partner_img" class="form-control"  value='' />
<br>
<label>Partner name</label>
<input type="text" name="partner_name" id="partner_name" class="form-control" placeholder="partner name" required="required" value='<?php echo $partner[0]['partner_name'] ?>' pattern="^[A-Za-z]+$" />
<br>
<label>Partner Website link</label>
<input type="text" name="partner_web_url" id="partner_web_url" class="form-control" placeholder="partner web link" required="required" value='<?php echo $partner[0]['partner_web_url'] ?>' pattern="^((https?|ftp|smtp):\/\/)?(www.)?[a-z0-9]+\.[a-z]+(\/[a-zA-Z0-9#]+\/?)*$"/>
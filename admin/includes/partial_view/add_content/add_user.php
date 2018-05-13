<label>Email</label>
<input type="email" name="username" id="username" class="form-control" placeholder="@username" required="required" value='' />
<br>
<label>Password</label>
<input type="password" name="password" id="password" class="form-control" placeholder="*****" required="required" value='' />
<br>
<label>Confirm Password</label>
<input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="*****" required="required" value='' />
<br>

<label>Status</label>
<select name="is_admin" id="is_admin" class="form-control">
	  <option value="">--Select Status--</option>
   <?php 
      $status = $db_handler->get_all_status();
      for($i=0; $i<count($status); $i++)
      {?>
   <option value="<?php echo $status[$i]['status_id'];?>"><?php echo $status[$i]['status_name'];?></option>
   <?php
      }
      ?>
</select>
<label>Email</label>
<input type="email" name="username" id="username" class="form-control" placeholder="@username" required="required" value='<?php echo $user[0]['username']; ?>' />
<br>
<label>Password</label>
<input type="password" name="password" id="password" class="form-control" placeholder="*****" required="required" value='' />
<br>
<label>Confirm Password</label>
<input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="*****" required="required" value='' />
<br>
<label>Status</label>
  <select id="is_admin" class="form-control" name="is_admin" required="required">
    <option value="">Select Status</option>
      <?php
         $status = $db_handler->get_all_status();

          for($i=0;$i<count($status);$i++)
          {
            if($user[0]['is_admin'] == $status[$i]['status_id'])
            {
              echo '<option selected="selected" value="'.$status[$i]['status_id'].'">'.$status[$i]['status_name'].'</option>';
            }
            else
            {
              echo '<option value="'.$status[$i]['status_id'].'">'.$status[$i]['status_name'].'</option>';
            }
          }
      ?>
  </select>
<label>Social Media Title</label>
<input type="text" name="sm_title" id="sm_title" class="form-control" placeholder="sm title" required="required" value="<?php echo $sm[0]['sm_title']; ?>" pattern="^[A-Za-z]+$" />
<br>
<label>Social Media Link</label>
<input type="text" name="sm_link" id="sm_link" class="form-control" placeholder="sm link" required="required" value="<?php echo $sm[0]['sm_link'];?>" pattern="^((https?|ftp|smtp):\/\/)?(www.)?[a-z0-9]+\.[a-z]+(\/[a-zA-Z0-9#]+\/?)*$"/>
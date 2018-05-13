<?php
session_start();
include_once('db_connect.php');
include_once('db_handler.php');
include_once('utility.php');
   
$db = new DB_CONNECT();
$conn = $db->connect();
   
$db_handler = new DB_HANDLER($conn);
$utility_handler = new UTILITY();


if($_POST['action'] == "live_search") 
{   
   extract($_POST);   
   $q=$_POST['search'];
   
   $city=$db_handler->get_cust_cols("SELECT DISTINCT city_name from city WHERE city_name LIKE '%$q%' LIMIT 0,8");
?>
<div class="container">
   <div class="row">
      <div id="city">
         <?php
         for($i=0; $i<count($city); $i++)
         {
         ?>
            <a class="citys" value="<?php echo $city[$i]['city_name']; ?>" ><?php echo $city[$i]['city_name']; ?></a>
         <?php
         }
         ?>
      </div>
   </div>
</div>
<?php
}
         //admin password reset
else if($_POST['action'] == "generate_random_pass")
{
   extract($_POST);
   //get info frm db
   $admin=$db_handler->user_reset_pass($admin_id);

   // Create variables that hold all character values being used by your password
   $alpha = "abcdefghijklmnopqrstuvwxyz";
   $alpha_upper = strtoupper($alpha);
   $numeric = "0123456789";
   $special = "!@$#*%";
   // Concatinate all variables into one long string
   $chars = $alpha . $alpha_upper . $numeric . $special;
   // Select password length
   $length = 10;
   // Suffle the value of $chars
   $chars = str_shuffle($chars);
   // Return the length of your new $chars string
   $len = strlen($chars);
   // Create empty variable that will hold your new password
   $pw = '';

   $html="";
   // A simple 'for' statement that will select random characters for the lenth of your password
   for ($i=0;$i<$length;$i++)
      $pw .= substr($chars, rand(0, $len-1), 1); 
      $pw=str_shuffle($pw);
      //insert password in db
      $pass=$db_handler->user_password_reset($pw, $admin_id);

   // Store the finished password in a variable, that will shuffle the value created by the 'for' statement
   $html .='<div class="modal-body" style="text-align: center;">';
   $html .='<h5>Username:  <span style="font-size: 17px; color: #485460;">'.$admin[0]['username'].'</span></h5>';
   $html .='<h5>Password:  <span style="font-size: 17px; color: #485460;">'.$pw.'</span></h5><br>';
   $html .='<button type="button" class="btn btn-success" data-dismiss="modal">OK</button>';
   $html .='</div>';
   // $pw = str_shuffle($pw);
   // show the password on screen
   echo $html;
   exit;
}

else if($_POST['action'] == "fetch_city")
{
   extract($_POST);
   $city=$db_handler->get_city($country_id);

   echo "<option>Select City</option>";
   for($i=0;$i<count($city);$i++)
   {
      echo '<option value="'.$city[$i]['city_id'].'">'.$city[$i]['city_name'].'</option>';
   }
   exit;
}
?>
 <?php   
session_start();
include_once('includes/db_connect.php');
include_once('includes/db_handler.php');

$db = new DB_CONNECT();
$conn = $db->connect();

$db_handler = new DB_HANDLER($conn);

if(isset($_POST['login']))
{
  extract($_POST);
  //Check if the user exists
  if($db_handler->check_user_exists($username))
  {
    //If yes, validate user and pass
    if($db_handler-> check_user_login($username, $password) == true)
    {
            $res=$db_handler->get_user($username);
            $_SESSION['user_logged_in'] = true;
            $_SESSION['username'] = $res[0]['username'];
            $_SESSION['user_id'] = $res[0]['user_id'];
            $_SESSION['is_admin'] = $res[0]['is_admin'];
            header('Location: index.php');
            exit;
    }
    else
    {
        echo "Wrong Credentials";
    }
  }
  else
  {
      echo "This user doesn't exist";
  }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Naresco Travels</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <style>
    .con{
      position: absolute;
    top: 50%;
    left: 50%;
    margin-right: -50%;
    transform: translate(-50%, -50%);
    margin: 0 auto;
    width: 30%;
    }

    .btn-custom {
    color: #fff;
    background-color: #013976;
    border-color: #013976;
}
    .btn-custom:hover {
    color: #fff;
    background-color: #013976;
    border-color: #013976;
}
  </style>
</head>
<body>
  <div class="con container">
  <div style="text-align: center; " >
    <img src="img/new-logo.jpg" style="height: 135px; width: 400px;">
   <h2 >Sign In</h2>
   <p>to access the Administration Panel</p>
   <div style="
    border-bottom: 3px solid;
    margin-bottom: 32px;
    color: #013976;
"></div>
 </div>
      <?php
      if(isset($_SESSION['message']))
      {       
        echo"<div>".$_SESSION['message']."</div>";
        unset($_SESSION['message']);
      }
      ?>     
      <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
       
            <input class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Email Address" name="username" style="height: 50px; font-size: 20px;">
        </div>
        <div class="form-group">
      
            <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password" name="password" style="height: 50px; font-size: 20px; margin-bottom: 23px;">
        </div>
            <input class="btn btn-lg btn-custom btn-block" name="login" type="submit" value="Log In" style="    height: 50px; font-size: 22px;">
      </form>
    </div>
  

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>
</html>

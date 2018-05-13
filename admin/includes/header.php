 <?php 
   session_start();
   include_once('includes/db_connect.php');
   include_once('includes/db_handler.php');
   include_once('includes/utility.php');
   
   $db = new DB_CONNECT();
   $conn = $db->connect();
   
   $db_handler = new DB_HANDLER($conn);
   $utility_handler = new UTILITY();
   
   //Check if the session is stored
  if(!isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == false)
  {
    header('location: login.php');
    exit;
  }

   //print_r($_SESSION);
  $main=array();
  switch ($_SESSION['is_admin']) 
  {
     case 1:
       $main=array
        (
          array
          (
            'title'=>'Admin',
            'icon'=>'fa fa-fw fa-user mr-10 c-yellow',
            'href'=>'view-admin.php'
          ),
          array
          (
            'title'=>'Destinations',
            'icon'=>'fa fa-fw fa-globe mr-10 c-teal',
            'href'=>'view-destination.php'
          ), 
          array
          (
            'title'=>'Social Media',
            'icon'=>'fa fa-fw fa-link mr-10 c-brown',
            'href'=>'view-sm.php'
          ),
          array
          (
            'title'=>'Contacts',
            'icon'=>'fa fa-address-book mr-10 c-red',
            'href'=>'view-contact.php'
          ),          
          array
          (
            'title'=>'Partners',
            'icon'=>'fa fa-users mr-10 c-pink',
            'href'=>'view-partner.php'
          ),
          array
          (
            'title'=>'Special Offers',
            'icon'=>'fa fa-fw fa-gift mr-10 c-purple',
            'href'=>'view-offers.php'
          ),                           
        );
        break;

        case 2:
        $main=array(
          array
          (
            'title'=>'Destinations',
            'icon'=>'fa fa-fw fa-globe mr-10 c-teal',
            'href'=>'view-destination.php'
          ), 
          array
          (
            'title'=>'Social Media',
            'icon'=>'fa fa-fw fa-link mr-10 c-brown',
            'href'=>'view-sm.php'
          ),
          array
          (
            'title'=>'Contacts',
            'icon'=>'fa fa-address-book mr-10 c-red',
            'href'=>'view-contact.php'
          ),          
          array
          (
            'title'=>'Partners',
            'icon'=>'fa fa-users mr-10 c-pink',
            'href'=>'view-partner.php'
          ),
          array
          (
            'title'=>'Special Offers',
            'icon'=>'fa fa-fw fa-gift mr-10 c-purple',
            'href'=>'view-offers.php'
          ),
        );
        break;
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
      <link href="css/print.css" rel="stylesheet" type="text/css" media="print">
      <!-- Custom fonts for this template-->
      <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <!-- Page level plugin CSS-->
      <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
       <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
      <!-- Custom styles for this template-->
      <link href="css/styles.css" rel="stylesheet" >
      <link href="css/sb-admin.css" rel="stylesheet" >
      <link href="css/sb-admin-2.css" rel="stylesheet">
      <style type="text/css">/* Chart.js */
         @-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}
          td.details-control {
          background: url('images/icons/details_open.png') no-repeat center center;
          cursor: pointer;
          }
          tr.shown td.details-control {
          background: url('images/icons/details_close.png') no-repeat center center;
          }

          .dropbtn 
          {
              background-color: #4CAF50;
              color: white;
              padding: 16px;
              font-size: 16px;
              border: none;
          }

          .dropdown 
          {
              position: relative;
          }

          .dropdown-content 
          {
              display: none;
              position: absolute;
              background-color: #fff;
                 min-width: 512px;
              box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
              z-index: 1;
          }

          .dropdown-content .citys 
          {
              color: black;
              padding: 12px 16px;
              text-decoration: none;
              display: block;
          }

          .dropdown-content a:hover {background-color: #ddd}

          .dropdown:hover .dropdown-content 
          {
              display: block;
          }

          .dropdown:hover .dropbtn 
          {
              background-color: #3e8e41;
          }
          a.citys
          {
                width: 520px;
          }
      </style>
   </head>
   <body class="fixed-nav sticky-footer bg-dark" id="page-top">
      <!-- Navigation-->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
         <a class="navbar-brand" href="index.php">Naresco Travels</a>
         <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
         <i class="fa fa-bars" aria-hidden="true"></i>
         </button>
         <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
              <li class="nav-item mt-30" data-toggle="tooltip" data-placement="right" title="" data-original-title="Dashboard">
                  <a class="nav-link" href="index.php">
                  <i class="fa fa-fw fa-home mr-10 c-blue"></i>
                  <span class="nav-link-text">Dashboard</span>
                  </a>
              </li>
              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Link">
              <?php 
                for($i=0; $i<count($main); $i++)
                {
              ?>
                  <a class="nav-link" href="<?php echo $main[$i]['href']; ?>">
                  <i class="<?php echo $main[$i]['icon']; ?>"></i>
                  <span class="nav-link-text"><?php echo $main[$i]['title']; ?></span>
                  </a>
                <?php 
                  }
                ?>
              </li>
            </ul>
            <ul class="navbar-nav sidenav-toggler">
              <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                <i class="fa fa-fw fa-angle-left"></i></a>
              </li>
            </ul>
            <ul class="navbar-nav">
              <li class="nav-item dropdown"><a href="#" style="color: grey; text-decoration: none;" data-toggle="dropdown"><i class="fa fa-user c-blue" style="margin-right: 10px;"></i><?php echo $_SESSION['username']; ?></a>
                <ul class="dropdown-menu profile">
                  <li><a class="nav-link" href="user-settings.php"><i class="fa fa-fw fa-cog c-pink" style="margin-right: 10px;"></i><span class="c-grey">Setting</span></a></li>
                  <li class="dropdown-divider"></li>
                  <li><a class="nav-link" href="logout.php"><i class="fa fa-fw fa-sign-out c-blue" style="margin-right: 10px;"></i><span class="c-grey">Logout</span></a></li>
                </ul>
              </li>
        </div>
      </nav>
      <div class="content-wrapper">
        <div class="container-fluid">
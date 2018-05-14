<?php
include_once('includes/header.php');
if(isset($_POST['submit']))
{
  extract($_POST);

  $result=$db_handler->add_contact($first_name, $last_name, $phone_no);
  if(!$result)
  {
    echo "Error";
  }
}
?>
<style type="text/css">


header.media_h {
  background: linear-gradient(to left, rgba(255,0,0,0), rgba(0,0,0,0.75)), url('img/b6.jpeg');
  background-repeat: no-repeat;
  background-attachment: scroll;
  background-position: center center;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  background-size: cover;
  -o-background-size: cover;
  text-align: left;
  color: white;
  height:450px;
}

@media only screen 
and (min-width: 320px)
and (max-width: 470px) {
  header.media_h .intro-heading {
    font-family: "Montserrat", 'Open Sans', sans-serif;
    text-transform: none;
    font-weight: 700;
    font-size: 35px;
    line-height: 65px;
  }

  header.media_h{
    height: 350px;
  }

.btn-md{
  font-size: 13px;
  padding: 15px 12px;
}

section {
    padding: 36px 0;
  }

.contact_form h2{font-size: 22px;}
.widget_text h2{font-size: 22px;}

}

@media only screen 
and (min-width: 471px) 
and (max-width: 800px) {

  header.media_h .intro-heading {
    font-family: "Montserrat", 'Open Sans', sans-serif;
    text-transform: none;
    font-weight: 700;
    font-size: 55px;
    line-height:95px;
    margin-bottom: 50px;
  }

.btn-md{
  font-size: 14px;
  padding: 15px 22px;
}

.contact_form h2{font-size: 27px;}
.widget_text h2{font-size: 27px;}
.col-md-8 .col-sm-12{margin-bottom: 30px;}

}



.curved-bg-top {background-color: rgba(0,0,0,0.03);border-radius: 100% 0% 0% 0%;}
.contact_form{ padding:10px;}
.border-bottom{border-bottom: 1px solid #ddd;padding: 0 0 14px;}
.widget_text{margin-bottom: 20px;}
.icons_contact i{margin-right: 15px; color: #7d8386;}
.icons_contact{margin-bottom: 10px;}


</style>



<header class="media_h">
    <div class="container">
        <div class="intro-text" style="padding-top: 215px;">
            <div class="intro-heading" style="font-size: 50px;  margin-bottom: 80px;">Contact</div>
        </div>
    </div>
</header>

<section class="maps" style="padding-top:0px; padding-bottom: 0px;">
	<div class="container-fluid">
		<div class="row">
			<p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3608.6457679843143!2d55.30130331501055!3d25.248853383872085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f43262145d7a1%3A0x6d3d0bebe8101d33!2sNaresco+Travel+%26+Tourism+LLC!5e0!3m2!1sen!2sae!4v1524546928360" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe></p>
		</div>
	</div>
</section>

<section class="curved-bg-top">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="contact_form">
          <h2 class="contact_title">Connect With Us</h2>
          <hr class="small-line"/>
          <div style="display: none;" id="error_msg_box" class="alert alert-danger"></div>
          <form class="col-md-8 col-sm-12" style="padding-left:0px;" name="myForm" id="myForm" action=""  onsubmit="" method="post" enctype="multipart/form-data" >
            <div>
              <input type="text" placeholder="First Name" id="fname" name="first_name" class="form-control" required/><br>
              <input type="text" placeholder="Last Name" id="lname" name="last_name" class="form-control" required/><br>
              <input type="number" placeholder="Phone Number" id="phone" name="phone_no" class="form-control" required/><br>
              <div class="g-recaptcha" data-sitekey="6LeHtFcUAAAAAJTau9J6L1abmDqUqIza8b-xu2cP"></div><br>
              <button type="submit" id="submit" name="submit" class="btn btn-md"><i class="icon-phone icons"></i>Send Enquiry!
              </button>
            </div>
          </form>
        </div> 
      </div>  
      <div class="col-md-4">
        <div class="contact-sidebar" style="padding:10px;">
          <div class="widget_text">
            <h2 class="contact_title">
            Address and Info</h2>
            <hr class="small-line"/>
            <div class="border-bottom">
              <div class="text" style="margin-bottom: 10px;">
                <strong>Location:</strong><br><p> Al Karama, Dubai - UAE, Ground Floor, Naresco Building 4, Street # 4B, Behind Park Regis Kris Kin Hotel, 04 3968888.</p>
              </div>
            </div>
          </div>
          <div class="widget_text">
            <div class="border-bottom">
              <div class="text" style="margin-bottom: 10px;">
                <strong>P.O.Box:</strong><br><p> 33783, Dubai, UAE<br>Categories: Travel Agents | Travel & Tourism</p>
              </div>
            </div>
          </div>
          <div class="widget_contact">
            <div class="text" style="margin-top: 10px;">
              <strong>Contact Detail:</strong>
              <br>
              <div class="border-bottom" style="border-bottom: none;">
                <div class="icons_contact"><i class="fa fa-phone" style="font-size:17px;font-weight:700;color:#3474FD; margin-top: 10px;"></i>04 3968888</div>
                <div class="icons_contact"><i class="fa fa-envelope" style="font-size:17px;font-weight:700;color:#3474FD;"></i>info@narresco.ae</div>
                <div class="icons_contact"><i class="fa fa-clock-o" style="font-size:17px;font-weight:700;color:#3474FD;"></i>Everyday 8:00 to 17:00</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
include_once('includes/footer.php');
?>


<script>
  var form= document.myForm;


function validate_form()
{
   var errormsg="";

    var firstname = document.myForm.fname;
    var lastname = document.myForm.lname;
    var phoneno = document.myForm.phone;

   if(firstname.value == "")
          {
                 errormsg += '<p>Enter your first name!<p>';
                $("#fname").focus();
          }

    if(lastname.value == "")
          {
                 errormsg += '<p>Enter your last name!<p>';
                $("#lname").focus();
          }

     if(phoneno.value == "")
          {
                 errormsg += '<p>Enter your phone number!<p>';
                $("#phone").focus();
          }

    return errormsg;
}


    $(document).on('click', '#submit', function(e){
     //e.preventDefault();

      var errormsg = "";

      errormsg = validate_form();

      if(errormsg == "")
      {
          //something
      }
      else
      {
          document.getElementById("error_msg_box").innerHTML = errormsg;
          $("#error_msg_box").show().delay(10000).hide(0);
      }
    });


</script>






























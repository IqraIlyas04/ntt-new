var form= document.myForm;

//standard functions

function allLetter(uname)
{ 
  var letters = /^[A-Za-z]+$/;
  if(uname.match(letters))
  {
    return true;
  }
  else
  {
    return false;
  }
}

function ValidateEmail(uemail)
{
  var mailformat =/^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if(uemail.match(mailformat))
  {
    return true;
  }
  else
  {
    return false;
  }
}

function validate_phone(unum)
{

  var num = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
  if(unum.match(num))
  {
    return true;
  }
  else
  {
    // alert("Not a valid Phone Number");
    return false;
  }

  function validate_url(url)
  {
    var ulink= /^((https?|ftp|smtp):\/\/)?(www.)?[a-z0-9]+\.[a-z]+(\/[a-zA-Z0-9#]+\/?)*$/;
    if(url.match(ulink))
    {
      return true;
    }
    else
    {
      return false;
    }
  }



}


function validate_form(sectionType)
{

    var errormsg="";

    if(sectionType == "SM")
    {

       if(!allLetter($("#sm_title").val()))
          {
              errormsg += '<p>Title must be character.<p>';
              $("#sm_title").focus();

          }
           if(!allLetter($("#sm_link").val()))
          {
              errormsg += '<p>link must be a url format.<p>';
              $("#sm_link").focus();

          }
    }

    else if(sectionType == "PARTNER")
    {
        if(!allLetter($("#partner_name").val()))
          {
              errormsg += '<p>Name must be character.<p>';
              $("#partner_name").focus();

          }
           if(!allLetter($("#partner_web_url").val()))
          {
              errormsg += '<p>link must be a url format.<p>';
              $("#partner_web_url").focus();

          }    
    }

    // else if(sectionType == "OFF")
    // {
    //   if(!allLetter($("#dest_city").val()))
    //       {
    //           errormsg += '<p>City name should be character.<p>';
    //           $("#dest_city").focus();

    //       }
    // }

    //   else if(sectionType == "DEST")
    // {
    //   if(!allLetter($("#dest_city").val()))
    //       {
    //           errormsg += '<p>City name should be character.<p>';
    //           $("#dest_city").focus();

    //       }
    // }

    return errormsg;   
}

//SUBMIT ADD BUTTON

    $(document).on('click', '#submittype', function(e){
       

      var sectionType = $("#sectionType").val();
      var errormsg = "";

      errormsg = validate_form(sectionType);
// e.preventDefault();
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

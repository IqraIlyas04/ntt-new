//live search

$(document).ready(function(e)
{
    $("#dest_city").keyup(function(e)
    {
      
        var txt = $("#dest_city").val();


        if(txt != '')
        {

             $.ajax({
                type: "POST",
                url: "includes/ajax_event.php",
                data: 
                {
                    search: txt,
                    action: "live_search"   
                },

                success: function(data)
                {
                    $("#city").html(data);
                
                }
            });
        }
        else
        {
            $("#city").html(data);
        }

    });
});

//admin password reset
$("#dataTable").on('click', "#admin_reset", function(e)
{
    var user_id=$(this).data('userid');
    var password=$(this).val();

    $.ajax({
        type:'POST',
        url: 'includes/ajax_event.php',
        data:
        {
            action:"generate_random_pass",
            admin_id: user_id,
            pw: password
        },
        success: function(html){
            document.getElementById("Container").innerHTML = html;
        },
        error: function(errormesssage){
            alert(errormesssage.responseText);

        }
    });

});


$("#dest_country").change(function(e){
    //Group ID
    var countryID = $(this).val();
    // alert($(this).val());

    if(countryID == "")
    {
        alert('nothing');
    }
    else
    {
        $.ajax({
            type:'POST',
            url: 'includes/ajax_event.php',
            data:
            {
                action: "fetch_city",
                country_id: countryID
            },
            success:function(html){
                // alert(html);
                // $('#employee_dept_name').html(data);
                // $('#employee_report_to').html('<option value="">Select department first</option>');
                document.getElementById("dest_city").innerHTML = html;
            },
            error: function(errormessage)
            {
                alert(errormesssage.responseText);
            }
        });
    }
});
// function for generating destinations and offers on page
function generateDestinations()
{

	$.ajax({
		type:'POST',
		url:'includes/web_ajaxEvents.php',
		data:
		{
			action: "fetch_destinations",
		},
		success: function(html)
		{
			document.getElementById("dest_grid").innerHTML = html;
		},

		error: function(errormesssage)
		{
            alert(errormesssage.responseText);
        }
	});
}
 
window.onload=function()
{
	generateDestinations();
} 

//previous pagination


    // Load more data
    $(document).on('click', '.load-more', function(e){
        var row = Number($('#row').val());
        var txt = $("#search_text").val();
        var allcount = Number($('#all').val());
        var rowperpage = 8;
        row = row + rowperpage;

        if(row <= allcount){
            $("#row").val(row);

            $.ajax({
                url: 'includes/web_ajaxEvents.php',
                type: 'post',
                data: {
                	row:row,
                	rowperpage:rowperpage,
                	search: txt,
                	action:"fetch_more"
                },
                beforeSend:function(){
                    $(".load-more").text("Loading...");
                },
                success: function(response){

                    // Setting little delay while displaying new content
              // $('.load-moret').html("Show More");
 				$('.grid').append(response);
 				$('.sgrid').append(response);
                        // appending posts after last post with class="post"
          		}
				});
                        var rowno = row + rowperpage;

                        // checking row value is greater than allcount or not
                        if(rowno > allcount){

                            // Change the text and background
                            $('.load-more').hide();
                            // $('.load-more').css("background","darkorchid");
                        }else{
                            $(".load-more").text("Load more");
                        }
            

                
            
        }
    });
// Load more data
    $(document).on('click', '.show-more', function(e){
        var row = Number($('#row').val());
        var txt = $("#search_text").val();
        var allcount = Number($('#all').val());
        var rowperpage = 8;
        if(allcount <= 8)
        {
        	 $('#show-more').css({"display" : "none"});
        }
        else
        {
        	 $('#show-more').css({"display" : "block"});
        }
   
        row = row + rowperpage;

        if(row <= allcount)
        {
            $("#row").val(row);

            $.ajax({
                url: 'includes/web_ajaxEvents.php',
                type: 'post',
                data: {
                	row:row,
                	rowperpage:rowperpage,
                	search: txt,
                	action:"fetch_more"
                },
                success: function(response){
 				$('.grid').append(response);
 				$('.sgrid').append(response);
 				$('#country_grid').append(response);
                }
				});
                    var rowno = row + rowperpage;
                    // alert(rowno);

                    // checking row value is greater than allcount or not
                    if(rowno > allcount){

                    // Change the text and background
                        $('.show-more').css("display","none");                           
                    }else{
                        $(".show-more").text("Load more");
                        }
        }
    });

   

//fetch special offers for filter
function generateOffers()
{

	$.ajax({
		type:'POST',
		url:'includes/web_ajaxEvents.php',
		data:
		{
			action: "fetch_special_offers",
		},
		success: function(html)
		{
			document.getElementById("dest_grid").innerHTML = html;
		},

		error: function(errormesssage)
		{
            alert(errormesssage.responseText);
        }
	});
}

//live search
$(document).ready(function(e)
{
    $("#search_text").keyup(function(e)
    {      
        var txt = $("#search_text").val();
        var allcount = Number($('#all').val());
        var rowperpage = 8;
        // alert(allcount);
        if($('#all').val() <= 8)
        {
        	 $('#show-more').css({"display" : "none"});
        }
        else
        {
        	 $('#show-more').css({"display" : "block"});
        }
        

        if(txt != '')
		{

			$.ajax({
	    		type: "POST",
	    		url: "includes/web_ajaxEvents.php",
	    		data: 
	    		{	
	    			search: txt,
	    			rowperpage:rowperpage,
	    			action: "live_search"	
	    		},

	    		success: function(data)
	    		{
					$("#dest_grid").html(data);	    				    		
	    		}
	    	});
		}
		else
		{
			generateDestinations();
		}
    });
    
});

//fetch country for filter country
$("#dest_country").change(function(e)
{
	var countryid=$(this).val();
	var allcount = Number($('#all').val());
	var rowperpage = 8;
	// alert(allcount);
	 if(allcount <= 8)
        {
        	 $('#show-more').css({"display" : "none"});

        }
        else
        {
        	 $('#show-more').css({"display" : "block"});

        }
	
	if (countryid != '')
	{
		$.ajax({

			type: 'POST',
			url: "includes/web_ajaxEvents.php",
			data:
			{
				action: "fetch_country",
				country_id: countryid,
				rowperpage:rowperpage
			},
			success: function(data)
			{
				$("#dest_grid").html(data);
			},
			error: function(errormesssage)
			{
				alert(errormesssage.responseText);
			}				
		});
	}

	else
	{
		generateDestinations();
	}
});

//fetch city for filter city
$("#dest_country").change(function(e){
    //ID
    var countryID = $(this).val();
    // alert($(this).val());

    if(countryID == "")
    {
        generateDestinations();
    }
    else
    {
        $.ajax({
            type:'POST',
            url: 'includes/web_ajaxEvents.php',
            data:
            {
                action: "fetch_city",
                country_id: countryID
            },
            success:function(html)
            {
 			
				$("#destination").show();
				document.getElementById("dest_city").innerHTML = html;				
            },
            error: function(errormessage)
            {
                alert(errormesssage.responseText);
            }
        });
    }
    
});

//fetch city to view destination city cards on page
$("#dest_city").change(function(e)
{
	var cityid = $(this).val();
	// alert(cityid);
	var allcount = Number($('#all').val());
	var rowperpage = 8;
	// alert(allcount);
	 if(allcount <= 8)
        {
        	 $('#show-more').css({"display" : "none"});

        }
        else
        {
        	 $('#show-more').css({"display" : "block"});

        }

	if(cityid == "Select City")
	{
	   	generateOffers();
	}
   	else
    {
        $.ajax({
            type:'POST',
            url: 'includes/web_ajaxEvents.php',
            data:
            {
                action: "fetch_city_offers",
                city_id: cityid,
                rowperpage:rowperpage
            },
            success:function(html){
                // alert(html);
                // $('#employee_dept_name').html(data);
                // $('#employee_report_to').html('<option value="">Select department first</option>');
                document.getElementById("dest_grid").innerHTML = html;
            },
            error: function(errormessage)
            {
                alert(errormesssage.responseText);
            }
        });
    }
});

//filter by destinations and offers
$("#offers").change(function(e)
{
	
	if($(this).val() == "special_offer")
	{
	$.ajax({
		type:'POST',
		url:'includes/web_ajaxEvents.php',
		data:
		{	
			action: "fetch_special_offers",
		},
		success: function(html)
		{
			document.getElementById("dest_grid").innerHTML = html;
		},

		error: function(errormesssage)
		{
            alert(errormesssage.responseText);
        }
	});
	}
	else if($(this).val() == "destinations")
	{
	$.ajax({
		type:'POST',
		url:'includes/web_ajaxEvents.php',
		data:
		{
			action: "fetch_only_destinations",
		},
		success: function(html)
		{
			document.getElementById("dest_grid").innerHTML = html;
		},

		error: function(errormesssage)
		{
            alert(errormesssage.responseText);
        }
	});
	}
	else if($(this).val() == "all")
	{
		generateDestinations();
	}
	
});

// $(document).on("change", "#dest_country", function (e) {
// 	var countryid=$(this).val();
// 	var city=$("#dest_city").val();
// 	alert(city);
	
// 	if(city !=  )
// 	{
// 		$("#destination").show();
// 	}
// 	else
// 	{
// 		$("#destination").hide();
// 	}
// });

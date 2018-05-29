<script >
//previous pagination
var showCount=8;
var showFrom=0;
$(document).on('click', "#but_prev" ,function(e)
{  
	var txt = $("#search_text").val();
  	var allcount = Number($("#txt_allcount").val());  
   	showFrom -= showCount;
   	if(showFrom <0)
   	{
   		showFrom=0;
   	}
   	else if(showCount<=8)
   	{
   		$("#but_prev").hide();
   	}

$.ajax({
		type:'POST',
		url:'includes/web_ajaxEvents.php',
		data:
		{
			search: txt,
			showFrom: showFrom,
			showCount: showCount,
			action: "fetch_more",
		},
		success: function(html)
		{
			document.getElementById("dest_grid").innerHTML = html;
			$('.grid').append(html);
			$('.sgrid').append(html);
			$('.dgrid').append(html);
		},

		error: function(errormesssage)
		{
            alert(errormesssage.responseText);
        }
	});
});  

//next pagination
$(document).on('click', "#but_next" ,function(e)
{  
	var txt = $("#search_text").val();
  	var allcount = $("#txt_allcount").val();
	showFrom += showCount;
	if(showFrom <= allcount)
  	{
    	$(this).show();
  	
	$.ajax({
		type:'POST',
		url:'includes/web_ajaxEvents.php',
		data:
		{
			search: txt,
			showFrom: showFrom,
			showCount: showCount,
			action: "fetch_more",
		},
		success: function(html)
		{
			document.getElementById("dest_grid").innerHTML = html;
			$('.grid').append(data);
			$('.sgrid').append(html);
			$('.dgrid').append(html);
		},

		error: function(errormesssage)
		{
            alert(errormesssage.responseText);
        }
	});
	
	}
  	else
	{
		allcount=0;
	}
}); 
</script>
<?php
elseif($_POST['action'] == "fetch_more")
{
extract($_POST);
$q=$_POST['search'];
$showFrom=$_POST["showFrom"];
$showCount=$_POST["showCount"];
$dest=$db_handler->get_cust_cols("SELECT * from destination_offers WHERE type = 'destination'  or city LIKE '%$q%' or country LIKE '%$q%'or package_name LIKE '%$q%' LIMIT "  .$showFrom. "," .$showCount);
?>
<h3 class="heading" style=" ">View the latest destinations and offers! </h3>
<?php
for($i=0; $i<count($dest); $i++)
{?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
    <div style="background: linear-gradient(to top, rgba(0,0,0,0.25), rgba(0,0,0,0.75)), url('admin/<?php echo $dest[$i]['img']; ?>'); background-size: cover; height: 280px; margin-bottom: 45px;" class="item">
	    <div class="item-header">
	        <p class="title"><?php echo $dest[$i]['package_name'];?></p>
	        <?php
	        if($dest[$i]['type'] == "special offers")
	        {?>
	        	<p class="off_title"><?php echo $dest[$i]['city'];?>, <?php echo $dest[$i]['country']; ?></p>
	        <?php
	        }
	        else
	        {?>
	        	<p class="title"><?php echo $dest[$i]['city'];?>, <?php echo $dest[$i]['country']; ?></p>
	        <?php
	        }?>			
	    </div>
	    <div class="item-footer">
	        <?php
	        if($dest[$i]['type'] == "special offers")
	        {?>
	        	<p class="offers">View Special Offer</p>
	        <?php
	        }
	        else
	        {?>
	        	<p class="offers">View Destination</p>
	        <?php
	        }?>
	    </div>
    </div>
</div>
<?php
}
exit;
}
// $(document).on('click', "#but_prev , #but_next" ,function(e)
// {
// 	var txt = $("#search_text").val();
//   	var allcount = Number($("#txt_allcount").val());  
//   	var showFrom = Number($("#txt_rowid").val());
//   	 var id = $(this).attr("id");
//   	 var responseText = "";
//   	    var dataObj = {
//   	    	action: "fetch_more",
//   	    	search: txt,
// 			showFrom: showFrom,
// 			showCount: showCount,
//   	    };

//   	    switch(id)
//   	    {
//   	    	case "but_prev":
//   	    	showFrom -= showCount;
//    			if(showFrom <0)
//    			{
//    				showFrom=0;
//    			}
// 				$("#txt_rowid").val(showFrom);
// 			break;

// 			case "but_next":
// 			showFrom += showCount;
// 			if(showFrom <= allcount)
//   			{
//   				$("#txt_rowid").val(showFrom);
//   			}
//   			break;
//   	    }

// 	  	$.ajax({
// 		type:'POST',
// 		url:'includes/web_ajaxEvents.php',
// 		data:dataObj,
// 		success: function(html)
// 		{
// 			document.getElementById("dest_grid").innerHTML = html;
// 			$('.grid').append(html);
// 			$('.sgrid').append(html);
// 			$('.dgrid').append(html);
// 		},

// 		error: function(errormesssage)
// 		{
//             alert(errormesssage.responseText);
//         }
// 	});

   

// });
?>
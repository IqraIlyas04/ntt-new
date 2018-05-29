
else if($_POST['action'] == "fetch_dest")
{
extract($_POST);

$record_per_page = 8;
    if (isset($_GET["page"] )) 
        {
        $page  = $_GET["page"]; 
        } 
    else 
       {
        $page=1; 
       }; 

 
$start_from = ($page-1)* $record_per_page;
$dest=$db_handler->get_cust_cols("SELECT * from destination_offers ORDER BY RAND() LIMIT ".$start_from. "," .$record_per_page); 
?>
<h3 style=" margin-bottom: 34px;">View Our Top destinations and offers! </h3>
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
	        	<p class=""><?php echo $dest[$i]['city'];?>, <?php echo $dest[$i]['country']; ?></p>
	        <?php
	        }
	        else
	        {?>
	        	<p class="title"><?php echo $dest[$i]['city'];?>, <?php echo $dest[$i]['country']; ?></p>
	        <?php
	        }?>
	        <hr class="small-line line-nomargin">
	    </div>
	    <div class="item-footer">
	        <?php
	        if($dest[$i]['type'] == "special offers")
	        {?>
	        	<p class="offers">Special Offers!</p>
	        <?php
	        }
	        else
	        {?>
	        	<button class="btn btn-dest">View</button>
	        <?php
	        }?>
	    </div>
    </div>
</div>
<?php
}
$page_query=$db_handler->get_cust_cols("SELECT * from destination_offers ");
  
echo "<ul class='pagination'>";
echo "<li><a href='view-destination.php?page=".($page-1)."' class='button'>Previous</a></li>"; 

for ($i=1; $i<count($page_query); $i++) {  
    echo "<li><a href='view-destination.php?page=".$i."'>".$i."</a></li>";
};  

echo "<li><a href='view-destination.php?page=".($page+1)."' class='button'>NEXT</a></li>";
echo "</ul>"; 
exit;
}


      function generateDestinations(page)  
      {  
           $.ajax({  
                url:"includes/web_ajaxEvents.php",  
                method:"POST",  
                data:{
                	page:page,
                	action: "fetch_dest",
                },  
                success:function(data){  
                     $('#dest_grid').html(data);  
                }  
           })  
      }  

      window.onload=function()
{
	generateDestinations();
} 
      $(document).on('click', '.pagination_link', function(){  
           var page = $(this).attr("id");  
           generateDestinations(page);  
      });  
 




 if($_POST['action'] == "fetch_destinations")
{
extract($_POST);
$dest=$db_handler->view_all_dest();
?>
<h3 style=" margin-bottom: 34px;">View Our Top destinations and offers! </h3>
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
	        	<p class=""><?php echo $dest[$i]['city'];?>, <?php echo $dest[$i]['country']; ?></p>
	        <?php
	        }
	        else
	        {?>
	        	<p class="title"><?php echo $dest[$i]['city'];?>, <?php echo $dest[$i]['country']; ?></p>
	        <?php
	        }?>
	        <hr class="small-line line-nomargin">
	    </div>
	    <div class="item-footer">
	        <?php
	        if($dest[$i]['type'] == "special offers")
	        {?>
	        	<p class="offers">Special Offers!</p>
	        <?php
	        }
	        else
	        {?>
	        	<button class="btn btn-dest">View</button>
	        <?php
	        }?>
	    </div>
    </div>
</div>
<?php
}
?>
</div>
<center>
   <button class="show-more" type="button">
   <span class="load-post" title="More Posts">Show More</span>
   </button>  
</center>
<?php
exit;
}
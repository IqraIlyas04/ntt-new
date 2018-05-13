<?php  
include_once('includes/header.php');
include_once('partial_breadcrumbs.php');
$offer=$db_handler->view_all_offers();
?>
<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-table"></i> View All Offers</div>
      <div class="card-body">
        <div class="table-responsive">
          <a href="add-content.php?section=OFF" role="button" class="btn btn-outline-info">Add Offers</a><br/><br/>
            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>                               	
                        <tr>
                           <th>#</th>
                            <th>Image</th>
                            <th>Country</th>
                            <th>City</th>
                            <th>Days</th>
                            <th>Nights</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php 
                        for($i=0; $i<count($offer);$i++)
                        {
                    ?>
                    <tr>
                    	<td><?php echo ($i+1); ?></td>
                    	<td><img style="width:80px;height:80px;" src="<?php echo $offer[$i]['offer_img']; ?>"/></td>
                    	<td><?php echo $offer[$i]['offer_country']; ?></td>
                        <td><?php echo $offer[$i]['offer_city']; ?></td>
                    	<td><?php echo $offer[$i]['offer_days']; ?></td>
                        <td><?php echo $offer[$i]['offer_nights']; ?></td>
                    	<td><?php echo $offer[$i]['offer_price']; ?></td>
                    	<td>
                    		<a href="edit-content.php?section=OFF&id=<?php echo $offer[$i]['offer_id'];?>" class="btn btn-outline-primary">Edit</a>
                         		<a href="del_content.php?section=OFF&id=<?php echo $offer[$i]['offer_id'];?>" class="btn btn-outline-danger">Delete</a>
                    	</td>
                    </tr>
                    	<?php
                    }
                    ?>
                    </tbody>
            </table>
        </div>
    </div>
</div>
<?php include_once('includes/footer.php');?>
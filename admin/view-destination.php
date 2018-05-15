<?php  
include_once('includes/header.php');
include_once('partial_breadcrumbs.php');
$dest=$db_handler->view_all_dest();
?>
<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-table"></i> View All destinations</div>
      <div class="card-body">
        <div class="table-responsive">
          <a href="add-content.php?section=DEST" role="button" class="btn btn-outline-info">Add Destination</a><br/><br/>
            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>                               	
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Country</th>
                            <th>City</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php 
                        for($i=0; $i<count($dest);$i++)
                        {
                    ?>
                    <tr>
                    	<td><?php echo ($i+1); ?></td>
                    	<td><img style="width:80px;height:80px;" src="<?php echo $dest[$i]['dest_img']; ?>"/></td>
                    	<td><?php echo $dest[$i]['dest_country']; ?></td>
                        <td><?php echo $dest[$i]['dest_city']; ?></td>
                    	<td>
                    		<a href="edit-content.php?section=DEST&id=<?php echo $dest[$i]['dest_id'];?>" class="btn btn-outline-primary">Edit</a>
                         		<a href="del_content.php?section=DEST&id=<?php echo $dest[$i]['dest_id'];?>" class="btn btn-outline-danger">Delete</a>
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
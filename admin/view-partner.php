<?php include_once('includes/header.php');
include_once('partial_breadcrumbs.php');
$partner=$db_handler->view_all_partners();

?>
<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-table"></i> View All partners</div>
      <div class="card-body">
        <div class="table-responsive">
          <a href="add-content.php?section=PARTNER" role="button" class="btn btn-outline-info">Add Partner</a><br/><br/>
            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>                               	
                        <tr>
                            <th>#</th>
                            <th>Partner image</th>
                            <th>Partner name</th>
                            <th>Partner Website link</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        for($i=0; $i<count($partner);$i++)
                        {
                    ?>
                        <tr>
                         	<td><?php echo ($i+1);?></td>
                         	<td><img style="width:80px;height:80px;" src="<?php echo $partner[$i]['partner_img'];?>"/></td>
                         	<td><?php echo $partner[$i]['partner_name'];?></td>
                            <td><?php echo $partner[$i]['partner_web_url'];?></td>

                         	<td>
                         		<a href="edit-content.php?section=PARTNER&id=<?php echo $partner[$i]['partner_id'];?>" class="btn btn-outline-primary">Edit</a>
                         		<a href="del_content.php?section=PARTNER&id=<?php echo $partner[$i]['partner_id'];?>" class="btn btn-outline-danger">Delete</a> 
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
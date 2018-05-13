<?php include_once('includes/header.php');
include_once('partial_breadcrumbs.php');
$sm=$db_handler->view_all_sm();
?>
<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-table"></i> View All social media</div>
      <div class="card-body">
        <div class="table-responsive">
          <a href="add-content.php?section=SM" role="button" class="btn btn-outline-info">Add Social Media</a><br/><br/>
            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>                               	
                        <tr>
                            <th>#</th>
                            <th>Social Media title</th>
                            <th>Social Media link</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        for($i=0; $i<count($sm);$i++)
                        {
                    ?>
                        <tr>
                         	<td><?php echo ($i+1);?></td>
                         	<td><?php echo $sm[$i]['sm_title'];?></td>
                         	<td><?php echo $sm[$i]['sm_link'];?></td>
                         	<td>
                         		<a href="edit-content.php?section=SM&id=<?php echo $sm[$i]['sm_id'];?>" class="btn btn-outline-primary">Edit</a>
                         		<a href="del_content.php?section=SM&id=<?php echo $sm[$i]['sm_id'];?>" class="btn btn-outline-danger">Delete</a> 
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
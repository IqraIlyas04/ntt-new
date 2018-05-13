<?php include_once('includes/header.php');
include_once('partial_breadcrumbs.php');
$contact=$db_handler->view_all_contacts();
?>
<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-table"></i> View All contacts</div>
      <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>                               	
                        <tr>
                            <th>#</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Phone numbers</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        for($i=0; $i<count($contact);$i++)
                        {
                    ?>
                        <tr>
                         	<td><?php echo ($i+1);?></td>
                         	<td><?php echo $contact[$i]['first_name'];?></td>
                         	<td><?php echo $contact[$i]['last_name'];?></td>
                         	<td><?php echo $contact[$i]['phone_no'];?></td>
                         	<td>
                         		<a href="del_content.php?section=CONTACT&id=<?php echo $contact[$i]['contact_id'];?>" class="btn btn-sm btn-outline-danger">Delete</a> 
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
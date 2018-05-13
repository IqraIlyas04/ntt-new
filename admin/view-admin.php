<?php
include_once('includes/header.php');
include_once('partial_breadcrumbs.php');
$user=$db_handler->view_all_users();
?>
<div class="card mb-3">
   <div class="card-header">
      <i class="fa fa-table"></i> View All users
   </div>
   <div class="card-body">
      <div class="table-responsive">
         <a href="add-content.php?section=USER" role="button" class="btn btn-outline-info">Add User</a><br/><br/>
         <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Username</th>
                  <th>Status</th>
                  <th>Actions</th>
               </tr>
            </thead>
            <tbody>
               <?php 
                  for($i=0; $i<count($user);$i++)
                  {
                  ?>
               <tr>
                  <td><?php echo ($i+1);?></td>
                  <td><?php echo $user[$i]['username'];?></td>
                  <td><?php echo $user[$i]['status'];?></td>
                  <td>
                     <a href="edit-content.php?section=USER&id=<?php echo $user[$i]['user_id'];?>" class="btn btn-sm btn-outline-primary">Edit</a>
                     <a href="del_content.php?section=USER&id=<?php echo $user[$i]['user_id'];?>" class="btn btn-sm btn-outline-danger">Delete</a> 
                     <?php 
                        if($user[$i]['is_admin'] == $user[$i]['user_id'])
                        {
                        ?>
                     <button class="btn btn-sm btn-outline-info" data-userid="<?php echo $user[$i]['user_id']; ?>" id="admin_reset" data-target="#empresetModal" data-toggle="modal" style="visibility: hidden;">Reset</button>
                     <?php
                        }
                        else
                        {
                          ?>
                     <button class="btn btn-sm btn-outline-info" data-userid="<?php echo $user[$i]['user_id']; ?>" id="admin_reset" data-target="#empresetModal" data-toggle="modal" style="">Reset</button>
                     <?php
                        }
                        ?>
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
</div>
<?php include_once('includes/footer.php');?>
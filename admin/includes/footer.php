
   <!-- UNTIL HERE -->
  </div>
    <!-- /.container-fluid-->
    
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Employee Reset password -->
    <div class="modal fade" id="empresetModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h5 class="modal-title">Reset Password</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div id="Container">
            
          </div>

        </div>
      </div>
    </div>
    <!-- Employee Reason status -->
    <div class="modal fade" id="empStatusModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h5 class="modal-title">Employee Remarks</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div id="status_html"></div>

        </div>
      </div>
    </div>

  <!-- Passport Manager Modal -->
    <div class="modal fade" id="passStatusModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h5 class="modal-title">Passport Status</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div id="passport_status"></div>
           <!-- <div id="pass_status">
            
        </div>
        <div id="return_status">
          
        </div>
        <div id="dep_return_status">
          
        </div> -->
      </div>
    </div>

  </div>
  <!-- /.content-wrapper-->

  <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © HRConnect 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top" style="display: inline;">
      <i class="fa fa-angle-up"></i>
    </a>
</body>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
    
    <script src="js/ajaxEvents.js"></script>
    <script src="js/addValidation.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
    
   <script>

      $(function(){
          var $select = $(".duration");
          for (i=0;i<=30;i++){
              $select.append($('<option></option>').val(i).html(i))
          }
      });


      $(document).on('click' , '.citys', function() {
        var x = $(this).text();
        document.getElementById('dest_city').value = x;
      });

   </script>
</html>
<!doctype html>
<link rel="shortcut icon" href="<?= base_url('assets/images/icon.png'); ?>">
<body>
   <?php include('navigasi.php');?>
   <div class="breadcrumbs">
      <div class="col-sm-4">
         <div class="page-header float-left">
            <div class="page-title">
               <h1>Dataset</h1>
            </div>
         </div>
      </div>
      <!-- col sm 4 -->
   </div>
   <!-- breadscrum -->
   <div >
      <?php
         foreach ($data as $dataset):
         ?>
      <?php 
         if ($this->session->flashdata('success')){
             echo "
                 <script>
                     swal(
                        'Congratulation!',
                        'You sucessfully add the dataset, click ok to see the dataset detail',
                        'success'
         
                     )
                 </script>
             ";
         }
         
         ?>
      <div >
         <div class="col-lg-3 col-md-6">
            <div class="card">
               <div class="card-body">
                  <a href="<?= base_url("Data/detail_data?id=".$dataset->ds_id)?>">
                     <div class="stat-widget-four">
                        <div class="stat-icon dib">
                           <i class="ti-server text-danger border-danger"></i>
                        </div>
                        <!-- stat-icon -->
                        <div class="stat-content" style="padding-left: 20px; text-align: left;">
                           <div class="text-left dib">
                              <div class="stat-heading" >
                                 <?php echo $dataset->ds_name; ?>
                              </div>
                              <div class="stat-text">Total: <?php echo $dataset->ds_row; ?></div>
                           </div>
                           <!-- text-left -->
                        </div>
                        <!--  start-content -->
                     </div>
                     <!-- stat_widget-four -->
                  </a>
                  <!-- icon delete dataset -->
                  <!-- href="<?= base_url("Data/delete?id=".$dataset->ds_id)?>" -->
                  <a onclick="deletedata(<?php echo $dataset->ds_id ?>)" >
                     <p class="fa fa-trash-o fa-lg float-right alert_notif" style="margin-bottom: 0em;"></p>
                  </a>
               </div>
               <!-- card body -->
            </div>
            <!-- card -->
         </div>
         <!-- col md -->
      </div>
        <?php
         endforeach;
        ?>
   </div>
   <!-- /#right-panel -->
   <script type="text/javascript">
      function deletedata(id) {
      swal({
      title: 'Delete Dataset?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      //confirmButtonColor: '#3085d6',
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'No, cancel!',
      reverseButtons: true
      
      }).then(function (isConfirm) {
      if (isConfirm) {
       $.ajax({
        url: "<?php echo base_url('Data/delete')?>",
        type: 'post',
        data: {
         id: id
        },
        success: function () {
         swal(
          'Done!',
          'Succesfully delete your dataset',
          'success',
          );
          window.location.reload();
        },
        error: function () {
         swal('data gagal dihapus', 'error');
        }
       });
      }
      })
      
      }
   </script>
   <script type="text/javascript">
      $(document).ready(function() {
      $('#bootstrap-data-table-export').DataTable();
      });
   </script>
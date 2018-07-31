<!doctype html>
<link rel="shortcut icon" href="<?= base_url('assets/images/icon.png'); ?>">
<body>
   <?php include('navigasi.php');?>

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
    
   <div class="content mt-3">
      <div class="animated fadeIn">
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="card-header">
                     <strong class="card-title">Dataset 
                     <?php 
                        foreach ($detail as $value) {
                            echo $value->ds_name;
                        } ?></strong>
                  </div> <!-- card header -->

                  <div class="card-body">
                     <a href="<?= base_url('Data/dataset')?>">
                     <button type="button" class="btn btn-secondary btn-sm"><i class="fa fa-angle-left "></i>
                     Back to Dataset List</button></a>
                     <a href="<?= base_url('Calculation/calculation')?>">
                     <button type="button" class="btn btn-info btn-sm"><i class="fa fa-cogs"></i>
                     Ready to calculate</button></a>
                     
                     <br><br>
                     <h6>Dataset Description : </h6>
                     <p><?php 
                        foreach ($detail as $value) {
                            echo $value->ds_description;} ?></p>
                  </div> <!-- card body -->

                  <div class="card-body" style=" max-width:1050px">
                     <table id="bootstrap-data-table2" class="table table-striped table-bordered" >
                        <thead >
                           <tr>
                              <th>No</th>
                              <?php for ($i=0; $i <count($head) ; $i++) { ?>
                              <th><?php echo $head[$i] ?></th>
                              <?php } ?>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                              $no = 1;
                              for ($i=0; $i <count($body) ; $i++) { 
                              ?>
                           <tr>
                              <td><?php echo $no; ?></td>
                              <?php for ($j=0; $j < 18 ; $j++) { ?>
                              <td><?php echo $body[$i][$j] ?></td>
                              <?php } ?>
                           </tr>
                           <?php 
                              $no++;
                              } ?>
                        </tbody>
                     </table>
                  </div> <!-- card body -->
               </div><!-- card -->
            </div> <!-- col md 12 -->
         </div> <!-- row -->
      </div> <!-- fadein -->
      <!-- .animated -->
   </div>
   <!-- .content -->
   </div><!-- /#right-panel -->

   <script type="text/javascript">
      $(document).ready(function() {
          var table = $('#bootstrap-data-table2').removeAttr('length').DataTable( {
              scrollY:        "300px",
              scrollX:        true,
              scrollCollapse: true,
              paging:         false,
              columnDefs: [
                  { width: 20, targets: 0 }
              ],
              fixedColumns: true,
              "searching": false
          } );
      } );
   </script>
<!doctype html>

<link rel="shortcut icon" href="<?= base_url('assets/images/icon.png'); ?>">
<link rel="stylesheet" href="<?php base_url("assets/sweetalret/sweetalert2.min.css")?>">
<script href="<?php base_url("assets/sweetalret/sweetalert2.min.js")?>"></script>

<body>

   <?php include('navigasi.php');?>

   <div class="breadcrumbs">
      <div class="col-sm-4">
         <div class="page-header float-left">
            <div class="page-title">
               <h1>Dashboard</h1>
            </div>
         </div>
      </div>
   </div>
   <!-- breadcrumbs -->

   <div class="content mt-3">
      <div class="col-sm-12">

        <div class="jumbotron">
              <h4>Welcome to <b>WESDAP</b></h4><br>
              Wesdap is a software that provides calculation for various datasets entered by the user with the Deep Neural Network(DNN) Method.
              Ready to calculate your data? moved to <a href="<?php echo base_url('Operator/calculation')?>"><b>calculation</b></a> menu!!
        </div>
         
      </div>
      <!--/.col content mt-3-->

      <div class="col-sm-6 col-lg-3">
         <a href="<?= base_url("Data/dataset");?>">
            <div class="card text-white bg-flat-color-4">
               <div class="card-body pb-0">
                  <div class="dropdown float-right">
                  </div>
                  <h5 class="text-light">Dataset</h5>
                  <div class="chart-wrapper px-0" style="height:70px;" height="70">
                  </div>
               </div>
            </div>
         </a>
      </div>
      <!--/.col-->

      <div class="col-sm-6 col-lg-3">
         <a href="<?= base_url("Operator/detail_operator");?>">
            <div class="card text-white bg-flat-color-1">
               <div class="card-body pb-0">
                  <h5 class="text-light">Operator</h5>
               </div>
               <div class="chart-wrapper px-0" style="height:70px;" height="70">
               </div>
            </div>
         </a>
      </div>
      <!--/.col-->

   </div>
   <!-- .content -->

   </div><!-- /#right-panel -->

</body>
</html>
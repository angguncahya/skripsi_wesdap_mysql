<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>WesdapSQL</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="shortcut icon" href="<?= base_url('assets/images/icon.png'); ?>">
   <link rel="stylesheet" href="<?= base_url('assets/js/vendor/jquery-1.11.3.min.js');?>">
   <link rel="stylesheet" href="<?= base_url('assets/css/normalize.css'); ?>">
   <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
   <link rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css');?>">
   <link rel="stylesheet" href="<?= base_url('assets/css/themify-icons.css'); ?>">
   <link rel="stylesheet" href="<?= base_url('assets/css/flag-icon.min.css'); ?>">
   <link rel="stylesheet" href="<?= base_url('assets/css/cs-skin-elastic.css'); ?>">
   <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
   <link rel="stylesheet" href="<?= base_url('assets/scss/style.css'); ?>">
   <link href="<?= base_url('assets/css/lib/vector-map/jqvmap.min.css'); ?>" rel="stylesheet">
   <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <!-- SWEET ALERT NIH -->
   <link rel="stylesheet" href="<?php echo base_url('assets/SA2/dist/sweetalert2.css');?>">

   <script src="<?php echo base_url('assets/SA2/dist/sweetalert2.js'); ?>"></script>
   <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
   <script src="<?= base_url('assets/js/vendor/jquery-2.1.4.min.js'); ?>"></script>
   <script src="<?= base_url('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js'); ?>"></script>
   <script src="<?= base_url('assets/js/plugins.js'); ?>"></script>
   <script src="<?= base_url('assets/js/main.js'); ?>"></script>
   <script src="<?= base_url('assets/js/lib/chart-js/Chart.bundle.js'); ?>"></script>
   <script src="<?= base_url('assets/js/dashboard.js'); ?>"></script>
   <script src="<?= base_url('assets/js/widgets.js'); ?>"></script>
   <script src="<?= base_url('assets/js/lib/vector-map/jquery.vmap.js'); ?>"></script>
   <script src="<?= base_url('assets/js/lib/vector-map/jquery.vmap.min.js'); ?>"></script>
   <script src="<?= base_url('assets/js/lib/vector-map/jquery.vmap.sampledata.js'); ?>"></script>
   <script src="<?= base_url('assets/js/lib/vector-map/country/jquery.vmap.world.js'); ?>"></script>
   <script src="<?= base_url('assets/js/lib/data-table/datatables.min.js');?>"></script>
   <script src="<?= base_url('assets/js/lib/data-table/dataTables.bootstrap.min.js');?>"></script>
   <script src="<?= base_url('assets/js/lib/data-table/dataTables.buttons.min.js');?>"></script>
   <script src="<?= base_url('assets/js/lib/data-table/buttons.bootstrap.min.js');?>"></script>
   <script src="<?= base_url('assets/js/lib/data-table/jszip.min.js');?>"></script>
   <script src="<?= base_url('assets/js/lib/data-table/pdfmake.min.js');?>"></script>
   <script src="<?= base_url('assets/js/lib/data-table/vfs_fonts.js');?>"></script>
   <script src="<?= base_url('assets/js/lib/data-table/buttons.html5.min.js');?>"></script>
   <script src="<?= base_url('assets/js/lib/data-table/buttons.print.min.js');?>"></script>
   <script src="<?= base_url('assets/js/lib/data-table/buttons.colVis.min.js');?>"></script>
   <script src="<?= base_url('assets/js/lib/data-table/datatables-init.js');?>"></script>
   <script src="<?= base_url('assets/js/global.js');?>"></script>

</head>
<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
   <nav class="navbar navbar-expand-sm navbar-default">
      <div class="navbar-header">
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
         <i class="fa fa-bars"></i>
         </button>
         <a class="navbar-brand" href="<?= base_url('');?>">Wesdap MySQL</a>
         <a class="navbar-brand hidden" href="./">W</a>
      </div> <!-- header -->

      <div id="main-menu" class="main-menu collapse navbar-collapse">
         <ul class="nav navbar-nav">
            <li class="active">
               <a href="<?= base_url(''); ?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
            </li>

            <li class="menu-item-has-children dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-database"></i>Dataset</a>
               <ul class="sub-menu children dropdown-menu">
                  <li><i class="fa fa-upload"></i><a href="<?= base_url('Data/index'); ?>">Upload</a></li>
                  <li><i class="fa fa-table"></i><a href="<?= base_url('Data/dataset'); ?>">Detail Dataset</a></li>
               </ul>
            </li>

            <li class="menu-item-has-children dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Operator</a>
               <ul class="sub-menu children dropdown-menu">
                  <li><i class="fa fa-th"></i><a href="<?= base_url('Operator/detail_operator'); ?>">Detail Operator</a></li>
               </ul>
            </li>

            <li class="menu-item-has-children dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-file"></i>Calculation</a>
               <ul class="sub-menu children dropdown-menu">
                  <li><i class="menu-icon fa fa-pie-chart"></i><a href="<?= base_url('Calculation/calculation'); ?>">Create Calculation</a></li>
                  <li><i class="menu-icon fa fa-table"></i><a href="<?= base_url('Calculation/result'); ?>">History Calculation</a></li>
               </ul>
            </li>

         </ul>
      </div>
      <!-- /.navbar-collapse -->
   </nav>
</aside>
<!-- /#left-panel -->


<!-- Right Panel -->
<div id="right-panel" class="right-panel">
<!-- Header-->
<header id="header" class="header">
   <div class="header-menu">
      <!-- header putih -->
      <div class="col-sm-7">
         <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
      </div>
   </div>
</header>
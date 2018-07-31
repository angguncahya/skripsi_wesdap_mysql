<!doctype html>

<link rel="shortcut icon" href="<?= base_url('assets/images/icon.png'); ?>">
<script src="<?= base_url('assets/js/custom.js'); ?>"></script>
<script src="<?= base_url('assets/js/global.js'); ?>"></script>

<body>
   <?php include('navigasi.php');?>
   <div class="col-lg-12">
      <div class="card">
         <div class="card-header">
            <strong>Dataset</strong>
         </div>
         <div class="card-body card-block">
            <form autocomplete="off" action="<?= base_url('data/input_dataset')?>"' method="post" enctype="multipart/form-data" class="form-horizontal">

               <div>
                  <div class="form-group">
                     <label for="ds_name" class="control-label mb-1" >Dataset Name</label>
                     <input id="ds_name" class="form-control" name="ds_name"  type="text" placeholder="Enter your dataset name" maxlength="50" pattern=".[a-zA-Z]{5,}" title="only letters and no space are allowed" required>
                  </div>
                  <div class="form-group">
                     <label for="ds-description" class="control-label mb-1">Dataset Description</label>
                     <textarea id="ds_descripton " class="form-control" name="ds_description" type="text" placeholder="Enter your dataset description" maxlength="300" required></textarea>
                  </div>
               </div>

               <div class="row form-group">
                  <div class="col-12 col-md-9">
                     <strong for="exampleInputFile">Upload File Excel</strong>
                  </div>
                  <br>

                  <div class="col-12 col-md-9"><input accept=".csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" type="file" id="file-input" name="dataset_file" class="form-control-file" required></div>
                  <br><br>

               </div>

               <button type="submit" class="btn btn-outline-primary ">
               Submit
               </button>

            </form> <!-- form -->
         </div> <!-- card body -->
      </div> <!-- card -->
   </div> <!-- col lg-12 -->

   
<!doctype html>

<link rel="shortcut icon" href="<?= base_url('assets/images/icon.png'); ?>">

<body>
    <?php include('navigasi.php');?>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Calculation</strong>
            </div>
            <div class="card-body card-block">
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div>
                <div class="form-group">
                    <p style="color: #f86c6b">Note : Select the <b>Dataset</b> or <a href="<?php echo base_url('Data/')?>"><b>Upload</b></a> it before starting the calculation !!</p>
                    <label for="cc-payment" class="control-label mb-1">Dataset</label>
                </div>
                <div class="row form-group">
                    <div class="col-12 col-md-9">
                        <select name="select" id="select" class="form-control" required>
                            <option value="0" hidden>Choose Dataset</option>
                            <?php
                                foreach ($data as $operator):
                            ?>
                            <option value="<?php echo $operator->ds_id; ?>"><?php echo $operator->ds_name; ?></option>
                            <?php
                                endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                
            </div>
           <!--  <strong>Operator Deep Neural Network(DNN)</strong><br><br> -->
            <strong>Operator Pengurangan</strong><br><br>
            <h6 >Input </h6><br>
                <div class="form-group">
                    <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="cc-payment" class="control-label mb-1">Variabel A</label>
                    </div>
                    <div class="col-6 col-md-3">
                       <select name="select1" id="select1" class="form-control" title="please select the dataset first to select the input" required>
                            
                        </select>
                    </div>
                    </div>  
                    <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="cc-payment" class="control-label mb-1">Variabel B</label>
                    </div>
                    <div class="col-6 col-md-3">
                        <select name="select2" id="select2" class="form-control"  title="please select the dataset first to select the input" required>
                            
                        </select>
                    </div>
                    </div>       
                    <div>
                        <button type="submit" class="btn btn-outline-primary ">
                            Submit
                        </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
    $("#select").change(function(){
       var id = $("#select").val();
       
        $.get('<?php echo base_url() ?>calculation/pilihKolom',{ds_id: id})
        .done(function(data) {
            $('#select1').html(data);
            $('#select2').html(data);
        });
    });
});
</script>
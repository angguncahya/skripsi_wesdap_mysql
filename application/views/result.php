<!doctype html>

<link rel="shortcut icon" href="<?= base_url('assets/images/icon.png'); ?>">

<body>
    <?php include('navigasi.php');?>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>History Calculation</strong>
            </div>
            <div class="card-body card-block">
                <div class='row'>
                    <?php foreach($histories as $history){ ?>
                        <div class="col col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <i class="fa fa-cogs bg-info p-3 font-2xl mr-3 float-left text-light"></i>
                                        <div class="h6 text-secondary mb-0 mt-1"><!-- HARD CODE -->[<?= $history->id; ?>] Pengurangan</div>
                                        <div class="text-muted font-xs small"><?= $history->time; ?></div>
                                    </div>
                                    <div class="b-b-1 pt-3"></div>
                                    <hr>
                                    <div class="more-info pt-2" style="margin-bottom:-10px;">
                                        <a class="font-weight-bold font-xs btn-block text-muted small" href="<?= base_url('history/index/'.$history->id)?>">
                                            View More 
                                            <i class="fa fa-angle-right float-right font-lg"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
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
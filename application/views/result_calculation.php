<!doctype html>

<link rel="shortcut icon" href="<?= base_url('assets/images/icon.png'); ?>">

<body>
    <?php include('navigasi.php');?>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Calculation Result</strong>
            </div>
            <div class="card-body card-block">
                <a href="<?= base_url('Calculation/result')?>">
                    <button type="button" class="btn btn-secondary btn-sm"><i class="fa fa-angle-left "></i>
                    Back to History List</button>
                </a>

                <div>
                    <br><h5>DNN (Deep Neural Network)</h5><br>

                    <div>
                    <h6>Source : <!-- <?php echo $detail->ds_name; ?> --></h6>
                    <!-- <h6><?php 
                            echo $data->ds_name;
                         ?></h6> --><br><br>
                    </div>
                    
                    <div style="width:1050px; height: 300px; overflow-y: auto; overflow-x: scroll;">
                    <table class='table' style="table-layout: fixed; overflow-x: hidden;">
                        <thead >
                            <tr>
                                <?php foreach($tables->head as $head){ ?>
                                    <th><?= $head; ?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <thead>
                            <?php foreach($tables->body as $body){ ?>
                                <tr>
                                    <?php foreach($body as $b){ ?>
                                        <td><?= $b; ?></td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </thead>
                    </table> <!-- tabel -->
                    </div> <!-- div tabel -->

                </div>

            </div>
               
        </div> <!-- card -->
    </div> <!-- col-lg-12 -->

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


});
</script>
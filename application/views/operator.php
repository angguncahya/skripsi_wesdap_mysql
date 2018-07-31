<!doctype html>

<link rel="shortcut icon" href="<?= base_url('assets/images/icon.png'); ?>">

<body>
    <?php include('navigasi.php');?>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Detail Operataor</strong>
            </div>
            
            <div class="card-body">
                <h5>Deep Neural Network</h5><br>
                <div>
                    <p style="line-height: 2"><b>Deep learning</b> (also known as deep structured learning or hierarchical learning) is part of a broader family of machine learning methods based on learning data representations, as opposed to task-specific algorithms. Learning can be supervised, semi-supervised or unsupervised.<br><br>

                    Deep learning architectures such as <b>deep neural networks</b>, deep belief networks and recurrent neural networks have been applied to fields including computer vision, speech recognition, natural language processing, audio recognition, social network filtering, machine translation, bioinformatics, drug design and board game programs, where they have produced results comparable to and in some cases superior to human experts.<br><br>

                    Deep learning models are vaguely inspired by information processing and communication patterns in biological nervous systems yet have various differences from the structural and functional properties of biological brains, which make them incompatible with neuroscience evidences.</p>
                    
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
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="margin-none">
                        <i class="fa fa-th fa-fw"></i> <?= strtoupper($title); ?>
                    </h4>
                </div>
                <div class="panel-body">
                <?php $this->load->view('web/includes/message'); ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Enter Tag</label>
                                    <input type="text" name="tag" class="form-control" placeholder="Enter Tag" required maxlength="40" id="read-tag-input" autofocus="true">
                                </div>
                                <button type="button" class="btn btn-success" id="add">Add</button>
                                <button type="button" class="btn btn-info" id="clear">Clear</button>
                        </div>

                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
<?php $this->load->view('web/includes/footer'); ?>
<script>
    let tagRead = document.querySelector('#read-tag-input');
    tagRead.addEventListener('change',function(e){
        e.preventDefault();
        $.ajax({
            url : '<?= base_url('/save_reader_tag')?>',
            method : 'POST',
            data : {tage : e.target.value},
            success : function(response){
                console.log(response);
                e.target.value = '';
            }
        })
    })
</script>

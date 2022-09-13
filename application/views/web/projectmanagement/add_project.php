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
                            <form role="form" method="post" onsubmit="return confirm('Are you sure you want to Add Project ?');" action="<?= base_url('save_project'); ?>">
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <select class="form-control" name="company_id" required>
                                        <option value="">Select Company </option>
                                        <?php foreach($page_data as $data):?>
                                            <option value="<?= $data->cid?>"><?= ucwords($data->company_name); ?></option>
                                        <?php endforeach;?>    
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Project Name</label>
                                    <input type="text" name="project_name" class="form-control" placeholder="Enter Project Name" required maxlength="150">
                                </div>
                                <button type="submit" class="btn btn-success" name="add">Add</button>
                                <button type="reset" class="btn btn-info">Clear</button>
                            </form>
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
<?php
include_once('footer.php');
?>
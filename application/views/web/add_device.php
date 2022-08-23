<?php 
include_once('header.php');
?>
 <div id="page-wrapper">
                <div class="row">
                <?php include_once('message.php');?>
                <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               
                                <h4 class="margin-none">
                                    <i class="fa fa-th fa-fw"></i> <?= strtoupper($title);?> 
                                </h4>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form role="form" method="post" onsubmit="return confirm('Are you sure you want to Add Device ?');" action="<?= base_url()?>Vehicle_controller/add_device">
                                            <div class="form-group">
                                                <label>Device Name *</label>
                                                <input type="text" name="device_name" class="form-control" placeholder="Device Name *" required maxlength="40">
                                            </div>
                                            <div class="form-group">
                                                <label>Device Id *</label>
                                                <input type="text" class="form-control" name="device_id_number" placeholder="Device Id *" required maxlength="50">
                                            </div>
                                            <button type="submit" class="btn btn-success" name="add">Add</button>
                                            <button type="reset" class="btn btn-info">Reset</button>
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

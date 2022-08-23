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
                                        <form role="form" method="post" onsubmit="return confirm('Are you sure you want to Add Vehicle ?');" action="<?= base_url()?>Vehicle_controller/add_vehicle">
                                            <div class="form-group">
                                                <label>Vehicle Number *</label>
                                                <input type="text" class="form-control" name="vehicle_number" placeholder="Vehicle Number *" required maxlength="60">
                                            </div>
                                            <div class="form-group">
                                                <label>Vehicle Tag *</label>
                                                <input type="text" name="vehicle_tag" class="form-control" placeholder="Vehicle Tag *" required maxlength="100">
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

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
                                     <form role="form" method="post" onsubmit="return confirm('Are you sure you want to Update Vehicle ?');" action="<?= base_url()?>Vehicle_controller/edit_vehicle_detail">
                                            <input type="hidden" name="vehicle_id" value="<?= $page_data->vehicle_id;?>">
                                            <div class="form-group">
                                                <label>Vehicle Number *</label>
                                                <input type="text" class="form-control" name="vehicle_number" placeholder="Vehicle Name *" required value="<?= $page_data->vehicle_number?>" maxlength="60">
                                            </div>
                                            <div class="form-group">
                                                <label>Vehicle Tag *</label>
                                                <input type="text" name="vehicle_tag" class="form-control" placeholder="Vehicle Tag *" required value="<?= $page_data->vehicle_tag?>" maxlength="100">
                                            </div> 
                                            <div class="form-group">
                                                <label>Status *</label>
                                                <select class="form-control" name="status" required>
                                                    <option value="">Status *</option>
                                                    <option <?php if($page_data->status==1){echo "selected";}?> value="1">Active</option>
                                                    <option <?php if($page_data->status==0){echo "selected";}?> value="0">Inactive</option>
                                                </select>
                                            </div>
                                                <button type="submit" class="btn btn-success" title="Update" name="update">Update</button>
                                                <a href="<?= base_url('Vehicle_controller/view_all_vehicle');?>" class="btn btn-info" title="Cancle">Cancle</a>
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

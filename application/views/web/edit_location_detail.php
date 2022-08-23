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
                                        <form role="form" method="post" onsubmit="return confirm('Are you sure you want to Update Location ?');" action="<?= base_url()?>Vehicle_controller/edit_location_detail">
                                        <input type="hidden" name="location_id" value="<?= $page_data->location_id;?>">
                                        <div class="form-group">
                                                <label>Select Area *</label>
                                                <select name="area_id" class="form-control" required="">
                                                    <option value="">Select Area</option>
                                                    <?php foreach($area as $area){?>
                                                        <option value="<?= $area->area_id;?>" <?php if($page_data->area_id==$area->area_id){echo "selected='selected'";}?>><?= ucwords($area->area_name);?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Location Name *</label>
                                                <input type="text" name="location_name" class="form-control" placeholder="Location Name *" value="<?= ucwords($page_data->location_name) ?>" required maxlength="40">
                                            </div>
                                            <div class="form-group">
                                                <label>Location Type *</label>
                                                <select name="location_type" class="form-control" required="">
                                                    <option value="">Select Location Type</option>
                                                    <option <?php if($page_data->location_type=='i'){echo "selected";}?> value="i">In</option>
                                                    <option <?php if($page_data->location_type=='o'){echo "selected";}?> value="o">Out</option>
                                                </select>
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
                                                <a href="<?= base_url('Vehicle_controller/view_location');?>" class="btn btn-info" title="Cancle">Cancle</a>
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

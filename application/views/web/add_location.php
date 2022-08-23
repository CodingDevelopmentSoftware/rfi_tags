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
                                        <form role="form" method="post" onsubmit="return confirm('Are you sure you want to Add Location ?');" action="<?= base_url()?>Vehicle_controller/add_location">
                                            <div class="form-group">
                                                <label>Select Area *</label>
                                                <select name="area_id" class="form-control" required="">
                                                    <option value="">Select Area</option>
                                                    <?php foreach($page_data as $page_data){?>
                                                        <option value="<?= $page_data->area_id;?>"><?= ucwords($page_data->area_name);?></option>
                                                    <?php }?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Location Name *</label>
                                                <input type="text" name="location_name" class="form-control" placeholder="Location Name *" required maxlength="40">
                                            </div>
                                            <div class="form-group">
                                                <label>Location Type *</label>
                                                <select name="location_type" class="form-control" required="">
                                                    <option value="">Select Location Type</option>
                                                    <option value="i">In</option>
                                                    <option value="o">Out</option>
                                                </select>
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

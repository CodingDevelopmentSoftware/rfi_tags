<?php 
include_once('header.php');
?>
 <div id="page-wrapper">
                <div class="row">
                <?php include_once('message.php');?>
                <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               
                                <h4 class="margin-none">
                                    <i class="fa fa-th fa-fw"></i> <?= strtoupper($title);?>
                                </h4>
                               
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form role="form" method="post" onsubmit="return confirm('Are you sure you want to Connect Device ?');" action="<?= base_url()?>Vehicle_controller/connect_device">
                                           <div class="form-group">
                                                <label>Device *</label>
                                                <select class="form-control" name="device_id" required>
                                                    <option value="">Select Device *</option>
                                                    <?php for($i=0;$i<count($page_data['active_device']);$i++){?>
                                                        <option value="<?= $page_data['active_device'][$i]->device_id?>"><?= $page_data['active_device'][$i]->device_id_number." ( ".$page_data['active_device'][$i]->device_name." )"?></option>
                                                    <?php }?>    
                                                    
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Area - Location - Location Type *</label>
                                                <select class="form-control" name="location_id" required>
                                                    <option value="">Select Area - Location - Location Type *</option>
                                                    <?php for($i=0;$i<count($page_data['active_location']);$i++){?>
                                                        <option value="<?= $page_data['active_location'][$i]->location_id?>"><?= ucwords($page_data['active_location'][$i]->area_name)?> - <?= ucwords($page_data['active_location'][$i]->location_name);?> - <?php if($page_data['active_location'][$i]->location_type=='i'){echo "In";}else{echo "Out";}?></option>
                                                    <?php }?>    
                                                    
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-success" name="connect">Mapping</button>
                                            <button type="reset" class="btn btn-info">Reset</button>
                                        </form>
                                    </div>
                                   
                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->


                             <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="connecting_device">
                                        <thead>
                                            <tr>
                                                <th>Serial No.</th>
                                                <th>Device Name (Device Id)</th>
                                                <th>Location Name</th>
                                                <th>Location Type</th>
                                                <th>Area Name</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $c=0; for($i=0;$i<count($page_data['currently_connected']);$i++){?>
                                                <tr>
                                                    <td><?= ++$c;?></td>
                                                    <td><?= $page_data['currently_connected'][$i]->device_name;?> (<?= $page_data['currently_connected'][$i]->device_id_number;?>)</td>
                                                    <td><?= ucwords($page_data['currently_connected'][$i]->location_name);?></td>
                                                    <td><?php if($page_data['currently_connected'][$i]->location_type=='i'){echo "In";}else{echo "Out";}?></td>
                                                    <td><?= ucwords($page_data['currently_connected'][$i]->area_name);?></td>
                                                    <td><?= date("d-m-Y H:i:s",strtotime($page_data['currently_connected'][$i]->created_dt));?></td>
                                                    <td>
                                                        <a onclick="return confirm('Are you sure you want to Remove Connection of <?= $page_data['currently_connected'][$i]->device_id_number;?> ( <?= $page_data['currently_connected'][$i]->device_name;?> ) From <?= ucwords($page_data['currently_connected'][$i]->location_name);?> ?')" href="<?= base_url("Vehicle_controller/remove_connect_device/").base64_encode($page_data['currently_connected'][$i]->connect_table_id).'/'.base64_encode($page_data['currently_connected'][$i]->device_id).'/'.base64_encode($page_data['currently_connected'][$i]->location_id);?>" class="btn btn-info btn-md" title="View Vehicle">Disconnect</a>
                                                    </td>
                                                </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                                
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

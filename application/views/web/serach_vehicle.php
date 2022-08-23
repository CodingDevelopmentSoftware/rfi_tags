<?php 
include_once('header.php');

?>
            <div id="page-wrapper">
               
                <!-- /.row -->
                <div class="row">
                <?php include_once('message.php');?>
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                              
                                <h4 class="margin-none">
                                    <i class="fa fa-th fa-fw"></i> <?= strtoupper($title);?>
                                </h4>
                        </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                <form role="form" method="post" onsubmit="return confirm('Are you sure you want to Proceed ?');" action="<?= base_url()?>Vehicle_controller/search_vehicle">
                                         <div class="form-group">
                                            <label>Vehicle Tag/Nmuber *</label>
                                            <input type="text" name="vehicle_tag" class="form-control" placeholder="Enter Vehicle Tag or Vehicle Number" value="<?php echo  set_value('vehicle_tage',$this->session->userdata('vehicle_tage'),FALSE);?>" required=""/>
                                             
                                        </div>
                                        <button type="submit" class="btn btn-success" name="submit">Submit</button>
                                        <button type="reset" class="btn btn-info">Reset</button>
                                    </form>
                                    <br/>
                                    <table class="table table-striped table-bordered table-hover" id="search_vehicle">
                                        <thead>
                                            <tr>
                                                <th>Serial No.</th>
                                                <th>Vehicle Number</th>
                                                <th>Vehicle Tag</th>
                                                <th>Status</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php
                                            $c=0; foreach($report_page_data as $vehicle){?>
                                                <tr>
                                                    <td><?= ++$count;?></td>
                                                    <td><?= $vehicle->vehicle_number;?></td>
                                                    <td><?= $vehicle->vehicle_tag;?></td>
                                                    <td><?php $status=$vehicle->status; if($status=='1'){echo "Active";}elseif($status=='0'){echo "Inactive";}?></td>
                                                    <td><?= date("d-m-Y H:i:s",strtotime($vehicle->created_dt));?></td>
                                                    <td>
                                                        <a onclick="return confirm('Are you sure you want to see Profile of <?= ucfirst($vehicle->vehicle_number);?>?')" href="<?= base_url("Vehicle_controller/view_vehicle_detail/").base64_encode($vehicle->vehicle_id);?>" class="btn btn-success btn-sm" title="View Vehicle">View</a>
                                                        <a onclick="return confirm('Are you sure you want to Update Profile of <?= ucfirst($vehicle->vehicle_number);?>?')" href="<?= base_url("Vehicle_controller/edit_vehicle_detail/").base64_encode($vehicle->vehicle_id);?>" class="btn btn-info btn-sm" title="Edit Vehicle">Edit</a>
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
              
               
                
            </div>
            <!-- /#page-wrapper -->
<?php 
include_once('footer.php');

?>            
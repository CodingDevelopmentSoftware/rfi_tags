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
                                    <table class="table table-striped table-bordered table-hover" id="all_locations">
                                        <thead>
                                            <tr>
                                                <th>Serial No.</th>
                                                <th>Area Name</th>
                                                <th>Location Name</th>
                                                <th>Location Type</th>
                                                <th>Status</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $c=0; foreach($page_data as $page_data){?>
                                                <tr>
                                                    <td><?= ++$c;?></td>
                                                    <td><?= ucwords($page_data->area_name);?></td>
                                                    <td><?= ucwords($page_data->location_name);?></td>
                                                    <td><?php $location_type=$page_data->location_type; if($location_type=='i'){echo "In";}elseif($location_type=='o'){echo "Out";}?></td>
                                                    <td><?php $status=$page_data->status; if($status=='1'){echo "Active";}elseif($status=='0'){echo "Inactive";}?></td>
                                                    <td><?= date("d-m-Y H:i:s",strtotime("$page_data->created_dt"));?></td>
                                                    <td>
                                                        <a onclick="return confirm('Are you sure you want to see Location of <?= ucwords($page_data->location_name);?> ?')" href="<?= base_url("Vehicle_controller/view_location_detail/").base64_encode($page_data->location_id);?>" class="btn btn-success btn-sm" title="View page_data">View</a>
                                                        <a onclick="return confirm('Are you sure you want to Update Location of <?= ucwords($page_data->location_name);?> ?')" href="<?= base_url("Vehicle_controller/edit_location_detail/").base64_encode($page_data->location_id);?>" class="btn btn-info btn-sm" title="Edit page_data">Edit</a>
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
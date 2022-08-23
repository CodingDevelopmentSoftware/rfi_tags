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
                                    <table class="table table-striped table-bordered table-hover" id="all_device">
                                        <thead>
                                            <tr>
                                                <th>Serial No.</th>
                                                <th>Device Name</th>
                                                <th>Device id</th>
                                                <th>Status</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $c=0; foreach($page_data as $page_data){?>
                                                <tr>
                                                    <td><?= ++$c;?></td>
                                                    <td><?= $page_data->device_name;?></td>
                                                    <td><?= $page_data->device_id_number;?></td>
                                                    <td><?php $status=$page_data->status; if($status=='1'){echo "Active";}elseif($status=='0'){echo "Inactive";}?></td>
                                                    <td><?= date("d-m-Y H:i:s",strtotime("$page_data->created_dt"));?></td>
                                                    <td>
                                                        <a onclick="return confirm('Are you sure you want to see Profile of <?= $page_data->device_name;?> ?')" href="<?= base_url("Vehicle_controller/view_device_detail/").base64_encode($page_data->device_id);?>" class="btn btn-success btn-sm" title="View page_data">View</a>
                                                        <a onclick="return confirm('Are you sure you want to Update Profile of <?= $page_data->device_name;?> ?')" href="<?= base_url("Vehicle_controller/edit_device_detail/").base64_encode($page_data->device_id);?>" class="btn btn-info btn-sm" title="Edit page_data">Edit</a>
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
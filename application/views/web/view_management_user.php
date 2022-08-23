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
                                    <table class="table table-striped table-bordered table-hover" id="user_managment">
                                        <thead>
                                            <tr>
                                                <th>Serial No.</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>User Log Id</th>
                                                <th>Phone Number</th>
                                                <th>Type</th>
                                                <th>Status</th>
                                                <th>Reset Password</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $c=0; foreach($all_management_user as $user){
                                                if($this->session->userdata('user_id')!=$user->user_id && $user->user_id!=1){?>
                                                <tr>
                                                    <td><?= ++$c;?></td>
                                                    <td><?= ucfirst($user->first_name);?></td>
                                                    <td><?= ucfirst($user->last_name)?></td>
                                                    <td><?= $user->email_id;?></td>
                                                     <td><?= $user->phone_no?></td>
                                                    <td><?php $type=$user->user_type; if($type=='s'){echo "Super Admin";}elseif($type=='a'){echo "Admin";}else{echo "NA";} ?></td>
                                                    <td><?php $status=$user->status; if($status=='1'){echo "Active";}elseif($status=='0'){echo "Inactive";}?></td>
                                                    
                                                    <td>
                                                        <a onclick="return confirm('Are you sure you want to Reset Password of <?= ucfirst($user->email_id);?>?')" href="<?= base_url("Vehicle_controller/reset_password/").base64_encode($user->user_id);?>" class="btn btn-success btn-sm" title="Reset Password">Resst</a>
                                                    </td>
                                                    <td>
                                                        <a onclick="return confirm('Are you sure you want to see Profile of <?= ucfirst($user->email_id);?>?')" href="<?= base_url("Vehicle_controller/view_user_account_detail/").base64_encode($user->user_id);?>" class="btn btn-success btn-sm" title="View Profile">View</a>
                                                        <a onclick="return confirm('Are you sure you want to Update Profile of <?= ucfirst($user->email_id);?>?')" href="<?= base_url("Vehicle_controller/edit_user_account_detail/").base64_encode($user->user_id);?>" class="btn btn-info btn-sm" title="Edit Profile">Edit</a>
                                                    </td>
                                                </tr>
                                           <?php }}?>
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
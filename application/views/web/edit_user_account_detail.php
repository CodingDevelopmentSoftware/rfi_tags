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
                                        <form role="form" method="post" onsubmit="return confirm('Are you sure you want to Update User ?');" action="<?= base_url()?>Vehicle_controller/edit_user_account_detail">
                                            <div class="form-group">
                                                <input type="hidden" name="user_id" value="<?= $management_user->user_id;?>">
                                                <label>First Name *</label>
                                                <input type="text" name="first_name" class="form-control" value="<?= ucfirst($management_user->first_name);?>" placeholder="First Name *" required maxlength="40">
                                            </div>
                                            <div class="form-group">
                                                <label>Last Name *</label>
                                                <input type="text" name="last_name" class="form-control" value="<?= ucfirst($management_user->last_name);?>" placeholder="Last Name *" required maxlength="40">
                                            </div>
                                            <div class="form-group">
                                                <label>Phone Number *</label>
                                                <input type="text" name="phone_no" class="form-control" value="<?= $management_user->phone_no;?>" placeholder="Phone Number *" required maxlength="20">
                                            </div>
                                            <div class="form-group">
                                                <label>User log Id *</label>
                                                <input type="text" name="email_id" class="form-control" placeholder="User Log Id*"  value="<?= $management_user->email_id?>" required maxlength="100">
                                            </div>
                                            <div class="form-group">
                                                <label>User Type *</label>
                                                <select class="form-control" name="user_type" required>
                                                    <option value="">User Type *</option>
                                                    <option <?php if($management_user->user_type=='s'){echo "selected";}?> value="s">Super Admin</option>
                                                    <option <?php if($management_user->user_type=='a'){echo "selected";}?> value="a">Admin</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Status *</label>
                                                <select class="form-control" name="status" required>
                                                    <option value="">Status *</option>
                                                    <option <?php if($management_user->status==1){echo "selected";}?> value="1">Active</option>
                                                    <option <?php if($management_user->status==0){echo "selected";}?> value="0">Inactive</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-success" title="Update" name="update">Update</button>
                                            <a href="<?= base_url('Vehicle_controller/view_management_user');?>" class="btn btn-info" title="Cancle">Cancle</a>
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

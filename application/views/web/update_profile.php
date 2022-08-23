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
                                        <form role="form" method="post" onsubmit="return confirm('Are you sure you want to Update your profile ?');" action="<?= base_url('Vehicle_controller/update_profile')?>">
                                            <div class="form-group">
                                                <label>First Name *</label>
                                                <input type="text" name="first_name" class="form-control" placeholder="First Name *" required maxlength="40" value="<?= $page_data->first_name?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Last Name *</label>
                                                <input type="text" name="last_name" class="form-control" placeholder="Last Name *" required maxlength="40" value="<?= $page_data->last_name?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Phone Number *</label>
                                                <input type="text" name="phone_no" class="form-control" placeholder="Phone Number *" required maxlength="20" value="<?= $page_data->phone_no?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Email Id *</label>
                                                <input type="text" disabled="" class="form-control" value="<?= $page_data->code_email_id?>">
                                            </div>
                                           
                                            <button type="submit" class="btn btn-success" name="update">Update</button>
                                            <a href="<?= base_url('Vehicle_controller/')?>" class="btn btn-info">Cancel</a>
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

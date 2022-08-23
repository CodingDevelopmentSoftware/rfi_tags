<div id="page-wrapper">
    <div class="row">
        <?php $this->load->view('web/includes/message'); ?>
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="margin-none">
                        <i class="fa fa-th fa-fw"></i> <?= strtoupper($title); ?>
                    </h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" method="post" onsubmit="return confirm('Are you sure you want to Add User ?');" action="<?= base_url('UserManagment/save'); ?>">
                                <div class="form-group">
                                    <label>First Name *</label>
                                    <input type="text" name="first_name" class="form-control" placeholder="First Name *" required maxlength="40">
                                </div>
                                <div class="form-group">
                                    <label>Last Name *</label>
                                    <input type="text" name="last_name" class="form-control" placeholder="Last Name *" required maxlength="40">
                                </div>
                                <div class="form-group">
                                    <label>Phone Number *</label>
                                    <input type="text" name="phone_no" class="form-control" placeholder="Phone Number *" required maxlength="20">
                                </div>
                                <div class="form-group">
                                    <label>User Type *</label>
                                    <select class="form-control" name="user_type" required>
                                        <option value="">User Type *</option>
                                        <option value="s">Super Admin</option>
                                        <option value="a">User</option>
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
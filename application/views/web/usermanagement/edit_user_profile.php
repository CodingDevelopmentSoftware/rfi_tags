<div id="page-wrapper">
    <div class="row">
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
                            <form role="form" method="post" onsubmit="return confirm('Are you sure you want to Update User ?');" action="<?= base_url('save_update_user'); ?>">
                                <div class="form-group">
                                    <input type="hidden" name="user_id" value="<?= $page_data->user_id; ?>">
                                    <label>First Name </label>
                                    <input type="text" name="first_name" class="form-control" value="<?= ucfirst($page_data->first_name); ?>" placeholder="Enter First Name " required maxlength="40">
                                </div>
                                <div class="form-group">
                                    <label>Last Name </label>
                                    <input type="text" name="last_name" class="form-control" value="<?= ucfirst($page_data->last_name); ?>" placeholder="Enter Last Name " required maxlength="40">
                                </div>
                                <div class="form-group">
                                    <label>Phone Number </label>
                                    <input type="number" name="phone_number" class="form-control" min="1" maxlength="10" value="<?= $page_data->phone_number; ?>" placeholder="Enter Phone Number " required maxlength="20">
                                </div>
                                <div class="form-group">
                                    <label>User Type </label>
                                    <select class="form-control" name="user_type" required>
                                        <option value="">User Type </option>
                                        <option <?php if ($page_data->user_type == 'a') {
                                                    echo "selected";
                                                } ?> value="a">Admin</option>
                                        <option <?php if ($page_data->user_type == 'e') {
                                                    echo "selected";
                                                } ?> value="e">Employee</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success" title="Update" name="update">Update</button>
                                <a href="<?= base_url('view_users'); ?>" class="btn btn-info" title="Cancle">Cancle</a>
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
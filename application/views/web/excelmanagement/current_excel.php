<div id="page-wrapper">
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb text-sm text-right">
                <li><a href="<?= base_url('view_projects') ?>">Home</a></li>
                <li>Job Status</li>
            </ol>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="margin-none">
                        <i class="fa fa-th fa-fw"></i> <?= strtoupper($title); ?>
                    </h4>
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <?php $this->load->view('web/includes/message'); ?>
                    <div class="row">
                        <form action="<?= base_url('current_excel') ?>" method="post" class="col-md-4">
                            <div class="form-group">
                                <label for="select-job">Select Job</label>
                                <select id="select-job" class="form-control" name="job_id">
                                    <option value="">Select Job</option>
                                    <?php foreach ($job_data as $value) : ?>
                                        <option value="<?= $value->pid ?>"><?= ucwords($value->project_name) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-sm" type="submit">Select</button>
                            </div>
                        </form>
                    </div>
                    <?php if ($show_report) : ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <tr>
                                    <th>Field</th>
                                    <th>Value</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td>Company Name</td>
                                    <td><?= isset($project_data->company_name) ? ucwords($project_data->company_name) : 'N/A'; ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Job Number</td>
                                    <td><?= isset($project_data->project_name) ? ucwords($project_data->project_name) : 'N/A'; ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Total Count</td>
                                    <td><?= $total_count->total_count ?></td>
                                    <td>
                                        <?php if ($total_count->total_count) : ?>
                                            <a href="<?= base_url("remove_all/") . base64_encode($project_data->pid); ?>" onclick="return confirm('Are you sure you want to delete all data ?')" class="btn btn-danger btn-xs" title="View Profile">Remove All</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Origianl Count</td>
                                    <td><?= $original_count ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Duplicate Count</td>
                                    <td><?= $duplicate_count ?></td>
                                    <td>
                                        <?php if ($duplicate_count) : ?>
                                            <a href="<?= base_url("remove_duplicate/") . base64_encode($project_data->pid); ?>" onclick="return confirm('Are you sure you want to delete duplicate data ?')" class="btn btn-danger btn-xs" title="View Profile">Remove Duplicate</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </table>
                            <br />
                            <br />
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="user_managment">
                                    <thead>
                                        <tr>
                                            <th>Serial No.</th>
                                            <th>Type of Tag</th>
                                            <th>QR and Bar Code Number</th>
                                            <th>Record Type</th>
                                            <th>Type</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $c = 0;
                                        foreach ($page_data as $user) : ?>
                                            <tr>
                                                <td><?= ++$c; ?></td>
                                                <td><?= ucwords($user->type_of_tag); ?></td>
                                                <td><?= $user->qr_and_bar_code_number ?></td>
                                                <td><?= $user->rfid_or_id  ?></td>
                                                <td><?= $user->data_exist == 0 ? 'Original' : 'Duplicate'; ?></td>
                                                <td><?= $user->status == 1 ? 'Active' : 'Inactive'; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->

                        </div>
                    <?php endif; ?>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <!-- /#page-wrapper -->
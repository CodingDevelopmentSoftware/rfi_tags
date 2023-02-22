<div id="page-wrapper">
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb text-sm text-right">
                <li><a href="<?= base_url('dashboard') ?>">Home</a></li>
                <li>Dashboard</li>
                <!-- <li class="active">Inbox</li> -->
            </ol>
            <div class="panel panel-primary">
                <div class="panel-body">
                    <h4 class="text-uppercase margin-none"><i class="fa fa-dashboard"></i> Dashboard</h4>
                </div>
            </div>
            <?php $this->load->view('web/includes/message'); ?>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="panel panel-default  box-white panel-status panel-danger">
                        <div class="panel-body padding-none">
                            <!-- <a href="#"> -->
                            <div class="row">
                                Total Jobs
                                <div class="col-xs-3">
                                    <i class="fa fa-tags fa-5x panel-status-icon" aria-hidden="true"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <span id="vehicle_count"><?= $page_data['total_count_activities'] ?></span>
                                    </div>
                                </div>
                            </div>
                            <!-- </a> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="panel panel-default  box-white panel-status panel-warning">
                        <div class="panel-body padding-none">
                            <!-- <a href="#"> -->
                            <div class="row">
                                Total Active Jobs
                                <div class="col-xs-3">
                                    <i class="fa fa-tags fa-5x panel-status-icon" aria-hidden="true"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <span id="vehicle_count"><?= $page_data['active_count'] ?></span>
                                    </div>
                                </div>
                            </div>
                            <!-- </a> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="panel panel-default  box-white panel-status panel-info">
                        <div class="panel-body padding-none">
                            <!-- <a href="#"> -->
                            <div class="row">
                                Total Inactive Jobs
                                <div class="col-xs-3">
                                    <i class="fa fa-tags fa-5x panel-status-icon" aria-hidden="true"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <span id="vehicle_count"><?= $page_data['inactive_count'] ?></span>
                                    </div>
                                </div>
                            </div>
                            <!-- </a> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="margin-none">
                                <i class="fa fa-th fa-fw"></i> Summary of jobs
                            </h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="summary_report">
                                    <thead>
                                        <tr>
                                            <th>Sri no.</th>
                                            <th>Job Number</th>
                                            <th>Status</th>
                                            <th>Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $c = 0;
                                        foreach ($page_data['table'] as $key => $value) : ?>
                                            <tr>
                                                <td><?= ++$c; ?></td>
                                                <td><?= ucwords($value->project_name); ?></td>
                                                <td><?= $value->status ? 'Scanned' : 'Unscanned'; ?></td>
                                                <td><?= $value->count; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
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
    </div>
</div>
<!-- /#page-wrapper -->
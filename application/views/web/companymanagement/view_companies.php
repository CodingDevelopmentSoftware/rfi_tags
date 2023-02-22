<div id="page-wrapper">
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb text-sm text-right">
                <li><a href="<?= base_url('dashboard') ?>">Home</a></li>
                <li>View Companies</li>
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
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="company_management">
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
<!-- /#page-wrapper -->
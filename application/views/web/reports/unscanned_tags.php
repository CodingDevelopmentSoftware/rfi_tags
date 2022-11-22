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
                        <table class="table table-striped table-bordered table-hover" id="user_managment">
                            <thead>
                                <tr>
                                    <th>Serial No.</th>
                                    <th>Company Name</th>
                                    <th>Project Name</th>
                                    <th>Type of Tag</th>
                                    <th>QR and Bar Code Number</th>
                                    <th>RFID OR ID</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php $c = 0;
                                foreach ($page_data as $user): ?>
                                        <tr>
                                            <td><?= ++$c; ?></td>
                                            <td><?= ucwords($user->company_name); ?></td>
                                            <td><?= ucwords($user->project_name); ?></td>
                                            <td><?= ucwords($user->type_of_tag); ?></td>
                                            <td><?= $user->qr_and_bar_code_number; ?></td>
                                            <td><?= $user->rfid_or_id; ?></td>
                                        </tr>
                                <?php endforeach;?>
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
<div id="page-wrapper">
     <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb text-sm text-right">
                <li><a href="<?= base_url('dashboard')?>">Home</a></li>
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
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="panel panel-default  box-white panel-status panel-success">
                        <div class="panel-body padding-none">
                            <!-- <a href="#"> -->
                            <div class="row">
                                Total Vehicles
                                <div class="col-xs-3">
                                    <i class="fa fa-truck fa-5x panel-status-icon"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <span id="vehicle_count">0</span>
                                    </div>
                                    <div class="text-uppercase text-xs"><span style="font-size:15px;">In : <span id="in_vehicle">0</span>,</span><span style="color:red; font-size:15px;"> Out : <span id="out_vehicle">0</span> </span> </div>
                                </div>
                            </div>
                            <!-- </a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /#page-wrapper -->
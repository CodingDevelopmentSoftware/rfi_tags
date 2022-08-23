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
                                <span>
                                    <?= $this->pagination->create_links()?>
                                </span>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="in_vehicle_transaction">
                                        <thead>
                                           <tr>
                                                <th>Serial No.</th>
                                                <th>Created Date</th>
                                                <th>Vehicle Number</th>
                                                <th>Vehicle Tag Number</th>
                                                <th>Device ID</th>
                                                <th>Location</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                                $count=$this->uri->segment(3,0);
                                                $c=0; 
                                                foreach($page_data as $page_data){?>
                                                 <tr>
                                                <td><?= ++$count;?></td>
                                                <td><?= $page_data->device_date_time;?></td>
                                                <td><?= $page_data->vehicle_number;?> </td>
                                                <td><?= $page_data->vehicle_tag;?></td>
                                                <td><?= $page_data->device_id_number;?></td>
                                                <td><?= $page_data->location_name;?></td>
                                            </tr>
                                           <?php } ?>
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
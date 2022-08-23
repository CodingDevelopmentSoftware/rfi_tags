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
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                <form role="form" method="post" onsubmit="return confirm('Are you sure you want to Proceed ?');" action="<?= base_url()?>Vehicle_controller/total_count">
                                            
                                             <div class="form-group">
                                                <label>Date To *</label>
                                                <input type="date" name="date_to" class="form-control" value="<?php echo  set_value('date_to',$this->session->userdata('date_to'),FALSE);?>" required=""/>
                                                 
                                            </div>
                                            <button type="submit" class="btn btn-success" name="submit">Submit</button>
                                            <button type="reset" class="btn btn-info">Reset</button>
                                        </form>
                                        <br/>
                                    <table class="table table-striped table-bordered table-hover" id="total_count">
                                        <thead>
                                            <tr>
                                                <th>Serial No.</th>
                                                <th>Location Type</th> 
                                                <th>Location Wise</th>
                                                <th>Identified Vehicles(Qty)</th>
                                                <th>Unidentified Vehicles(Qty)</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php if(isset($report_page_data['plant_in_location_name'])){?>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Out</td>
                                                    <td><?= $report_page_data['plant_out_location_name'];?></td>
                                                    <td><?= $report_page_data['out_count'];?></td>
                                                    <td><?= $report_page_data['out_x'];?></td>
                                                </tr>    
                                                <tr>
                                                    <td>2</td>
                                                    <td>In</td>
                                                    <td><?= $report_page_data['plant_in_location_name'];?></td>
                                                    <td><?= $report_page_data['in_count'];?></td>
                                                    <td><?= $report_page_data['in_x'];?></td>
                                                </tr>
                                                  <?php }?>  
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
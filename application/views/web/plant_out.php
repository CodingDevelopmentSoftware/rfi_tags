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
                                <form role="form" method="post" onsubmit="return confirm('Are you sure you want to Proceed ?');" action="<?= base_url()?>Vehicle_controller/plant_out">
                                            

                                             <div class="form-group">
                                                <label>Date To *</label>
                                                <input type="date" name="date_to" class="form-control" value="<?php echo  set_value('date_to',$this->session->userdata('date_to'),FALSE);?>" required=""/>
                                                 
                                            </div>
                                            <button type="submit" class="btn btn-success" name="submit">Submit</button>
                                            <button type="reset" class="btn btn-info">Reset</button>
                                        </form>
                                        <br/>
                                    <table class="table table-striped table-bordered table-hover" id="plant_out">
                                        <thead>
                                            <tr>
                                                <th>Serial No.</th>
                                                <th>Transaction Date (A)</th>
                                                <th>Truck Number</th>
                                                <th>Location Name</th>
                                                <th>Location Type</th> 
                                                <th>Transaction Date (B) Plant Out</th> 
                                                <th>Time Difference (A-B)</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $c=0; foreach($report_page_data as $report_page_data){?>
                                                <tr>
                                                    <td><?= ++$c;?></td>
                                                    <td><?= date("d-m-Y H:i:s",strtotime($report_page_data->device_date_time));?></td>
                                                    <td><?= ucwords($report_page_data->vehicle_number);?></td>
                                                    <td><?= ucwords($report_page_data->location_name);?></td>
                                                    <td><?php if($report_page_data->location_type=='i'){echo "In";}else{echo "Out";}?></td>
                                                    <?php if(!empty($report_page_data->in_out_plant_time)){?>
                                                     <td><?= date("d-m-Y H:i:s",strtotime($report_page_data->in_out_plant_time));?></td>
                                                    <td><?= $report_page_data->diff; ?></td>    
                                                 <?php }else{ ?>
                                                    <td>In Transit</td>
                                                    <td>In Transit</td>
                                                  <?php }?>  
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
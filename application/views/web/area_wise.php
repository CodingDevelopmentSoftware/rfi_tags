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
                                <form role="form" method="post" onsubmit="return confirm('Are you sure you want to Proceed ?');" action="<?= base_url()?>Vehicle_controller/area_wise">
                                            <div class="form-group">
                                                <label>Select Area *</label>
                                                <select name="area_id" class="form-control" required="">
                                                    <option value="">Select Area</option>
                                                    <?php foreach($page_data as $page_data){?>
                                                           <option value="<?= $page_data->area_id?>" <?php echo set_select('area_id', $page_data->area_id, False); ?> ><?= ucwords($page_data->area_name);?> </option> 
                                                    <?php }?>    
                                                </select>
                                                <?php ?>
                                            </div>
                                             <div class="form-group">
                                                <label>Select Location Type *</label>
                                                <select name="location_type" class="form-control" required="">
                                                    <option value="">Select Location Type</option>
                                                    <option value="a" <?php echo set_select('location_type','a'); ?>>All</option>
                                                    <option value="i" <?php echo set_select('location_type','i'); ?>>In</option>
                                                    <option value="o" <?php echo set_select('location_type','o'); ?>>Out</option>

                                                </select>
                                                <?php ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Date To *</label>
                                                <input type="date" name="date_to" class="form-control" value="<?php echo  set_value('date_to',$this->session->userdata('date_to'),FALSE);?>" required=""/>
                                                 
                                            </div>
                                            <div class="form-group">
                                                <label>Date From *</label>
                                                <input type="date" name="date_from" class="form-control" value="<?php echo  set_value('date_from',$this->session->userdata('date_from'),FALSE);?>" required=""/>
                                            </div>

                                            <button type="submit" class="btn btn-success" name="submit">Submit</button>
                                            <button type="reset" class="btn btn-info">Reset</button>
                                        </form>
                                        <br/>
                                    <table class="table table-striped table-bordered table-hover" id="area_wise">
                                        <thead>
                                            <tr>
                                                <th>Serial No.</th>
                                                <th>Transaction Date</th>
                                                <th>Truck Number</th>
                                                <th>Truck Tag Number</th>
                                                <th>Device Id</th>	
                                                <th>Location Name</th>
                                                <th>Location Type</th>	
                                                <th>Area Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $c=0; foreach($report_page_data as $report_page_data){?>
                                                <tr>
                                                    <td><?= ++$c;?></td>
                                                    <td><?= date("d-m-Y H:i:s",strtotime($report_page_data->device_date_time));?></td>
                                                    <td><?= ucwords($report_page_data->vehicle_number);?></td>
                                                    <td><?= $report_page_data->vehicle_tag?></td>
													<td><?= $report_page_data->device_id_number?></td>
                                                   	<td><?= ucwords($report_page_data->location_name);?></td>
                                                    <td><?php if($report_page_data->location_type=='i'){echo "In";}else{echo "Out";}?></td>
                                                    <td><?= ucwords($report_page_data->area_name);?></td>
                                                    
                                                    
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
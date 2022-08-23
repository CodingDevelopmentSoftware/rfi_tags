<?php
include_once('header.php');
?>
<div id="page-wrapper">

     <div class="row">
        <?php include_once('message.php');?>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       <h4 class="margin-none">
                            <i class="fa fa-th fa-fw"></i> <?= strtoupper($title);?>
                         </h4>
                    </div>
                    <div class="panel-body">
		                <?php echo $map['js']; ?>
		                <?php echo $map['html']; ?>
               		 </div>
               		  <div class="clearfix"></div>
                                    <br/>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Serial No.</th>
                                                <th>Device No.</th>
                                                <th>latitude & longitude.</th>
                                                <th>Action</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php if($page_data->id){?>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Device t-ug-gt-md-040 (Current Location)</td>
                                                    <td><?= $page_data->lat_data;?> , <?= $page_data->long_data;?></td>
                                                      <td><a href="<?= base_url('Vehicle_controller/single_active_device_track/'); echo $position;?>" class="btn btn-success btn-sm">Full Track</a></td>
                                                </tr>
                                           <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                                
                            </div>
                            <!-- /.panel-body -->
            </div>
         </div>
     </div>
</div>
<?php 
include_once('footer.php');
?>


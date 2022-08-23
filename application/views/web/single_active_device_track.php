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
                                                <th>Position No.</th>
                                                <th>latitude & longitude</th>
                                                <th>Date & Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Statring Point (Red Mark)</td>
                                                    <td><?= $page_data[0]->lat_data.','.$page_data[0]->long_data;?></td>
                                                    <td><?= $page_data[0]->created_dt;?></td>	
                                                    
                                                   
                                                </tr>
                                                <?php $c=1;
                                                for($x=1;$x<count($page_data)-1;$x++)
                                                 {?>
                                                    <tr>
                                                    <td><?= ++$c?></td>
                                                    <td>Position <?= $c?> (Blue Mark)</td>
                                                    <td><?= $page_data[$x]->lat_data.','.$page_data[$x]->long_data;?></td>
                                                    <td><?= $page_data[$x]->created_dt;?></td>
                                                    </tr>
                                                 <?php }   


                                                ?>
                                                <tr>
                                                    <td><?= ++$c?></td>
                                                    <td>End Point (Green Mark)</td>
                                                    <td><?php
                                                        end($page_data);         
                                                        $key = key($page_data);
                                                        echo $page_data[$x]->lat_data.','.$page_data[$x]->long_data;    
                                                        ?></td>
                                                        <td><?= $page_data[$x]->created_dt;?></td>
                                                   
                                                </tr>
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


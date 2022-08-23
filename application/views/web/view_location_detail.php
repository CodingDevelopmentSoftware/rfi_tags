<?php 
include_once('header.php');
?>

            <div id="page-wrapper">
               
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                              
                                <h4 class="margin-none">
                                    <i class="fa fa-th fa-fw"></i> <?= strtoupper($title);?>
                                </h4>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tr><td>Area Name</td><td><b><?= ucwords($page_data->area_name);?></b></td></tr>
                                            <tr><td>Location Name</td><td><b><?= ucwords($page_data->location_name);?></b></td></tr>
                                             <tr><td>Location Type</td>
                                                <td>
                                                    <b>
                                                        <?php if($page_data->location_type=='i')
                                                            {
                                                                echo "In";
                                                            }
                                                           elseif($page_data->location_type=='o')
                                                           {
                                                            echo "Out";
                                                           }
                                                           else
                                                           {
                                                            echo "Not available";
                                                           }
                                                        ?>
                                                    </b>
                                                </td>
                                            </tr>
                                            <tr><td>Status</td>
                                                <td>
                                                    <b>
                                                        <?php if($page_data->status==1)
                                                            {
                                                                echo "Active";
                                                            }
                                                           elseif($page_data->status==0)
                                                           {
                                                            echo "Inactive";
                                                           }
                                                           else
                                                           {
                                                            echo "Not available";
                                                           }
                                                        ?>
                                                    </b>
                                                </td>
                                            </tr>
                                            <tr><td>Created Date </td><td><b><?= $page_data->created_dt;?></b></td></tr>
                                            <tr><td colspan="2"><button onclick="goBack()" class="btn btn-success btn-md" title="Go Back to Previous Page">Go Back</button></td></tr>
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
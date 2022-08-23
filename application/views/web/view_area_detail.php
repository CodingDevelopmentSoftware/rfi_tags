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
                                            <tr><td>Added By</td><td><b><?= ucfirst($page_data->created_by_full_name);?> <a target="_blank" href="<?= base_url("Vehicle_controller/view_user_account_detail/").base64_encode($page_data->created_by);?>" class="btn btn-info btn-sm" title="View Profile">View Profile</a></b></td></tr>
                                            <tr><td>Added Date</td><td><b><?= $page_data->created_dt;?></b></td></tr>
                                            <?php 
                                                if(!is_null($page_data->modified_by))
                                                {?>
                                                    <tr><td>Modified By</td><td><b><?= ucfirst($page_data->modified_by_full_name);?> <a target="_blank" href="<?= base_url("Vehicle_controller/view_user_account_detail/").base64_encode($page_data->modified_by);?>" class="btn btn-info btn-sm" title="View Profile">View Profile</a></b></td></tr>
                                                    <tr><td>Modified Date</td><td><b><?= $page_data->modified_dt;?></b></td></tr>
                                            <?php }?>
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
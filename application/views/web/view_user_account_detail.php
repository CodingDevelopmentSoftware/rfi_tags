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
                                        <tr><td>First Name</td><td><b><?= ucfirst($management_user->first_name);?></b></td></tr>
                                            <tr><td>Last Name</td><td><b><?= ucfirst($management_user->last_name);?></b></td></tr>
                                            <tr><td>Phone Number</td><td><b><?= $management_user->phone_no;?></b></td></tr>
                                            <tr><td>User log Id </td><td><b><?= ucfirst($management_user->email_id);?></b></td></tr>
                                            <tr><td>User Type</td>
                                                <td>
                                                    <b>
                                                        <?php if($management_user->user_type=='s')
                                                            {
                                                                echo "Superadmin";
                                                            }
                                                           elseif($management_user->user_type=='a')
                                                           {
                                                            echo "Admin";
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
                                                        <?php if($management_user->status==1)
                                                            {
                                                                echo "Active";
                                                            }
                                                           elseif($management_user->status==0)
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
                                            <tr><td>Created Date </td><td><b><?= date("d D/m/Y H:i:m",strtotime($management_user->created_dt));?></b></td></tr>
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
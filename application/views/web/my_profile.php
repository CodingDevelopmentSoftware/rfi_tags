<?php 
include_once('header.php');
?>
<div id="page-wrapper">
     <div class="row">
        <?php include_once('message.php');?>
            <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <h4 class="margin-none">
                                <i class="fa fa-th fa-fw"></i> <?= strtoupper($title);?>
                             </h4>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                               <div class="panel-body">
                                <p> <a href="<?= base_url('Vehicle_controller/update_profile')?>" class="btn btn-success">Edit Profile</a></td> <td><a href="<?= base_url('Vehicle_controller/change_password');?>" class="btn btn-info">Change Password</a></p>
                                 <div class="table-responsive">
                                   <table class="table table-hover">
                                   <tbody>
                                        <tr><td>First Name</td><td><b><?= ucfirst($page_data->first_name);?></b></td></tr>
                                        <tr><td>Last Name</td><td><b><?= ucfirst($page_data->last_name);?></b></td></tr>
                                        <tr><td>Email Id (User Log Id)</td><td><b><?= $page_data->code_email_id;?></b></td></tr>
                                        <tr><td>Mobile Number</td><td><b><?= $page_data->phone_no;?></b></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
     </div>
</div>
<?php 
include_once('footer.php');
?>

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
                                    <div class="col-lg-12">
                                        <form role="form" method="post" onsubmit="return abc();" action="<?= base_url('Vehicle_controller/reset_password');?>">
                                            <div class="form-group">
                                                <input type="hidden" name="user_id" value="<?= (int) base64_decode(stripcslashes(htmlspecialchars(trim($this->uri->segment(3)))));?>">
                                                <label>New Password *</label>
                                                <input type="password" name="new_password" class="form-control"  placeholder="Enter New Password *" required maxlength="50" id="new_password">
                                            </div>
                                            <div class="form-group">
                                                <label>Confrim Password *</label>
                                                <input type="password" class="form-control"  placeholder="Enter Confrim Password *" required maxlength="50" id="confirm_new_password">
                                            </div>
                                            <div class="form-group">
                                                <input type="checkbox" id="show_password"> Show Password
                                            </div>

                                            <button type="submit" class="btn btn-success" title="Change" name="change">Change</button>
                                            <a href="<?= base_url('Vehicle_controller/view_management_user');?>" class="btn btn-info" title="Cancle">Cancle</a>
                                        </form>
                                    </div>
                                   
                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
<script type="text/javascript">
  function abc()
  {

    var new_password=document.getElementById('new_password').value.trim();
    var confirm_new_password=document.getElementById('confirm_new_password').value.trim();

    if(new_password.length<=0)
     {
        alert("Please Enter New Password");
        document.getElementById('new_password').value="";
        document.getElementById('new_password').focus();
        return false;
     }
     else if(confirm_new_password.length<=0)
     {
        alert("Please Enter Conform Password");
        document.getElementById('confirm_new_password').value="";
        document.getElementById('confirm_new_password').focus();
        return false;
     } 
     else if(new_password!==confirm_new_password)
     {
        alert("Password Did not Match");
        return false;
     }   
     else if(new_password===confirm_new_password)
     {
        x=confirm("Are you sure you want to change password");
       if(x)
        {
            return true;
        }
        else
        {
            return false;
        } 
     }
}
 document.getElementById("show_password").addEventListener('change',function() {
    if(this.checked) 
    {
         document.getElementById('new_password').setAttribute("type","text");
         document.getElementById('confirm_new_password').setAttribute("type","text");    
    } else
    {
        document.getElementById('new_password').setAttribute("type","password");
        document.getElementById('confirm_new_password').setAttribute("type","password");     
    }
});
</script>             <!-- /#page-wrapper -->
<?php 
include_once('footer.php');
?>


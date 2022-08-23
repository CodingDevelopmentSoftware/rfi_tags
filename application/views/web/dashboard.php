<?php include_once('header.php');;?>
            <div id="page-wrapper">
               
                <!-- /.row -->
               <div class="row">
                        <div class="col-lg-12">
                           <div class="panel panel-primary">
                                <div class="panel-body">
                                    <h4 class="text-uppercase margin-none"><i class="fa fa-dashboard"></i> Dashboard</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="panel panel-default  box-white panel-status panel-success">
                                        <div class="panel-body padding-none">
                                            <!-- <a href="#"> -->
                                                <div class="row">
                                                    Total Vehicles
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-truck fa-5x panel-status-icon"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge">
                                                        <?php
                                                        
                                                        $in=($dashboard_data['get_live_count']['in'])?$dashboard_data['get_live_count']['in']:0;
                                                        $out=($dashboard_data['get_live_count']['out'])?$dashboard_data['get_live_count']['out']:0;

                                                        $total_count=$in+$out;  

                                                        ?>  

                                                        <span id="vehicle_count"><?= $total_count; ?></span></div>
                                                        <div class="text-uppercase text-xs"><span style="font-size:15px;">In : <span id="in_vehicle"><?= $in?></span>,</span><span style="color:red; font-size:15px;"> Out : <span id="out_vehicle"><?= $out?></span>  </span> </div>
                                                    </div>
                                                </div>
                                            <!-- </a> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="panel panel-default  box-white panel-status panel-warning">
                                        <div class="panel-body padding-none">
                                            <!-- <a href="#"> -->
                                                <div class="row">
                                                Total Devices
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-signal fa-5x panel-status-icon"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge"><?= $dashboard_data['get_device_status']['total_count'];?></div>
                                                        <div class="text-uppercase text-xs"><span style="font-size:15px;">Active : <span id="active_device"> <?= $dashboard_data['get_device_status']['active_count']?></span></span>,<span style="color:red; font-size:15px;"> Inactive : <span id="inactive_device"> <?= $dashboard_data['get_device_status']['inactive_count']?></span></span> </div>
                                                    </div>
                                                </div>
                                            <!-- </a> -->
                                        </div>
                                    </div>
                                </div>
                                <a href="<?= base_url('Vehicle_controller/connect_device')?>">
                                 <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="panel panel-default  box-white panel-status panel-info">
                                        <div class="panel-body padding-none">
                                            <!-- <a href="#"> -->
                                                <div class="row">
                                                Mapped Devices
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-check-circle fa-5x panel-status-icon"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge"><?= $dashboard_data['total_active_device_connected']?></div>
                                                        <div class="text-uppercase text-xs"><span style="font-size:15px;"> Free Devices : <?= $dashboard_data['total_active_device_free']?> </span></div>
                                                    </div>
                                                </div>
                                            <!-- </a> -->
                                        </div>
                                    </div>
                                </div>
                                </a>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="panel panel-default  box-white panel-status panel-warning
                                    ">
                                        <div class="panel-body padding-none">
                                            <!-- <a href="#"> -->
                                                <div class="row">
                                                Total Tags
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-truck fa-5x panel-status-icon"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge"><span id="live_tags_count"><?= $dashboard_data['total_tags']?></span></div>
                                                    </div>
                                                </div>
                                            <!-- </a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                <?php include_once('message.php');?>
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                              
                                <h4 class="margin-none">
                                    <i class="fa fa-th fa-fw"></i> Device Status
                                </h4>
                            </div>
                             <div class="panel-body">
                                <div class="table-responsive">
                                
                                    <table class="table table-striped table-bordered table-hover" id="data_status">
                                        <tr>
                                            <th>Serial No.</th>
                                            <th>Device Name (Device ID)</th>
                                            <th>Location Name </th>
                                            <th>Location type </th>
                                            <th>Area Name</th>
                                            <th>Status</th>
                                        </tr>
                                        <?php $c=0;
                                        $count=count($dashboard_data['get_device_status']['data']);
                                        for($i=0;$i<$count;$i++){?>
                                            
                                            <tr>
                                            <td><?= ++$c?></td>
                                            <td><?= $dashboard_data['get_device_status']['data'][$i]['device_name'];?> (<?= $dashboard_data['get_device_status']['data'][$i]['device_id_number'];?>)</td>
                                            <td><?= $dashboard_data['get_device_status']['data'][$i]['location_name'];?></td>
                                            <td><?= $dashboard_data['get_device_status']['data'][$i]['location_type'];?></td>
                                            <td><?= $dashboard_data['get_device_status']['data'][$i]['area_name'];?></td>
                                            <td><?= $dashboard_data['get_device_status']['data'][$i]['status'];?></td>
                                        </tr>
                                        <?php }?>
                                        
                                        
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                                
                            </div>
                            <div class="panel-heading">
                              
                                <h4 class="margin-none">
                                    <i class="fa fa-th fa-fw"></i> Vehicle IN/OUT Count
                                </h4>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                
                                    <table class="table table-striped table-bordered table-hover" id="live_count">
                                        
                                            <tr>
                                                <th>Serial No.</th>
                                                <th>Location Type</th>
                                                <th>Count</th>
                                                <th>Link</th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>In</td>
                                                <td><?php if($dashboard_data['get_live_count']['in']){echo $dashboard_data['get_live_count']['in'];}else{echo 0;}?></td>
                                                <td><a href="<?= base_url("Vehicle_controller/in_vehicle_transaction_report")?>" class="btn btn-success btn-sm"> Open </a></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Out</td>
                                                <td><?php if($dashboard_data['get_live_count']['out']){echo $dashboard_data['get_live_count']['out'];}else{echo 0;}?></td>
                                                <td><a href="<?= base_url("Vehicle_controller/out_vehicle_transaction_report")?>" class="btn btn-success btn-sm"> Open </a></td>
                                            </tr>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                                
                            </div>
                            <div class="panel-heading">
                              
                                <h4 class="margin-none">
                                    <i class="fa fa-th fa-fw"></i> IN Vehicle Transaction
                                </h4>
                            </div>

                            
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                
                                    <table class="table table-striped table-bordered table-hover" id="live_transaction_in">
                                        <tr>
                                                <th>Serial No.</th>
                                                <th>Transaction Date</th>
                                                <th>Vehicle Number</th>
                                                <th>Vehicle Tag Number</th>
                                                <th>Device ID</th>
                                                <th>Location</th>
                                            </tr>

                                             <?php $c=0;
                                             $count=count($dashboard_data['live_transaction_in']);
                                            for($i=0;$i<$count;$i++){?>
                                            
                                            <tr>
                                                <td><?= ++$c?></td>
                                                <td><?= date("d-m-Y H:i:s",strtotime($dashboard_data['live_transaction_in'][$i]->device_date_time));?></td>
                                                <td><?= $dashboard_data['live_transaction_in'][$i]->vehicle_number;?> </td>
                                                <td><?= $dashboard_data['live_transaction_in'][$i]->vehicle_tag;?></td>
                                                <td><?= $dashboard_data['live_transaction_in'][$i]->device_id_number;?></td>
                                                <td><?= ucwords($dashboard_data['live_transaction_in'][$i]->location_name);?></td>
                                            </tr>
                                        <?php }?>
                                        
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                                
                            </div>
                            <!-- /.panel-body -->
                        <div class="panel-heading">
                              
                                <h4 class="margin-none">
                                    <i class="fa fa-th fa-fw"></i> OUT Vehicle Transaction
                                </h4>
                            </div>

                            
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                
                                    <table class="table table-striped table-bordered table-hover" id="live_transaction_out">
                                         <tr>
                                                <th>Serial No.</th>
                                                <th>Transaction Date</th>
                                                <th>Vehicle Number</th>
                                                <th>Vehicle Tag Number</th>
                                                <th>Device ID</th>
                                                <th>Location</th>
                                            </tr>

                                             <?php 

                                             $c=0;
                                                $count=count($dashboard_data['live_transaction_out']);
                                                 for($i=0;$i<$count;$i++){?>
                                            
                                            <tr>
                                                <td><?= ++$c?></td>
                                                <td><?= date("d-m-Y H:i:s",strtotime($dashboard_data['live_transaction_out'][$i]->device_date_time));?></td>
                                                <td><?= $dashboard_data['live_transaction_out'][$i]->vehicle_number;?> </td>
                                                <td><?= $dashboard_data['live_transaction_out'][$i]->vehicle_tag;?></td>
                                                <td><?= $dashboard_data['live_transaction_out'][$i]->device_id_number;?></td>
                                                <td><?= ucwords($dashboard_data['live_transaction_out'][$i]->location_name);?></td>
                                            </tr>
                                        <?php }?>
                                        
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
<?php include_once('footer.php');?>
<script type="text/javascript">
    function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();
        hours = d.getHours();
        mintues = d.getMinutes();
        seconds = d.getSeconds();


    if (day.length < 2) 
        {day = '0' + day;}
    if (month.length < 2) 
        {month = '0' + month;}
    if (hours.length < 2) 
        {hours = '0' + hours;}
    if (mintues < 10) 
        {mintues = '0' + mintues;}
    if (seconds < 10) 
        {seconds = '0' + seconds;}
    return [day+"-"+month+"-"+year+" "+hours+":"+mintues+":"+seconds];
}
function ucWords(text) {
    return text.split(' ').map((txt) => (txt.substring(0, 1).toUpperCase() + txt.substring(1, txt.length))).join(' ');
}

    function sess_check()
            {
                $(document).ready(function(){

                        $.ajax({
                            type:'POST',
                            dataType:'json',
                            url:'get_device_status',
                            success:function(response){
                            // console.log(response.length);
                            // console.log(response);
                            document.getElementById("active_device").innerText=response.active_count;
                            document.getElementById("inactive_device").innerText=response.inactive_count;
                                if(response.length>0)
                                {
                                    var response_lenght=response.length
                                    row_count=document.getElementById("data_status").rows.length;
                                    if(row_count==1)    
                                    {
                                        add_program(response_lenght);
                                    }
                                    else
                                    {
                                        for (let i=row_count-1; i >= 1; i--)
                                         {
                                            document.getElementById("data_status").deleteRow(i);
                                         }
                                         add_program(response_lenght);
                                    } 

                                    function add_program()
                                    {
                                        for (i=0; i<response.length; i++)
                                          {
                                              var row=document.getElementById("data_status").insertRow(i+1);
                                              var cell0 = row.insertCell(0);
                                              var cell1 = row.insertCell(1);
                                              var cell2 = row.insertCell(2);
                                              var cell3 = row.insertCell(3);
                                              var cell4 = row.insertCell(4);
                                              var cell5 = row.insertCell(5);

                                              cell0.innerHTML = i+1
                                              cell1.innerHTML = response[i].device_name+" ("+response[i].device_id_number+")";
                                              cell2.innerHTML = response[i].location_name;
                                              cell3.innerHTML = response[i].location_type;
                                              cell4.innerHTML = response[i].area_name;
                                              cell5.innerHTML = response[i].status;

                                          }
                                    }
                                }
                            },
                            error:function(data){
                            
                        }
                    });
                });
            }

            function live_count()
            {
                $(document).ready(function(){

                        $.ajax({
                            type:'POST',
                            dataType:'json',
                            url:'dashboard_live_count',
                            success:function(response){
                                document.getElementById("live_count").rows[1].getElementsByTagName("td")[2].innerText=response.in;
                                document.getElementById("live_count").rows[2].getElementsByTagName("td")[2].innerText=response.out;  
                                document.getElementById("in_vehicle").innerText=response.in;
                                document.getElementById("out_vehicle").innerText=response.out;  

                                var x= Number(response.in) + Number(response.out);
                                document.getElementById("vehicle_count").innerText=x;  
                            },
                            error:function(data){
                            
                        }
                    });
                });
            }
            function live_transaction_in()
            {
                 $(document).ready(function(){

                        $.ajax({
                            type:'POST',
                            dataType:'json',
                            url:'dashboard_live_transaction_in',
                            success:function(response){
                            // console.log(response.length);
                            // console.log(response)
                                if(response.length>0)
                                {
                                    var response_lenght=response.length
                                    row_count=document.getElementById("live_transaction_in").rows.length;
                                    if(row_count==1)    
                                    {
                                        add_program(response_lenght);
                                    }
                                    else
                                    {
                                        for (let i=row_count-1; i >= 1; i--)
                                         {
                                            document.getElementById("live_transaction_in").deleteRow(i);
                                         }
                                         add_program(response_lenght);
                                    } 

                                    function add_program()
                                    {
                                        for (i=0; i<response.length; i++)
                                          {
                                              var row=document.getElementById("live_transaction_in").insertRow(i+1);
                                              var cell0 = row.insertCell(0);
                                              var cell1 = row.insertCell(1);
                                              var cell2 = row.insertCell(2);
                                              var cell3 = row.insertCell(3);
                                              var cell4 = row.insertCell(4);
                                              var cell5 = row.insertCell(5);
                                              
                                              cell0.innerHTML = i+1
                                              cell1.innerHTML = formatDate(response[i].device_date_time);
                                              cell2.innerHTML = response[i].vehicle_number;
                                              cell3.innerHTML = response[i].vehicle_tag
                                              cell4.innerHTML = response[i].device_id_number;
                                              cell5.innerHTML = ucWords(response[i].location_name);
                                        }
                                    }
                                }
                            },
                            error:function(data){
                            
                        }
                    });
                });
            }
            function live_transaction_out()
            {
                 $(document).ready(function(){

                        $.ajax({
                            type:'POST',
                            dataType:'json',
                            url:'dashboard_live_transaction_out',
                            success:function(response){
                            // console.log(response.length);
                            // console.log(response)
                                if(response.length>0)
                                {
                                    var response_lenght=response.length
                                    row_count=document.getElementById("live_transaction_out").rows.length;
                                    if(row_count==1)    
                                    {
                                        add_program(response_lenght);
                                    }
                                    else
                                    {
                                        for (let i=row_count-1; i >= 1; i--)
                                         {
                                            document.getElementById("live_transaction_out").deleteRow(i);
                                         }
                                         add_program(response_lenght);
                                    } 

                                    function add_program()
                                    {
                                        for (i=0; i<response.length; i++)
                                          {
                                              var row=document.getElementById("live_transaction_out").insertRow(i+1);
                                              var cell0 = row.insertCell(0);
                                              var cell1 = row.insertCell(1);
                                              var cell2 = row.insertCell(2);
                                              var cell3 = row.insertCell(3);
                                              var cell4 = row.insertCell(4);
                                              var cell5 = row.insertCell(5);
                                              
                                              cell0.innerHTML = i+1
                                              cell1.innerHTML = formatDate(response[i].device_date_time);
                                              cell2.innerHTML = response[i].vehicle_number;
                                              cell3.innerHTML = response[i].vehicle_tag
                                              cell4.innerHTML = response[i].device_id_number;
                                              cell5.innerHTML = ucWords(response[i].location_name);;
                                        }
                                    }
                                }
                            },
                            error:function(data){
                            
                        }
                    });
                });
            }
            function live_tags_count()
            {
                $(document).ready(function(){

                        $.ajax({
                            type:'POST',
                            dataType:'json',
                            url:'dashboard_get_live_tag',
                            success:function(response){
                                console.log(response);
                            document.getElementById("live_tags_count").innerText=response;
                            },
                            error:function(data){
                            
                        }
                    });
                });
            }
            
            setInterval(sess_check,4000);
            setInterval(live_count,4000);
            setInterval(live_transaction_in,4000);
            setInterval(live_transaction_out,4000);
            setInterval(live_tags_count,180000);
           
</script>
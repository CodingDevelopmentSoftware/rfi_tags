<!DOCTYPE html>
<html lang="en">
<head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Alex Grozav">

        <title><?= $title?> |  <?= $company?></title>
        
        <!-- Bootstrap Core CSS -->
        <link href="<?= base_url()?>public/css/bootstrap.css" rel="stylesheet">
       


        <!-- MetisMenu CSS -->
        <link href="<?= base_url()?>public/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="<?= base_url()?>public/css/plugins/timeline.css" rel="stylesheet">

           <!-- DataTables CSS -->
        <link href="<?= base_url()?>public/js/plugins/dataTables/theme_datatables/buttons.dataTables.min.css" rel="stylesheet">
        <link href="<?= base_url()?>public/js/plugins/dataTables/theme_datatables/jquery.dataTables.min.css" rel="stylesheet">


        <!-- Custom CSS -->
        <link href="<?= base_url()?>public/css/smartech.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="<?= base_url()?>public/css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?= base_url()?>public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- Animate CSS -->
        <link href="<?= base_url()?>public/css/animate.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="sidebar-toggle hidden-xs" href="javascript:void(0);"><i class="fa fa-bars fa-2x"></i></a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    
                    
                    <!-- /.dropdown -->
                    <li class="dropdown pull-right">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="<?= base_url('my_profile'); ?>"><i class="fa fa-user fa-fw"></i>My Profile</a>
                            </li>
                            <li><a href="<?= base_url()?>Vehicle_controller/change_password"><i class="fa fa-gear fa-fw"></i>Change Password</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="<?= base_url('Vehicle_controller/logout')?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                </ul>
                <!-- /.navbar-top-links -->
               <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-profile text-center">
                                <span class="sidebar-profile-picture">
                                    
                                    <img  height="75" style="margin-top: -15%; border-radius: 0px;" src="<?= base_url('public/img/profile.jpeg')?>" alt="Profile Picture"/>
                                </span>
                                <h4 class="sidebar-profile-name">WAVELINX TAG MANAGEMENT SYSTEM
                                </h4>
                            </li>                            
                            <li style="margin-top: -10%;">
                                <a href="<?= base_url('dashboard'); ?>">
                                    <span class="sidebar-item-icon fa-stack">
                                        <i class="fa fa-square fa-stack-2x text-primary"></i>
                                        <i class="fa fa-dashboard fa-stack-1x fa-inverse"></i>
                                    </span>
                                    <span class="sidebar-item-title">Dashboard</span>
                                </a>
                            </li>
                           <?php if($this->session->userdata('user_type')=='s'){?>
                             <li>
                                <a href="#">
                                    <span class="sidebar-item-icon fa-stack ">
                                        <i class="fa fa-square fa-stack-2x text-primary"></i>
                                        <i class="fa fa-bar-chart-o fa-stack-1x fa-inverse"></i>
                                    </span>
                                    <span class="sidebar-item-arrow fa arrow"></span>
                                    <span class="sidebar-item-title">User Management </span>
                                </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?= base_url('adduser')?>" title="Add Uesrs">Add User</a>
                                    </li>
                                </ul>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?= base_url()?>Vehicle_controller/view_management_user">View Users</a>
                                    </li>
                                </ul>
                            </li>
                           <?php }?>
                            <li>
                                <a href="#">
                                    <span class="sidebar-item-icon fa-stack ">
                                        <i class="fa fa-square fa-stack-2x text-primary"></i>
                                        <i class="fa fa-bar-chart-o fa-stack-1x fa-inverse"></i>
                                    </span>
                                    <span class="sidebar-item-arrow fa arrow"></span>
                                    <span class="sidebar-item-title">Area</span>
                                </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?= base_url()?>Vehicle_controller/add_area">Add Area</a>
                                    </li>
                                </ul>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?= base_url()?>Vehicle_controller/view_area">All Area</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sidebar-item-icon fa-stack ">
                                        <i class="fa fa-square fa-stack-2x text-primary"></i>
                                        <i class="fa fa-bar-chart-o fa-stack-1x fa-inverse"></i>
                                    </span>
                                    <span class="sidebar-item-arrow fa arrow"></span>
                                    <span class="sidebar-item-title">Location</span>
                                </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?= base_url()?>Vehicle_controller/add_location">Add Location</a>
                                    </li>
                                </ul>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?= base_url()?>Vehicle_controller/view_location">View Location</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sidebar-item-icon fa-stack ">
                                        <i class="fa fa-square fa-stack-2x text-primary"></i>
                                        <i class="fa fa-bar-chart-o fa-stack-1x fa-inverse"></i>
                                    </span>
                                    <span class="sidebar-item-arrow fa arrow"></span>
                                    <span class="sidebar-item-title">Vehicle</span>
                                </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?= base_url()?>Vehicle_controller/add_vehicle">Add Vehicle</a>
                                    </li>
                                </ul>
                                <!-- <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?= base_url()?>Vehicle_controller/#">Add Vehicle (With Excel)</a>
                                    </li>
                                </ul> -->
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?= base_url()?>Vehicle_controller/view_all_vehicle">All Vehicle</a>
                                    </li>
                                </ul>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?= base_url()?>Vehicle_controller/search_vehicle">Search Vehicle</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sidebar-item-icon fa-stack ">
                                        <i class="fa fa-square fa-stack-2x text-primary"></i>
                                        <i class="fa fa-bar-chart-o fa-stack-1x fa-inverse"></i>
                                    </span>
                                    <span class="sidebar-item-arrow fa arrow"></span>
                                    <span class="sidebar-item-title">Device</span>
                                </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?= base_url()?>Vehicle_controller/add_device">Add Device</a>
                                    </li>
                                </ul>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?= base_url()?>Vehicle_controller/view_device">All Device</a>
                                    </li>
                                </ul>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?= base_url()?>Vehicle_controller/connect_device">Mapping Device</a>
                                    </li>
                                </ul>
                            </li>
                            
                            <li>
                                <a href="#">
                                    <span class="sidebar-item-icon fa-stack ">
                                        <i class="fa fa-square fa-stack-2x text-primary"></i>
                                        <i class="fa fa-bar-chart-o fa-stack-1x fa-inverse"></i>
                                    </span>
                                    <span class="sidebar-item-arrow fa arrow"></span>
                                    <span class="sidebar-item-title">Reports</span>
                                </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                         <a href="<?= base_url()?>Vehicle_controller/area_wise">Area Wise</a>
                                    </li>
                                </ul>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?= base_url()?>Vehicle_controller/device_wise">Device Wise</a>
                                    </li>
                                </ul>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?= base_url()?>Vehicle_controller/location_wise">Location Wise</a>
                                    </li>
                                </ul>
                                <ul class="nav nav-second-level">
                                    <li>
                                         <a href="<?= base_url()?>Vehicle_controller/vehicle_wise">Vehicle Wise</a>
                                    </li>
                                </ul>
                                 <ul class="nav nav-second-level">
                                    <li>
                                         <a href="<?= base_url()?>Vehicle_controller/plant_in">Plant IN</a>
                                    </li>
                                </ul>
                                 <ul class="nav nav-second-level">
                                    <li>
                                         <a href="<?= base_url()?>Vehicle_controller/plant_out">Plant OUT</a>
                                    </li>
                                </ul>
                                <ul class="nav nav-second-level">
                                    <li>
                                         <a href="<?= base_url()?>Vehicle_controller/total_count">Summary Report</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                 </div>
            </nav>
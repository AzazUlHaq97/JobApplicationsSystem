<?php
session_start();


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>KMC - Human Resource Management Department</title>
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
 <link rel="stylesheet" href="dist/css/skins/skin-green.min.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

<!-- Title Logo -->
<link rel="shortcut icon" href="../Final/images/ford2.png" /> 


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>KMC</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>KMC</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="images/KMC.png" class="user-image" alt="User Image">
              <span class="hidden-xs">HRM<?php //echo $_SESSION['AdminName'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="images/KMC.png" class="img-circle" alt="User Image">

                <p>
                  <?php //echo $_SESSION['AdminName'] ?>Minhaj - Director Recruitment
                 
                </p>
              </li>
              <!-- Menu Body -->
             
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="center-block">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
        <img src="images/KMC.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>HRM<?php //echo $_SESSION['AdminName'] ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
       
         

         






 <li class="treeview">
          <a href="#">
            <i class="fa fa-paperclip"></i> <span>Applications</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
<li><a href="Add_Customer.php"><i class="fa fa-circle-o"></i>Add New Application</a></li>
<li><a href="UpdateDeleteApplications.php"><i class="fa fa-circle-o"></i>Update/Delete Application</a></li>
          </ul>
        </li>





        <li class="treeview">
          <a href="#">
            <i class="fa fa-bar-chart"></i> <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li>
              <a href="#"><i class="fa fa-circle-o"></i>Year Wise
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
<li><a href="Assemble_Wise_Sale.php"><i class="fa fa-circle-o"></i>Imported/Local Sale</a></li>
<li><a href="Brand_Wise_Sale.php"><i class="fa fa-circle-o"></i>Brand wise Sale</a></li>
<li><a href="Import_Duty_Yearly.php"><i class="fa fa-circle-o"></i>Import Duty Charges</a></li>
<li><a href="popular_imported_car.php"><i class="fa fa-circle-o"></i>Popular Brand(Imported Car)</a></li>
<li><a href="Brand_with_most_revenue.php"><i class="fa fa-circle-o"></i>Most Revenue (Brand)</a></li>
<li><a href="most_profit_by_used_car.php"><i class="fa fa-circle-o"></i>Most Profit (Used Car)</a></li>
<li><a href="total_profit_in_year.php"><i class="fa fa-circle-o"></i>Total Profit</a></li>
<li><a href="total_old_used_cars_sold.php"><i class="fa fa-circle-o"></i>Total Old & Used Cars Sold</a></li>
             </ul>
            </li>        
        </ul>        
        <ul class="treeview-menu">
           <li>
              <a href="#"><i class="fa fa-circle-o"></i>All Time
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="Most_Frequent_Customer.php"><i class="fa fa-circle-o"></i>Most Frequent Customer</a></li>
                <li><a href="car_purchase_history.php"><i class="fa fa-circle-o"></i>Car Purchase History</a></li>
		<li><a href="car_sale_history.php"><i class="fa fa-circle-o"></i>Car Sale History</a></li>
             </ul>
            </li>
        
        </ul>
        
        </li>
        
        
         
        </section>
    <!-- /.sidebar -->
  </aside>
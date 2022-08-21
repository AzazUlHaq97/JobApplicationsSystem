<?php
require ('CRUD.php');
$formdone="";



if(isset($_POST['dump']))
	{
		$conn = oci_connect('vsms_staging', 'vsms', '192.168.1.1/BAHRIA', 'AL32UTF8');
		if (!$conn) {
			$e = oci_error();
			trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
		}
$stid = oci_parse($conn, "BEGIN export_cars_sales_data; export_users_data; export_orders_data; export_payments_data; END;");
oci_execute($stid);
	if($stid)
{
	
	echo '<script type="text/javascript">
           alert("Data Dumped!")
      </script>';	
}
else
{
	echo '<script type="text/javascript">
           alert("Data cannot be dumped!")
      </script>';	
}			
	}
	
	
	if(isset($_POST['trunc1']))
	{
		       exec("sqlldr vsms_dwh/vsms control=C:\vsms_dir\loader_cars.ctl direct=true", $output, $return_var);

	foreach ($output as $line) {
    echo "$line";
}   
	}
	
	
	
	
	if(isset($_POST['trunc']))
	{
		
				$conn = oci_connect('vsms_staging', 'vsms', '192.168.1.1/BAHRIA', 'AL32UTF8');
		if (!$conn) {
			$e = oci_error();
			trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
		}
$stid = oci_parse($conn, "BEGIN trnct_table ('STAGING_USERS'); END;");
$stid1 = oci_parse($conn, "BEGIN trnct_table ('staging_orders'); END;");
$stid2 = oci_parse($conn, "BEGIN trnct_table ('STAGING_USERS'); END;");
$stid3 = oci_parse($conn, "BEGIN trnct_table ('stging_cars_for_sale'); END;");
oci_execute($stid);
oci_execute($stid1);
oci_execute($stid2);
oci_execute($stid3);

	
	if($stid)
{
	
	echo '<script type="text/javascript">
           alert("Tables truncated!")
      </script>';	
}
else
{
	echo '<script type="text/javascript">
           alert("Tables cannot be dumped!")
      </script>';	
}
		
	}
	
	if(isset($_POST['send']))
	{
			$conn = oci_connect('vsms_dwh', 'vsms', '192.168.1.1/BAHRIA', 'AL32UTF8');
		if (!$conn) {
			$e = oci_error();
			trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
		}
$stid = oci_parse($conn, "BEGIN export_dwh_payments; export_dwh_orders; export_dwh_users; export_dwh_cars; END;");
oci_execute($stid);
exec("sqlldr vsms_dwh/vsms control=C:\vsms_dir\l1.ctl direct=true", $output, $return_var);
exec("sqlldr vsms_dwh/vsms control=C:\vsms_dir\l2.ctl direct=true", $output, $return_var);
exec("sqlldr vsms_dwh/vsms control=C:\vsms_dir\l3.ctl direct=true", $output, $return_var);
exec("sqlldr vsms_dwh/vsms control=C:\vsms_dir\l4.ctl direct=true", $output, $return_var);
	
	if($stid)
{
	
	echo '<script type="text/javascript">
           alert("Data sent!")
      </script>';	
}
else
{
	echo '<script type="text/javascript">
           alert("Data cannot be sent!")
      </script>';	
}
	}



?>




    <?php include('ad-nav.php');?>
  
                       <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add New Order
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="VSMS_Home.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#"><i class="fa fa-dollar"></i> DWH</a></li>          
            
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
       
  

<div class="container">
	<div class="row">
		
        
        <div class="col-md-16">
       
        <div class="table-responsive">

                
            <section id="contact-page">
        <div class="container">
            <div class="center">        

            </div> 
            <br /><br /><br />
            <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none"></div>
                <div class="contact-form">
                    <div class="col-sm-8 col-sm-offset-1">
                        <form action="DWH.php" method="post" >
                        <center>
                        <div class="form-group">
                            <h3>Dump data into Data Warehouse:</h3>
                         
                        </div>
                        <div class="form-group">
                         <input type="submit" name="dump" id="dump" value="Dump" class="btn btn-primary btn-lg" /> 
                            
                        </div>
                         
    
                        <div class="form-group">
                           <h3>Truncate Staging Area:</h3>
                             
                        </div>
             

                        <div class="form-group">
                             <input type="submit" name="trunc" id="trunc" value="Truncate" class="btn btn-primary btn-lg" /> 
                            

                        </div>   
                        
                        <div class="form-group">
                            <h3>Send data to Data Marts:</h3>  
                            </div>
                       <div class="form-group">
                           <input type="submit" name="send" id="send" value="Send" class="btn btn-primary btn-lg" />                 </div> 
                        
                        </center>
                          

                
             
                    </div>
 
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#contact-page-->


            
        </div>
	</div>
</div>
     </div>
      </div>
    </section> 

  
   
    <!-- /.content -->
  </div>



  <?php include('ad-footer.php');?>
  
 
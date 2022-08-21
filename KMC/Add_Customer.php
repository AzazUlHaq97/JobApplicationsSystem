<?php
require ('CRUD.php');


$formdone="";


if(isset($_POST['addbtn']))
	{
		$name=$_POST['name'];
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$contactnumber=$_POST['contactnumber'];
$streetaddress=$_POST['streetaddress'];
$city=$_POST['city'];
		if(!empty($_POST['name']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['contactnumber']) && !empty($_POST['streetaddress']) && !empty($_POST['city']) )
{
	
$response=select("users",array('username'=> $username));
if(sizeof($response["data"]) > 0)
	{
		$formdone = "USERNAME EXISTS";
		
	}
	else
	{
		

		$conn = oci_connect('vsms_oltp', 'vsms', '192.168.1.1/BAHRIA', 'AL32UTF8');
		if (!$conn) {
			$e = oci_error();
			trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
		}
$stid = oci_parse($conn, "CALL insert_into_users('$streetaddress','$city','$username','$name','$email','$password','$contactnumber',1)");
//$stid = oci_parse($conn, "CALL insert_into_users(:streetaddress,:city,:username,:name,:email,:password,:contactnumber,1)");
//$stid = oci_parse($conn, "INSERT ALL INTO addresses(address_id, address,city)VALUES(addresses_sequence.NEXTVAL, :streetaddress ,:city) INTO users(user_id,username,full_name,email,password,contact,address_id,role_id) VALUES(users_sequence.NEXTVAL,:username, :name,:email,:password , :contactnumber,addresses_sequence.currval,1) SELECT * from dual");
/**oci_bind_by_name($stid, ":streetaddress", $streetaddress);
oci_bind_by_name($stid, ":city", $city);
oci_bind_by_name($stid, ":username", $username);
oci_bind_by_name($stid, ":name", $name);
oci_bind_by_name($stid, ":email", $email);
oci_bind_by_name($stid, ":password", $password);
oci_bind_by_name($stid, ":contactnumber", $contactnumber);**/
$formdone= "User Added.";
oci_execute($stid);

	

	}
}
else
{
	echo "please wait";
				/**echo '<script type="text/javascript">
           alert("Please Fill All The Fields !")
      </script>';**/
}

	
	}



?>




    <?php include('ad-nav.php');?>
  
                       <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Job Applications for BPS 01 to BPS 04
        <small>HUMAN RESOURCE MANAGEMENT DEPARTMENT, KMC</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="AdminPanelHome.aspx"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#"><i class="fa fa-user"></i> Applications</a></li>
          
               <li class="active">Add New Application</li>
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
                    <div class="col-sm-5 col-sm-offset-1">
   			<form id="form1" name="form1" method="post" action="Add_Customer.php" enctype="multipart/form-data">   

                      <div class="form-group">
                            <label>RECV NO:</label>
                           <input type="number" class="form-control">
                        </div>
                        
                         <div class="form-group">
                            <label>DATE:</label>
                           <input type="text" name="date" id="date" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>NAME:</label>
                           <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>FATHER NAME:</label>
                              <input type="text" name="fname" id="fname" class="form-control" required>
                        </div>
                        
                          
                        <div class="form-group">
                            <label>APPLIED FOR:</label>
                           <input type="text" name="applied" id="applied" class="form-control" required>
                        </div>     
                         <div class="form-group">
                            <label>BPS:</label>
                            <select name="BPS" id="BPS" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                           </select>
                          
                        </div>   
                         <div class="form-group">
                            <label>TECH / NON-TECH:</label>                           
                           <select name="tech" id="tech" class="form-control">
                            <option value="Non-technical">Non-technical</option>
                            <option value="Technical">Technical</option>
                           </select>
                        </div>      
                        <p></p><br>
                           <div class="form-group">
                         <input type="submit" name="addbtn" id="addbtn" value="ADD" class="btn btn-primary btn-lg" style="background-color:#063" /required> 
                   <input type="text" style="margin-left:420px; width: 400px; color:red;  background-color:rgba(0, 0, 0, 0);   
    border: none;
    outline:none;" value="<?php echo $formdone?>" readonly/></td>
                        </div>

                    </div>
                    <div class="col-sm-5">
<div class="form-group">
                            <label>Qualification:</label>
                              <input type="text" name="qualification" id="qualification" class="form-control"  required>
                        </div>
                       <div class="form-group">
                            <label>Tech-Qualification:</label>                           
                            <input type="text" name="contactnumber" id="contactnumber" class="form-control" required>
                            
                        </div>
                        <div class="form-group">
                            <label>CNIC:</label>                           
                               <input type="text" name="cnic" id="cnic" class="form-control"  required>
                        </div>
                         <div class="form-group">
                            <label>Date of Birth:</label>                            
                            <input type="text" name="dob" id="dob" class="form-control"  required>
                        </div>  
                         
                         
                          <div class="form-group">
                            <label>Domicile:</label>                            
                            <select name="city" id="city" class="form-control">                            	
	<option class="option" value="Karachi South">Karachi South</option>
<option class="option" value="Karachi East">Karachi East</option>
<option class="option" value="Karachi Central">Karachi Central</option>
<option class="option" value="Karachi West">Karachi West</option>
<option class="option" value="Korangi">Korangi</option>
<option class="option" value="Malir">Malir</option>
 </select>
                        </div>  
                        
                         <div class="form-group">
                            <label>PRC:</label>                            
                            <select name="city" id="city" class="form-control">                            	
	<option class="option" value="Karachi South">Karachi South</option>
<option class="option" value="Karachi East">Karachi East</option>
<option class="option" value="Karachi Central">Karachi Central</option>
<option class="option" value="Karachi West">Karachi West</option>
<option class="option" value="Korangi">Korangi</option>
<option class="option" value="Malir">Malir</option>
 </select>
                        </div>  
                        
                         <div class="form-group">
                            <label>Contact:</label>                            
                              <input type="text" name="contact" id="contact" class="form-control"  required>
                        </div>  
                        </form>
                        
                        
                                    

                        <br />
                           
                    </div>

                
             
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
  
 
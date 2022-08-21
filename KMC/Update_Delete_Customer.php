<?php
require ('CRUD.php');

if(isset($_POST['yesyes']))
	{
		$add_id3=$_POST['add_id2']; 
		$res1 = delete('addresses', array('ADDRESS_ID'=>$add_id3));
		if($res1)
		{
				echo '<script type="text/javascript">
           alert("RECORD DELETED !")
		   window.location = "Update_Delete_Customer.php";
      </script>';
	  
			}
		else{
			echo '<script type="text/javascript">
           alert("RECORD NOT DELETED ! THERE WAS SOME ERROR!")
		   window.location = "Update_Delete_Customer.php";
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
        Update/Delete Customer
        <small>Updating or Delete an existing Customer through this page.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="AdminPanelHome.aspx"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#"><i class="fa fa-user"></i> User</a></li>
          <li><a href="#"><i class="fa fa-user"></i> Customer</a></li>
               <li class="active">Update/Delete Customer</li>
      </ol>
    </section>

   <!-- Main content -->
    <section class="content">
      <div class="row">
       
  

<div class="container">
	<div class="row">
		
        
        <div class="col-md-12">
        <h4>All Customers record fetched from Database</h4>
        





 










 <table id="example" class="display nowrap" style="width:100%">
                   <thead>
                   
                   
                   <th>ID</th>
                    <th>Name</th>
                     <th>Username</th>
                     <th>Email</th>
                    <th>Password</th>
                     <th>ContactNumber</th>
                     <th>Address ID</th>
                    
               	  
                      <th><br>Edit</th>
                       <th>Delete</th>
                   </thead>
    <tbody>
    
    
			<?php
				$response=select("users",array('ROLE_ID' => 1));
foreach($response['data'] as $value)
{
	
	$idgot=$value['USER_ID'];
	$add_id = $value['ADDRESS_ID'];
					?>
					<tr>
			    <td><?php echo $value['USER_ID'] ?></td>
      <td><?php echo $value['FULL_NAME'] ?></td>
      <td><?php echo $value['USERNAME'] ?></td>
      <td><?php echo $value['EMAIL'] ?></td>
      <td><?php echo $value['PASSWORD'] ?></td>
      <td><?php echo $value['CONTACT'] ?></td>
      <td><?php echo $value['ADDRESS_ID'] ?></td>
     
						<td><a class="btn btn-primary btn-xs" href="UpdateCustomer.php?id=<?php echo $idgot; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
						        <form id="form1" name="form1" method="post" action="Update_Delete_Customer.php" enctype="multipart/form-data">   

                            <td>
                            <button type="submit" class="btn btn-danger btn-xs" id="yesyes" name="yesyes">
                            <span class="glyphicon glyphicon-trash"></span></button> 
                           
                           <input type ="hidden" value ="<?php echo $add_id;  ?>" name="add_id2" id"add_id2"/></td></form>
					</tr>
					<?php
				}
			?>
			</table>


            
        	</div>
</div>



    
    
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
       
      </div>
        <div class="modal-footer ">
        <input type="submit" class="btn btn-success" id="yesyes" name="yesyes" value="Yes"/>
        
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button></form>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
    <!-- /.content -->
  </div>

</section></div>

  <?php include('ad-footer.php');?>
  
 
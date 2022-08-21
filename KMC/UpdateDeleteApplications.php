<?php
require ('CRUD.php');

if(isset($_POST['yesyes']))
	{
		$add_id3=$_POST['add_id2']; 
		$res1 = delete('applications', array('RECV_NO'=>$add_id3));
		if($res1)
		{
				echo '<script type="text/javascript">
           alert("RECORD DELETED !")
		   window.location = "UpdateDeleteApplications.php";
      </script>';
	  
			}
		else{
			echo '<script type="text/javascript">
           alert("RECORD NOT DELETED ! THERE WAS SOME ERROR!")
		   window.location = "UpdateDeleteApplications.php";
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
        Update/Delete Application
        <small>Updating or Delete an existing Application through this page.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="AdminPanelHome.aspx"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#"><i class="fa fa-user"></i> Applications</a></li>         
               <li class="active">Update/Delete Application</li>
      </ol>
    </section>

   <!-- Main content -->
    <section class="content">
      <div class="row">
       
  

<div class="container">
	<div class="row">
		
        
        <div class="col-md-11">
        <h4>All Applications record fetched from Database</h4>
        





 

<div class="table-responsive">








<table id="example" class="display nowrap" style="width:100%">
                   <thead>
                   
                   
                   <th>RECV NO</th>
                    <th>DATE</th>
                     <th>NAME</th>
                     <th>FATHER NAME</th>
                    <th>APPLIED FOR</th>
                     <th>BPS</th>
                     <th>TECH OR NON</th>
                    <th>QUALIFICATION</th>
                    <th>TECH QUALIFICATION</th>
                    <th>CNIC</th>
                    <th>DOB</th>
                    <th>DOMICILE/PRC</th>
                    <th>CONTACT</th>
               	  
                      <th>Edit</th>
                       <th>Delete</th>
                   </thead>
    <tbody>
    
    
			<?php
				$response=select("applications",array());
foreach($response['data'] as $value)
{
	
	//$idgot=$value['USER_ID'];
	$add_id = $value['RECV_NO'];
					?>
					<tr>
			    <td><?php echo $value['RECV_NO'] ?></td>
      <td><?php echo $value['RECV_DATE'] ?></td>
      <td><?php echo $value['NAME'] ?></td>
      <td><?php echo $value['FATHER_NAME'] ?></td>
      <td><?php echo $value['APPLIED_FOR'] ?></td>
      <td><?php echo $value['BPS'] ?></td>
      <td><?php echo $value['TECH_OR_NON'] ?></td>
      <td><?php echo $value['QUALIFICATION'] ?></td>
      <td><?php echo $value['TECH_QUALIFICATION'] ?></td>
      <td><?php echo $value['CNIC'] ?></td>
      <td><?php echo $value['DOB'] ?></td>   
      <td><?php echo $value['PRC'] ?></td>
      <td><?php echo $value['CONTACT'] ?></td>
     
						<td><a class="btn btn-primary btn-xs" href="UpdateApplication.php?id=<?php echo $add_id; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
						        <form id="form1" name="form1" method="post" action="UpdateDeleteApplications.php" enctype="multipart/form-data">   

                            <td>
                            <button type="submit" class="btn btn-danger btn-xs" id="yesyes" name="yesyes">
                            <span class="glyphicon glyphicon-trash"></span></button> 
                           
                           <input type ="hidden" value ="<?php echo $add_id;  ?>" name="add_id2" id"add_id2"/></td></form>
					</tr>
					<?php
				}
			?></tbody>
			</table>


           
        	</div>
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
  
 
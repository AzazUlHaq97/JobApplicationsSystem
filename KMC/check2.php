<?php
//require ('CRUD.php');


?>


    <?php include('ad-nav.php');?>
  
                       <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Brand Wise Sale
        <small>sold in a year.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="AdminPanelHome.aspx"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#"><i class="fa fa-user"></i> User</a></li>
               <li class="active">Update/Delete User</li>
      </ol>
    </section>

   <!-- Main content -->
    <section class="content">
      <div class="row">
       
  

<div class="container">
	<div class="row">
		
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Enter Year to view brand wise sale in that year: </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="Assemble_Wise_Sale.php" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                
                  <input type="number" class="form-control" id="inputt" name="inputt" placeholder="Enter year here" >
                </div>
                 
                
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="submit" class="btn btn-primary" id="yesyes" name="yesyes" value="Generate">
              </div>
            </form>
          </div>
        <div class="col-md-12">
        <h4>Brand wise sale of each car in a year.</h4>
        





 










       
        <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
            </tr>
           
            <tr>
                <td>Donna Snider</td>
                <td>Customer Support</td>
                <td>New York</td>
                <td>27</td>
                <td>2011/01/25</td>
                <td>$112,000</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>
            
        
	</div>
</div>



   
  </div>
      <!-- /.modal-dialog --> 
    </div>
    <!-- /.content -->
  </div>

</section></div>

  <?php include('ad-footer.php');?>
  
 
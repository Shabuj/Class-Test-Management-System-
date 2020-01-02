<?php include 'inc/header.php'; 
      include 'function/function.php';
   ?>
<style type="text/css">
	.table-section{margin: 0 auto;}
	h3{font-family: impact; font-size: 40px; color: white;}
	table{color:white;}
</style>
<div class="container">
	<div class="row">
      <?php 
      $fun_object = new allFunction();
        $getData  = $fun_object->showTotalResult();  
        $getinsertData  = $fun_object->insertTotalResult();
      ?>
		<div class="table-section">     
		<div class="panel panle-default panel-danger">
			<div class="panel-heading">
				<h3 class="panel-title">Student's Result Information</h3>
			</div>		
				
            <div class="panel-body">
            		<table class="table table-striped">
            			             <tr>
                                 <th>ROLL</th>
                                 <th>NAME</th>
                                 <th>SEMESTER</th>
                                 <th>CT-ONE</th>
                                 <th>CT-TWO</th>
                                 <th>CT-THREE</th>
                                 <th>BEST-TWO</th> 
                                 <th>ATT-MARK</th>
                                 <th>TOTAL-MARK</th>               
                              </tr>
                      <?php 
                     if ( $getData) {
                       while( $result = $getData->fetch_assoc()){
                 
                     ?>
                              <tr>
                                 <td><a href="?search=<?php echo $result['roll']; ?>"></a><?php echo $result['roll'];?></td>
                                 <td><?php echo $result['name'];?></td>
                                 <td><?php echo $result['semester'];?></td>
                                 <td><?php echo $result['ct1'];?></td>
                                 <td><?php echo $result['ct2'];?></td>
                                 <td><?php echo $result['ct3'];?></td>
                                 <td><?php echo $result['best2'];?></td>
                                 <td><?php echo $result['att_mark'];?></td>
                                 <td><?php echo $result['total'];?></td>
                              </tr>
                      <?php  }  } ?>
                     
            		</table>
            </div>
			
	    	</div>
	   </div>
	</div>
</div>

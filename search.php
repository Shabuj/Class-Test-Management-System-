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
     
		<div class="table-section">     
		<div class="panel panle-default panel-danger">
			<div class="panel-heading">
				<h3 class="panel-title">Student's Result Information</h3>
			</div>		
				<?php
        if (!isset($_GET["search"]) || $_GET["search"] == NULL ){
             echo "<span style='color:green; font-size:30px;'>Data is empty</span>";
           }else{
             $id = $_GET["search"];
           }
        ?>
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
                     $query = "SELECT DISTINCT * FROM result WHERE roll LIKE '%$id%'";
                     $data = $db->select($query);
                     if ($data) {
                       while( $result = $data->fetch_assoc()){
                 
               ?>
                              <tr>
                                 <td><?php echo $result['roll'];?></td>
                                 <td><?php echo $result['name'];?></td>
                                 <td><?php echo $result['semester'];?></td>
                                 <td><?php echo $result['ct1'];?></td>
                                 <td><?php echo $result['ct2'];?></td>
                                 <td><?php echo $result['ct3'];?></td>
                                 <td><?php echo $result['best2'];?></td>
                                 <td><?php echo $result['att_mark'];?></td>
                                 <td><?php echo $result['total'];?></td>
                              </tr>
                     <?php }  }  else{ ?>
     
                    <p style="color: white; font-size: 30px;">Your Search Query Not Found </p>

                       <?php } ?>
                     
            		</table>
            </div>
			
	    	</div>
	   </div>
	</div>
</div>

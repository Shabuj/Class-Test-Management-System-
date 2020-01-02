<?php include 'inc/header.php';
      include 'function/function.php';
?>
<style type="text/css">
	.table-section{margin: 0 auto;}
	h3{font-family: impact; font-size: 40px; color: white;}
	table{color:white;}
	input[type="submit"]{width: 80px; margin-left:3px;}
       a{height: 33px;}
      .btn-warning{color: white; font-weight: 800;}
	td{font-family: impact; font-size: 25px;}
</style>
<div class="container">
	<div class="row">
   <?php 
      $fun_object = new allFunction();
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $getUpdateData  = $fun_object->updateCtMark($_POST);
          }
    ?>

    <?php 
     $CtMarkData  = $fun_object->getSelectCtMarkData();
    ?>
		<div class="table-section">
		<div class="panel panle-default panel-danger">
			<div class="panel-heading">
				<h3 class="panel-title">Update Student class Test Information</h3>
			</div>		
				
            <div class="panel-body">
            	<form action="" method="post">
                          <?php 
                              if($getUpdateData){
                                echo  $getUpdateData;
                              }
                         ?>
            	<table>   
                        <?php 
                             if($CtMarkData){
                              while($result = $CtMarkData->fetch_assoc()){
                        ?>

            			<tr>
            				<td>Roll</td>
            				<td><input type="text" name="roll" value="<?php echo $result['roll'];?>"></td>
            			</tr>
            			<tr>
            				<td>First Class Test</td>
            				<td><input type="text" name="ct1" value="<?php echo $result['ct1'];?>"></td>
            			</tr>
                              <tr>
                                    <td>Second Class Test</td>
                                    <td><input type="text" name="ct2" value="<?php echo $result['ct2'];?>"></td>
                              </tr>
                              <tr>
                                    <td>Third Class Test</td>
                                    <td><input type="text" name="ct3" value="<?php echo $result['ct3'];?>"></td>
                              </tr>
            			<tr>
            				<td></td>
            				<td><input type="submit" name="submit" value="Submit">
                                    <a href="ct_mark.php" class="btn btn-danger">Back</a></td>
            			</tr>		
                     <?php } } ?>
            		</table>
            	</form>
            </div>
			
		</div>
	   </div>
	</div>
</div>

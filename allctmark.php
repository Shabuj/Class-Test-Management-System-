<?php include 'inc/header.php'; 
      include 'function/function.php';
   ?>
<style type="text/css">
      .table-section{margin: 0 auto;}
      h3{font-family: impact; font-size: 40px; color: white;}
      table{color:white;}
</style>
<?php 
      $fun_object = new allFunction();
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $getData  = $fun_object->updateCtMark($_POST);
          }
?>
<div class="container">
      <div class="row">

 <?php 
     $getData  = $fun_object->selectAllCtMarkData();   
   ?>
            <div class="table-section">
            <div class="panel panle-default panel-danger">
                  <div class="panel-heading">
                        <h3 class="panel-title">Students Information</h3>
                  </div>            
                        
            <div class="panel-body">
       
                  <form accept="" method="post">
                        <table class="table table-striped">
                              <tr>
                                 <th width="20%">ROLL</th>
                                 <th width="20%">CT_ONE</th>
                                 <th width="20%">CT_TWO</th>
                                 <th width="20%">CT_THREE</th>
                                 <th width="20%">CHANGE</th>       
                              </tr>

                 <?php 
                     if($getData){
                        while($result = $getData->fetch_assoc()){
                       
                     ?>
                              <tr>
                   
                                 <td><?php echo $result['roll'];?></td>
                                 <td><?php echo $result['ct1'];?></td>
                                 <td><?php echo $result['ct2'];?></td>
                                 <td><?php echo $result['ct3'];?></td>
                                 <td><a href="update_ct_mark.php?updateId=<?php echo $result['roll'];?>" class="btn btn-danger" onclick="return confirm('Are you sure to change this data?');">Change</a></td>
                              </tr>
                             
                          <?php } } ?> 
                              <tr>
                                 <td><a href="ct_mark.php" class="btn btn-danger">Back</a></td>
                              </tr>
                        </table>   
                  </form>
            </div>
                  
            </div>
         </div>
      </div>
</div>

<?php
  $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../lib/Database.php');
 include_once ($filepath.'/../helper/helper.php');
  
 class allFunction
 { 
 	    private $db;
        private $validation;
 	
 	function __construct()
 	{
 		$this->db = new Database();
    $this->validation = new sql_injection();
 	}

 	public function insertStudentData($data){
 		$roll    = $this->validation->getValidate($data['roll']);
 		$name    = $this->validation->getValidate($data['name']);
 		$dept    = $this->validation->getValidate($data['dept']);
 		$session = $this->validation->getValidate($data['session']);

    $roll    = mysqli_real_escape_string($this->db->conn,$roll);
    $name    = mysqli_real_escape_string($this->db->conn,$name);
    $dept    = mysqli_real_escape_string($this->db->conn,$dept);
    $session = mysqli_real_escape_string($this->db->conn,$session);  
        
        if (empty($roll) || empty($name) || empty($dept) || empty($session)) {
          $text =  "<span style='color:red; font-size:30px;'>Please fill out this field first</span>";
          return $text;
        }else{
       $query = "INSERT INTO  student(roll,name,dept,session) 
                        VALUES('$roll','$name','$dept','$session')";
        $insert = $this->db->insert($query);
        $text =  "<span style='color:green; font-size:30px;'>Data Inserted Successfully done</span>";
          return $text;
        }
      
 	}
 
    public function selectstudentData(){
   	   $query = "SELECT * FROM student ORDER BY roll ASC LIMIT 5";
   	   $data = $this->db->select($query);
   	   return $data;
   }
    public function selectAllstudentData(){
       $query = "SELECT * FROM student ORDER BY roll ASC";
   	   $data = $this->db->select($query);
   	   return $data;
   }

   public function updateStudentDataSelection(){
   	error_reporting(0);
   	 if (!isset($_GET["updateId"]) || $_GET["updateId"] == NULL ){
          $text =  "<span style='color:green; font-size:30px;'>Data is empty</span>";
          return $text;
    }else{
         $id = $_GET["updateId"];
     }
   	 $query = "SELECT * FROM student WHERE roll = '$id'";
   	   $data = $this->db->select($query);
   	   return $data;
   }

   public function updateStudentData($data){
   	 if (!isset($_GET["updateId"]) || $_GET["updateId"] == NULL ){
         $text =  "<span style='color:green; font-size:30px;'>Data is empty</span>";
          return $text;
     }else{
         $id = $_GET["updateId"];
     }
   	    $roll    = $this->validation->getValidate($data['roll']);
 		$name    = $this->validation->getValidate($data['name']);
 		$dept    = $this->validation->getValidate($data['dept']);
 		$session = $this->validation->getValidate($data['session']);

 	    $roll    = mysqli_real_escape_string($this->db->conn,$roll);
        $name    = mysqli_real_escape_string($this->db->conn,$name);
        $dept    = mysqli_real_escape_string($this->db->conn,$dept);
        $session = mysqli_real_escape_string($this->db->conn,$session); 
      if (empty($roll) || empty($name) || empty($dept) || empty($session)) {
          $text =  "<span style='color:red; font-size:30px;'>Please fill out this field first</span>";
          return $text;
      }else{
       $query = "UPDATE student
                 SET 
                 roll = '$roll',
                 name = '$name',
                 dept = '$dept',
                 session = '$session'
                 WHERE roll = '$id'";
                      
        $insert = $this->db->update($query);
        $text =  "<span style='color:green; font-size:30px;'>Data Updated Successfully done</span>";
          return $text;
        }  
   }
   
   public function deleteStudentData(){
   	   if (!isset($_GET["deleteId"])){
         $text =  "<span style='color:green; font-size:30px;'></span>";
          return $text;
     }else{
         $id = $_GET["deleteId"];
         $query = "DELETE FROM student WHERE roll = '$id'";
         $data  = $this->db->delete($query);
         if ($data) {
     	 $text =  "<span style='color:green; font-size:30px;'>Data Deleted Successfully done</span>";
          return $text;
        }else{
     	$text =  "<span style='color:green; font-size:30px;'>Data Not Deleted</span>";
          return $text;
       }
     }  
   }
    public function insertCtMark($data){
        $roll   = $this->validation->getValidate($data['roll']);
 		$ct1    = $this->validation->getValidate($data['ct1']);
 		$ct2    = $this->validation->getValidate($data['ct2']);
 		$ct3    = $this->validation->getValidate($data['ct3']);

 	    $roll   = mysqli_real_escape_string($this->db->conn,$roll);
        $ct1    = mysqli_real_escape_string($this->db->conn,$ct1);
        $ct2    = mysqli_real_escape_string($this->db->conn,$ct2);
        $ct3    = mysqli_real_escape_string($this->db->conn,$ct3);  
        
        if (empty($roll) || empty($ct1) || empty($ct2) || empty($ct3)) {
          $text =  "<span style='color:red; font-size:30px;'>Please fill out this field first</span>";
          return $text;
        }else{
       $query = "INSERT INTO  city(roll,ct1,ct2,ct3) 
                        VALUES('$roll','$ct1','$ct2','$ct3')";
        $insert = $this->db->insert($query);
        $text =  "<span style='color:green; font-size:30px;'>Data Inserted Successfully done</span>";
          return $text;
        }
      
    }
  public function selectCtMarkData(){
       $query = "SELECT * FROM city ORDER BY roll ASC LIMIT 5";
       $data = $this->db->select($query);
       return $data;
  }
  public function selectAllCtMarkData(){
       $query = "SELECT * FROM city ORDER BY roll";
       $data = $this->db->select($query);
       return $data;
  }

    public function getSelectCtMarkData(){
        error_reporting(0);
     if (!isset($_GET["updateId"]) || $_GET["updateId"] == NULL ){
          $text =  "<span style='color:green; font-size:30px;'>Data is empty</span>";
          return $text;
    }else{
         $id = $_GET["updateId"];
         $query = "SELECT * FROM city WHERE roll = '$id'";
         $data = $this->db->select($query);
         return $data;
    }
  }
  
    public function updateCtMark($data){
     if (!isset($_GET["updateId"]) || $_GET["updateId"] == NULL ){
         $text =  "<span style='color:green; font-size:30px;'>Data is empty</span>";
          return $text;
     }else{
         $id = $_GET["updateId"];
     }
      $roll    = $this->validation->getValidate($data['roll']);
      $ct1     = $this->validation->getValidate($data['ct1']);
      $ct2     = $this->validation->getValidate($data['ct2']);
      $ct3     = $this->validation->getValidate($data['ct3']);

      $roll    = mysqli_real_escape_string($this->db->conn,$roll);
      $ct1     = mysqli_real_escape_string($this->db->conn,$ct1);
      $ct2     = mysqli_real_escape_string($this->db->conn,$ct2);
      $ct3     = mysqli_real_escape_string($this->db->conn,$ct3); 
      if (empty($roll) || empty($ct1) || empty($ct2) || empty($ct3)) {
          $text =  "<span style='color:red; font-size:30px;'>Please fill out this field first</span>";
          return $text;
      }else{
       $query = "UPDATE city
                 SET 
                 roll = '$roll',
                 ct1 = '$ct1',
                 ct2 = '$ct2',
                 ct3 = '$ct3'
                 WHERE roll = '$id'";
                      
        $insert = $this->db->update($query);
        $text =  "<span style='color:green; font-size:30px;'>Data Updated Successfully done</span>";
          return $text;
        }  
   }

    public function insertAttendanceMark($data){
        $roll   = $this->validation->getValidate($data['roll']);
        $semester    = $this->validation->getValidate($data['semester']);
        $mark    = $this->validation->getValidate($data['mark']);

        $roll   = mysqli_real_escape_string($this->db->conn,$roll);
        $semester    = mysqli_real_escape_string($this->db->conn,$semester);
        $mark    = mysqli_real_escape_string($this->db->conn,$mark);
        
        if (empty($roll) || empty($semester) || empty($mark)) {
          $text =  "<span style='color:red; font-size:30px;'>Please fill out this field first</span>";
          return $text;
        }else{
       $query = "INSERT INTO  attendance(roll,semester,mark) 
                        VALUES('$roll','$semester','$mark')";
        $insert = $this->db->insert($query);
        $text =  "<span style='color:green; font-size:30px;'>Data Inserted Successfully done</span>";
          return $text;
        }
    }

     public function insertTotalResult(){
        $query = "INSERT INTO result (roll,name,ct1,ct2,ct3,best2,att_mark,semester,total)
                  SELECT s.roll, s.name, c.ct1,c.ct2,c.ct3,(c.ct1+c.ct2+c.ct3)-LEAST(c.ct1,c.ct2,c.ct3),a.mark,a.semester,(c.ct1+c.ct2+c.ct3)-LEAST(c.ct1,c.ct2,c.ct3)+(a.mark) 
                  FROM student s
                  INNER JOIN city c 
                  ON s.roll = c.roll 
                  INNER JOIN attendance a 
                  ON a.roll = s.roll";
        $data = $this->db->insert($query);
     }
   
      public function showTotalResult(){
        $query = "SELECT DISTINCT * FROM result";
        $data = $this->db->select($query);
        return $data;
     }

      public function searchQuery(){
      if (!isset($_GET["search"]) || $_GET["search"] == NULL ){
         $text =  "<span style='color:green; font-size:30px;'>Data is empty</span>";
          return $text;
      }else{
         $id = $_GET["search"];
         $query = "SELECT DISTINCT * FROM result WHERE roll LIKE '%$id%'";
         $data = $this->db->select($query);
         return $data;
     }
    }









 }
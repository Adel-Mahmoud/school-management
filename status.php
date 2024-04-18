<?php
session_start();
 
   include  "layout/header.php";
?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Status Page</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" style="margin-right:5px">
    <input type="search" class="form-control mr-sm-2 " id="myInput"  placeholder="Search for names..">
     <select style="margin-right:5px;" id="slec" class="btn btn-info">
       <option value="0">ID</option>
       <option value="1">Name</option>
     </select>
      <button class="btn btn-outline-success my-2 my-sm-0" onclick="myFunction()" type="button">Search</button>
    </form>
    </div>
</nav>
<?php
$stat = isset($_GET['stat'])? $_GET['stat']:"Error";
if($stat == "approve"){ 
?>
<h1 class="text-center text-dark">الطلبة الذين تم قبولهم</h1>
<div class="">
  <div class="container" style="overflow-x: scroll;">
  <table class="table-search" id="myTable" style="width:180%;"> 
       <tr class="bg-dark text-light">
       <th> ID </th><th>Student's Name</th><th>Grade</th><th> Gander </th><th>Date of birth</th><th>Age of 1oc</th>
         <th>Religion</th><th>Address</th><th>Father's Mob</th><th>Mather's Mob</th><th>Second Languege</th>
         <th>Previous school</th><th>Fathers Name</th><th>Present ID</th><th>Occupation</th><th>Mathers Name</th>
         <th>Present ID</th><th>Occupation</th><th>Status</th><th>Department</th><th>Code</th><th>Control</th>
       </tr>
       <?php
       $stmet = $conn->prepare("SELECT * FROM students WHERE st = ?");	
       $stmet->execute(array(1));
       $rows = $stmet->fetchAll();
       foreach($rows as $row){
       echo '<tr>
        <td> '.$row['id'].' </td><td> '.$row['std_name_en'].' </td><td> '.$row['grade'].'  </td><td> '.$row['gander'].'  </td><td>  '.$row['date_b'].' </td><td> '.$row['age'].' </td><td>  '.$row['rlg'].' </td> 
         <td>  '.$row['adrs'].' </td><td> '.$row['fath_num'].'  </td><td> '.$row['math_num'].'  </td><td> '.$row['scd_lang'].'  </td><td> '.$row['p_school'].'  </td>
         <td> '.$row['fath_name'].'  </td><td> '.$row['fath_p_id'].'  </td><td>  '.$row['fath_jop'].' </td><td> '.$row['math_name'].'  </td><td> '.$row['math_p_id'].'  </td>
         <td> '.$row['math_jop'].'  </td><td> '.$row['statu'].'  </td><td> '.$row['dep'].'  </td><td> '.$row['the_code'].'  </td><td>
         <a href="?stat=ref&id='.$row["id"].'" class="btn btn-outline-danger  btn-sm">Reject</a>
         <a href="?stat=delete_app&id='.$row["id"].'" class="btn btn-danger btn-sm">Delete</a></td>
       </tr>';
       }
       ?>
     </table>
  </div>
</div>
<?php
     
}elseif($stat == "refusal"){
    ?>
    <h1 class="text-center text-dark"> الطلبة الذين تم رفضهم</h1>
    <div class="">
      <div class="container" style="overflow-x: scroll;">
      <table class="table-search" id="myTable" style="width:180%;"> 
           <tr class="bg-dark text-light">
           <th> ID </th><th>Student's Name</th><th>Grade</th><th> Gander </th><th>Date of birth</th><th>Age of 1oc</th>
             <th>Religion</th><th>Address</th><th>Father's Mob</th><th>Mather's Mob</th><th>Second Languege</th>
             <th>Previous school</th><th>Fathers Name</th><th>Present ID</th><th>Occupation</th><th>Mathers Name</th>
             <th>Present ID</th><th>Occupation</th><th>Status</th><th>Department</th><th>Code</th><th>Control</th>
           </tr>
           <?php
           $stmet = $conn->prepare("SELECT * FROM students WHERE st = ?");	
           $stmet->execute(array(2));
           $rows = $stmet->fetchAll();
           foreach($rows as $row){
           echo '<tr>
            <td> '.$row['id'].' </td><td> '.$row['std_name_en'].' </td><td> '.$row['grade'].'  </td><td> '.$row['gander'].'  </td><td>  '.$row['date_b'].' </td><td> '.$row['age'].' </td><td>  '.$row['rlg'].' </td> 
             <td>  '.$row['adrs'].' </td><td> '.$row['fath_num'].'  </td><td> '.$row['math_num'].'  </td><td> '.$row['scd_lang'].'  </td><td> '.$row['p_school'].'  </td>
             <td> '.$row['fath_name'].'  </td><td> '.$row['fath_p_id'].'  </td><td>  '.$row['fath_jop'].' </td><td> '.$row['math_name'].'  </td><td> '.$row['math_p_id'].'  </td>
             <td> '.$row['math_jop'].'  </td><td> '.$row['statu'].'  </td><td> '.$row['dep'].'  </td><td> '.$row['the_code'].'  </td><td>
             <a href="?stat=res&id='.$row["id"].'" class="btn btn-success  btn-sm">Approve</a>
             <a href="?stat=delete_res&id='.$row["id"].'" class="btn btn-danger btn-sm">Delete</a></td>
           </tr>';
           }
           ?>
         </table>
      </div>
    </div>
    
       <?php

    }elseif($stat == "res"){ 
     $id = isset($_GET["id"]) && is_numeric ($_GET["id"]) ? intval($_GET["id"]) :0;
     $stmt = $conn->prepare("UPDATE students SET st = 1 WHERE id = ?");     
     $stmt->execute(array($id));
     ?>
     <script>
     window.location="status.php?stat=refusal";
     </script>
     <?php
 }elseif($stat == "ref"){
  $id = isset($_GET["id"]) && is_numeric ($_GET["id"]) ? intval($_GET["id"]) :0;
  $stmt = $conn->prepare("UPDATE students SET st = 2 WHERE id = ?");     
  $stmt->execute(array($id));
  ?>
  <script>
  window.location="status.php?stat=approve";
  </script>
  <?php
}elseif($stat == "delete_res"){
   $id = isset($_GET["id"]) && is_numeric ($_GET["id"]) ? intval($_GET["id"]) :0;
   $stmt = $conn->prepare('DELETE FROM students WHERE id = :a_id ');
  $stmt->bindParam("a_id",$id);
  $stmt->execute();
   ?>
   <script>
   window.location="status.php?stat=refusal";
   </script>
    <?php
 }elseif($stat == "delete_app"){
    $id = isset($_GET["id"]) && is_numeric ($_GET["id"]) ? intval($_GET["id"]) :0;
    $stmt = $conn->prepare('DELETE FROM students WHERE id = :a_id ');
   $stmt->bindParam("a_id",$id);
   $stmt->execute();
    ?>
    <script>
    window.location="status.php?stat=approve";
    </script>
     <?php
       }
        include  "layout/footer.php";?>
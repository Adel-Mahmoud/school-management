<?php
session_start();
 if(isset($_SESSION["d"])){
  
   }else{
    header('location:index.php?log=login');
   }
   if(isset($_POST['out'])){
    session_start();
    session_unset();
    header('location:index.php?log=login');
   }
   include  "layout/header.php";
?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><?php  echo $_SESSION["d"];?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ">
      <li class="nav-item active">
      <a class="nav-link" href="hanan.php?stat=home">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Pages
        </a>
        <div class="dropdown-menu the-ul" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="hanan.php?stat=approve">Approved</a>
          <hr>
          <a class="dropdown-item" href="hanan.php?stat=reject">Rejected</a>
          <hr>
          <a class="dropdown-item" href="hanan.php?stat=paid">Paid</a>
          <hr>
          <a class="dropdown-item" href="hanan.php?stat=unpaid">Unpaid</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" style="margin-right:5px">
    <input type="search" class="form-control mr-sm-2 " id="myInput"  placeholder="Search for names..">
     <select style="margin-right:5px;" id="slec" class="btn btn-info">
       <option value="0">Code</Code></option>
       <option value="1">Name</option>
     </select>
      <button class="btn btn-outline-success my-2 my-sm-0" onclick="myFunction()" type="button">Search</button>
    </form>
    <form class="form-inline my-2 my-lg-0" method="post">
    <a class="btn btn-outline-danger my-2 my-sm-0"   href='logout.php'>Logout</a>
    </form>
  </div>
</nav>
<hr>
 <?php echo "<h1>".the_cou("adrs")."<h1>";?>
<hr>
<?php
$stat = isset($_GET['stat'])? $_GET['stat']:"Error";
if($stat == "home"){ ?>
<h1>Dr. Hanan Page</h1>
<h1 class="text-center text-dark">Student's Data (National)</h1>
<br><br>
<div class="">
  <div class="container tabel_res">
  <table class="table-search" id="myTable" style="width:200%;"> 
       <tr class="bg-dark text-light">
       <th> Code </th><th>Student's Name</th><th>Grade</th><th> Gander </th><th>Date of birth</th><th>Age on 1st of next October</th>
         <th>Religion</th><th>Address</th><th>Father's Mob</th><th>Mather's Mob</th><th>Second Languege</th>
         <th>Previous school</th><th>Fathers Name</th><th>Present ID</th><th>Occupation</th><th>Mathers Name</th>
         <th>Present ID</th><th>Occupation</th><th>Status</th><th>Control</th>
       </tr>
       <?php
       $stmet = $conn->prepare("SELECT * FROM students WHERE approv = 0 AND dep = ?");	
       $stmet->execute(array("National"));
       $rows = $stmet->fetchAll();      
       $count = $stmet->rowCount();
       if($count>0){
        foreach($rows as $row){
       echo '<tr>
        <td> '.$row['id'].' </td><td> '.$row['std_name_en'].' </td><td> '.$row['grade'].'  </td><td> '.$row['gander'].'  </td><td>  '.$row['date_b'].' </td><td> '.$row['age'].' </td><td>  '.$row['rlg'].' </td> 
         <td>  '.$row['adrs'].' </td><td> '.$row['fath_num'].'  </td><td> '.$row['math_num'].'  </td><td> '.$row['scd_lang'].'  </td><td> '.$row['p_school'].'  </td>
         <td> '.$row['fath_name'].'  </td><td> '.$row['fath_p_id'].'  </td><td>  '.$row['fath_jop'].' </td><td> '.$row['math_name'].'  </td><td> '.$row['math_p_id'].'  </td>
         <td> '.$row['math_jop'].'  </td><td> '.$row['statu'].'  </td><td>
         <a href="?stat=appro&id='.$row["id"].'" class="btn btn-success  btn-sm">Approve</a>
         <a href="?stat=rejec&id='.$row["id"].'" class="btn btn-outline-danger btn-sm">Reject</a>
         <a href="edit.php?id='.$row["id"].'" class="btn btn-outline-info btn-sm">Edit</a></td>
       </tr>';
       }
        }else {
        echo '<div id="dang" class="alert alert-danger text-center dang" style="z-index:7; top:45%;width:50%;position:fixed;left:20%;"><h4>The Table Is Empty</h4></div>';
      }
       ?>
     </table>
  </div>
</div>
<?php
}elseif($stat == "appro"){ 
  $id = isset($_GET["id"]) && is_numeric ($_GET["id"]) ? intval($_GET["id"]) :0;
    $stmt = $conn->prepare("UPDATE students SET	approv = 1 WHERE id = ?");     
    $stmt->execute(array($id));
    ?>
    <script>
    window.location="hanan.php?stat=home";
    </script>
    <?php
}elseif($stat == "rejec"){
  $id = isset($_GET["id"]) && is_numeric ($_GET["id"]) ? intval($_GET["id"]) :0;
  $stmt = $conn->prepare("UPDATE students SET approv = 2 WHERE id = ?");     
  $stmt->execute(array($id));
  ?>
  <script>
  window.location="hanan.php?stat=home";
  </script>
  <?php
}elseif($stat == "approve"){ 
  ?>
  <br><br>
  <h1 class="text-center text-dark">الطلبة الذين تم قبولهم</h1>
  <br><br>
  <div class="">
    <div class="container  tabel_res">
    <table class="table-search" id="myTable" style="width:200%;"> 
         <tr class="bg-dark text-light">
         <th> Code </th><th>Student's Name</th><th>Grade</th><th> Gander </th><th>Date of birth</th><th>Age on 1st of next October</th>
           <th>Religion</th><th>Address</th><th>Father's Mob</th><th>Mather's Mob</th><th>Second Languege</th>
           <th>Previous school</th><th>Fathers Name</th><th>Present ID</th><th>Occupation</th><th>Mathers Name</th>
           <th>Present ID</th><th>Occupation</th><th>Status</th><th>Department</th><th>Control</th>
         </tr>
         <?php
        $stmet = $conn->prepare("SELECT * FROM students WHERE approv = 1 AND dep = ?");	
        $stmet->execute(array("National"));
         $rows = $stmet->fetchAll();
         $count = $stmet->rowCount();
         if($count>0){
          foreach($rows as $row){
         echo '<tr>
          <td> '.$row['id'].' </td><td> '.$row['std_name_en'].' </td><td> '.$row['grade'].'  </td><td> '.$row['gander'].'  </td><td>  '.$row['date_b'].' </td><td> '.$row['age'].' </td><td>  '.$row['rlg'].' </td> 
           <td>  '.$row['adrs'].' </td><td> '.$row['fath_num'].'  </td><td> '.$row['math_num'].'  </td><td> '.$row['scd_lang'].'  </td><td> '.$row['p_school'].'  </td>
           <td> '.$row['fath_name'].'  </td><td> '.$row['fath_p_id'].'  </td><td>  '.$row['fath_jop'].' </td><td> '.$row['math_name'].'  </td><td> '.$row['math_p_id'].'  </td>
           <td> '.$row['math_jop'].'  </td><td> '.$row['statu'].'  </td><td> '.$row['dep'].'  </td><td>
           <a href="?stat=rej&id='.$row["id"].'" class="btn btn-outline-danger  btn-sm">Reject</a>
         </tr>';
         }   
       }else {
        echo '<div id="dang" class="alert alert-danger text-center dang" style="z-index:7; top:45%;width:50%;position:fixed;left:20%;"><h4>The Table Is Empty</h4></div>';
      }
       ?>
       </table>
    </div>
  </div>
  <?php
       
  }elseif($stat == "reject"){
      ?><br><br>
      <h1 class="text-center text-dark"> الطلبة الذين تم رفضهم</h1>
      <br><br>
      <div class="">
        <div class="container tabel_res">
        <table class="table-search" id="myTable" style="width:200%;"> 
             <tr class="bg-dark text-light">
             <th> Code </th><th>Student's Name</th><th>Grade</th><th> Gander </th><th>Date of birth</th><th>Age on 1st of next October</th>
               <th>Religion</th><th>Address</th><th>Father's Mob</th><th>Mather's Mob</th><th>Second Languege</th>
               <th>Previous school</th><th>Fathers Name</th><th>Present ID</th><th>Occupation</th><th>Mathers Name</th>
               <th>Present ID</th><th>Occupation</th><th>Status</th><th>Department</th><th>Control</th>
             </tr>
             <?php
             $stmet = $conn->prepare("SELECT * FROM students WHERE approv = ? AND dep = ?");	
             $stmet->execute(array(2,"National"));
             $rows = $stmet->fetchAll();
             $count = $stmet->rowCount();
              if($count>0){
             foreach($rows as $row){
             echo '<tr>
              <td> '.$row['id'].' </td><td> '.$row['std_name_en'].' </td><td> '.$row['grade'].'  </td><td> '.$row['gander'].'  </td><td>  '.$row['date_b'].' </td><td> '.$row['age'].' </td><td>  '.$row['rlg'].' </td> 
               <td>  '.$row['adrs'].' </td><td> '.$row['fath_num'].'  </td><td> '.$row['math_num'].'  </td><td> '.$row['scd_lang'].'  </td><td> '.$row['p_school'].'  </td>
               <td> '.$row['fath_name'].'  </td><td> '.$row['fath_p_id'].'  </td><td>  '.$row['fath_jop'].' </td><td> '.$row['math_name'].'  </td><td> '.$row['math_p_id'].'  </td>
               <td> '.$row['math_jop'].'  </td><td> '.$row['statu'].'  </td><td> '.$row['dep'].'  </td><td>
               <a href="?stat=res&id='.$row["id"].'" class="btn btn-success  btn-sm">Approve</a>
               <a href="?stat=delete_res&id='.$row["id"].'" class="btn btn-danger btn-sm">Delete</a></td>
             </tr>';
             }   
       }else {
        echo '<div id="dang" class="alert alert-danger text-center dang" style="z-index:7; top:45%;width:50%;position:fixed;left:20%;"><h4>The Table Is Empty</h4></div>';
      }
       ?>
      </table>
        </div>
      </div>
      
         <?php
  
      }elseif($stat == "res"){        
       my_update(1);
       ?>
       <script>
       window.location="?stat=reject";
       </script>
       <?php
   }elseif($stat == "rej"){
       my_update(2);
     
    ?>
    <script>
    window.location="?stat=approve";
    </script>
    <?php
  }elseif($stat == "delete_res"){
     my_delete();
     ?>
     <script>
     window.location="?stat=reject";
     </script>
      <?php
   }elseif($stat == "delete_pd"){
      my_delete();
    ?>
    <script>
    window.location="?stat=paid";
    </script>
     <?php
  }elseif($stat == "delete_upd"){
     my_delete();
    ?>
    <script>
    window.location="?stat=unpaid";
    </script>
     <?php
  }elseif($stat == "paid"){
    ?>
    <br><br>
    <h1 class="text-center text-dark">Paid Page</h1>
    <br><br>
    <div class="">
      <div class="container tabel_res">
      <table class="table-search" id="myTable" style="width:100%;"> 
           <tr class="bg-dark text-light">
           <th> Code </th><th>Student's Name</th><th>Grade</th><th>Date</th><th>Control</th>
           </tr>
           <?php
           $stmet = $conn->prepare("SELECT * FROM students WHERE approv = ? AND dep = ?");	
           $stmet->execute(array(3,"National"));
           $rows = $stmet->fetchAll();
           $count = $stmet->rowCount();
           if($count>0){
           foreach($rows as $row){
           echo '<tr>
            <td> '.$row['id'].' </td><td> '.$row['std_name_en'].' </td><td> '.$row['grade'].'  </td><td> '.$row['Date'].'  </td><td>
             <a href="?stat=delete_pd&id='.$row["id"].'" class="btn btn-danger btn-sm">Delete</a></td>
           </tr>';
          }   
     }else {
      echo '<div id="dang" class="alert alert-danger text-center dang" style="z-index:7; top:45%;width:50%;position:fixed;left:20%;"><h4>The Table Is Empty</h4></div>';
    }
       ?>
         </table>
      </div>
    </div>
    
       <?php
   }elseif($stat == "unpaid"){
    ?>
    <br><br>
    <h1 class="text-center text-dark">Unpaid Page</h1>
    <br><br>
    <div class="">
      <div class="container tabel_res">
      <table class="table-search" id="myTable" style="width:100%;"> 
           <tr class="bg-dark text-light">
           <th> Code </th><th>Student's Name</th><th>Grade</th><th>Control</th>
           </tr>
           <?php
           $stmet = $conn->prepare("SELECT * FROM students WHERE approv = ? AND dep = ?");	
           $stmet->execute(array(1,"National"));
           $rows = $stmet->fetchAll();
           $count = $stmet->rowCount();
           if($count>0){
           foreach($rows as $row){
           echo '<tr>
            <td> '.$row['id'].' </td><td> '.$row['std_name_en'].' </td><td> '.$row['grade'].'  </td><td>
             <a href="?stat=delete_upd&id='.$row["id"].'" class="btn btn-danger btn-sm">Delete</a></td>
           </tr>';
          }   
     }else {
      echo '<div id="dang" class="alert alert-danger text-center dang" style="z-index:7; top:45%;width:50%;position:fixed;left:20%;"><h4>The Table Is Empty</h4></div>';
    }
       ?>
         </table>
      </div>
    </div>
    
       <?php 
   }      ////footer////
  include  "layout/footer.php";?>
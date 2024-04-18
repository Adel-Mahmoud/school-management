<?php
session_start();
 if(isset($_SESSION["ahmed"])){
 
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
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" style="margin-right:5px">
    <input type="search" class="form-control mr-sm-2 " id="myInput"  placeholder="Search for names..">
     <select style="margin-right:5px;" id="slec" class="btn btn-info">
       <option value="0">Code</option>
       <option value="1">Name</option>
     </select>
      <button class="btn btn-outline-success my-2 my-sm-0" onclick="myFunction()" type="button">Search</button>
    </form>
    <form class="form-inline my-2 my-lg-0" method="post">
    <a class="btn btn-outline-danger my-2 my-sm-0"   href='logout.php'>Logout</a>
    </form>
    </div>
</nav>
<?php
$stat = isset($_GET['stat'])? $_GET['stat']:"Error";
if($stat == "home"){ ?>
<h1>Accounting Page</h1>
<br><br>
<h1 class="text-center text-dark">الطلبة الذين تم قبولهم</h1>
<br><br>
<div class="">
  <div class="container  tabel_res">
  <table class="table-search" id="myTable" style="width:100%;"> 
       <tr class="bg-dark text-light">
       <th> Code </th><th>Student's Name</th><th>Grade</th><th> Department</th><th>Control</th>
       </tr>
       <?php
       $stmet = $conn->prepare("SELECT * FROM students WHERE approv = ?");	
       $stmet->execute(array(1));
       $rows = $stmet->fetchAll();
       $count = $stmet->rowCount();
       if($count>0){
        foreach($rows as $row){
          echo '<tr>
           <td> '.$row['id'].' </td><td> '.$row['std_name_en'].' </td><td> '.$row['grade'].'  </td><td>  '.$row['dep'].' </td><td>
          <a href="?stat=paid&id='.$row["id"].'" class="btn btn-success  btn-sm"> Paid </a>
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
  }elseif($stat == "paid"){
    $id = isset($_GET["id"]) && is_numeric ($_GET["id"]) ? intval($_GET["id"]) :0;
    $stmt = $conn->prepare("UPDATE students SET approv = ? , Date = now() WHERE id = ?");     
    $stmt->execute(array(3,$id));
    ?>
    <script>
    window.location="?stat=home";
    </script>
    <?php
  }
 include  "layout/footer.php";?>
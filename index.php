<?php
	//////
session_start();
include  "layout/header.php";
$log = isset($_GET['log'])? $_GET['log']:"Manege";
if($log == "login"){
  if(isset($_SESSION["d"])){
     header ('Location:hanan.php?stat=home');
    }elseif(isset($_SESSION["user"])){
      header ('Location:students_app.php?students=home');
     }elseif(isset($_SESSION["m"])){
      header ('Location:manal.php?stat=home');
     }elseif(isset($_SESSION["ahmed"])){
      header ('Location:financial.php');
     }/*else{
      header ('Location:index.php?log=logout');
     }*/
  if (isset($_POST["go"])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  //$sha_pass = sha1($password); 
  $stmt  = $conn->prepare('SELECT id , name, password  FROM users WHERE name = ? AND password = ? AND admin = 0');
  $stmt->execute(array($username , $password));
  $row   = $stmt-> fetch();
  $count = $stmt->rowCount();
  
  $stmt1  = $conn->prepare('SELECT id , name, password  FROM users WHERE name = ? AND password = ? AND admin = 1');
  $stmt1->execute(array($username , $password));
  $row1   = $stmt1-> fetch();
  $count1 = $stmt1->rowCount();
  
  $stmt2  = $conn->prepare('SELECT id , name, password  FROM users WHERE name = ? AND password = ? AND admin = 2');
  $stmt2->execute(array($username , $password));
  $row2   = $stmt2-> fetch();
  $count2 = $stmt2->rowCount();
  
  $stmt3  = $conn->prepare('SELECT id , name, password  FROM users WHERE name = ? AND password = ? AND admin = 3');
  $stmt3->execute(array($username , $password));
  $row3   = $stmt3-> fetch();
  $count3 = $stmt3->rowCount();
  
  $stmt4  = $conn->prepare('SELECT id , name, password  FROM users WHERE name = ? AND password = ? AND admin = 4');
  $stmt4->execute(array($username , $password));
  $row4   = $stmt4-> fetch();
  $count4 = $stmt4->rowCount();
  if ($count > 0 ){        
  $_SESSION['user']=$_POST['username'];
  $_user=$_SESSION['user'];
  $_SESSION["id"] = $row["userid"];
  $_id = $_SESSION["id"];
  header ('Location:students_app.php?students=home');  
  exit();
  }elseif($count1 > 0 ){        
  $_SESSION['d']=$_POST['username'];
  $_user=$_SESSION['d'];
  $_SESSION["id"] = $row["userid"];
  $_id = $_SESSION["id"];
  header ('Location:hanan.php?stat=home');  
  exit();
  }elseif($count2 > 0 ){        
  $_SESSION['m']=$_POST['username'];
  $_user=$_SESSION['m'];
  $_SESSION["id"] = $row["userid"];
  $_id = $_SESSION["id"];
  header ('Location:manal.php?stat=home');
  }elseif ($count3 > 0 ){        
  $_SESSION['ahmed']=$_POST['username'];
  $_user=$_SESSION['ahmed'];
  $_SESSION["id"] = $row["userid"];
  $_id = $_SESSION["id"];
  header ('Location:accounting.php?stat=home');    
  exit();
  }elseif($count4 > 0 ){        
  $_SESSION['name']=$_POST['username'];
  $_user=$_SESSION['name'];
  $_SESSION["id"] = $row["userid"];
  $_id = $_SESSION["id"];
  header ('Location:alaa.php');  
  exit();
  }else{?>
  <div class="alert alert-danger text-center dang" id="dang"><b>الحساب غير موجود</b></div>
  <script>
    setTimeout(function() {
      var alert_danger = document.getElementsByClassName("dang");
      alert_danger[0] .style.display="none";
    },3000);
  </script>
  <?php }
  }
  ?>
 <div class="bg_login" onmousemove="move();" >
 <img src="./image.png" class="img2" alt="" id="login" draggable="false;" onmousedown="d=true;" onmouseup="d=false;">
<div class="login" id="the_log">
 <form method="POST" action=""> 
       <h3 class="text-center log">Login</h3><br>
    <div class="form-group input-login">
    <svg class="user" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 32 32"><path fill="currentColor" d="M6 30h20v-5a7.008 7.008 0 0 0-7-7h-6a7.008 7.008 0 0 0-7 7zM9 9a7 7 0 1 0 7-7a7 7 0 0 0-7 7"/></svg>
      <input name="username" type="text"  class="frm form-control form-control-md"   id="exampleInput1" aria-describedby="emailHelp" placeholder="User Name" required>
    </div>
	   <div class="form-group input-login">
      <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2m-6 9c-1.1 0-2-.9-2-2s.9-2 2-2s2 .9 2 2s-.9 2-2 2m3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1c1.71 0 3.1 1.39 3.1 3.1z"/></svg>
     <input name="password" type="password" class=" form-control form-control-md" style="display: inline-block;" id="exampleInput1" aria-describedby="emailHelp" placeholder="Password" required>
	   </div>
	   <button type="submit" class="btn btn-primary btn-block" name="go">Sing In</button><br>
     <!-- <a href="index.php?log=singup">Create an account?</a>-->
    </form>
</div>
</div>
<?php 
/*} elseif($log == "singup"){
       if (isset($_POST['btnadd'])){
       $user    = $_POST["username"];
       $pass    = $_POST["password"];
       $full    = $_POST["full"]; 
       //$sha_pas = sha1($pass);          
       //التشبيك علي العناصر
       $formErrors = array();
       if(strlen($user) < 3){
       $formErrors []= 'The name of the user is less than<strong> 3 characters</strong>';       }
       if(strlen($user) > 20){       
       $formErrors []= 'Username is greater than 20 characters';}
       if(empty($user)){
       $formErrors []= 'user name null';       }
       if(empty($pass)){       
       $formErrors []= ' password null';}
       if(empty($full)){   
       $formErrors []= 'full name null';       }
       foreach($formErrors as $error){
       echo '<div class="alert text-center alert-danger" style="">'.$error.'</div>' ;       }       
       if(empty($formErrors)){
       $stmet = $conn->prepare("SELECT name FROM manage WHERE name = ?");	
       $stmet->execute(array($user));
       $count = $stmet->rowCount();
       if($count==1){
       echo  '<div class="alert text-center alert-danger dang">هذا الاسم موجود بالفعل</div>';
       }else{
       $stmt = $conn->prepare("INSERT INTO users ( name, password,fulname) VALUES (
       :a_user,:b_pass,:c_full)");     
       $stmt->execute(array("a_user"=>$user,"b_pass"=>$pass,"c_full"=>$full));  
       header('location:index.php?log=login');
       }        
       } 
     }
       ?>
    <div class="bg_login">
      <img src="images/qls.jpg" class="img1" alt="">
      <div class="singup">
       <h3 class="text-center log">Sing Up</h3><br>
       <form action="" method="POST" >
       <div class="form-group">
       <input type="text" name="username" class="form-control" id="username" placeholder="User Name" required>
       </div>
       <div class="form-group">
       <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required >
       </div>
       <div class="form-group">
       <input type="text" name="full" class="form-control" id="fullname" placeholder="Full Name" required>
       </div>
       <button type="submit" name="btnadd"  class="btn btn-success btn-block">Save</button>
       </form>
       </div>
       </div>
    </div>
       <?php */
    include  "layout/footer.php";
}elseif($log == "logout"){
  session_start();
  session_unset();
   header('location:index.php?log=login');
 
}
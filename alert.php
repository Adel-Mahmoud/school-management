<?php include  "layout/header.php";

/*
$date_now  = Date("Y/m/d");
   if(isset($_POST["btn"])){
   $date     = $_POST["dt"];
   $year_n   = substr($date_now,0,4);
   $month_n  = 10;
   $day_n    = 1;
   ////
   $year_b  = substr($date,0,4);
   $month_b = substr($date,5,2);
   $day_b   = substr($date,8,2);
   ////
   if( $year_b >= $year_n && $month_b == $month_n && 
   $day_b > $day_n || $year_b >= $year_n
    && $month_b > $month_n || $year_b > $year_n ){
     echo "errorsss";
   }elseif( $day_b == $day_n && $month_n >= $month_b && $year_n >= $year_b){
      $birth_year1   =  $year_n  - $year_b ;
      $birth_month1  =  $month_n - $month_b ;
      $birth_day1    =  0 ;
     echo  $birth1  = "year : " . $birth_year1 . "<br>" . "month : " . $birth_month1 . "<br>" . "day : " . $birth_day1;
   }elseif($day_n == $day_b && $month_n < $month_b && $year_n >= $year_b){
   	  $birth_day2    =  0 ;
	  $b_m11         =  $month_b - $month_n;
	  $birth_month2  = 12 - $b_m11;
	  $birth_year2   =  $year_n  - $year_b - 1;
	 echo  $birth2        = "year : " . $birth_year2 . "<br>" . "month : " . $birth_month2 . "<br>" . "day : " . $birth_day2;
   }elseif( $month_n < $month_b && $year_n >= $year_b){
      $b_d12           =  $day_b   - $day_n ;
      $birth_day1      = 30 - $b_d12 ;
      $b_m11           = $month_b - $month_n;
      $birth_month3    = 12 - $b_m11 -1;
      $birth_year3     =  $year_n  - $year_b - 1;
   echo  $birth3          = "year : " . $birth_year3 . "<br>" . "month : " . $birth_month3 . "<br>" . "day : " . $birth_day1 ;
   }elseif($month_n >= $month_b && $year_n >= $year_b){
      $b_d1            =  $day_b   - $day_n ;
      $birth_day4      = 30 - $b_d1 ;
      $birth_month4    =  $month_n - $month_b -1;
      $birth_year4     =  $year_n  - $year_b ;
     echo  $birth4          = "year : " . $birth_year4 . "<br>" . "month : " . $birth_month4 . "<br>" . "day : " . $birth_day4 ;
   }else{
    echo "errorss";
   }
  }
////
$do = isset($_GET['do'])? $_GET['do']:"Manege";
 
 $stmt = $conn->prepare("UPDATE students SET name = ? WHERE id = ?");     
 $stmt->execute(array($id));     
 ////////
 $userid = isset($_GET["userid"]) && is_numeric ($_GET["userid"]) ? intval($_GET["userid"]) :0;
 
 /////
 $stmt = $conn->prepare('DELETE FROM users WHERE userid = :a_id LIMIT 1');
 $stmt->bindParam("a_id",$userid);
 $stmt->execute();
 
*/
?>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	  <div class="modal-content">
	  <div class="modal-header">
	  <h5 class="modal-title" id="exampleModalCenterTitle">تنبيه </h5>
	  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	  </button>
	  </div>
	  <div class="modal-body">
	  
	  <form method="POST">
	  <div class="form-group">
	  <h3 class="text-center">تم تسجيل بيانات الطالب بنجاح</h3>
	  <hr>
	  </div>	  
	  <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">إغلاق</button>
	  </div>
	 </div>
	</div>
	</form>
   </div>
<button data-toggle="modal" data-target="#exampleModalCenter">Alert</button>
<script>
$('[data-toggle="popover"]').popover()
</script>
<?php include  "layout/footer.php";?>
<?php
	//////

  session_start();
  if(isset($_SESSION["user"])){
     
     }else{
     header('location:index.php?log=login');
    }
  
    include  "layout/header.php";
    //include  "age.php";
    /*  ========================  */
    $do = isset($_GET['students'])?$_GET['students']:'home';
    if($do == 'result'){
    ?>
     <script>
        window.location='students_app.php?students=home';
    </script>
    <?php  }elseif($do == 'home'){                                        
if(isset($_POST['save'])){
                                          $date_now  = Date("Y/m/d");
                                          $date     = $_POST["dat"];
                                          $year_n   = substr($date_now,0,4);
                                          $month_n  = 10;
                                          $day_n    = 1;
                                          $year_b  = substr($date,0,4);
                                          $month_b = substr($date,5,2);
                                          $day_b   = substr($date,8,2);                                          
                                          ////
                                          if( $year_b >= $year_n && $month_b == $month_n && 
                                          $day_b > $day_n || $year_b >= $year_n
                                           && $month_b > $month_n || $year_b > $year_n ){
                                            $birth = "تاريخ خاطىء";
                                          }elseif( $year_b <= $year_n && $month_b == $month_n && $day_b > $day_n ){
                                            $b_5           =  $day_b   - $day_n ;
                                            $birth_year5   =  $year_n  - $year_b - 1;
                                            $birth_month5  =  11;
                                            $birth_day5    =  30 - $b_5;
                                            $birth         = "year : " . $birth_year5 . " " . "month : " . $birth_month5 . " " . "day : " . $birth_day5;
                                         }elseif( $day_b == $day_n && $month_n >= $month_b && $year_n >= $year_b){
                                             $birth_year1   =  $year_n  - $year_b ;
                                             $birth_month1  =  $month_n - $month_b ;
                                             $birth_day1    =  0 ;
                                             $birth         = "year : " . $birth_year1 . " " . "month : " . $birth_month1 . " " . "day : " . $birth_day1;
                                          }elseif($day_n == $day_b && $month_n < $month_b && $year_n >= $year_b){
                                           $birth_day2    =  0 ;
                                           $b_m11         =  $month_b - $month_n;
                                           $birth_month2  = 12 - $b_m11;
                                           $birth_year2   =  $year_n  - $year_b - 1;
                                           $birth         = "year : " . $birth_year2 . " " . "month : " . $birth_month2 . " " . "day : " . $birth_day2;
                                          }elseif( $month_n < $month_b && $year_n >= $year_b){
                                             $b_d12           =  $day_b   - $day_n ;
                                             $birth_day1      = 30 - $b_d12 ;
                                             $b_m11           = $month_b - $month_n;
                                             $birth_month3    = 12 - $b_m11 -1;
                                             $birth_year3     =  $year_n  - $year_b - 1;
                                             $birth           = "year : " . $birth_year3 . " " . "month : " . $birth_month3 . " " . "day : " . $birth_day1 ;
                                          }elseif($month_n >= $month_b && $year_n >= $year_b){
                                             $b_d1            =  $day_b   - $day_n ;
                                             $birth_day4      = 30 - $b_d1 ;
                                             $birth_month4    =  $month_n - $month_b -1;
                                             $birth_year4     =  $year_n  - $year_b ;
                                             $birth           = "year : " . $birth_year4 . " " . "month : " . $birth_month4 . " " . "day : " . $birth_day4 ;
                                          }else{
                                            $birth = "تاريخ خاطىء";
                                          } 
  $std_name_ar =strip_tags($_POST['std_name_ar']);
     $std_name_en =strip_tags($_POST['std_name_en']);            
        $grade = strip_tags($_POST['grade']);        
          $gander = @strip_tags($_POST['gander']);              
            $date_b = $date;                  
              $age = $birth ;                     
                $rlg = @strip_tags($_POST['rlg']);                             
                  $address = strip_tags($_POST['address']);                            
                    $fath_num = strip_tags($_POST['fath_num']);              
                      $math_num = strip_tags($_POST['math_num']);                                 
                        $scd_lang = @strip_tags($_POST['scd_lang']);                   
                          $p_school = strip_tags($_POST['p_school']);                                     
                            $fath_name = strip_tags($_POST['fath_name']);                                                  
                              $fath_p_id = strip_tags($_POST['fath_p_id']);                                                
                                $fath_jop = strip_tags($_POST['fath_jop']);                              
                                  $math_name = strip_tags($_POST['math_name']);                                
                                    $math_p_id = strip_tags($_POST['math_p_id']);                                    
                                      $math_jop = strip_tags($_POST['math_jop']);                                      
                                        $statu = strip_tags($_POST['statu']);
                                          $dep = @strip_tags($_POST['dep']); 
                                            
                                                                              
                                          
   $form_errors = array();

   if(empty($gander)){
    $form_errors[] = '<div id="dang" class="alert alert-danger text-center dang" style="z-index:7; top:15%;width:50%;position:fixed;left:20%;"><h3>Surry The Gander is empty</h3></div>';
   } 
   if(empty($rlg)){
    $form_errors[] = '<div id="dang" class="alert alert-danger text-center dang" style="z-index:7;  top:25%;width:50%;position:fixed;left:20%;"><h4> Surry The Religion Is Empty</h4></div>';
}
if(empty($scd_lang)){
  $form_errors[] = '<div id="dang" class="alert alert-danger text-center dang" style="z-index:7; top:35%;width:50%;position:fixed;left:20%;"><h4> Surry The Second Languege Is Empty</h4></div>';
} 
if(empty($statu)){
  $form_errors[] = '<div id="dang" class="alert alert-danger text-center dang" style="z-index:7; top:45%;width:50%;position:fixed;left:20%;"><h4> Surry The Parents Marital status Is Empty</h4></div>';
} 
if(empty($dep)){
  $form_errors[] = '<div id="dang" class="alert alert-danger text-center dang" style="z-index:7; top:55%;width:50%;position:fixed;left:20%;"><h4> Surry The Department Is Empty</h4></div>';
} 
foreach($form_errors as $errors){
  echo $errors;
  ?>
  <script>
    setTimeout(function() {
      var alert_danger = document.getElementsByClassName("dang");
      alert_danger[0] .style.display="none";
      alert_danger[1] .style.display="none";
      alert_danger[2] .style.display="none";
      alert_danger[3] .style.display="none";
      alert_danger[4] .style.display="none";
    },3000);
  </script>
  <?php
}
if(empty($form_errors)){
  
  $stmt = $conn->prepare("INSERT INTO students ( grade, std_name_en,std_name_ar,gander,date_b,age,rlg,adrs,fath_num,math_num,scd_lang,p_school,fath_name,fath_p_id,fath_jop,math_name,math_p_id,math_jop,statu,dep,Date) VALUES (
    :a_grade , :a_std_name_en , :a_std_name_ar, :a_gander ,:a_date_b , :a_age , :a_rlg , :a_adrs , :a_fath_num , :a_math_num , :a_scd_lang , :a_p_school ,
     :a_fath_name , :a_fath_p_id ,:a_fath_jop , :a_math_name , :a_math_p_id , :a_math_jop , :a_statu , :a_dep,now())");     
   
   $stmt->execute(array("a_grade"=>$grade,"a_std_name_en"=>$std_name_en,"a_std_name_ar"=>$std_name_ar,
                        "a_gander"=>$gander,"a_date_b"=>$date_b,"a_age"=>$age,"a_rlg"=>$rlg,
                        "a_adrs"=>$address,"a_fath_num"=>$fath_num,"a_math_num"=>$math_num,
                        "a_scd_lang"=>$scd_lang,"a_p_school"=>$p_school,"a_fath_name"=>$fath_name,
                        "a_fath_p_id"=> $fath_p_id,"a_fath_jop"=> $fath_jop,"a_math_name"=>$math_name,
                        "a_math_p_id"=>$math_p_id,"a_math_jop"=>$math_jop,"a_statu"=> $statu,
                        "a_dep"=>$dep));  
   
$stmet = $conn->prepare("SELECT MAX(id) FROM students ");	
$stmet->execute();
$row_code = $stmet->fetch();
                    ?>
                  <div class="examp" id="examp1">
                     </div>
                    <div style="" id="examp"  >
                      <div class="modal-dialog modal-dialog-centered" >
                      <div class="modal-content">
                      <div class="modal-body">
                      <div class="form-group">
                      <h3 class="text-center">تم تسجيل بيانات الطالب بنجاح</h3><br>
                      <h3>[ <span class="text-primary"><?php echo $row_code["MAX(id)"];?></span> ]... كود الطالب</h3>
                      <hr>
                      </div>	  
                      <button type="button" onclick="hid();" class="btn btn-info" data-dismiss="modal" aria-label="Close">للرجوع وتسجيل طالب اخر</button>
                      </div>
                     </div>
                    </div>
                     </div>
                    <?php
                     }
}  

?>
<!--  ============== Start Navbar   ================  -->
<div style="position:fixed;width:100%;top:0px;z-index:5;">
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><?php  echo $_SESSION["user"];?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  
    <form class="form-inline my-2 my-lg-0" method="post">
    <a class="btn btn-outline-danger my-2 my-sm-0"   href='logout.php'>Logout</a>
    </form>
  </div>
</nav>
</div>
<!--  ============== End Navbar   ================  -->
<!--  ============== Start Header   ================  -->
<div class="container-fluid cf">

<h1 style="margin: auto;"  class="text-center text-qls" > Q L S </h1>

<img src="images/qls_logo.jpeg" class="qls_logo" alt="">
<h1 class=" text-center text-dark" style="margin-top:-15%;font-style: oblique;font-weight: 900;"> Qaitbay Language School </h1>
<h3 class="text-center text-danger"> Students Application </h3>
<h3 class="text-center text-danger" style="margin-bottom:5%;"><br><?php /* echo $today = date("Y");*/?> </h3>
<!--  ============== End Header   ================  -->

  <!--  ==============  Start Student's Information  ================  -->
<div class="Container std" style="position:relative; z-index:3;">
<form action=""  method="post">

</form>
<form action="" method='post'>
<label for=""> Department: </label> 
      <div class=" d_radio d-flex justify-content-center">
         <label style="" for="nato"> National / لغات </label> <input class="radio" type="radio" id="nato" value="National" name="dep" required="required"> <input class="radio" type="radio" id="americ" value="American" name="dep" required="required">  <label for="americ" class=""> American / امريكي</label>
      </div>
      <label for="" class="d-flex justify-content-end lb_top">: قسم</label>
  <hr>
  <label for="grade">Student's applying for grade : </label>
          <select class="form-select btn btn-info d-flex s justify-content-center" id="grade" aria-label="Default select example" name="grade">
             <option value="BC">BC</option>
             <option value="KG1">KG1</option>
             <option value="KG2">KG2</option>
             <option value="G1">G1</option>
             <option value="G2">G2</option>
             <option value="G3">G3</option>
             <option value="G4">G4</option>
             <option value="G5">G5</option>
             <option value="G6">G6</option>
             <option value="G7">G7</option>
             <option value="G8">G8</option>
             <option value="G9">G9</option>
             <option value="G10">G10</option>
             <option value="G11">G11</option>
             <option value="G12">G12</option>  
          </select>
          <label for="grade" class="d-flex justify-content-end lb_top "> : المرحلة التى سيلتحق بها الطالب </label>
          <hr>
  <label for="std_name_en"> Student's Name English : </label> <input  class="form-control  s" style="background: transparent; border:1px solid blue;" id="std_name_en" name="std_name_en" required><label for="std_name_en" class="d-flex justify-content-end lb_top ">: اسم الطالب بالانجليزي(بالكامل)</label>
  <hr>
  <label for="std_name_ar"> Student's Name Arabic : </label> <input  class="form-control  s" style="background: transparent; border:1px solid blue;" id="std_name_ar" name="std_name_ar" required><label for="std_name_ar" class="d-flex justify-content-end lb_top ">: اسم الطالب بالعربي(بالكامل)</label>
  <hr>
  <label for="">Gender :  </label> 
      <div class=" d_radio d-flex justify-content-center">
         <label style="" for="Male"> Male / ذكر </label> <input class="radio" type="radio" id="Male" value="Male" name="gander" required="required"> 
                                                        <input class="radio" type="radio" id="Fmale" value="Fmale" name="gander" required="required">  <label for="Fmale" class=""> Fmale / انثي</label>
      </div>
      <label for="grade" class="d-flex justify-content-end lb_top ">: النوع  </label>
  <hr>
  <label for="bod"> Date of birth :  </label> <input class="form-control  s" type="date"  name="dat" style="background: transparent; border:1px solid blue;" id="bod" value=""  required><label for="bod" class="d-flex justify-content-end lb_top " > : تاريخ الميلاد</label>
  <hr>
  <label for="">Religion  :  </label> 
      <div class=" d_radio d-flex justify-content-center">
         <label style="" for="Muslim"> Muslim / مسلم </label> <input class="radio" type="radio" id="Muslim" value="Muslim" name="rlg" required="required"> 
                                                        <input class="radio" type="radio" id="Christian" value="Christian " name="rlg" required="required">  <label for="Christian" class=""> Christian / مسيحي </label>
      </div>
      <label for="" class="d-flex justify-content-end lb_top ">: الديانة  </label> 
  <hr>
  <label for="address"> Address :  </label> <input class="form-control  s" id="address" style="background: transparent; border:1px solid blue;" name="address" required><label for="address" class="d-flex justify-content-end lb_top "> : العنوان </label>
  <hr>
  <label for="Father"> Father's Mob :  </label> <input class="form-control  s" type="number" style="background: transparent; border:1px solid blue;" id="Father" name="fath_num" required><label for="Father" class="d-flex justify-content-end lb_top"> : موبايل الاب</label>
  <hr>
  <label for="Mather"> Mather's Mob : </label> <input style="background: transparent; border:1px solid blue;" class="form-control  s" type="number" id="Mather" name="math_num" required><label for="Mather" class="d-flex justify-content-end lb_top"> : موبايل الام</label>
  <hr>
  <label for=""> Second Languege : </label> 
      <div class=" d_radio d-flex justify-content-center">
         <label style="" for="French"> French / فرانسي  </label> <input class="radio" type="radio" id="French" value="French" name="scd_lang" required="required"> 
                                                        <input class="radio" type="radio" id="German" value=" German" name="scd_lang" required="required">  <label for="German" class=""> German / الماني</label>
      </div>
      <label for="" class="d-flex justify-content-end lb_top"> : اللغة الثانية</label> 
  <hr>
  <label for="p_school"> Previous school or nursery : </label> <input style="background: transparent; border:1px solid blue;" class="form-control  s" id="p_school" name="p_school" required><label for="p_school" class="d-flex justify-content-end lb_top"> : اسم المدرسة المحول منها الطالب </label>
  <hr>
  <!--  ==============  End Student's Information  ================  -->
  <!--  ==============  Start Parent's Information  ================  -->
  <h3 class="text-center text-dark">Parent's Information / بيانات الوالدين</h3><hr>
  <label for="Fathers">Fathers Name : </label> <input class="form-control  s" style="background: transparent; border:1px solid blue;" id="Fathers" name="fath_name" required><label for="Fathers" class="d-flex justify-content-end lb_top ">: اسم الاب</label>
  <hr>
  <label for="fath_p_id"> Present ID on Or passport on : </label> <input style="background: transparent; border:1px solid blue;" class="form-control  s" id="fath_p_id" name="fath_p_id" type="number" required><label for="fath_p_id" class="d-flex justify-content-end lb_top">: رقم البطاقة او جواز السفر </label>
  <hr>
  <label for="fath_jop"> Occupation :</label> <input class="form-control  s" style="background: transparent; border:1px solid blue;" id="fath_jop" name="fath_jop" required><label for="fath_jop" class="d-flex justify-content-end lb_top">: الوظيفة  </label>
  <hr>
  <label for="math_name">Mathers Name : </label> <input class="form-control  s" style="background: transparent; border:1px solid blue;" id="math_name" name="math_name" required><label for="math_name" class="d-flex justify-content-end lb_top"> : اسم الام</label>
  <hr>
  <label for="math_p_id">Present ID on Or passport on :</label> <input style="background: transparent; border:1px solid blue;" class="form-control  s" type="number" id="math_p_id" name="math_p_id" required><label for="math_p_id" class="d-flex justify-content-end lb_top">: رقم البطاقة او جواز السفر </label>
  <hr>
  <label for="math_jop"> Occupation :</label> <input class="form-control  s" style="background: transparent; border:1px solid blue;" id="math_jop" name="math_jop" required><label for="math_jop" class="d-flex justify-content-end lb_top">: الوظيفة   </label>
  <hr>
  <label for=""> Parents Marital status :</label> 
      <div class=" d_radio d-flex justify-content-center">
         <label style="" for="Married"> Married / زواج  </label> <input class="radio" type="radio" id="Married" value="Married" name="statu" required="required"> 
                                                        <input class="radio" type="radio" id="Divorced" value="Divorced" name="statu" required="required"><label for="Divorced" class="">Divorced / انفصال</label>
      </div>
      <label for="" class="d-flex justify-content-end lb_top">: الحالة الاجتماعية</label>
      <hr>
      <input type="hidden" value="" id="cod" name="the_code">
      <!--  ==============  End Parent's Information   confirm================  -->
      <button data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-primary btn-block " name="save">Save / حفظ</button>

</div>
</div>
</form>
<?php
 }
  /*
  ===================================
  = Programming by : [Adel Mahmoud] =
  = Mobile Number  : [01018646196 ] =
  ===================================
  */
  include  "layout/footer.php";?>

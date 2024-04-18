<?php
session_start();
if(isset($_SESSION["d"]) || isset($_SESSION["m"])){
 
  }else{
   header('location:index.php?log=login');
  }
 include  "layout/header.php";
///////
$id = isset($_GET['id']) && is_numeric($_GET['id'])? intval($_GET['id']):0;
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
    /////
     $stmt = $conn->prepare("UPDATE students SET grade = ?, std_name_en = ? , std_name_ar = ? , gander = ? , date_b = ? , age = ? , rlg = ? , adrs = ? , fath_num = ? , math_num = ? , scd_lang = ? , p_school = ? , fath_name = ? , fath_p_id = ? , fath_jop = ? , math_name = ? , math_p_id = ? , math_jop = ? , statu = ? , dep = ?  WHERE id = ?");
     $stmt->execute(array($grade,$std_name_en,$std_name_ar,$gander, $date_b,$age,$rlg ,$address,$fath_num, $math_num, $scd_lang, $p_school ,$fath_name, $fath_p_id ,$fath_jop,$math_name ,$math_p_id, $math_jop,$statu ,$dep,$id));
     if($_SERVER['HTTP_REFERER'] == "hanan.php?stat=home")
     {
        header('Location:hanan.php?stat=home');
     }else{
         header('Location:manal.php?stat=home'); 
     }
    }
//////
$stmet = $conn->prepare("SELECT * FROM students WHERE id = ? LIMIT 1");	
$stmet->execute(array($id));
$row = $stmet->fetch();    
 
  ?>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ">
      <li class="nav-item active">
      <a class="nav-link" href="#"><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Pages
        </a>
        <div class="dropdown-menu the-ul" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="hanan.php?stat=home">Hanan</a>
          <hr>
          <a class="dropdown-item" href="manal.php?stat=home">Manal</a>
          <hr>
      </li>
    </ul>
    
  </div>
</nav>
    <!--  ==============  Start Student's Information  ================  -->
    <br>
    <h1 class="text-center text-dark">Edit Student's Page</h1>
    <br><br>
    <div class="Container std" style="position:relative; z-index:3;">
    <form action=""  method="post">
    
    </form>
    <form action="" method='post'>
    <input type="hidden"  value="<?php echo $row['id'];?>" id="id" name="id">
    <label for=""> Department: </label> 
          <div class=" d_radio d-flex justify-content-center">
             <label style="" for="nato"> National / لغات </label> <input <?php if($row['dep']=='National'){ echo 'checked';}?> class="radio" type="radio" id="nato" value="National" name="dep" required="required"> <input <?php if($row['dep']=='American'){ echo 'checked';}?> class="radio" type="radio" id="americ" value="American" name="dep" required="required">  <label for="americ" class=""> American / امريكي</label>
          </div>
          <label for="" class="d-flex justify-content-end lb_top">: قسم</label>
      <hr>
      <label for="grade">Student's applying for grade : </label>
              <select class="form-select btn btn-info d-flex s justify-content-center" id="grade" aria-label="Default select example" name="grade">
                 <option value="BC" <?php if($row['grade']=='BC'){ echo 'selected';}?> >BC</option>
                 <option value="KG1" <?php if($row['grade']=='KG1'){ echo 'selected';}?> >KG1</option>
                 <option value="KG2" <?php if($row['grade']=='KG2'){ echo 'selected';}?> >KG2</option>
                 <option value="G1" <?php if($row['grade']=='G1'){ echo 'selected';}?> >G1</option>
                 <option value="G2" <?php if($row['grade']=='G2'){ echo 'selected';}?> >G2</option>
                 <option value="G3" <?php if($row['grade']=='G3'){ echo 'selected';}?> >G3</option>
                 <option value="G4" <?php if($row['grade']=='G4'){ echo 'selected';}?> >G4</option>
                 <option value="G5" <?php if($row['grade']=='G5'){ echo 'selected';}?> >G5</option>
                 <option value="G6" <?php if($row['grade']=='G6'){ echo 'selected';}?> >G6</option>
                 <option value="G7" <?php if($row['grade']=='G7'){ echo 'selected';}?> >G7</option>
                 <option value="G8" <?php if($row['grade']=='G8'){ echo 'selected';}?> >G8</option>
                 <option value="G9" <?php if($row['grade']=='G9'){ echo 'selected';}?> >G9</option>
                 <option value="G10" <?php if($row['grade']=='G10'){ echo 'selected';}?> >G10</option>
                 <option value="G11" <?php if($row['grade']=='G11'){ echo 'selected';}?> >G11</option>
                 <option value="G12" <?php if($row['grade']=='G12'){ echo 'selected';}?> >G12</option>  
              </select>
              <label for="grade" class="d-flex justify-content-end lb_top "> : المرحلة التى سيلتحق بها الطالب </label>
              <hr>
      <label for="std_name_en"> Student's Name English : </label> <input value="<?php echo $row['std_name_en'];?>"  class="form-control  s" style="background: transparent; border:1px solid blue;" id="std_name_en" name="std_name_en" required><label for="std_name_en" class="d-flex justify-content-end lb_top ">: اسم الطالب بالانجليزي(بالكامل)</label>
      <hr>
      <label for="std_name_ar"> Student's Name Arabic : </label> <input value="<?php echo $row['std_name_ar'];?>"  class="form-control  s" style="background: transparent; border:1px solid blue;" id="std_name_ar" name="std_name_ar" required><label for="std_name_ar" class="d-flex justify-content-end lb_top ">: اسم الطالب بالعربي(بالكامل)</label>
      <hr>
      <label for="">Gender :  </label> 
          <div class=" d_radio d-flex justify-content-center">
             <label style="" for="Male"> Male / ذكر </label> <input <?php if($row['gander']=='Male'){ echo 'checked';}?> class="radio" type="radio" id="Male" value="Male" name="gander" required="required"> 
                                                            <input <?php if($row['gander']=='Fmale'){ echo 'checked';}?> class="radio" type="radio" id="Fmale" value="Fmale" name="gander" required="required">  <label for="Fmale" class=""> Fmale / انثي</label>
          </div>
          <label for="grade" class="d-flex justify-content-end lb_top ">: النوع  </label>
      <hr>
      <label for="bod"> Date of birth :  </label> <input value="<?php echo $row['date_b'];?>" class="form-control  s" type="date"  name="dat" style="background: transparent; border:1px solid blue;" id="bod"  required><label for="bod" class="d-flex justify-content-end lb_top " > : تاريخ الميلاد</label>
      <hr>
      <label for="">Religion  :  </label> 
          <div class=" d_radio d-flex justify-content-center">
             <label style="" for="Muslim"> Muslim / مسلم </label> <input <?php if($row['rlg']=='Muslim'){ echo 'checked';}?> class="radio" type="radio" id="Muslim" value="Muslim" name="rlg" required="required"> 
                                                                   <input <?php if($row['rlg']=='Christian'){ echo 'checked';}?> class="radio" type="radio" id="Christian" value="Christian " name="rlg" required="required">  <label for="Christian" class=""> Christian / مسيحي </label>
          </div>
          <label for="" class="d-flex justify-content-end lb_top ">: الديانة  </label> 
      <hr>
      <label for="address"> Address :  </label> <input value="<?php echo $row['adrs'];?>" class="form-control  s" id="address" style="background: transparent; border:1px solid blue;" name="address" required><label for="address" class="d-flex justify-content-end lb_top "> : العنوان </label>
      <hr>
      <label for="Father"> Father's Mob :  </label> <input value="<?php echo $row['fath_num'];?>" class="form-control  s" type="number" style="background: transparent; border:1px solid blue;" id="Father" name="fath_num" required><label for="Father" class="d-flex justify-content-end lb_top"> : موبايل الاب</label>
      <hr>
      <label for="Mather"> Mather's Mob : </label> <input value="<?php echo $row['math_num'];?>" style="background: transparent; border:1px solid blue;" class="form-control  s" type="number" id="Mather" name="math_num" required><label for="Mather" class="d-flex justify-content-end lb_top"> : موبايل الام</label>
      <hr>
      <label for=""> Second Languege : </label> 
          <div class=" d_radio d-flex justify-content-center">
             <label style="" for="French"> French / فرانسي  </label> <input <?php if($row['scd_lang']=='French'){ echo 'checked';}?> class="radio" type="radio" id="French" value="French" name="scd_lang" required="required"> 
                                                                     <input <?php if($row['scd_lang']=='German'){ echo 'checked';}?> class="radio" type="radio" id="German" value="German" name="scd_lang" required="required">  <label for="German" class=""> German / الماني</label>
          </div>
          <label for="" class="d-flex justify-content-end lb_top"> : اللغة الثانية</label> 
      <hr>
      <label for="p_school"> Previous school or nursery : </label> <input value="<?php echo $row['p_school'];?>" style="background: transparent; border:1px solid blue;" class="form-control  s" id="p_school" name="p_school" required><label for="p_school" class="d-flex justify-content-end lb_top"> : اسم المدرسة المحول منها الطالب </label>
      <hr>
      <!--  ==============  End Student's Information  ================  -->
      <!--  ==============  Start Parent's Information  ================  -->
      <h3 class="text-center text-dark">Parent's Information / بيانات الوالدين</h3><hr>
      <label for="Fathers">Fathers Name : </label> <input value="<?php echo $row['fath_name'];?>" class="form-control  s" style="background: transparent; border:1px solid blue;" id="Fathers" name="fath_name" required><label for="Fathers" class="d-flex justify-content-end lb_top ">: اسم الاب</label>
      <hr>
      <label for="fath_p_id"> Present ID on Or passport on : </label> <input value="<?php echo $row['fath_p_id'];?>" style="background: transparent; border:1px solid blue;" class="form-control  s" id="fath_p_id" name="fath_p_id" type="number" required><label for="fath_p_id" class="d-flex justify-content-end lb_top">: رقم البطاقة او جواز السفر </label>
      <hr>
      <label for="fath_jop"> Occupation :</label> <input value="<?php echo $row['fath_jop'];?>" class="form-control  s" style="background: transparent; border:1px solid blue;" id="fath_jop" name="fath_jop" required><label for="fath_jop" class="d-flex justify-content-end lb_top">: الوظيفة  </label>
      <hr>
      <label for="math_name">Mathers Name : </label> <input value="<?php echo $row['math_name'];?>" class="form-control  s" style="background: transparent; border:1px solid blue;" id="math_name" name="math_name" required><label for="math_name" class="d-flex justify-content-end lb_top"> : اسم الام</label>
      <hr>
      <label for="math_p_id">Present ID on Or passport on :</label> <input value="<?php echo $row['math_p_id'];?>" style="background: transparent; border:1px solid blue;" class="form-control  s" type="number" id="math_p_id" name="math_p_id" required><label for="math_p_id" class="d-flex justify-content-end lb_top">: رقم البطاقة او جواز السفر </label>
      <hr>
      <label for="math_jop"> Occupation :</label> <input value="<?php echo $row['math_jop'];?>" class="form-control  s" style="background: transparent; border:1px solid blue;" id="math_jop" name="math_jop" required><label for="math_jop" class="d-flex justify-content-end lb_top">: الوظيفة   </label>
      <hr>
      <label for=""> Parents Marital status :</label> 
          <div class=" d_radio d-flex justify-content-center">
             <label style="" for="Married"> Married / زواج  </label> <input <?php if($row['statu']=='Married'){ echo 'checked';}?> class="radio" type="radio" id="Married" value="Married" name="statu" required="required"> 
                                                                    <input <?php if($row['statu']=='Divorced'){ echo 'checked';}?> class="radio" type="radio" id="Divorced" value="Divorced" name="statu" required="required"><label for="Divorced" class="">Divorced / انفصال</label>
          </div>
          <label for="" class="d-flex justify-content-end lb_top">: الحالة الاجتماعية</label>
          <hr>
          <!--  ==============  End Parent's Information   confirm================  -->
          <button data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-primary btn-block " name="save">Save / حفظ</button>
    
    </div>
    </div>
    </form>
    <?php
   


         ////footer////
  include  "layout/footer.php";?>
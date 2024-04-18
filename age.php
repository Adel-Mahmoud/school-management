
<?php
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
   if( $year_b >= $year_n && $month_b == $month_n && $day_b > $day_n 
    || $year_b >= $year_n && $month_b > $month_n 
    || $year_b > $year_n ){
      $The_age = "errorsss";
   }elseif( $day_b == $day_n && $month_n >= $month_b && $year_n >= $year_b){
      $b_y3  =  $year_n  - $year_b ;
      $b_m1  =  $month_n - $month_b ;
      $b_d111    =  0 ;
      $The_age =  $b_y3 ." : year<br>". $b_m1 ." : month<br>". $b_d111 ." : day";
   }elseif($day_n == $day_b && $month_n < $month_b && $year_n >= $year_b){
   $b_d111    =  0 ;
   $b_m11     =  $month_b - $month_n;
   $b_m1111    = 12 - $b_m11;
   $b_y33     =  $year_n  - $year_b - 1;
   $The_age = $b_y33 ." : year_<br>". $b_m1111 ." : month<br>". $b_d111 ." : day";
   }elseif( $month_n < $month_b && $year_n >= $year_b){
   $b_d12      =  $day_b   - $day_n ;
   $b_d_122     = 30 - $b_d12 ;
   $b_m11     = $month_b - $month_n;
   $b_m111    = 12 - $b_m11 -1;
   $b_y33     =  $year_n  - $year_b - 1;
   $The_age =       $b_y33 . " : year* <br>" . $b_m111. " : month <br>" .$b_d_122 ." : day ";
   }elseif($month_n >= $month_b && $year_n >= $year_b){
     $b_d1      =  $day_b   - $day_n ;
     $b_d_1     = 30 - $b_d1 ;
     $b_m11     =  $month_n - $month_b -1;
     $b_y33     =  $year_n  - $year_b ;
     $The_age =  $b_y33 ." : year$<br>". $b_m11 ." : month<br>". $b_d_1 ." : day";
   }else{
    $The_age =  "errorss";
   }
  }
  
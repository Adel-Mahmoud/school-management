$(function () {
  $('[data-toggle="popover"]').popover()
});
$('.confirm').click(function(){
  return confirm('Save Data ?');
});

/////////////////////////
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  
  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
  td = tr[i].getElementsByTagName("td")[Number(slec.value)];
  if (td) {
  txtValue = td.textContent || td.innerText;
  if (txtValue.toUpperCase().indexOf(filter) > -1) {
  tr[i].style.display = "";
  } else {
  tr[i].style.display = "none";
  }
  }
  }
  }
  ////////////////////
  function hid(){
   window.examp.style="display:none";
   window.examp1.style="display:none";
   window.location="?students=result";
  }
  /*  Random_Math */
  var rand =  Math.floor(Math.random() * 100000000) + 1; 
       cod = document.getElementById("cod");
       cod.value = rand;
 function login(){
   $("#the_log").hide();
   $("#the_log").slideDown(1000);
 }   



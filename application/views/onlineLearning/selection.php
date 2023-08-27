  



    <div class="clearfix"></div>

     <div class="page-section equal">

    <div class="container">



        <div class="page-section-heading">

        <h2 class="text-display-1"> Search Online Materials</h2>

    </div>

    <form class="form-inline" id="form" action="<?php echo base_url('olearning/redir') ?>" method="POST">

    <select class="form-control " name="clas" id="clas" >

    <option disabled selected value>--select Class--</option>

    <option value="10">class 10<sup>th</sup></option>

    <option value="9">class 9<sup>th</sup></option>

    </select>

    <br>

    <select class="form-control " name="sub" id="sub" >

    <option disabled selected value>--select Subject--</option>

    <option value="sc" >SCIENCE</option>

    <option value="ma">MATHS</option>

    </select>

<br>

<select class="form-control" name="chap" id="chap">

  <option disabled selected value>--select Chapter--</option>

  <option value="1">Chapter 1</option>

  <option value="2">Chapter 2</option>

  <option value="3">Chapter 3</option>
  <option value="4">Chapter 4</option>

  <option value="5">Chapter 5</option>
  <option value="6">Chapter 6</option>
  <option value="7">Chapter 7</option>
  <option value="8">Chapter 8</option>
  <option value="9">Chapter 9</option>
  <option value="10">Chapter 10</option>
  <option value="11">Chapter 11</option>
  <option value="12">Chapter 12</option>
  <option value="13">Chapter 13</option>
  <option value="14">Chapter 14</option>
  <option value="15">Chapter 15</option>
  <option value="16">Chapter 16</option>

</select>

 

<br>

<input class="btn btn-success" onclick="check();" value="Find"> 

</form>

<br>

<div id="output"></div>

<br>





     </div>

     </div>



<script>

// function showsub() {

//   var skillsSelect = document.getElementById("sub");

//   var selectedText = skillsSelect.options[skillsSelect.selectedIndex].value;

//   // alert(selectedText);

//   var x = document.getElementById("matitle");

//   var y = document.getElementById("sctitle");

//   if(selectedText == "ma"){

//     y.style.display = "none"

//     x.style.display = "block";

//   }

//   if(selectedText == "sc"){

//     x.style.display = "none"

//     y.style.display = "block";

//   }

  

//   // if (x.style.display === "none") {

//   //   x.style.display = "block";

//   // } else {

//   //   x.style.display = "none";

//   // }

  

// }



// function showchap() {

//   var skillsSelect = document.getElementById("sub");

//   var selectedText = skillsSelect.options[skillsSelect.selectedIndex].value;

//   var skillsSelect1 = document.getElementById("chap");

//   var selectedText1 = skillsSelect1.options[skillsSelect1.selectedIndex].value;

  

//   // alert(selectedText);

//   var machap1 = document.getElementById("machap1");

//   var scchap1 = document.getElementById("scchap1");

//   if(selectedText == "ma" and selectedText1 == "1"){

//     machap1.style.display = "block"

//     scchap1.style.display = "none";

//   }

//   if(selectedText == "sc" and selectedText1 == "1"){

//     machap1.style.display = "none"

//     scchap1.style.display = "block";

//   }

  

//   // if (x.style.display === "none") {

//   //   x.style.display = "block";

//   // } else {

//   //   x.style.display = "none";

//   // }

  

// }





function check(){

  var skillsSelect = document.getElementById("sub");

  var selectedText = skillsSelect.options[skillsSelect.selectedIndex].value;

  var skillsSelect = document.getElementById("chap");

  var selectedText1 = skillsSelect.options[skillsSelect.selectedIndex].value;

var skillsSelect = document.getElementById("clas");

  var selectedText2 = skillsSelect.options[skillsSelect.selectedIndex].value;

  if(selectedText=="" || selectedText2=="" || selectedText2==""  ){

    alert("please select options");

  }

  else{

document.getElementById("form").submit();

  }

  }

 </script>
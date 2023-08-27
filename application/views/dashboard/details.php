
<span class="text-danger"><center><h4><?php 

//if($something != '0'){echo $something;} 
// print_r($EmpData);

?>
  
</h4></center></span>

<ol class="breadcrumb">
  <li><a href="<?php echo base_url('dashboard') ?>">Home</a></li> 
  <li class="active">Details</li>
</ol>

<div class="container"> 
<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
        
          	<fieldset>
            	<legend>Your Information</legend>
            <div class="form-group">
              <label for="sch">Employee ID</label>
                <input type="number" class="form-control" value="<?php echo $EmpData[0]["EmpId"]; ?>" disabled>
            </div>
            <div class="form-group">
              <label for="roll">Name</label>
                <input type="text" class="form-control" value="<?php echo $EmpData[0]["Name"];?>" disabled>
            </div>
            <div class="form-group">
              <label for="fullname">Contact Number</label>
              <input type="number" class="form-control" value="<?php echo $EmpData[0]["Contact_Num"]; ?>" disabled>
            </div>
            <div class="form-group">
              <label for="lname">Designation</label>
                <input type="text" class="form-control" value="<?php echo$EmpData[0]["Designation"];?>" disabled>
            </div>
            <!-- <div class="form-group">
              <label for="lname">Education</label>
               <input type="text" class="form-control" value="<?php //$EmpData[0]["Education"]; ?>" disabled>
            </div> -->
            

          </fieldset>  

          <!-- <center>
            <br><br><br><br>
<button class="btn btn-danger" onclick="window.location.href='<?php// echo base_url('dashboard/addSt');?>'">RESET</button>
      </center>  -->
       <br>
</div>

<script>
var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};
/*
function dateValid(){
  var inputDate= document.getElementById('dob');
  date = new Date(inputDate.value);
  if(!checkMyDateWithinRange(date)){
    alert('Date is not in range!!!');
  }
}
function checkMyDateWithinRange(myDdate){
    var startDate = new Date(2000, 1, 1);
    var endDate = new Date();     
    if (startDate < myDate && myDate < endDate) {
       return true; 
    }
   return false;
}
*/

</script>
        

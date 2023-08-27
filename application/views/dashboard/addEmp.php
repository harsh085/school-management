
<span class="text-danger"><center><h4><?php if($something != '0'){echo $something;} ?></h4></center></span>

<ol class="breadcrumb">
  <li><a href="<?php echo base_url('dashboard') ?>">Home</a></li> 
  <li class="active">Employee Details</li>
</ol>

<div class="container"> 
<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
 
<form action="<?php echo base_url('dashboard/add_std') ?>" method="POST"  >
        
          	<fieldset>
            	<legend>Employee Information</legend>
              <div class="form-group">
              <label for="sch">Scholar Number</label>
                <input type="number" class="form-control" id="sch" name="sch" value="<?php echo set_value('sch'); ?>" placeholder="Scholar Num" required>
                <?php echo form_error('sch'); ?>
            </div>
            	 <div class="form-group">
              <label for="roll">Roll Number</label>
                <input type="number" class="form-control" id="roll" name="roll" value="<?php echo set_value('roll'); ?>" placeholder="Roll Num" required>
                <?php echo form_error('roll'); ?>
            </div>
            <div class="form-group">
              <label for="fullname">Student Name</label>
              <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo set_value('fullname'); ?>" placeholder="Full Name" required >
            <?php echo form_error('fullname'); ?></div>
            <div class="form-group">
              <label for="lname">Father Name</label>
                <input type="text" class="form-control" id="fname" name="fname" value="<?php echo set_value('fname'); ?>" placeholder="Father's Name" required>
            <?php echo form_error('fname'); ?></div>
            <div class="form-group">
              <label for="lname">Mother Name</label>
                <input type="text" class="form-control" id="mname" name="mname" value="<?php echo set_value('mname'); ?>" placeholder="Mother's Name"  required>
            <?php echo form_error('mname'); ?></div>
            
      
          </fieldset>  

          <div class="col-md-12 col-sm-12">

            <br> 
            <center>  
              <button type="submit" class="btn btn-primary" id="butsave">Save Changes</button>
             
              <!-- <input class="btn btn-default"  type="reset" id="res" onclick="location.reload();"> -->
              <!-- <button type="button" class="btn btn-default">Reset</button>       -->
            </center>       
          </div>
  </form>
          <center>
            <br><br><br><br>
<button class="btn btn-danger" onclick="window.location.href='<?php echo base_url('dashboard/addSt');?>'">RESET</button>
      </center> 
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
        

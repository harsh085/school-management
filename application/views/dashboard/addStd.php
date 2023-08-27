
<span class="text-danger"><center><h4><?php if($something != '0'){echo $something;} ?></h4></center></span>

<ol class="breadcrumb">
  <li><a href="<?php echo base_url('dashboard') ?>">Home</a></li>
  <li class="active">Add Student</li>
</ol>

<div class="container">
<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>

<form action="<?php echo base_url('dashboard/add_std') ?>" method="POST"  >
          <div class="row">
          	<div class="col-md-4 col-sm-12">
          	<fieldset>
            	<!-- <legend>Student Info</legend> -->
              <div class="form-group">
              <label for="sch">Scholar Number</label>
                <input type="number" class="form-control" id="sch" name="sch" value="<?php echo set_value('sch'); ?>" placeholder="Scholar Num" required>
                <?php echo form_error('sch'); ?>
            </div>
            	 <!-- <div class="form-group">
              <label for="roll">Roll Number</label>
                <input type="number" class="form-control" id="roll" name="roll" value="<?php// echo set_value('roll'); ?>" placeholder="Roll Num" required>
                <?php //echo form_error('roll'); ?>
            </div> -->
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


           <!--  <div class="form-group">
              <label for="email"></label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off">
            </div> -->

          </fieldset>
               </div>
 		<div class="col-md-4 col-sm-12">
          <fieldset>
            <!-- <legend>Address Info</legend> -->
              <div class="form-group">
              <label for="dob">Date of Birth</label>
                <input type="date" min="1990-01-02" max="2025-01-02" class="form-control" id="dob" name="dob" value="<?php echo set_value('dob'); ?>"  placeholder="Date of Birth" required>
            <?php echo form_error('dob'); ?>
          </div>
            <div class="form-group">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" name="address" value="<?php echo set_value('address'); ?>" placeholder="Address" autocomplete="off" >
            <?php echo form_error('address'); ?></div>
            <div class="form-group">
              <label for="city">Block</label>
                <input type="text" class="form-control" id="block" name="block" value="<?php echo set_value('block'); ?>" placeholder="Block" autocomplete="off" required>
            <?php echo form_error('block'); ?></div>
            <div class="form-group">
              <label for="country">City</label>
                <input type="text" class="form-control" id="city" name="city" value="<?php echo set_value('city'); ?>" placeholder="City" autocomplete="off" >
            <?php echo form_error('city'); ?></div>


            <div class="form-group">
              <label for="contact">Contact</label>
                <input type="text" class="form-control" id="contact" name="contact" value="<?php echo set_value('contact'); ?>" placeholder="Contact" autocomplete="off" required>
            <?php echo form_error('contact'); ?></div>

          </fieldset>

          </div>
          <!-- /col-md-6 -->

          <div class="col-md-4 col-sm-12">

          <fieldset>
            <!-- <legend>Registration Info</legend> -->

<!--             <div class="form-group">
              <label for="registerDate">Register Date</label>
              <input type="date" class="form-control" id="regDate" name="registerDate" value="<?php echo set_value('registerDate'); ?>" placeholder="Register Date" autocomplete="off">
            </div> -->
            <div class="form-group">

              <label for="clas">Class</label>
              <select class="form-control" name="clas" id="clas" style="width:100px;" >
                <option selected disabled>Select</option>
                <?php foreach ($classData as $key => $value) { ?>
                  <option value="<?php echo $value['class_id'] ?>" <?php echo set_select('clas', $value['class_id'], False); ?> ><?php echo $value['class_name'] ?></option>
                <?php } // /forwach ?>
              </select>
              <?php echo form_error('clas'); ?>
            </div>

              <div class="form-group">
              <label for="cast">Caste</label>
                <input type="text" class="form-control" name="cast" value="<?php echo set_value('cast'); ?>" placeholder="Caste"  required>
            <?php echo form_error('mname'); ?></div>

                          <div class="form-group">
              <label for="adhar">Aadhaar Number</label>
                <input type="number" class="form-control" id="adhar" name="adhar" value="<?php echo set_value('adhar'); ?>" placeholder="Aadhaar Num" required>
                <?php echo form_error('adhar'); ?>
            </div>

                          <div class="form-group">
              <label for="sssm">SSSM Id</label>
                <input type="number" class="form-control" id="sssm" name="sssm" value="<?php echo set_value('sssm'); ?>" placeholder="SSSM Num" required>
                <?php echo form_error('sssm'); ?>
            </div>
            <!-- <div class="form-group">
              <label for="sectionName">Section</label>
              <select class="form-control" name="sectionName" id="sectionName">
                <option value="">Select Class</option>
              </select>
            </div> -->
          </fieldset>
<!--
          <fieldset>
            <legend>Photo</legend>

            <div class="form-group">
                <p><input type="file"  accept="image/*" name="file" id="file"  onchange="loadFile(event)" style="display: none;"></p>
				<p><label for="file" style="cursor: pointer;">CLICK! to Upload Image</label></p>
				<p><img id="output" width="200" /></p>

			</div>

          </fieldset>
            -->

          </div>
          <!-- /col-md-6 -->
          </div>

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
<!--
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

</script> -->

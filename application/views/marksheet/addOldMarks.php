
<!-- <span class="text-danger"><center><h4><?php //if($something != '0'){echo $something;} ?></h4></center></span>
// <?php //print_r('schNo']); ?>-->
<!-- <?php //print_r($classData[0]); ?>  -->

<!-- <?php //echo ($schNo); ?> -->
<ol class="breadcrumb">
  <li><a href="<?php echo base_url('dashboard') ?>">Home</a></li>
  <li class="active">Add Marks</li>
</ol>

<div class="container">
<form action="<?php echo base_url('dashboard/update_std') ?>" method="POST"  >
          <div class="row">
          	<div class="col-md-4 col-sm-12">
          	<fieldset>
            	<!-- <legend>Student Info</legend> -->
              <div class="form-group">
              <label for="sch">Scholar Number</label>
                <input type="" class="form-control" name="newsch" value="<?php echo $data->schNo; ?>" placeholder="Scholar Num" >
                <input name="oldsch" value="<?php echo $data->schNo; ?>" hidden readonly >
                <?php echo form_error('sch'); ?>
            </div>
            	 <!-- <div class="form-group">
              <label for="roll">Roll Number</label>
                <input type="number" class="form-control" name="roll" value="<?php// echo $data->rollNo; ?>" placeholder="Roll Num" required>
                <?php //echo form_error('roll'); ?>
            </div> -->
            <div class="form-group">
              <label for="fullname">Student Name</label>
              <input type="text" class="form-control"  name="fullname" value="<?php echo $data->fullName; ?>" placeholder="Full Name" required >
            <?php echo form_error('fullname'); ?></div>
            <div class="form-group">
              <label for="lname">Father Name</label>
                <input type="text" class="form-control" name="fname" value="<?php echo $data->Fname; ?>" placeholder="Father's Name" required>
            <?php echo form_error('fname'); ?></div>
            <div class="form-group">
              <label for="lname">Mother Name</label>
                <input type="text" class="form-control" name="mname" value="<?php echo $data->Mname; ?>" placeholder="Mother's Name"  required>
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
                <input type="date" min="1990-01-02" max="2021-01-02" class="form-control" name="dob" value="<?php echo $data->dob; ?>"  placeholder="Date of Birth" required>
            <?php echo form_error('dob'); ?></div>

            <div class="form-group">
              <label for="address">Address</label>
              <input type="text" class="form-control" name="address" value="<?php echo $data->address; ?>" placeholder="Address" autocomplete="off" >
            <?php echo form_error('address'); ?></div>
            <div class="form-group">
              <label for="city">Block</label>
                <input type="text" class="form-control"  name="block" value="<?php echo $data->block; ?>" placeholder="Block" autocomplete="off" >
            <?php echo form_error('block'); ?></div>
            <div class="form-group">
              <label for="country">City</label>
                <input type="text" class="form-control"  name="city" value="<?php echo $data->city;  ?>" placeholder="City" autocomplete="off" >
            <?php echo form_error('city'); ?></div>
            <div class="form-group">
              <label for="contact">Contact</label>
                <input type="number" min="0" class="form-control" name="contact" value="<?php echo $data->contact; ?>" placeholder="Contact" autocomplete="off">
            <?php echo form_error('contact'); ?></div>

          </fieldset>

          </div>
          <!-- /col-md-6 -->

          <div class="col-md-4 col-sm-12">

          <fieldset>
            <!-- <legend>Registration Info</legend> -->

            <!-- <div class="form-group">
              <label for="registerDate">Register Date</label>
              <input type="date" class="form-control"  name="registerDate" value="<?php //echo $rdate; ?>" placeholder="Register Date" autocomplete="off">
            </div> -->

            <div class="form-group">

               <label for="clas">Class</label>
              <select class="form-control" name="clas" id="clas" style="width:100px;" >
                <option disabled>Select</option>
                <?php foreach ($classData[0] as $key => $value) { ?>
                  <option value="<?php echo $value['class_id']; ?>" <?php if($value['class_id'] == $data->class_id){echo "selected";} ?> > <?php echo $value['class_name'] ?></option>
                <?php } // /forwach ?>
              </select>
              <?php echo form_error('clas'); ?>
            </div>

           <!--  <div class="form-group">

              <label for="clas">Change Class</label>
              <select class="form-control" name="clas" id="clas" style="width:100px;" onclick="">
                <option selected disabled>Select</option>
                  <option value="101" >Nursery</option>
                  <option value="102" >KG 1</option>
                  <option value="103" >KG 2</option>
                  <option value="1" >1 st</option>
                  <option value="2" >2 nd</option>
                  <option value="3" >3 rd</option>
                  <option value="4" >4 th</option>
                  <option value="5" >5 th</option>
                  <option value="6" >6 th</option>
                  <option value="7" >7 th</option>
                  <option value="8" >8 th</option>
                  <option value="9" >9 th</option>
                  <option value="10" >10 th</option>
              </select>
              <?php //echo form_error('clas'); ?>
            </div> -->

            <div class="form-group">
              <label for="cast">Caste</label>
                <input type="text" class="form-control"  name="cast" value="<?php echo $data->caste;  ?>" placeholder="Caste" autocomplete="off" >
            <?php echo form_error('cast'); ?></div>

            <div class="form-group">
            <label for="adhar">Adhar Number</label>
                <input type="number" class="form-control" name="adhar" value="<?php echo $data->adhar;  ?>" placeholder="Adhar Num" required>
                <?php echo form_error('adhar'); ?>
            </div>
                          <div class="form-group">
              <label for="sssm">SSMID</label>
                <input type="number" class="form-control"  name="sssm" value="<?php echo $data->sssmid ; ?>" placeholder="SSSM Num" required>
                <?php echo form_error('sssm'); ?>
            </div>
            <!-- <div class="form-group">
              <label for="sectionName">Section</label>
              <select class="form-control" name="sectionName" id="sectionName">
                <option value="">Select Class</option>
              </select>
            </div> -->
          </fieldset>



          </div>
          <!-- /col-md-6 -->
          </div>


          	<!-- <input type="button" class="btn btn-danger" onclick="hide()" value="Click me to edit Marks"/>

          <div id="myDIV" style="display: none;">

            <?php
              //if( $data->class_id == 101 || $data->class_id == 103 || $data->class_id == 102 || $data->class_id == 1 || $data->class_id == 2 || $data->class_id == 3 || $data->class_id == 4 || $data->class_id == 5  ){
            ?>



          <div class="form-group">
              <label for="english">English</label>
                <input type="number" max="120" min="0" class="form-control" id="english" name="english" value="<?php //echo $data->eng ; ?>" placeholder="Marks in English" required>
                <?php //echo form_error('english'); ?>
            </div>
            <div class="form-group">
              <label for="hindi">Hindi</label>
                <input type="number" max="120" min="0" class="form-control" id="hindi" name="hindi" value="<?php //echo $data->hin ; ?>" placeholder="Marks in Hindi" required>
                <?php// echo form_error('hindi'); ?>
            </div>
            <div class="form-group">
              <label for="maths">Maths</label>
                <input type="number" max="120" min="0" class="form-control" id="maths" name="maths" value="<?php //echo $data->maths ; ?>" placeholder="Marks in Maths" required>
                <?php //echo form_error('maths'); ?>
            </div>
            <div class="form-group">
              <label for="evs">EVS</label>
                <input type="number" max="120" min="0" class="form-control" id="evs" name="evs" value="<?php// echo $data->evs; ?>" placeholder="Marks in EVS" required>
                <?php// echo form_error('evs'); ?>
            </div>

            <?php /// }
           // else{
              ?>



            <?php //} ?>
			</div> -->

          <div class="col-md-12 col-sm-12">

            <br>
            <center>

              <button type="submit" class="btn btn-primary" id="butsave">Save Changes</button>

              <input class="btn btn-default"  type="reset" id="res" onclick="location.reload();">
              <!-- <button type="button" class="btn btn-default">Reset</button>       -->
            </center>
          </div>

          </form>
       <br>
</div>
<!--
<script>
function hide() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

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

 -->


<span class="text-danger"><center><h4><?php if($something != '0'){echo $something;} ?></h4></center></span>

 
<ol class="breadcrumb">
  <li><a href="<?php echo base_url('dashboard') ?>">Home</a></li> 
  <li class="active">Add Student</li>
</ol>

<div class="container"> 

<form action="<?php echo base_url('marksheet/save_details') ?>" method="POST"  >
          <div class="row">
            <div class="col-md-4 col-sm-12">
            <fieldset>
            
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
            
            
           <!--  <div class="form-group">
              <label for="email"></label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off">
            </div> -->

          </fieldset>  
               </div>   
        
          <!-- /col-md-6 -->
     
          <div class="col-md-4 col-sm-12">          

          <fieldset>
            <div class="form-group">
              <label for="dob">Date of Birth</label>
                <input type="date" min="1990-01-02" max="2020-01-02" class="form-control" id="dob" name="dob" value="<?php echo set_value('dob'); ?>"  placeholder="Date of Birth" required>
            <?php echo form_error('dob'); ?></div>
             <div class="form-group">

              <label for="clas">Class</label>
              <select class="form-control" name="clas" id="clas" style="width:100px;" >
                <option selected disabled>Select</option>
                <?php foreach ($classData as $key => $value) { 
                     if($value['class_id']==1 || $value['class_id']==2 || $value['class_id']==3 || $value['class_id']==4 || $value['class_id']==5 || $value['class_id']==101 || $value['class_id']==102 || $value['class_id']==103 ){


                  ?>
                  <option value="<?php echo $value['class_id'] ?>" <?php echo set_select('clas', $value['class_id'], False); ?> ><?php echo $value['class_name'] ?></option>
                <?php 
                  } 
                }
                // /forwach ?>
              </select>
              <?php echo form_error('clas'); ?>
            </div>
          
                <div class="form-group">
              <label for="cast">Caste</label>
                <input type="text" class="form-control" id="cast" name="cast" value="<?php echo set_value('cast'); ?>" placeholder=" caste"  required>
            <?php echo form_error('cast'); ?></div>
              <div class="form-group">
              <label for="adhar">Adhar Number</label>
                <input type="number" class="form-control" id="adhar" name="adhar" value="<?php echo set_value('adhar'); ?>" placeholder="Adhar Num">
                <?php echo form_error('adhar'); ?>
            </div>
                          
                          <div class="form-group">
              <label for="sssm">SSSMID</label>
                <input type="number" class="form-control" id="sssm" name="sssm" value="<?php echo set_value('sssm'); ?>" placeholder="SSSM Num" required>
                <?php echo form_error('sssm'); ?>
            </div>
            <!-- Hidden field for class 6, 7, 8, 9 -->
                <input type="number" name="temp" value=1 required hidden>

           </fieldset> 
         </div>
                      
           <div class="col-md-4 col-sm-12">
          <div class="form-group">
              <label for="english">English</label>
                <input type="number" max="120" min="0" class="form-control" id="english" name="english" value="<?php echo set_value('english'); ?>" placeholder="Marks in English" required>
                <?php echo form_error('english'); ?>
            </div>
            <div class="form-group">
              <label for="hindi">Hindi</label>
                <input type="number" max="120" min="0" class="form-control" id="hindi" name="hindi" value="<?php echo set_value('hindi'); ?>" placeholder="Marks in Hindi" required>
                <?php echo form_error('hindi'); ?>
            </div>
            <div class="form-group">
              <label for="maths">Maths</label>
                <input type="number" max="120" min="0" class="form-control" id="maths" name="maths" value="<?php echo set_value('maths'); ?>" placeholder="Marks in Maths" required>
                <?php echo form_error('maths'); ?>
            </div>
            <div class="form-group">
              <label for="evs">EVS</label>
                <input type="number" max="120" min="0" class="form-control" id="evs" name="evs" value="<?php echo set_value('evs'); ?>" placeholder="Marks in EVS" required>
                <?php echo form_error('evs'); ?>
            </div>
            <div class="form-group">
              <label for="attendance">Attendance of Student</label>
                <input type="number" max="356" min="0" class="form-control" id="attendance" name="attendance" value="<?php echo set_value('attendance'); ?>" placeholder="Attendance of Student" >
                <?php echo form_error('attendance'); ?>
            </div>
            <!-- <div class="form-group">
              <label for="gk">GK</label>
                <input type="number" max="120" min="0" class="form-control" id="gk" name="gk" value="<?php //echo set_value('gk'); ?>" placeholder="Marks in GK" required>
                <?php //echo form_error('gk'); ?>
            </div>
            <div class="form-group">
              <label for="comp">Computer</label>
                <input type="number" max="120" min="0" class="form-control" id="comp" name="comp" value="<?php //echo set_value('comp'); ?>" placeholder="Marks in Computer" required>
                <?php //echo form_error('comp'); ?>
            </div> -->
              
          </div> 

          </div>
          <!-- /col-md-6 -->
    

          <div class="col-md-12 col-sm-12">

            <br> 
            <center>  
              <button type="submit" class="btn btn-primary" id="butsave">Save Details</button>
             
              <!-- <input  type="reset" id="res" onclick="location.reload();"> -->
              <!-- <button type="button" class="btn btn-default">Reset</button>       -->
            </center>       
          </div>

          </form>
<br> <br> <br> <br>
          <center>
<button class="btn btn-danger" onclick="window.location.href='<?php echo base_url('marksheet/redirect_primary');?>'">RESET</button>
      </center>
      <br> <br>
</div>

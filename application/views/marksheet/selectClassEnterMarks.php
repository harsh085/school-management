<ol class="breadcrumb">
  <li><a href="<?php echo base_url('dashboard') ?>">Home</a></li>
  <li class="active">Enter Marks</li>
</ol>

<div class="container-fluid">
	<center><h3>Session  2022-23</h3></center>
	<br><br>
			<center>
				<form class="form-inline" action="<?php echo base_url('marksheet/enterMarks') ?>" method="POST">
					<div class="form-group mx-sm-3 mb-2">
						<label for="num">Select Class:	</label>
						<select class="form-control" name="clas" style="width:100px;" >
				                <!-- <option selected disabled>Select</option> -->
				                <?php foreach ($classData as $key => $value) { ?>
				                  <option value="<?php echo $value['class_id'] ?>" <?php echo set_select('clas', $value['class_id'], False); ?> ><?php echo $value['class_name'] ?></option>
				                <?php } // /forwach ?>
				              </select>
					</div>
					<br><br>
				 	<button type="submit" class="btn btn-primary mb-2" >Confirm</button>
				</form>
			</center>


</div>
<br><br><br><br>

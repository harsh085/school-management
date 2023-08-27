<ol class="breadcrumb">
  <li><a href="<?php echo base_url('dashboard') ?>">Home</a></li> 
  <li class="active">Add Bulk Students</li>
</ol>

<div class="container-fluid">
<center>
<form class="form-inline" action="" id="form_num" method="POST">
	<div class="form-group mx-sm-3 mb-2"> 
		<label for="num">Enter Number of Students:</label>
		<input class="form-control form-control-sm" type="number" id="num" name="num" value="<?php echo set_value('num'); ?>" placeholder="Enter a Number">
	</div>
	 <button type="submit" class="btn btn-primary mb-2" id="sub_num" name="sub_num">Confirm</button>
</form>
</center>
<br>
<br>


<?php 
if(isset($_REQUEST['sub_num'])){
	$end = $_POST["num"];
	for($i = 1; $i <= $end; $i++) { ?>
		<form>
		<div class="row">
			<div class="panel panel-default">	
			
				<div class="col-md-2 col-sm-12">
					<?php echo "$i."; ?>
					<div class="form-group">
                		<label for="sch<?php echo $i; ?>">Scholar Number</label>
                		<input type="number" class="form-control form-control-sm" id="sch<?php echo $i; ?>" value="<?php echo set_value('<?php echo $i; ?>sch'); ?>" placeholder="Scholar Number" required >
            		</div>
				</div>
				<div class="col-md-2 col-sm-12">
					<div class="form-group">
                		<label for="roll<?php echo $i; ?>">Roll Number</label>
                		<input type="number" class="form-control form-control-sm" id="roll<?php echo $i; ?>" value="<?php echo set_value('<?php echo $i; ?>roll'); ?>" placeholder="Roll Number" required >
            		</div>
				</div>
				<div class="col-md-3 col-sm-12">
					<div class="form-group">
                		<label for="fullname<?php echo $i; ?>">Full Name</label>
                		<input type="text" class="form-control form-control-sm" id="fullname<?php echo $i; ?>" value="<?php echo set_value('<?php echo $i; ?>fullname'); ?>" placeholder="Full Name" required >
            		</div>
				</div>
				<div class="col-md-1 col-sm-12">
					<div class="form-group">

              			<label for="clas<?php echo $i; ?>">Class</label>
              			<select class="form-control form-control-sm"  id="clas<?php echo $i; ?>" style="width:100px;" >
                		<option selected disabled>Select</option>
                		<?php foreach ($classData as $key => $value) { ?>
                  		<option value="<?php echo $value['class_id'] ?>" <?php echo set_select('clas', $value['class_id'], False); ?> ><?php echo $value['class_name'] ?></option>
                		<?php } // /foreach ?>
              			</select>
              
            		</div>
				</div>
				<div class="col-md-2 col-sm-12">
					<div class="form-group">
                		<label for="dob<?php echo $i; ?>">Date of Birth</label>
                		<input type="date" class="form-control form-control-sm" id="dob<?php echo $i; ?>" value="<?php echo set_value('<?php echo $i; ?>dob'); ?>" min="2000-01-01" max="2020-01-01" placeholder="Date of Birth" required >
            		</div>
				</div>
				<div class="col-md-2 col-sm-12">
					<div class="form-group">
                		<label for="contact<?php echo $i; ?>">Contact Number</label>
                		<input type="number" class="form-control form-control-sm" id="contact<?php echo $i; ?>" value="<?php echo set_value('<?php echo $i; ?>contact'); ?>" placeholder="Contact" required >
            		</div>
				</div>
				

			</div>
			<!-- /col-md-4 -->

			
			<!-- /col-md-8 -->
		</div>
		</form>
		<br>
<?php } ?>

<center>
<div id="output"></div>
	 <button class="btn btn-success mb-2" id="submit" name="submit">Submit</button>
</center>
<?php
} ?>

		<br>

</div>

<script>
$(document).ready(function() {
	$('#sub_num').on('click', function() {

		// var myForm = $(" ");   
		// if (myForm) {   
		// $(this).prop('disabled', true);   
		// $(myForm).submit();   
		// }   
	});
	
	$('#submit').on('click', function() {
		// $("#submit").attr("disabled", "disabled");
		var e = $('#num').val();
		// alert(e);
		var sl =[];
		var rl = [];
		var nm = [];
		var cls = [];
		var ph = [];
		var db = [];
		for (var i = 1; i <= e; i++) {
		
		var sch = $('#sch'+i).val();
		if(sch==""){
			break;
		}
		sl.push(sch);
		var roll = $('#roll'+i).val();
		rl.push(roll);
		var name = $('#fullname'+i).val();
		nm.push(name);

		var clas = $('#clas'+i).val();
		cls.push(clas);
		// alert(clas);
		var phone = $('#contact'+i).val();
		ph.push(phone);
		var dob = $('#dob'+i).val();
		db.push(dob);
	}
		// console.log(rl+nm+cls+ph+db);

		if(nm.length && rl.length && ph.length && cls.length && db.length &&sl.length){
			$.ajax({
				url: "<?php echo base_url('dashboard/add_b_std') ?>",
				type: "POST",
				data: {
					sch : sl,
					name: nm,
					roll: rl,
					phone: ph,
					clas: cls,
					dob: db				
				},
				cache: false,
				success: function(msg) {
					
        			$('#output').html(msg);
        		}
				// success: function(dataResult){
				// 	var dataResult = JSON.parse(dataResult);
				// 	if(dataResult.statusCode==200){
				// 		$("#butsave").removeAttr("disabled");
				// 		$('#fupForm').find('input:text').val('');
				// 		$("#success").show();
				// 		$('#success').html('Data added successfully !'); 						
				// 	}
					// else if(dataResult.statusCode==201){
					//    alert("Error occured !");
					// }
			});
		}
		else{
			alert('Please fill all the field !');
		}

	});
});
</script>
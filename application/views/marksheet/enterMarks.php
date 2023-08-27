<ol class="breadcrumb">
  <li><a href="<?php echo base_url('marksheet/SelectClassEnterMarks') ?>">Class</a></li>
  <li class="active">Enter Marks</li>
</ol>
<div class="container-fluid">
<center><h3>Class - <?php echo $clas->class_name; ?> </h3></center>
<br>
	<div class="row">
		<div class="col-md-1 col-sm-12">
		</div>
	 	<div class="col-md-10 col-sm-12">
      <!-- <input class="form-control" id="myInput" type="text" placeholder="Search.."> -->
			<table class="table table-striped " >
				<tr>
					<th>
						Sr.
					</th>
					<th>
						Student Name
					</th>

					<th>
						Hindi
					</th>
					<th>
						English
					</th>
					<th>
						Maths
					</th>
	<?php if($clas->class_id > 5 && $clas->class_id < 10){ ?>
					<th>
						SST
					</th>
					<th>
						Science
					</th>
					<th>
						Sanskrit
					</th>
	<?php } else{ ?>
					<th>
						EVS
					</th>
	<?php } ?>
					<th>
						Attendance
					</th>
				</tr>
	<?php
	$temp = 0;
	if($classData){
			foreach ($classData as $key => $value) {
	?>


				<tr>
					<td>
						<?php $temp++; echo $temp;
						 ?>.
						 <input type="hidden" id="sch<?php echo $temp;?>" value="<?php echo $value['schNo'];?>">
					</td>
					<td style="text-transform: uppercase;font-weight: bold;">
						<?php echo $value['fullName']; ?>
					</td>
					<td>
						<input maxlength="2" size="2" id="hin<?php echo $temp;?>" value="<?php echo $value['hin']; ?>" >
					</td>
					<td>
						<input maxlength="2" size="2" id="eng<?php echo $temp;?>" value="<?php echo $value['eng']; ?>" >
					</td>
					<td>
						<input maxlength="2" size="2" id="maths<?php echo $temp;?>" value="<?php echo $value['maths']; ?>" >
					</td>
	<?php if($clas->class_id > 5 && $clas->class_id < 10){ ?>
					<td>
						<input maxlength="2" size="2" id="scie<?php echo $temp;?>" value="<?php echo $value['scie']; ?>" >
					</td>
					<td>
						<input maxlength="2" size="2" id="sst<?php echo $temp;?>" value="<?php echo $value['sst']; ?>" >
					</td>
					<td>
						<input maxlength="2" size="2" id="sansk<?php echo $temp;?>" value="<?php echo $value['sansk']; ?>" >
					</td>
	<?php } else{ ?>
					<td>
						<input maxlength="2" size="2" id="evs<?php echo $temp;?>" value="<?php echo $value['evs']; ?>" >
					</td>
	<?php } ?>
					<td style="background-color: #bbff33;">
						<input maxlength="3" size="3" id="attd<?php echo $temp;?>" value="<?php echo $value['attd']; ?>" >
					</td>



				</tr>

	<?php
			}
	}  ?>
			</table>
		</div>
		<div class="col-md-1 col-sm-12">

		</div>
	</div>
<input type="hidden" id="num" value="<?php echo $temp;?>">
<input type="hidden" id="cls" value="<?php echo $clas->class_id;?>">
</div>
<center>
<div id="output"></div>
	 <button class="btn btn-success mb-2" id="submit" >Submit</button>
</center>
<br>
<script>
    
	$(document).ready(function() {
		$('#submit').on('click', function() {
		// $("#submit").attr("disabled", "disabled");
			var e = $('#num').val();
			var cls = $('#cls').val();
			// alert(e);
			var sch =[];
			var hin = [];
			var eng = [];
			var mat = [];
			var sc = [];
			var sst = [];
			var sans = [];
			var evs = [];
			var attd= [];

			for (var i = 1; i <= e; i++) {
				sch.push($('#sch'+i).val());
				hin.push($('#hin'+i).val());
				eng.push($('#eng'+i).val());
				mat.push($('#maths'+i).val());
				sc.push($('#scie'+i).val());
				sst.push($('#sst'+i).val());
				sans.push($('#sansk'+i).val());
				evs.push($('#evs'+i).val());
				attd.push($('#attd'+i).val());

			}
		// console.log(rl+nm+cls+ph+db);

			if(sch.length){
				$.ajax({
					url: "<?php echo base_url('marksheet/submitBulkMarks') ?>",
					type: "POST",
					data: {
						schNo : sch,
						hi: hin,
						en: eng,
						ma: mat,
						sstt: sst,
						scie: sc,
						san: sans,
						ev: evs,
						at : attd,
						clas : cls
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
			// alert(eng);

		});
	});
</script>
<br>

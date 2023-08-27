
<ol class="breadcrumb">
  <li><a href="<?php echo base_url('dashboard') ?>">Home</a></li> 
  <li class="active">Manage Students</li>
</ol>

<div class="container">
<div class="row">
	<div class="col-md-2 col-sm-12">
		<div class="panel panel-default">

			<div class="panel-heading">
				Select Class
			</div>


			<div class="list-group" id="list">	
			  <?php 
			  		if($classData){

			  		foreach ($classData as $key => $value) { ?>

			                  		<a onclick="getStudent(this)" onmouseout="this.classList.remove('active')" class="list-group-item list-group-item-action" value="<?php echo $value['class_id']; ?>"><?php echo $value['class_name']; ?> </a>
			    <?php 
				}
			    } // /foreach ?>
			</div>




		<!-- 	<div class="list-group">			
				<?php /*
				if($classData) {
					$x = 1;
					foreach ($classData as $value) { 
					?>
						<a class="list-group-item classSideBar <?php if($x == 1) { echo 'active'; } ?>" onclick="getClassSection(<?php echo $value['class_id'] ?>)" id="classId<?php echo $value['class_id'] ?>">
				    		<?php echo $value['class_name']; ?>(<?php echo $value['class_id']; ?>)
					  	</a>	
					<?php 
					$x++;
					}
				} 
				else {
					?>
					<a class="list-group-item">No Data</a>
					<?php
				}		*/
				?>
			</div> -->

		</div>		
	</div>
	<!-- /col-md-4 -->

	<div class="col-md-10 col-sm-12">
		<div class="panel panel-default">
		  <!-- Default panel contents -->
		  <div class="panel-heading">Manage Students</div>
		  <div class="panel-body">		  
		  	<div id="result"></div>
		  </div>			  
		</div>
	</div>
	<!-- /col-md-8 -->
</div>
</div>

<script>
	function getStudent(val){
		val.classList.add('active');
		// val.classList.remove('active'); 	
  		// document.getElementById("result").focus();
  		document.getElementById("result").scrollIntoView();// focus on click

		var x = val.getAttribute('value');
  		// console.log(x);
  		$.ajax({
				url: "<?php echo base_url('dashboard/showStudentTable') ?>",
				type: "POST",
				data: {
					clas: x	
				},
				cache: false,
				success: function(msg) {
        			$('#result').html(msg);
        		}
			});
	}

	
</script>
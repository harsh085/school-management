<ol class="breadcrumb">
  <li><a href="<?php echo base_url('dashboard') ?>">Home</a></li> 
  <li class="active">Manage Subject</li>
</ol>

<div class="container">
<div class="row">
	<div class="col-md-4 col-sm-12">
		<div class="panel panel-default">

			<div class="panel-heading">
				Class
			</div>


			<div class="list-group" id="list">	
			  <?php 
			  		if($classData){

			  		foreach ($classData as $key => $value) { ?>

			                  		<a onclick="getStudent(this)" onmouseout="this.classList.remove('active')" class="list-group-item list-group-item-action" value="<?php echo $value['class_id']; ?>"><?php echo $value['class_name']; ?>  ( <?php echo $value['class_id']; ?> )</a>
			    <?php 
				}
			    } // /foreach ?>
			</div>



		</div>			
	</div>
	<!-- /col-md-4 -->

	
	<div class="col-md-10 col-sm-12">
		<div class="panel panel-default">
		  <!-- Default panel contents -->
		  <div class="panel-heading">Manage Subjects</div>
		  <div class="panel-body">		  
		  	<div id="result"></div>
		  </div>			  
		</div>
	</div>
	<!-- /col-md-8 -->
</div></div>


<script>
	function getStudent(val){
		val.classList.add('active');
		// val.classList.remove('active'); 	
  		// document.getElementById("result").focus();
  		document.getElementById("result").scrollIntoView();

		var x = val.getAttribute('value');
  		// console.log(x);
  		$.ajax({
				url: "<?php echo base_url('dashboard/showSubjectTable') ?>",
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

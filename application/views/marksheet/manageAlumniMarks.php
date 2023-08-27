
<ol class="breadcrumb">
  <li><a href="<?php echo base_url('dashboard') ?>">Home</a></li>
  <li class="active">Manage Alumni Marksheet</li>
</ol>

<div class="container">
<div class="row">
  <div class="col-md-1">
  </div>
	<div class="col-md-10 col-sm-12">
		<div class="panel panel-default">
		  <!-- Default panel contents -->
		  <div class="panel-heading">Manage Alumni Marksheet</div>
		  <div class="panel-body">
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
        <br>
        <table id="myTable" class="table table-striped table-bordered table-sm"  >


          <tr>
            <th>
              Sr.
            </th>
            <th>
              Student Name (Scholar No.)
            </th>

            <th>
              Father Name
            </th>
            <th>
              Action
            </th>
            <th>
              Action
            </th>
          </tr>
          <?php
          $temp = 1;
          if($classData){
            // print_r($classData);
              foreach ($classData as $key => $value) {
          ?>


                           <tr>
                          <td> <?php echo $temp;
                              $temp++; ?>.</td>
                            <td style=" text-transform: uppercase;">
                              <?php echo $value['fullName']." ( ".$value['schNo']." ) "; ?>
                            </td>
                            <td style=" text-transform: uppercase;">
                              <?php echo $value['fname']; ?>
                            </td>
                            <td>
                              <form action="<?php echo base_url('marksheet/viewMarksheet') ?>" method="post">
                                <input type="hidden" name="sch" value="<?php echo $value['schNo'];?>">
                                <button class="btn btn-success" id="edit<?php echo $value['schNo'];?>" type="submit" ><b>View</b></button>
                              </form><br>
                              <?php if($this->session->userdata('level') == '1'){ ?>
                              <button value="<?php echo $value['schNo'];?>" onclick="deleteStudent(this)" class="btn btn-danger">Delete</button> <?php } ?>

                            </td>
                            <td>
                            <?php if($this->session->userdata('level') == '1' || $this->session->userdata('level') == '2'){ //for mgmt and admin level
              								?>
              							<button value="<?php echo $value['schNo'];?>" onclick="enableStudent(this)" class="btn btn-primary">Enable</button> <?php } ?>
                            </td>

                          </tr>

          <?php
              }
          }  ?>

          </table>

  			                  		<!-- <a onclick="getStudent(this)" onmouseout="this.classList.remove('active')" class="list-group-item list-group-item-action" value="<?php echo $value['class_id']; ?>"><?php echo $value['class_name']; ?> </a> -->


		  </div>
		</div>
	</div>
  <div class="col-md-1">
  </div>
	<!-- /col-md-8 -->
</div>
</div>

<script>
// function printDiv() {
//             var printContents = document.getElementById("printDiv").innerHTML;
//             var originalContents = document.body.innerHTML;
//             document.body.innerHTML = printContents;
//             window.print();
//             document.body.innerHTML = originalContents;
//         }

$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

function enableStudent(val){
  val.setAttribute("disabled", false);

  // document.getElementById('marksheet'+val.value).setAttribute("disabled", false);
  // alert(val.value);
  // document.getElementById('edit'+val.value).setAttribute("disabled", false);

  var x = val.getAttribute('value');
  if(confirm("Do you want to add this student again.")){
    $.ajax({
      url: "<?php echo base_url('marksheet/enableStudent') ?>",
      type: "POST",
      data: {
        roll: x
      },
      cache: false,
      success: function(msg) {
            alert(msg);
          }
    });
  }
  else{
    val.removeAttribute("disabled");
  }

}

</script>

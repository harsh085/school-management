<ol class="breadcrumb">
  <li><a href="<?php echo base_url('dashboard') ?>">Home</a></li> 
  <li class="active">Manage Class</li>
</ol>


<div class="container">
<div class="panel panel-primary" style="">
  <div class="panel-heading" style="background-color:#B3CC58; color:Black;">
    Manage Class
  </div>
  <div class="panel-body" >  	    
      <div id="messages"></div>

    	<div class="pull pull-right">
    		<button type="button" class="btn btn-info" data-toggle="modal" data-target="#addClass" id="addClassModelBtn" style="background-color:#B3CC58; color:Black;"> 
    			<i class="glyphicon glyphicon-plus-sign"></i> Add Class
    		</button>
    	</div>

      <br>
    	<br>
    	
    	<table id="manageClassTable" class="table table-bordered" >
    		<thead class="bg-primary">
    			
        <tr style="background-color:#B3CC58; color:Black;">
    				<th>Class ID</th>
    				<th>Class Name</th>
    				
    		
    			</tr>
    		</thead>
        <?php 
        foreach ($classData as $key => $value) { 
          
          ?>
                  
                  <tr>
                    <td>
                    <?php echo $value['class_id'] ?>
                    </td>
                    <td>
                      <?php echo $value['class_name'] ?>
                    </td>
                 
                  </tr>
                <?php 
           
                } // /forwach ?>
    	</table>	
    
  </div>
</div>

<!-- add class -->

<div class="modal fade" tabindex="-1" role="dialog" id="addClass">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Class</h4>
      </div>

      <form class="form-horizontal" method="post" id="createClassForm" action="">

      <div class="modal-body">
      
      <div id="add-class-messages"></div>

		  <div class="form-group">
		    <label for="className" class="col-sm-4 control-label">Class Name : </label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" id="className" name="className" placeholder="Class Name" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="numericName" class="col-sm-4 control-label">Numeric Name : </label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" id="numericName" name="numericName" placeholder="Numeric Name" required>
		    </div>
		  </div>		  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<!-- edit class 
<div class="modal fade" tabindex="-1" role="dialog" id="editClassModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Class</h4>
      </div>

      <form class="form-horizontal" method="post" id="editClassForm" action="<?php //echo base_url() . 'classes/update'; ?>">

      <div class="modal-body">
      
      <div id="edit-class-messages"></div>

      <div class="form-group">
        <label for="editClassName" class="col-sm-4 control-label">Class Name : </label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="editClassName" name="editClassName" placeholder="Class Name">
        </div>
      </div>
      <div class="form-group">
        <label for="editNumericName" class="col-sm-4 control-label">Numeric Name : </label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="editNumericName" name="editNumericName" placeholder="Numeric Name">
        </div>
      </div>      
      </div>
      <div class="modal-footer edit-class-modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div> 


<div class="modal fade" tabindex="-1" role="dialog" id="removeClassModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Remove Class</h4>
      </div>
      
      <div class="modal-body">
        <div id="remove-messages"></div>
        <p> Do you really want to remove</p>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="removeClassBtn">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div> -->

<!-- <a href="sms://+14035550185?body=I%27m%20interested%20in%20your%20product.%20Please%20contact%20me.">Send a SMS message</a><a href="#" id="abc">jhg</a>
<a href="#" id="myLink">jhhghj</a>

<script type="text/javascript">
  document.getElementById("myLink").onclick = function() {
    document.getElementById("abc").href="xyz.php"; 
    return false;
  };
</script> -->

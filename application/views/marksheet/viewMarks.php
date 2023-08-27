
<ol class="breadcrumb">
  <li><a href="<?php echo base_url('marksheet/manageMarksheet') ?>">List</a></li>
  <li class="active">Marksheet</li>
</ol>

<div class="container">
    <center><h3>Student's Info</h3></center>
    <form action="<?php echo base_url('marksheet/update_std') ?>" method="POST"  >
          <div class="row">
          	<div class="col-md-6 col-sm-12">
          	<fieldset>

              <div class="form-group">
                Student Name
              <b>  <input type="text" class="form-control"  name="fullname" id="fullname" value="<?php echo strtoupper($info->fullName);  ?>" placeholder="Full Name" required disabled></b>
              <?php echo form_error('fullname'); ?></div>

              <div class="form-group">
                Father Name
              <b>    <input type="text" class="form-control" name="fname" id="fname" value="<?php echo $info->Fname; ?>" placeholder="Father's Name" required disabled></b>
              <?php echo form_error('fname'); ?></div>

              <div class="form-group">
                Mother Name
                <b>  <input type="text" class="form-control" name="mname" id="mname" value="<?php echo $info->Mname; ?>" placeholder="Mother's Name"  required disabled></b>
              <?php echo form_error('mname'); ?></div>

              <div class="form-group">
              Scholar Number
                <b><input type="number" class="form-control" name="sch" value="<?php echo $info->schNo; ?>" placeholder="Scholar Num" required readonly ></b>
                <?php echo form_error('sch'); ?>
              </div>

          </fieldset>
               </div>
 		            <div class="col-md-6 col-sm-12">
          <fieldset>

            <div class="form-group">
              Date of Birth
              <b><input type="date" min="1990-01-02" max="2025-01-02" class="form-control" name="dob" id="dob" value="<?php echo $info->dob; ?>"  placeholder="Date of Birth" required disabled> </b>
            <?php echo form_error('dob'); ?></div>

            <div class="form-group">
              Caste
                <b><input type="text" class="form-control"  name="caste" id="caste" value="<?php echo $info->caste;  ?>" placeholder="Caste" autocomplete="off" required disabled></b>
            <?php echo form_error('cast'); ?></div>

            <div class="form-group">
            Adhar Number
                <b><input type="number" class="form-control" name="adhar" id="adhar" value="<?php echo $info->adhar;  ?>" placeholder="Adhar Num" required disabled> </b>
                <?php echo form_error('adhar'); ?></div>

            <div class="form-group">
              SSMID
              <b>  <input type="number" class="form-control"  name="sssm" id="sssm" value="<?php echo $info->sssmid ; ?>" placeholder="SSSM Num" required disabled> </b>
                <?php echo form_error('sssm'); ?>
            </div>
          </fieldset>
          </div>
          </div>
          <div class="col-md-12 col-sm-12">
            <br>
            <center>
              <b><input type="button" class="btn btn-primary" onclick="enableEdit()" id="edit" value="EDIT" ></b> &ensp;
              <button type="submit" class="btn btn-success" id="buttonsave" style="display:none;">  <b>SAVE CHANGES</b></button>
            </center>
          </div>
        </form>
       <br>
</div>

<div class="container-fluid">
    <div class="row">
    <div class="col-md-1 col-sm-12">

    </div>
    <div class="col-md-10 col-sm-12">

      <!-- Marksheet History table -->
      <br><br>
      <input type="button" class="btn btn-danger" onclick="hide()" value="Marksheet Downloading History"/>
      <div id="myDIV" style="display: block;">
        <table class="table table-striped table-bordered" style="background-color:#d8ff8f; ">
          <tr>
            <th>
              DateTime
            </th>
            <th>
              Session/Year
            </th>
            <th>
              Download Count
            </th>
            <th>
              Downloaded by
            </th>
          </tr>
          <?php if($logs){ foreach ($logs as $row) { ?>
            <tr>
              <td>
                <?php echo $row->time; ?>
              </td>
              <td>
                <?php echo $row->session; ?>
              </td>
              <td>
                <?php echo $row->count; ?>
              </td>
              <td>
                <?php echo $row->emplName; ?>
              </td>
            </tr>

          <? }} ?>

        </table>
      </div>
      <br><br>
      <!--  -->
      <!-- Session 2022-23 start  -->
    <div style="border:solid black;">
      <?php if(empty($marks23)){ ?>
      <center> <h3><b>Marksheet Not Available for Session 2022-23</b></h3>
        <form style="display: inline;" action="<?php echo base_url('marksheet/addOldMarks') ?>" target="_blank" method="post">
          <input type="hidden" name="sch" value="<?php echo $info->schNo;?>23">
          <button class="btn btn-success" type="submit" ><b>Add Marksheet for Session 2022-23</b></button>
        </form></center>
      <?php }else{  ?>
        <center>
          <h3><b> Class: <?php echo strtoupper($marks23->class_name); ?></b>&nbsp;(Session 2022-23)</h3>
          <form style="display: inline;" action="<?php echo base_url('marksheet/createMarksheet') ?>" target="_blank" method="post">
            <input type="hidden" name="sch" value="<?php echo $info->schNo;?>23">
            <button class="btn btn-danger" id="createMark23" type="submit" ><b>Create Marksheet</b></button>
            </form>
            <div id="alert23"></div>
            &nbsp;&nbsp;&nbsp;
            <!-- <span>
              <?php //if($marks23->class_id < 10 and $marks23->class_id > 5){  ?>
                <button onclick="setSession('2022-23','<?php //echo strtoupper($marks23->class_id); ?>')" type="button" class="btn btn-primary" data-toggle="modal" data-target="#editSecondary"><i class="glyphicon glyphicon-plus-sign"></i> Edit </button>
              <?php //}else{?>
                <button onclick="setSession('2022-23','<?php //echo strtoupper($marks23->class_id); ?>')" type="button" class="btn btn-primary" data-toggle="modal" data-target="#editPrimary"><i class="glyphicon glyphicon-plus-sign"></i> Edit </button>
              <?php //} ?>
              </span> -->
          </center>
          <table class="table table-striped table-bordered" >
            <tr>
             <th>English</th> <th>Maths</th> <th>Hindi</th>
                <?php if($marks23->class_id < 10 and $marks23->class_id > 5){  ?>
              <th>SST</th><th>Science</th><th>Sanskrit</th>
                <?php }else{?>
              <th>EVS</th>
                <?php }?>
            </tr>
            <tr>
            <td >
                <input maxlength="3" size="3" id="eng23" value="<?php echo strtoupper($marks23->eng); ?>" disabled>
            </td>

            <td >
                <input maxlength="3" size="3" id="maths23" value="<?php echo strtoupper($marks23->maths); ?>" disabled>
            </td>
            <td >
                <input maxlength="3" size="3" id="hin23" value="<?php echo strtoupper($marks23->hin); ?>" disabled>
            </td>
              <?php if($marks23->class_id < 10 and $marks23->class_id > 5){  ?>
            <td>
                <input maxlength="3" size="3" id="sst23" value="<?php echo strtoupper($marks23->sst); ?>" disabled>
            </td>
            <td>
                <input maxlength="3" size="3" id="scie23" value="<?php echo strtoupper($marks23->scie); ?>" disabled>
            </td>
            <td>
                <input maxlength="3" size="3" id="sansk23" value="<?php echo strtoupper($marks23->sansk); ?>" disabled>
            </td>
              <?php }else{?>
            <td>
                <input maxlength="3" size="3" id="evs23" value="<?php echo strtoupper($marks23->evs); ?>" disabled>
            </td>
        <?php }?>
            </tr>

        </table>
      <?php } ?>
    </div>
      <!-- Session 2022-23 end -->
        <br><br>
        <!-- 2021-22 session start  -->
              <div style="border:solid black;">
                <?php if(empty($marks22)){ ?>
                <center> <h3><b>Marksheet Not Available for Session 2021-22</b></h3>
                 <form style="display: inline;" action="<?php echo base_url('marksheet/addOldMarks') ?>" target="_blank" method="post">
                   <input type="hidden" name="sch" value="<?php echo $info->schNo;?>22">
                   <button class="btn btn-success" type="submit" ><b>Add Marksheet for Session 2021-22</b></button>
                 </form></center>
                <?php  }else{   ?>
                <center>
                  <h3><b> Class: <?php echo strtoupper($marks22->class_name); ?></b>&nbsp;(Session 2021-22)</h3>
                  <form style="display: inline;" action="<?php echo base_url('marksheet/createMarksheet') ?>" target="_blank" method="post">
                    <input type="hidden" name="sch" value="<?php echo $info->schNo;?>22">
                    <button class="btn btn-danger" id="createMark22" type="submit" ><b>Create Marksheet</b></button>
                    </form>
                    <div id="alert22"></div>
                    &nbsp;&nbsp;&nbsp;
                    <!-- <span>
                      <?php //if($marks22->class_id < 10 and $marks22->class_id > 5){  ?>
                        <button onclick="setSession('2021-22','<?php// echo strtoupper($marks22->class_id); ?>')" type="button" class="btn btn-primary" data-toggle="modal" data-target="#editSecondary"><i class="glyphicon glyphicon-plus-sign"></i> Edit </button>
                      <?php //}else{?>
                        <button onclick="setSession('2021-22','<?php //echo strtoupper($marks22->class_id); ?>')" type="button" class="btn btn-primary" data-toggle="modal" data-target="#editPrimary"><i class="glyphicon glyphicon-plus-sign"></i> Edit </button>
                      <?php //} ?>
                      </span> -->
                  </center>
                  <table class="table table-striped table-bordered" >
                    <tr>
                     <th>English</th> <th>Maths</th> <th>Hindi</th>
                        <?php if($marks22->class_id < 10 and $marks22->class_id > 5){  ?>
                      <th>SST</th><th>Science</th><th>Sanskrit</th>
                        <?php }else{?>
                      <th>EVS</th>
                        <?php }?>
                    </tr>
                    <tr>
                    <td >
                        <input maxlength="3" size="3" id="eng22" value="<?php echo strtoupper($marks22->eng); ?>" disabled>
                    </td>

                    <td >
                        <input maxlength="3" size="3" id="maths22" value="<?php echo strtoupper($marks22->maths); ?>" disabled>
                    </td>
                    <td >
                        <input maxlength="3" size="3" id="hin22" value="<?php echo strtoupper($marks22->hin); ?>" disabled>
                    </td>
                      <?php if($marks22->class_id < 10 and $marks22->class_id > 5){  ?>
                    <td>
                        <input maxlength="3" size="3" id="sst22" value="<?php echo strtoupper($marks22->sst); ?>" disabled>
                    </td>
                    <td>
                        <input maxlength="3" size="3" id="scie22" value="<?php echo strtoupper($marks22->scie); ?>" disabled>
                    </td>
                    <td>
                        <input maxlength="3" size="3" id="sansk22" value="<?php echo strtoupper($marks22->sansk); ?>" disabled>
                    </td>
                      <?php }else{?>
                    <td>
                        <input maxlength="3" size="3" id="evs22" value="<?php echo strtoupper($marks22->evs); ?>" disabled>
                    </td>
                <?php }?>
                    </tr>

                </table>
              <?php } ?>
              </div>
              <!-- 2021-22 session end -->
        <br>
        <br>
        <!-- 2020-21 session start  -->
              <div style="border:solid black;">
                <?php if(empty($marks21)){ ?>
                 <center><h3><b>Marksheet Not Available for Session 2020-21</b></h3>
                 <form style="display: inline;" action="<?php echo base_url('marksheet/addOldMarks') ?>" target="_blank" method="post">
                   <input type="hidden" name="sch" value="<?php echo $info->schNo;?>21">
                   <button class="btn btn-success" type="submit" ><b>Add Marksheet for Session 2020-21</b></button>
                 </form></center>

                <?php  }else{   ?>

                <center>
                  <h3><b> Class: <?php echo strtoupper($marks21->class_name); ?></b>&nbsp;(Session 2020-21)</h3>
                  <form style="display: inline;" action="<?php echo base_url('marksheet/createMarksheet') ?>" target="_blank" method="post">
                    <input type="hidden" name="sch" value="<?php echo $info->schNo;?>21">
                    <button class="btn btn-danger" id="createMark23" type="submit" ><b>Create Marksheet</b></button>
                    </form>
                    <div id="alert21"></div>
                    &nbsp;&nbsp;&nbsp;
                     <span>
                      <?php if($marks21->class_id < 10 and $marks21->class_id > 5){  ?>
                        <button onclick="setSession('2020-21','<?php //echo strtoupper($marks21->class_id); ?>')" type="button" class="btn btn-primary" data-toggle="modal" data-target="#editSecondary"><i class="glyphicon glyphicon-plus-sign"></i> Edit </button>
                      <?php }else{?>
                        <button onclick="setSession('2020-21','<?php //echo strtoupper($marks21->class_id); ?>')" type="button" class="btn btn-primary" data-toggle="modal" data-target="#editPrimary"><i class="glyphicon glyphicon-plus-sign"></i> Edit </button>
                      <?php } ?>
                      </span>
                      </center>
                  <table class="table table-striped table-bordered" >
                    <tr>
                     <th>English</th> <th>Maths</th> <th>Hindi</th>
                        <?php if($marks21->class_id < 10 and $marks21->class_id > 5){  ?>
                      <th>SST</th><th>Science</th><th>Sanskrit</th>
                        <?php }else{?>
                      <th>EVS</th>
                        <?php }?>
                    </tr>
                    <tr>
                    <td>
                        <input maxlength="3" size="3" id="eng21" value="<?php echo strtoupper($marks21->eng); ?>" disabled>
                    </td>

                    <td >
                        <input maxlength="3" size="3" id="maths21" value="<?php echo strtoupper($marks21->maths); ?>" disabled>
                    </td>
                    <td >
                        <input maxlength="3" size="3" id="hin21" value="<?php echo strtoupper($marks21->hin); ?>" disabled>
                    </td>
                      <?php if($marks21->class_id < 10 and $marks21->class_id > 5){  ?>
                    <td>
                        <input maxlength="3" size="3" id="sst21" value="<?php echo strtoupper($marks21->sst); ?>" disabled>
                    </td>
                    <td>
                        <input maxlength="3" size="3" id="scie21" value="<?php echo strtoupper($marks21->scie); ?>" disabled>
                    </td>
                    <td>
                        <input maxlength="3" size="3" id="sansk21" value="<?php echo strtoupper($marks21->sansk); ?>" disabled>
                    </td>
                      <?php }else{?>
                    <td>
                        <input maxlength="3" size="3" id="evs21" value="<?php echo strtoupper($marks21->evs); ?>" disabled>
                    </td>
                <?php }?>
                    </tr>

                </table>
                <?php } ?>
              </div>
              <!-- 2020-21 session end -->
        <br>
      </div>
      <div class="col-md-1 col-sm-12">
      </div>
    </div>

    <!-- Edit marks MODALs .. primary-->

  <div class="modal fade" tabindex="-1" role="dialog" id="editPrimary">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add /Edit Marks(Primary)</h4>
      </div>

      <form class="form-horizontal" method="post" target="_blank" action="<?php echo base_url('marksheet/editMarksMarksheet') ?>">

      <div class="modal-body">

        <div class="form-group">
          <label class="col-sm-4 control-label">SESSION : </label>
          <div class="col-sm-6  ">
            <input name="sess" id="primSess" disabled>
          </div>
        </div>
            <input name="schNo" value="<?php echo $info->schNo;?>" disabled >
            <!-- type="hidden"> -->



        <div class="form-group">
          <label class="col-sm-4 control-label">Class : </label>
          <div class="col-sm-6  ">
            <!-- <input type="number" class="form-control" id="primClas" name="cls" disabled required> -->
            <select class="form-control" name="clas" id="clas" style="width:100px;" >
              <option disabled selected>Select</option>
              <?php foreach ($classData as $key => $value) { ?>
                <option value="<?php echo $value['class_id']; ?>" > <?php echo $value['class_name'] ?></option>
              <?php } // /forwach ?>
            </select>
          </div>
        </div>
      <div class="form-group">
        <label class="col-sm-4 control-label">English : </label>
        <div class="col-sm-6  ">
          <input type="number" class="form-control" name="eng" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-4 control-label">Maths : </label>
        <div class="col-sm-6  ">
          <input type="number" class="form-control" name="maths" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-4 control-label">Hindi : </label>
        <div class="col-sm-6  ">
          <input type="number" class="form-control" name="hin" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-4 control-label">EVS : </label>
        <div class="col-sm-6  ">
          <input type="number" class="form-control" name="evs" required>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <input type="button" class="btn btn-default" value="Close" onClick="window.location.reload(true)">

        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

  <!-- Edit marks MODALs .. secondary-->

  <div class="modal fade" tabindex="-1" role="dialog" id="editSecondary">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add /Edit Marks(Secondary)</h4>
      </div>

      <form class="form-horizontal" method="post" target="_blank" action="<?php echo base_url('marksheet/editMarksMarksheet') ?>">

      <div class="modal-body">

        <div class="form-group">
          <label class="col-sm-4 control-label">SESSION : </label>
          <div class="col-sm-6  ">
            <input name="sess" id="secSess" disabled>
          </div>
        </div>
            <input name="schNo" value="<?php echo $info->schNo;?>" disabled type="hidden">

        <div class="form-group">
          <label class="col-sm-4 control-label">Class : </label>
          <div class="col-sm-6  ">
            <select class="form-control" name="clas" id="clas" style="width:100px;" >
              <option disabled selected>Select</option>
              <?php foreach ($classData as $key => $value) { ?>
                <option value="<?php echo $value['class_id']; ?>" > <?php echo $value['class_name'] ?></option>
              <?php } // /forwach ?>
            </select>
            <!-- <input type="number" class="form-control" id="secClas" name="cls" disabled required> -->
          </div>
        </div>
      <div class="form-group">
        <label class="col-sm-4 control-label">English : </label>
        <div class="col-sm-6  ">
          <input type="number" class="form-control" name="eng" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-4 control-label">Maths : </label>
        <div class="col-sm-6  ">
          <input type="number" class="form-control" name="maths" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-4 control-label">Hindi : </label>
        <div class="col-sm-6  ">
          <input type="number" class="form-control" name="hin" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-4 control-label">SST : </label>
        <div class="col-sm-6  ">
          <input type="number" class="form-control" name="sst" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-4 control-label">Science : </label>
        <div class="col-sm-6  ">
          <input type="number" class="form-control" name="scie" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-4 control-label">Sanskrit : </label>
        <div class="col-sm-6  ">
          <input type="number" class="form-control" name="sans" required>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <input type="button" class="btn btn-default" value="Close" onClick="window.location.reload(true)">

        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


</div>

<br>


<script>

function checkValue(id){
return(parseInt(document.getElementById(id).value)<51 || parseInt(document.getElementById(id).value)>120);
}
function enableEdit(){
    document.getElementById("fullname").removeAttribute("disabled");
    document.getElementById("mname").removeAttribute("disabled");
    document.getElementById("fname").removeAttribute("disabled");
    document.getElementById("dob").removeAttribute("disabled");
    document.getElementById("caste").removeAttribute("disabled");
    document.getElementById("sssm").removeAttribute("disabled");
    document.getElementById("adhar").removeAttribute("disabled");
    document.getElementById("edit").style.display = "none";
    document.getElementById("buttonsave").style.display = "block";
}

function checkmarks(){
  if(document.getElementById("eng23")){
    if(checkValue("eng23") || checkValue("maths23") || checkValue("hin23")){
      document.getElementById("createMark23").disabled=true;
      document.getElementById("alert23").style.color="red";
      document.getElementById("alert23").innerText="Marks should be between 51 and 120."
 }}
 if(document.getElementById("eng22")){
   if(checkValue("eng22") || checkValue("maths22") || checkValue("hin22")){
     document.getElementById("createMark22").disabled=true;
     document.getElementById("alert22").style.color="red";
     document.getElementById("alert22").innerText="Marks should be between 51 and 120."
 }}
 if(document.getElementById("eng21")){
   if(checkValue("eng21") || checkValue("maths21") || checkValue("hin21")){
     document.getElementById("createMark21").disabled=true;
     document.getElementById("alert21").style.color="red";
     document.getElementById("alert21").innerText="Marks should be between 51 and 120."
 }}
}
window.onload = checkmarks;



function setSession(session,clas) {                 // setSession modal
  document.getElementById("primSess").value =session ;
  document.getElementById("secSess").value =session ;
  document.getElementById("primClas").value =clas ;
  document.getElementById("secClas").value =clas ;
}

//hide history marksheet
function hide() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>

<!DOCTYPE html>
<html>
<head>
    <title>Marksheet</title>
<style>

    .small-header-right{
        /*border: 1px solid #000;*/
        position: fixed;
        font-size: 12px;
        width: 4cm;
        top: 2px;
        right: 0cm;
    }
    .small-header-left{
        /*border: 1px solid #000;*/
        font-size: 12px;
        position: fixed;
        width: 5cm;
        top: 2px;
        left: 3%;
    }

    .img-logo{
        /*display: block;*/
        /*margin-left: auto;*/
        /*margin-right: auto;*/
        width: 12%;
        /* border-radius: 50%; */
        /* vertical-align:top; */
        float: left;
        /* position: center; */
        /*top: 10%;*/
        /*right: 0cm;*/
    }


    body {
    /*background-color: green*/
    border: 2px groove black;
    margin: 0px;
    padding: 0px 20px 0px 20px;
    /* text-transform: uppercase; */
    }

    /* --------------------------------------tables start-------------------------------------------------------- */

    table{
      width: 100%;
    }
    .table-info td{
      /* padding-top: 10px;   */
        font-size: 15px;
        padding: 2px;
    }
    .table-info{
      padding-top: 10px;
        width: 100%;
        /* text-align: center; */
        /* padding: 0 2%;  */
    }
    .table-info tr:nth-child(odd) {background-color: #f2f2f2;}

    .marks-table{
        font-size: 14px;
        font-weight: bold;
        text-align: center;
        padding: 3px;
    }
    .table-coed td{
      font-size: 14px;
        text-align: center;
        padding: 4px;
        /*border: solid;*/
    }
    .table-sign{
        position: relative;
        top: 10%;
        width: 100%;
    }
    /* ----------------------------------------------tables end---------------------------------------------------- */

    .footer {
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
      text-align: center;
    }

</style>
</head>
<body>
<!-- <div class="container"> -->
    <div class="small-header-left">School Code- 522098</div>
    <div class="small-header-right">Dise Code- 23250412704</div>
    <br>
    <center>
        <!-- <img src="https://i.ibb.co/mbbxFPT/logo.png" alt="logo" border="0"> -->
        <img class="img-logo" src="<?php echo base_url('images/logom.png'); ?>" alt="logo" border="0">
        <div style="font-size: 23px;font-weight:bold;">
            MAA SHARDA VIDHYA MANDIR HIGH SCHOOL
        </div>
        <span style="border: 1px groove black;padding: 2px;font-size: 15px;" >ENGLISH MEDIUM</span>
        <div style="font-size:16px;"> PRAKASH NAGAR, DHAR (MP)</div>

  </center>

  <hr>
  <hr>
  <center>
        <div style="font-size: 18px;">
            <b><u>ACHIEVEMENT RECORD</u></b>
        </div>
        <?php $sess = (int)$sess; ?>
        <span style="font-size: 15px;">ACADEMIC SESSION 20<?php echo $sess-1; ?>-<?php echo $sess; ?></span>

</center>
    <table class="table-info">
        <tr>
            <td>
                NAME
            </td>
            <td class=" ">
                <b>
                    <?php echo strtoupper($fullName); ?>
                </b>
            </td>
            <td class="  " >
                CLASS
            </td>
            <td >
                <b>
                     <?php echo strtoupper($class_name); ?>
                </b>
            </td>



        </tr>
        <tr>
          <td class=""  >
              MOTHER'S NAME
          </td>
          <td class=" ">
              <b>
                  <?php echo strtoupper($Mname); ?>
              </b>
          </td>


            <td class="" >
                DATE OF BIRTH

            </td>
            <td  >
                <b>
                     <?php echo strtoupper($dob); ?>
                </b>
            </td>
          </tr>
          <tr>
            <td class=" " >
                FATHER'S NAME
            </td>
            <td class="  " >
                <b>
                     <?php echo strtoupper($Fname); ?>
                </b>
            </td>



            <td class=" ">
                CASTE
            </td>
            <td class="">
                <b>
                     <?php echo strtoupper($caste); ?>
                </b>
            </td>
          </tr>
          <tr>
                      <td class=" ">
                          SSSM ID
                      </td>
                      <td class="">
                          <b>
                               <?php echo strtoupper($sssmid); ?>
                          </b>
                      </td>

            <td class=" ">
                SCHOLAR N.

            </td>
            <td class="">
                <b>
                     <?php echo strtoupper($schNo); ?>
                </b>
            </td>

            <!-- <td class=" ">
                AADHAAR
            </td>
            <td class="">
                <b>
                     <?php //echo strtoupper($adhar); ?>
                </b>
            </td>-->
        </tr>
        </table>

    <!-- <div class="page-break" ></div> -->
    <center style="padding-top:5px;font-weight:bold;">Evaluation of Scholastic Area</center>
    <table class="marks-table" border="1" style="border-collapse: collapse;">

        <tr style="border-collapse: collapse;">
            <th rowspan="2">
                Subject
            </th>
            <th rowspan="2">
                Monthly Evaluation
            </th>
            <th rowspan="2">
                Half Yearly Evaluation
            </th>
            <th rowspan="2">
                Annual Evaluation
            </th>
            <th rowspan="2">
                Project
            </th>
            <th colspan="2">
                Overall Result
            </th>

        </tr>
        <tr>
            <td>
                Max Marks-120
            </td>
            <td>
                Grade
            </td>
        </tr>
        <tr>
            <td>
                English
            </td>
            <td>
                <?php echo $engm[0]; ?>
            </td>
            <td>
                <?php echo $engm[2]; ?>
            </td>
            <td>
                <?php echo $engm[1]; ?>
            </td>
            <td>
                A1
            </td>
            <td>
                <?php echo $eng; ?>
            </td>
            <td>
                <?php echo $engm[3]; ?>
            </td>

        </tr>
        <tr>
            <td>
                Maths
            </td>
            <td>
                <?php echo $mathsm[1]; ?>
            </td>
            <td>
                <?php echo $mathsm[0]; ?>
            </td>
            <td>
                <?php echo $mathsm[2]; ?>
            </td>
            <td>
                A1
            </td>
            <td>
                <?php echo $maths; ?>
            </td>
            <td>
                <?php echo $mathsm[3]; ?>
            </td>

        </tr>
        <tr>
            <td>
                Hindi
            </td>
            <td>
                <?php echo $hinm[1]; ?>
            </td>
            <td>
                <?php echo $hinm[2]; ?>

            </td>
            <td>
                <?php echo $hinm[0]; ?>

            </td>
            <td>
                A1
            </td>
            <td>
                <?php echo $hin; ?>
            </td>
            <td>
                <?php echo $hinm[3]; ?>

            </td>

        </tr>
        <tr>
            <td>
                EVS
            </td>
            <td>
                <?php echo $evsm[2]; ?>

            </td>
            <td>
                <?php echo $evsm[0]; ?>

            </td>
            <td>
                <?php echo $evsm[1]; ?>

            </td>
            <td>
                A1
            </td>
            <td>
                <?php echo $evs; ?>
            </td>
            <td>
                <?php echo $evsm[3]; ?>

            </td>

        </tr>

        <tr bgcolor="#ffccff">
            <td >
                <b>TOTAL</b>
            </td>
            <td>

            </td>
            <td>

            </td>
            <td>

            </td>
            <td>

            </td>
            <td>
                <?php echo $total; ?>
            </td>
            <td>
                <?php echo $totalg[0]; ?>
            </td>

        </tr>

        <tr>
            <td>
                G.K.
            </td>
            <td>
                A2
            </td>
            <td>
                A1
            </td>
            <td>
                A2
            </td>
            <td>
                A1
            </td>
            <td>
                <!-- <?php //echo $gk; ?> -->
            </td>
            <td>
                A2
            </td>

        </tr>
        <tr>
            <td>
                Computer
            </td>
            <td>
                A1
            </td>
            <td>
                A2
            </td>
            <td>
                A1
            </td>
            <td>
                A1
            </td>
            <td>
                <!-- <?php //echo $comp; ?> -->
            </td>
            <td>
                A1
            </td>

        </tr>

    </table>
    <center style="padding-top:10px;font-weight:bold;">Co-Educational Area</center>

    <table class="table-coed" border="1" style="border-collapse: collapse;">
        <tr>
            <td colspan="2">
               <b> Performance </b>
            </td>
            <td></td>
            <td colspan="4">
               <b> Personal and Social Qualities</b>
            </td>

        </tr>
        <tr>
            <td>
                <b>Area</b>
            </td>
            <td>
                <b>Grade</b>
            </td>
            <td></td>
            <td>
                <b>Quality</b>
            </td>
            <td>
                <b>Grade</b>
            </td>
            <td>
                <b>Quality</b>
            </td>
            <td>
                <b>Grade</b>
            </td>



        </tr>
        <tr>
            <td>
                Literary
            </td>
            <td>
                A1
            </td>
            <td></td>
            <td>
                Regularity
            </td>
            <td>
                A1
            </td>


        </tr>
        <tr>
            <td>
                Cultural
            </td>
            <td>
                A1
            </td>
            <td></td>
            <td>
                Neatness
            </td>
            <td>
                A1
            </td>

        </tr><tr>
            <td>
                Scientific
            </td>
            <td>
                A1
            </td>
            <td></td>
            <td>
                Discipline
            </td>
            <td>
                A1
            </td>


        </tr><tr>
            <td>
                Creativity
            </td>
            <td>
                A1
            </td>
            <td></td>
            <td>
                Trueness
            </td>
            <td>
                A1
            </td>

        </tr><tr>
            <td>
                Game / Yoga
            </td>
            <td>
                A1
            </td>
            <td></td>
            <td>
                Honesty
            </td>
            <td>
                A1
            </td>

        </tr>
    </table>

    <table class="table-info">
        <tr>
            <td class="" >
                Student Result
            </td>

            <td colspan="3">
                <b>
                   PASS
                </b>
            </td>


        </tr>
        <tr>
            <td class="" >
                Grade of Annual Result
            </td>
            <td class=" " colspan="3">
                <b>
                    <?php echo $totalg[0]; ?>
                </b>
            </td>


        </tr>
        <tr>
            <td class="" >
                Teacher's Remark
            </td>
            <td class=" " colspan="3">
                <b>
                    <?php echo strtoupper($totalg[1]); ?>
                </b>
            </td>


        </tr>
        <tr>
            <td class=" " >
                Attendance of Student
            </td>
            <td class="  " colspan="3">
                <b>
                     <?php echo strtoupper($attd); ?>
                </b>
            </td>


        </tr>
       <!--  <tr>
            <td class="">
                School Reopen
            </td>
            <td colspan="3" >
                <b>
                     <?php //echo strtoupper($class_id); ?>
                </b>
            </td>



        </tr>
        <tr>
            <td class="  ">
                DATE OF BIRTH
            </td>
            <td >
                <b>
                     <?php //echo strtoupper($dob); ?>
                </b>
            </td>
            <td class=" ">
                CASTE
            </td>
            <td class="">
                <b>
                     <?php //echo strtoupper($caste); ?>
                </b>
            </td>


        </tr> -->

    </table>
    <!-- <span class="left-sign"></span><span class="right-sign"></span> -->
    <table border="0" class="table-sign">
        <tr>
            <td style="text-align: left; padding-left: 20%;font-size: large;">
                Class Teacher*
            </td>
            <td style="text-align: right;padding-right: 25%;font-size: large;">
                Principal*
            </td>
        </tr>
    </table>
<!-- </div> -->
<footer class="footer">*This document is <b><i><u>not valid without</u> Signature and Stamp.</i></b></footer>
</body>
</html>

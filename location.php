<?php
    header("content-type: text/html; charset=utf-8");
    header ("Expires: Wed, 21 Aug 2013 13:13:13 GMT");
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");
include('config.php');



	 $data = $_GET['data'];
    $val = $_GET['val'];




          if ($data=='prov_name1') { 
              echo "<select name='prov_name' class='form-control' onChange=\"dochange('amphoe_name1', this.value)\">";
              echo "<option value=''>- เลือกจังหวัด -</option>\n";
              $result=pg_query("SELECT pv_tn,pv_code from province_sim  GROUP BY pv_tn,pv_code  order by pv_tn asc;");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[pv_tn]\" >$row[pv_tn]</option>" ;
              }
         } else if ($data=='amphoe_name1') {
              echo "<select name='amphoe_name' class='form-control' onChange=\"dochange('tambon_name1', this.value)\">";
              echo "<option value=''>- เลือกอำเภอ -</option>\n";                             
              $result=pg_query("SELECT ap_tn,ap_code FROM amphoe_sim WHERE pv_tn= '$val' GROUP BY ap_tn,ap_code");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[ap_tn]\" >$row[ap_tn]</option> " ;
              }
         } else if ($data=='tambon_name1') {
              echo "<select class='form-control' name='tambon_name'>\n";
              echo "<option value=''>- เลือกตำบล -</option>\n";
              $result=pg_query("SELECT tb_tn,tb_code FROM tambon_sim WHERE ap_tn = '$val' GROUP BY tb_tn,tb_code");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[tb_tn]\" >$row[tb_tn]</option> \n" ;
              }
         }



		
          if ($data=='region') { 
              echo "<select name='region' class='form-control' onChange=\"dochange('prov_name', this.value)\">";
              echo "<option value=''>- เลือกภูมิภาค -</option>\n";
              $result=pg_query("SELECT re_royin from province_sim GROUP BY re_royin order by re_royin asc");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[re_royin]\" >$row[re_royin]</option>" ;
              }
         } else if ($data=='prov_name') { 
              echo "<select name='prov_name' class='form-control' onChange=\"dochange('amphoe_name', this.value)\">";
              echo "<option value=''>- เลือกจังหวัด -</option>\n";
              $result=pg_query("SELECT pv_tn,pv_code from province_sim WHERE re_royin= '$val' GROUP BY pv_tn,pv_code  order by pv_tn asc;");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[pv_tn]\" >$row[pv_tn]</option>" ;
              }
         } else if ($data=='amphoe_name') {
              echo "<select name='amphoe_name' class='form-control' onChange=\"dochange('tambon_name', this.value)\">";
              echo "<option value=''>- เลือกอำเภอ -</option>\n";                             
              $result=pg_query("SELECT ap_tn,ap_code FROM amphoe_sim WHERE pv_tn= '$val' GROUP BY ap_tn,ap_code");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[ap_tn]\" >$row[ap_tn]</option> " ;
              }
         } else if ($data=='tambon_name') {
              echo "<select class='form-control' name='tambon_name'>\n";
              echo "<option value=''>- เลือกตำบล -</option>\n";
              $result=pg_query("SELECT tb_tn,tb_code FROM tambon_sim WHERE ap_tn = '$val' GROUP BY tb_tn,tb_code");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[tb_tn]\" >$row[tb_tn]</option> \n" ;
              }
         }


          if ($data=='region2') { 
              echo "<select name='region2' class='form-control' onChange=\"dochange('prov_name2', this.value)\">";
              echo "<option value=''>- เลือกภูมิภาค -</option>\n";
              $result=pg_query("SELECT re_royin from province_sim GROUP BY re_royin order by re_royin asc");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[re_royin]\" >$row[re_royin]</option>" ;
              }
         } else if ($data=='prov_name2') { 
              echo "<select name='prov_name2' class='form-control' onChange=\"dochange('amphoe_name2', this.value)\">";
              echo "<option value=''>- เลือกจังหวัด -</option>\n";
              $result=pg_query("SELECT pv_tn,pv_code from province_sim WHERE re_royin= '$val' GROUP BY pv_tn,pv_code  order by pv_tn asc;");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[pv_tn]\" >$row[pv_tn]</option>" ;
              }
         } else if ($data=='amphoe_name2') {
              echo "<select name='amphoe_name2' class='form-control' onChange=\"dochange('tambon_name2', this.value)\">";
              echo "<option value=''>- เลือกอำเภอ -</option>\n";                             
              $result=pg_query("SELECT ap_tn,ap_code FROM amphoe_sim WHERE pv_tn= '$val' GROUP BY ap_tn,ap_code");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[ap_tn]\" >$row[ap_tn]</option> " ;
              }
         } else if ($data=='tambon_name2') {
              echo "<select class='form-control' name='tambon_name'>\n";
              echo "<option value=''>- เลือกตำบล -</option>\n";
              $result=pg_query("SELECT tb_tn,tb_code FROM tambon_sim WHERE ap_tn = '$val' GROUP BY tb_tn,tb_code");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[tb_tn]\" >$row[tb_tn]</option> \n" ;
              }
         }


    
          if ($data=='strategic1') { 
              echo "<select name='strategic' class='form-control' onChange=\"dochange('substrategic1', this.value)\">";
              echo "<option value=''>- เลือกประเด่นยุทธศาสตร์ทั้งหมด -</option>\n";
              $result=pg_query("SELECT strategic from list_strat where strategic is not null GROUP BY strategic order by strategic asc ");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[strategic]\" >$row[strategic]</option>" ;
              }
         } else if ($data=='substrategic1') {
              echo "<select name='substrategic' class='form-control' >";
              echo "<option value=''>- เลือกกลยุทธทั้งหมด -</option>\n";                             
              $result=pg_query("SELECT substrategic FROM list_strat WHERE strategic= '$val' GROUP BY substrategic order by substrategic asc");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[substrategic]\" >$row[substrategic]</option> " ;
              }
         } 
    

    
          if ($data=='strategic2') { 
              echo "<select name='strategic2' class='form-control' onChange=\"dochange('substrategic2', this.value)\">";
              echo "<option value=''>- เลือกประเด่นยุทธศาสตร์ทั้งหมด -</option>\n";
              $result=pg_query("SELECT strategic from list_strat GROUP BY strategic order by strategic asc");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[strategic]\" >$row[strategic]</option>" ;
              }
         } else if ($data=='substrategic2') {
              echo "<select name='substrategic2' class='form-control' >";
              echo "<option value=''>- เลือกกลยุทธทั้งหมด -</option>\n";                             
              $result=pg_query("SELECT substrategic FROM list_strat WHERE strategic= '$val' GROUP BY substrategic order by substrategic asc");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[substrategic]\" >$row[substrategic]</option> " ;
              }
         } 
    

    
          if ($data=='strategic3') { 
              echo "<select name='strategic' class='form-control' onChange=\"dochange('substrategic3', this.value)\" >";
              echo "<option value=''>- กรุณาเลือก -</option>\n";
              $result=pg_query("SELECT strategic from list_strat GROUP BY strategic order by strategic asc");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[strategic]\" >$row[strategic]</option>" ;
              }
         } else if ($data=='substrategic3') {
              echo "<select name='substrategic' class='form-control' >";
              echo "<option value=''>- กรุณาเลือก -</option>\n";                             
              $result=pg_query("SELECT substrategic FROM list_strat WHERE strategic= '$val' GROUP BY substrategic order by substrategic asc");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[substrategic]\" >$row[substrategic]</option> " ;
              }
         } 
    

    
          if ($data=='strategic20') { 
              echo "<select name='strategic20' class='form-control' required='required' onChange=\"dochange('substrategic20', this.value)\" >";
              echo "<option value=''>- กรุณาเลือก -</option>\n";
              $result=pg_query("SELECT strategic20 from strategic20 GROUP BY strategic20 order by strategic20 asc");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[strategic20]\" >$row[strategic20]</option>" ;
              }
         } else if ($data=='substrategic20') {
              echo "<select name='substrategic20' class='form-control' required='required'>";
              echo "<option value=''>- กรุณาเลือก -</option>\n";                             
              $result=pg_query("SELECT substrategic20 FROM strategic20 WHERE strategic20= '$val' GROUP BY substrategic20 order by substrategic20 asc");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[substrategic20]\" >$row[substrategic20]</option> " ;
              }
         } 
    

    
          if ($data=='economic_plan') { 
              echo "<select name='economic_plan' class='form-control' onChange=\"dochange('economic_target', this.value)\"  required='required'>";
              echo "<option value=''>- กรุณาเลือก -</option>\n";
              $result=pg_query("SELECT economic_plan from economicplan GROUP BY economic_plan order by economic_plan asc");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[economic_plan]\" >$row[economic_plan]</option>" ;
              }
         } else if ($data=='economic_target') {
              echo "<select name='economic_target' class='form-control' onChange=\"dochange('economic_measure', this.value)\"  required='required'>";
              echo "<option value=''>- กรุณาเลือก -</option>\n";                             
              $result=pg_query("SELECT economic_target FROM economicplan WHERE economic_plan= '$val' GROUP BY economic_target order by economic_target asc");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[economic_target]\" >$row[economic_target]</option> " ;
              }
         } else if ($data=='economic_measure') {
              echo "<select name='economic_measure' class='form-control' >";
              echo "<option value=''>- กรุณาเลือก -</option>\n";                             
              $result=pg_query("SELECT economic_measure FROM economicplan WHERE economic_target= '$val' GROUP BY economic_measure order by economic_measure asc");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[economic_measure]\" >$row[economic_measure]</option> " ;
              }
         } 
    

    
          if ($data=='integration_29') { 
              echo "<select name='integration_29' class='form-control' onChange=\"dochange('integration_target', this.value)\" required='required' >";
              echo "<option value=''>- กรุณาเลือก -</option>\n";
              $result=pg_query("SELECT integration_29 from integration GROUP BY integration_29 order by integration_29 asc");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[integration_29]\" >$row[integration_29]</option>" ;
              }
         } else if ($data=='integration_target') {
              echo "<select name='integration_target' class='form-control' onChange=\"dochange('integration_measure', this.value)\"  required='required'>";
              echo "<option value=''>- กรุณาเลือก -</option>\n";                             
              $result=pg_query("SELECT integration_target FROM integration WHERE integration_29= '$val' GROUP BY integration_target order by integration_target asc");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[integration_target]\" >$row[integration_target]</option> " ;
              }
         } else if ($data=='integration_measure') {
              echo "<select name='integration_measure' class='form-control' onChange=\"dochange('integration_how', this.value)\" >";
              echo "<option value=''>- กรุณาเลือก -</option>\n";                             
              $result=pg_query("SELECT integration_measure FROM integration WHERE integration_target= '$val' GROUP BY integration_measure order by integration_measure asc");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[integration_measure]\" >$row[integration_measure]</option> " ;
              }
         } else if ($data=='integration_how') {
              echo "<select name='integration_how' class='form-control' >";
              echo "<option value=''>- กรุณาเลือก -</option>\n";                             
              $result=pg_query("SELECT integration_how FROM integration WHERE integration_measure= '$val' GROUP BY integration_how order by integration_how asc");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[integration_how]\" >$row[integration_how]</option> " ;
              }
         } 
    

    
          if ($data=='project_group_p') { 
              echo "<select name='project_group_p' class='form-control' required='required' onChange=\"dochange('sub_project_group_p', this.value)\" >";
              echo "<option value=''>- กรุณาเลือก -</option>\n";
              $result=pg_query("SELECT project_group_p from project_group_p GROUP BY project_group_p order by project_group_p asc");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[project_group_p]\" >$row[project_group_p]</option>" ;
              }
         } else if ($data=='sub_project_group_p') {
              echo "<select name='sub_project_group_p' class='form-control' required='required'>";
              echo "<option value=''>- กรุณาเลือก -</option>\n";                             
              $result=pg_query("SELECT sub_project_group_p FROM project_group_p WHERE project_group_p= '$val' GROUP BY sub_project_group_p order by sub_project_group_p asc");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[sub_project_group_p]\" >$row[sub_project_group_p]</option> " ;
              }
         } 
    

    
          if ($data=='project_group_r') { 
              echo "<select name='project_group_r' class='form-control' required='required' onChange=\"dochange('sub_project_group_r', this.value)\" >";
              echo "<option value=''>- กรุณาเลือก -</option>\n";
              $result=pg_query("SELECT project_group_r from project_group_r GROUP BY project_group_r order by project_group_r asc");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[project_group_r]\" >$row[project_group_r]</option>" ;
              }
         } else if ($data=='sub_project_group_r') {
              echo "<select name='sub_project_group_r' class='form-control' required='required'>";
              echo "<option value=''>- กรุณาเลือก -</option>\n";                             
              $result=pg_query("SELECT sub_project_group_r FROM project_group_r WHERE project_group_r= '$val' GROUP BY sub_project_group_r order by sub_project_group_r asc");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[sub_project_group_r]\" >$row[sub_project_group_r]</option> " ;
              }
         } 


	
         echo "</select>\n";
	
   
?>  
 <!DOCTYPE html>
 <html>  <?php 
include('config.php');

session_start();
$strpg = "SELECT * FROM user_id  WHERE email_user = '".$_SESSION['email_user']."' ";
    $objQuery = pg_query($db,$strpg);
    $objResult = pg_fetch_array($objQuery);

    $status = $objResult[status_user];


    if($_SESSION['email_user'] == "")
    {
        header('Location: login.html');
        exit();
    }

    else if($status != "admin_gistnu")
    {
        header('Location: login.html');
        exit();
    }

$region = $_GET[region];
$prov_name  = $_GET[prov_name];
$amp_name  = $_GET[_name];
$tam_name  = $_GET[tam_name];
$check = $_GET[check_budget];

$sub_project_group = $_GET[sub_project_group];
$strategic20 = $_GET[strategic20];
$substrategic20 = $_GET[substrategic20];
$economic_plan = $_GET[economic_plan];
$economic_target = $_GET[economic_target];
$economic_measure = $_GET[economic_measure];
$integration_29 = $_GET[integration_29];
$integration_target = $_GET[integration_target];
$project_group = $_GET[project_group];
$type_project = $_GET[type_project];






if ($prov_name == 'null') {
  $prov_name = '';
}
if ($amp_name == 'null') {
  $amp_name = '';
}
if ($tam_name == 'null') {
  $tam_name = '';
}

?>

 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ระบบบริหารงบประมาณเชิงพื้นที่</title>

    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.0-rc.3/dist/leaflet.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />



 </head>
 <body>
 <ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">กราฟแสดงข้อมูลจำนวนห่วงโซ่คุณค่า</a></li>
  <li><a data-toggle="tab" href="#menu1">รายชื่อโครงการในพื้นที่</a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">


    <ul class="nav nav-tabs nav-pills ">
      <li class="<?php if ($type_project == '') { echo "active" ;} ?>"><a data-toggle="tab" href="#chart1" >โครงการทุกประเภท</a></li>
      <li class="<?php if ($type_project == 'r') { echo "active" ;} ?>"><a data-toggle="tab" href="#chart2">โครงการระดับภาค</a></li>
      <li class="<?php if ($type_project == 'p') { echo "active" ;} ?>"><a data-toggle="tab" href="#chart3">โครงการระดับจังหวัด</a></li>
    </ul>



    <div class="tab-content">
      <div id="chart1" class="tab-pane fade <?php if ($type_project == '') { echo "in active" ;} ?>">
         <div id="container3" style="min-width: 100%; height: 300px; margin: 0 auto"></div> 
      </div>
      <div id="chart2" class="tab-pane fade <?php if ($type_project == 'r') { echo "in active" ;} ?>">
         <div id="container4" style="min-width: 100%; height: 300px; margin: 0 auto"></div> 
      </div>
      <div id="chart3" class="tab-pane fade <?php if ($type_project == 'p') { echo "in active" ;} ?>">
         <div id="container5" style="min-width: 100%; height: 300px; margin: 0 auto"></div> 
      </div>
    </div>

   

  </div>
  <div id="menu1" class="tab-pane fade">

      <div class="col-md-12 ">

    <ul class="nav nav-tabs nav-pills ">
      <li class="<?php if ($type_project == '') { echo "active" ;} ?>"><a data-toggle="tab" href="#table1" >โครงการทุกประเภท</a></li>
      <li class="<?php if ($type_project == 'r') { echo "active" ;} ?>"><a data-toggle="tab" href="#table2">โครงการระดับภาค</a></li>
      <li class="<?php if ($type_project == 'p') { echo "active" ;} ?>"><a data-toggle="tab" href="#table3">โครงการระดับจังหวัด</a></li>
    </ul>

    <div class="tab-content">
      <div id="table1" class="tab-pane fade <?php if ($type_project == '') { echo "in active" ;} ?>">
         <table class="table table-striped table-hover " id="example1">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>ชื่อโครงการ</th>
                    <th>งบประมาณ</th>
                    <th>หน่วยงานรับผิดชอบ</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
          <?php 


                 $result2 = pg_query("select ROW_NUMBER() OVER(ORDER BY prj_name asc) AS Row,prj_id,prj_name,budget,agency
                        from  budget_view2
                        full join area_project on budget_view2.prj_id = area_project.id_project
                         where   prov_name like '%$prov_name' 
                         and amp_name like '%$amp_name' 
                         and tam_name like '%$tam_name' 
                          and strategic20 like '%$strategic20'
                          and substrategic20 like '%$substrategic20'
                          and economic_plan like '%$economic_plan'
                          and economic_target like '%$economic_target'
                          and economic_measure like '%$economic_measure'
                          and integration_29 like '%$integration_29'
                          and integration_target like '%$integration_target'
                          and project_group like '%$project_group'
                          and project_type like '%'
                        and sub_project_group like '%$sub_project_group'
                        group by prj_id,prj_name,budget,agency
                        order by prj_name asc");
        
          while ($arr2 = pg_fetch_array($result2)) { 
          ?>
                  <tr>
                    <td><?php echo $arr2[row]; ?></td>
                    <td><?php echo $arr2[prj_name]; ?></td>
                    <td><?php echo number_format($arr2[budget]); ?></td>
                    <td><?php echo $arr2[agency]; ?></td>
                    <td><a href="project_detail.php?prj=<?php echo $arr2[prj_id]; ?>" class="btn btn-warning" target="_blank"><i class="fa fa-search"></i></a>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table> 
      </div>
      <div id="table2" class="tab-pane fade  <?php if ($type_project == 'r') { echo "in active" ;} ?>">
         <table class="table table-striped table-hover " id="example2">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>ชื่อโครงการ</th>
                    <th>งบประมาณ</th>
                    <th>หน่วยงานรับผิดชอบ</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
          <?php 
                 $result2 = pg_query("select ROW_NUMBER() OVER(ORDER BY prj_name asc) AS Row,prj_id,prj_name,budget,agency
                        from  budget_view2
                        full join area_project on budget_view2.prj_id = area_project.id_project
                         where   prov_name like '%$prov_name' 
                         and amp_name like '%$amp_name' 
                         and tam_name like '%$tam_name' 
                          and strategic20 like '%$strategic20'
                          and substrategic20 like '%$substrategic20'
                          and economic_plan like '%$economic_plan'
                          and economic_target like '%$economic_target'
                          and economic_measure like '%$economic_measure'
                          and integration_29 like '%$integration_29'
                          and integration_target like '%$integration_target'
                          and project_group like '%$project_group'
                          and project_type like '%r'
                        and sub_project_group like '%$sub_project_group'
                        group by prj_id,prj_name,budget,agency
                        order by prj_name asc");
        
          while ($arr2 = pg_fetch_array($result2)) { 
          ?>
                  <tr>
                    <td><?php echo $arr2[row]; ?></td>
                    <td><?php echo $arr2[prj_name]; ?></td>
                    <td><?php echo number_format($arr2[budget]); ?></td>
                    <td><?php echo $arr2[agency]; ?></td>
                    <td><a href="project_detail.php?prj=<?php echo $arr2[prj_id]; ?>" class="btn btn-warning" target="_blank"><i class="fa fa-search"></i></a></td>
                  </tr>
                <?php } ?>
                </tbody>
              </table> 
      </div>
      <div id="table3" class="tab-pane fade  <?php if ($type_project == 'p') { echo "in active" ;} ?>">
         <table class="table table-striped table-hover " id="example3">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>ชื่อโครงการ</th>
                    <th>งบประมาณ</th>
                    <th>หน่วยงานรับผิดชอบ</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
          <?php 
                 $result2 = pg_query("select ROW_NUMBER() OVER(ORDER BY prj_name asc) AS Row,prj_id,prj_name,budget,agency
                        from  budget_view2
                        full join area_project on budget_view2.prj_id = area_project.id_project
                         where   prov_name like '%$prov_name' 
                         and amp_name like '%$amp_name' 
                         and tam_name like '%$tam_name' 
                          and strategic20 like '%$strategic20'
                          and substrategic20 like '%$substrategic20'
                          and economic_plan like '%$economic_plan'
                          and economic_target like '%$economic_target'
                          and economic_measure like '%$economic_measure'
                          and integration_29 like '%$integration_29'
                          and integration_target like '%$integration_target'
                          and project_group like '%$project_group'
                          and project_type like '%p'
                        and sub_project_group like '%$sub_project_group'
                        group by prj_id,prj_name,budget,agency
                        order by prj_name asc");
        
          while ($arr2 = pg_fetch_array($result2)) { 
          ?>
                  <tr>
                    <td><?php echo $arr2[row]; ?></td>
                    <td><?php echo $arr2[prj_name]; ?></td>
                    <td><?php echo number_format($arr2[budget]); ?></td>
                    <td><?php echo $arr2[agency]; ?></td>
                    <td><a href="project_detail.php?prj=<?php echo $arr2[prj_id]; ?>" class="btn btn-warning" target="_blank"><i class="fa fa-search"></i></a></td>
                  </tr>
                <?php } ?>
                </tbody>
              </table> 
      </div>
    </div>



              




                      
     </div>   
    
  </div>
</div>





   <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ECharts -->
    <script src="vendors/echarts/dist/echarts.min.js"></script>
    
  <script src="https://unpkg.com/leaflet@1.0.0-rc.3/dist/leaflet.js"></script>

   
    <script src="https://code.highcharts.com/highcharts.js"></script>

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>



<script>

// Build the chart
Highcharts.chart('container3', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: ''
    },
    tooltip: {
        pointFormat: '<b>{point.name}</b>: {point.y} โครงการ'
    },
        credits: {
          enabled: false
        },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [

<?php 
$result1 = pg_query("  with ss as ( select sub_project_group,count(*) ,prov_name 
              from  budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where   prov_name like '%$prov_name' 
             and amp_name like '%$amp_name' 
             and tam_name like '%$tam_name' 
              and strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and project_type like '%'
             and sub_project_group like 'ต้นทาง%' 
            group by prj_id,sub_project_group,prov_name 
                
            )   select count(*) as sum from ss              
           ");
$result2 = pg_query(" with ss as ( select sub_project_group,count(*) ,prov_name 
              from  budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where   prov_name like '%$prov_name' 
             and amp_name like '%$amp_name' 
             and tam_name like '%$tam_name' 
              and strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and project_type like '%'
             and sub_project_group like 'กลางทาง%' 
            group by prj_id,sub_project_group,prov_name 
                
            )   select count(*) as sum from ss              
           ");
$result3 = pg_query(" with ss as ( select sub_project_group,count(*) ,prov_name 
              from  budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where   prov_name like '%$prov_name' 
             and amp_name like '%$amp_name' 
             and tam_name like '%$tam_name' 
              and strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and project_type like '%'
             and sub_project_group like 'ปลายทาง%' 
            group by prj_id,sub_project_group,prov_name 
                
            )   select count(*) as sum from ss              
           ");

              $arr1 = pg_fetch_array($result1) ; 
              $arr2 = pg_fetch_array($result2) ; 
              $arr3 = pg_fetch_array($result3) ; 

              if ($arr1[sum] == '') {
                $arr1[sum] = 0;
              }          
              if ($arr2[sum] == '') {
                $arr2[sum] = 0;
              }          
              if ($arr3[sum] == '') {
                $arr3[sum]= 0;
              }   

            ?>

        {
            name: 'ต้นทาง',
            y: <?php echo $arr1[sum]; ?>,
            color: '#737373'
        }, {
            name: 'กลางทาง',
            y: <?php echo $arr2[sum]; ?>,
            color: '#e65c00'
        }, {
            name: 'ปลายทาง',
            y: <?php echo $arr3[sum]; ?>,
            color: '#191966'
        }


        ]
    }]
});





</script>


<script>

// Build the chart
Highcharts.chart('container4', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: ''
    },
    tooltip: {
        pointFormat: '<b>{point.name}</b>: {point.y} โครงการ'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
        credits: {
          enabled: false
        },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [

<?php 
$result1 = pg_query("  with ss as ( select sub_project_group,count(*) ,prov_name 
              from  budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where   prov_name like '%$prov_name' 
             and amp_name like '%$amp_name' 
             and tam_name like '%$tam_name' 
              and strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and project_type like '%r'
             and sub_project_group like 'ต้นทาง%' 
            group by prj_id,sub_project_group,prov_name 
                
            )   select count(*) as sum from ss              
           ");
$result2 = pg_query(" with ss as ( select sub_project_group,count(*) ,prov_name 
              from  budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where   prov_name like '%$prov_name' 
             and amp_name like '%$amp_name' 
             and tam_name like '%$tam_name'  
              and strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and project_type like '%r'
             and sub_project_group like 'กลางทาง%' 
            group by prj_id,sub_project_group,prov_name 
                
            )   select count(*) as sum from ss              
           ");
$result3 = pg_query(" with ss as ( select sub_project_group,count(*) ,prov_name 
              from  budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where   prov_name like '%$prov_name' 
             and amp_name like '%$amp_name' 
             and tam_name like '%$tam_name' 
              and strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and project_type like '%r'
             and sub_project_group like 'ปลายทาง%' 
            group by prj_id,sub_project_group,prov_name 
                
            )   select count(*) as sum from ss              
           ");

              $arr1 = pg_fetch_array($result1) ; 
              $arr2 = pg_fetch_array($result2) ; 
              $arr3 = pg_fetch_array($result3) ; 

              if ($arr1[sum] == '') {
                $arr1[sum] = 0;
              }          
              if ($arr2[sum] == '') {
                $arr2[sum] = 0;
              }          
              if ($arr3[sum] == '') {
                $arr3[sum]= 0;
              }   

            ?>

        {
            name: 'ต้นทาง',
            y: <?php echo $arr1[sum]; ?>,
            color: '#ff8000'
        }, {
            name: 'กลางทาง',
            y: <?php echo $arr2[sum]; ?>,
            color: '#b35900'
        }, {
            name: 'ปลายทาง',
            y: <?php echo $arr3[sum]; ?>,
            color: '#663300'
        }


        ]
    }]
});





</script>


<script>

// Build the chart
Highcharts.chart('container5', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: ''
    },
    tooltip: {
        pointFormat: '<b>{point.name}</b>: {point.y} โครงการ'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
        credits: {
          enabled: false
        },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [

<?php 
$result1 = pg_query("  with ss as ( select sub_project_group,count(*) ,prov_name 
              from  budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where   prov_name like '%$prov_name' 
             and amp_name like '%$amp_name' 
             and tam_name like '%$tam_name' 
              and strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and project_type like '%p'
             and sub_project_group like 'ต้นทาง%' 
            group by prj_id,sub_project_group,prov_name 
                
            )   select count(*) as sum from ss              
           ");
$result2 = pg_query(" with ss as ( select sub_project_group,count(*) ,prov_name 
              from  budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where   prov_name like '%$prov_name' 
             and amp_name like '%$amp_name' 
             and tam_name like '%$tam_name' 
              and strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and project_type like '%p'
             and sub_project_group like 'กลางทาง%' 
            group by prj_id,sub_project_group,prov_name 
                
            )   select count(*) as sum from ss              
           ");
$result3 = pg_query(" with ss as ( select sub_project_group,count(*) ,prov_name 
              from  budget_view2
              inner join area_project on budget_view2.prj_id = area_project.id_project
              where   prov_name like '%$prov_name' 
             and amp_name like '%$amp_name' 
             and tam_name like '%$tam_name' 
              and strategic20 like '%$strategic20'
              and substrategic20 like '%$substrategic20'
              and economic_plan like '%$economic_plan'
              and economic_target like '%$economic_target'
              and economic_measure like '%$economic_measure'
              and integration_29 like '%$integration_29'
              and integration_target like '%$integration_target'
              and project_group like '%$project_group'
              and project_type like '%p'
             and sub_project_group like 'ปลายทาง%' 
            group by prj_id,sub_project_group,prov_name 
                
            )   select count(*) as sum from ss              
           ");

              $arr1 = pg_fetch_array($result1) ; 
              $arr2 = pg_fetch_array($result2) ; 
              $arr3 = pg_fetch_array($result3) ; 

              if ($arr1[sum] == '') {
                $arr1[sum] = 0;
              }          
              if ($arr2[sum] == '') {
                $arr2[sum] = 0;
              }          
              if ($arr3[sum] == '') {
                $arr3[sum]= 0;
              }   

            ?>

        {
            name: 'ต้นทาง',
            y: <?php echo $arr1[sum]; ?>,
            color: '#ff8000'
        }, {
            name: 'กลางทาง',
            y: <?php echo $arr2[sum]; ?>,
            color: '#b35900'
        }, {
            name: 'ปลายทาง',
            y: <?php echo $arr3[sum]; ?>,
            color: '#663300'
        }


        ]
    }]
});





</script>



<script>
  $(document).ready(function() {
    var table = $('#example1').DataTable();
 
    $('button').click( function() {
        var data = table.$('input, select').serialize();
        alert(
            "The following data would have been submitted to the server: \n\n"+
            data.substr( 0, 120 )+'...'
        );
        return false;
    } );
} );
</script>

<script>
  $(document).ready(function() {
    var table = $('#example2').DataTable();
 
    $('button').click( function() {
        var data = table.$('input, select').serialize();
        alert(
            "The following data would have been submitted to the server: \n\n"+
            data.substr( 0, 120 )+'...'
        );
        return false;
    } );
} );
</script>

<script>
  $(document).ready(function() {
    var table = $('#example3').DataTable();
 
    $('button').click( function() {
        var data = table.$('input, select').serialize();
        alert(
            "The following data would have been submitted to the server: \n\n"+
            data.substr( 0, 120 )+'...'
        );
        return false;
    } );
} );
</script>

 </body>
 </html>




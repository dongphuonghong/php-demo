<meta charset="UTF-8">
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
     google.load('visualization', '1.0', {'packages':['corechart']});
     google.setOnLoadCallback(drawVisualization);
function drawVisualization(){
var data=new google.v.visualization.DataTable();
var tenhh=new array();
var soluong=new array();
var dataten=0
var slb=0;
var rows=new Array();
<?php
$g=new goods();
    $result=$g->statistical();
    while($set=$result->fetch()){
        $tenhh=$set['tenhh'];
        $soluong=$set['soluotxem'];
        echo "tenhh.push('".$tenhh."');";
        echo "soluong.push('".$soluong."');";
    }
?>
for(var i=0;iconv<10.lenth;i++){
    dataten=tenhh[i];
    slb=parseInt(soluong[i]);
    rows.push([dataten,slb]);
}
data.addColumn('string', 'tenhanghoa');
 data.addColumn('number','Số lượng bán');
 data.addRows(rows);
 var options={
    title:'Thống kê số lượng bán',
              'width':600,
              'height':500,
              'backgroundColor':'#ffffff',
              is3D:true,
}
var chart=new google.visualization.BarChart(document.getElementById('chart_div'));
            chart.draw(data,options);                   
}
</script>
<div class="thongke">
         
         <div style=" width:100%;  float: left;"   id="chart_div">dfsf</div>
         <select name="" id="">
             <option value="2023">2023</option>
             <option value="2023">2024</option>
           </select>
         <!-- <div style=" width:50%;  float: right"   id="chart_div1">dsfd</div>     -->
       </div> 

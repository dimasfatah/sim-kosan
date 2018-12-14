<!-- <div id="chartContainer" style="float: left; height: 400px; width: 100%;">
<script src="&lt;?php echo base_url(); ?&gt;assets/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="&lt;?php echo base_url(); ?&gt;assets/jqwidgets/jqxcore.js" type="text/javascript"></script>
<script src="&lt;?php echo base_url(); ?&gt;assets/jqwidgets/jqxdraw.js" type="text/javascript"></script>
<script src="&lt;?php echo base_url(); ?&gt;assets/jqwidgets/jqxchart.core.js" type="text/javascript"></script>
<script src="&lt;?php echo base_url(); ?&gt;assets/jqwidgets/jqxdata.js" type="text/javascript"></script>        
<script type="text/javascript">
$(document).ready(function () {
// memanggil data array dengan JSON
var source =
     {
         datatype: "json",
         datafields: [
                { name: 'hasil' },
                { name: 'total' }
         ],
         url: '<?php echo base_url() ?>index.php/admin/beranda'
     };
var dataAdapter = new $.jqx.dataAdapter(source, { async: false, autoBind: true, loadError: function (xhr, status, error) { alert('Error loading "' + source.url + '" : ' + error); } });
// pengaturan jqxChart
    var settings = {
        title: "Survey Framework terbaik",
        description: "",
        enableAnimations: true,
        showLegend: true,
        showBorderLine: true,
        legendLayout: { left: 10, top: 160, width: 300, height: 200, flow: 'vertical' },
        padding: { left: 5, top: 5, right: 5, bottom: 5 },
        titlePadding: { left: 0, top: 0, right: 0, bottom: 10 },
        source: dataAdapter,
        colorScheme: 'scheme03',
        seriesGroups:
           [
            {
              type: 'pie',
              showLabels: true,
              series:
                [
                  { 
                     dataField: 'total',
                     displayText: 'hasil',
                     labelRadius: 170,
                     initialAngle: 15,
                     radius: 145,
                     centerOffset: 0,
                     formatFunction: function (value) {
                                        if (isNaN(value))
                                            return value;
                                            return parseFloat(value);
                                        },
                  }
                ]
             }
           ]
         };
       // Menampilkan Chart
      $('#chartContainer').jqxChart(settings);
   });
</script>    
</div>  -->

<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
  theme: "light1", // "light1", "light2", "dark1", "dark2"
  exportEnabled: true,
  animationEnabled: true,
  title: {
    text: ""
  },
  data: [{
    type: "pie",
    startAngle: 25,
    toolTipContent: "<b>{label}</b>: {y}",
    showInLegend: "true",
    legendText: "{label}",
    indexLabelFontSize: 16,
    indexLabel: "{label} - {y}",
    dataPoints: [
      { y: <?= $jumlah_penghuni->id_kamar - $jumlah_kamar->id_kamar ?>, label: "Jumlah Siswa Belum Memasukan Usulan" },
      { y: <?= $jumlah_kamar->id_kamar ?>, label: "Jumlah Siswa Memasukan Usulan" },
      
    ]
  }]
});
chart.render();

}
</script>
</head>
<body>

<div class="main">
  
  <div class="main-inner">

      <div class="container">
        
       <div class="row">
          
          <div class="span12">
        
          <div class="info-box">

            <div class="row-fluid stats-box">
      
      <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
      <br><br><br>
      <h3>Jumlah Penghuni</h3>
      <table class="table table-sm">
        <thead>
        <tr>
          <th scope="col">no</th>
          <th scope="col">id_penghuni</th>
          <th scope="col">id_kamar</th>
          <th scope="col">nama_depan</th>
          <th scope="col">alamat</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $no=1;
        foreach ($input as $data){
        echo"<tr>
          <td>$no</td>
          <td>$data->id_penghuni</td>
          <td>$data->id_kamar</td>
          <td>$data->nama_depan</td>
          <td>$data->alamat</td>
          </tr>";
        $no++;
        }
        ?>
  </table>
            </div>
         </div>
         </div>
        </div>
      </div>
  </div>
</div>    
   
  <script src="<?php echo base_url('assets/js/canvasjs.min.js')?>"></script>
  </body>
</html>



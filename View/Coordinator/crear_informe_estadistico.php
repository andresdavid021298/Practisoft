<?php
require_once '../../Controller/Empresa/Empresa_Controller.php';
require_once '../../Controller/Solicitud/Solicitud_Controller.php';
$obj_empresa_actividad = verCantidadEmpresasSegunActividad();
$obj_empresa_sector = verCantidadEmpresasSegunSector();
$obj_solicitud = cantidadSolicitudesPorEmpresa();
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {
    'packages': ['corechart']
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Actividad Económica de la Empresa', 'Cantidad de Empresas'],
      <?php
      foreach ($obj_empresa_actividad as $empresa) {
        echo "['" . $empresa['actividad_empresa'] . "', " . $empresa['cantidad_empresa'] .  "],";
      }
      ?>
    ]);

    var options = {
      title: 'Gráfico Circular - Cantidad de Empresas Según la Actividad Económica'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechartEmpresaActividad'));

    chart.draw(data, options);
  }
</script>
<script type="text/javascript">
  google.charts.load('current', {
    'packages': ['corechart']
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Sector de la Empresa', 'Cantidad de Empresas'],
      <?php
      foreach ($obj_empresa_sector as $empresa) {
        echo "['" . $empresa['sector_empresa'] . "', " . $empresa['cantidad_empresa'] .  "],";
      }
      ?>
    ]);

    var options = {
      title: 'Gráfico Circular - Cantidad de Empresas Según el Sector'
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('piechartEmpresaSector'));

    chart.draw(data, options);
  }
</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {
    packages: ['corechart']
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Element', 'Density'],
      <?php
      foreach ($obj_solicitud as $solicitud) {
        echo "['" . $solicitud['nombre_empresa'] . "', " . $solicitud['cantidad_solicitudes'] .  "],";
      }
      ?>
    ]);

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,
      {
        calc: "stringify",
        sourceColumn: 1,
        type: "string",
        role: "annotation",
      }
    ]);

    var options = {
      title: "Diagrama de Barras - Cantidad de Solicitudes por Empresa",
      is3D: true,
      vAxis: {
        format: '0'
      },
    };
    var chart = new google.visualization.PieChart(document.getElementById("columnchart_values"));
    chart.draw(view, options);
  }
</script>
<div class="container">
  <div class="row">
    <div class="col text-center">
      <h1 id="h2">Informe Estadístico</h1>
      <br><br>
      <center>
        <div id="piechartEmpresaActividad"></div>
      </center>
      <br><br>
      <center>
        <div id="piechartEmpresaSector"></div>
      </center>
      <br><br>
      <center>
        <div id="columnchart_values"></div>
      </center>
    </div>
  </div>
</div>
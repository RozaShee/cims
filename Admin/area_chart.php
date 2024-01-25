<!DOCTYPE HTML>
<html>
<head>
  <script type="text/javascript" src="canvasjs/canvasjs.min.js"></script>
</head>
<body>

<div id="areaChartContainer" style="height: 400px; width: calc(75% - 220px); margin-top: 50px; padding: 20px; box-sizing: border-box; display: flex; justify-content: flex-end;"></div>

<script type="text/javascript">
  window.onload = function () {
    var areaChart = new CanvasJS.Chart("areaChartContainer", {
      animationEnabled: true,
      title: {
        text: "Area-wise Request Count"
      },
      axisX: {
        title: "Area"
      },
      axisY: {
        title: "Request Count"
      },
      data: [{
        type: "bar", // You can also use "map" for a map chart
        dataPoints: []
      }]
    });

    fetch('get_area_request_data.php')
      .then(response => response.json())
      .then(data => {
        var areaData = {};

        data.forEach(row => {
          var areaName = row.area_name;
          var requestCount = parseInt(row.request_count);

          areaData[areaName] = requestCount;
        });

        var seriesData = [];
        for (var areaName in areaData) {
          seriesData.push({ label: areaName, y: areaData[areaName] });
        }

        areaChart.options.data[0].dataPoints = seriesData;
        areaChart.render();
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  }
</script>

</body>
</html>

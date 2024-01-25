<!DOCTYPE HTML>
<html>

<head>
  <script type="text/javascript" src="canvasjs/canvasjs.min.js"></script>
</head>

<body>

  <div id="genderChartContainer" style="height: 400px; width: calc(75% - 220px); margin-top: 50px; padding: 20px; box-sizing: border-box; display: flex; justify-content: flex-end;"></div>

  <script type="text/javascript">
    window.onload = function() {
      var genderChart = new CanvasJS.Chart("genderChartContainer", {
        animationEnabled: true,
        title: {
          text: "Customer Distribution by Gender"
        },
        data: [{
          type: "pie",
          startAngle: 240,
          yValueFormatString: "##0",
          indexLabel: "{label} - {y}",
          dataPoints: []
        }]
      });

      fetch('get_customer_data.php')
        .then(response => response.json())
        .then(data => {
          var genderDataPoints = {
            'Male': 0,
            'Female': 0
          };

          data.forEach(row => {
            var gender = row.gender == 1 ? 'Male' : 'Female';
            genderDataPoints[gender]++;
          });

          var genderSeriesData = [];
          for (var gender in genderDataPoints) {
            genderSeriesData.push({
              label: gender,
              y: genderDataPoints[gender]
            });
          }

          genderChart.options.data[0].dataPoints = genderSeriesData;
          genderChart.render();
        })
        .catch(error => {
          console.error('Error fetching data:', error);
        });
    }
  </script>
</body>

</html>

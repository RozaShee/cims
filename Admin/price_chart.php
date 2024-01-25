<!DOCTYPE HTML>
<html>
<head>
  <script type="text/javascript" src="canvasjs/canvasjs.min.js"></script>
</head>
<body>

<div id="priceChartContainer" style="height: 400px; width: calc(75% - 220px); margin-top: 50px; padding: 20px; box-sizing: border-box; display: flex; justify-content: flex-end;"></div>

<script type="text/javascript">
  window.onload = function () {
    var priceChart = new CanvasJS.Chart("priceChartContainer", {
      animationEnabled: true,
      title: {
        text: "Price Table Visualization"
      },
      axisX: {
        title: "Price ID"
      },
      axisY: {
        title: "Price"
      },
      data: [{
        type: "line", // You can also use "table" for a table chart
        dataPoints: []
      }]
    });

    fetch('get_price_data.php')
      .then(response => response.json())
      .then(data => {
        var priceData = [];

        data.forEach(row => {
          var priceId = row.price_id;
          var price = parseInt(row.price);

          priceData.push({ x: priceId, y: price });
          priceChart.options.axisX.interval = 10; // Adjust as needed
        });

        priceChart.options.data[0].dataPoints = priceData;
        priceChart.render();
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  }
</script>

</body>
</html>

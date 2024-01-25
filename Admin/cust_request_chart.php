<!DOCTYPE HTML>
<html>
<head>
  <script type="text/javascript" src="canvasjs/canvasjs.min.js"></script>
</head>
<body>

<div id="requestsChartContainer" style="height: 400px; width: calc(75% - 220px); margin-top: 50px; padding: 20px; box-sizing: border-box; display: flex; justify-content: flex-end;"></div>

<script type="text/javascript">
  window.onload = function () {
    var requestsChart = new CanvasJS.Chart("requestsChartContainer", {
      animationEnabled: true,
      title: {
        text: "Number of Requests per Customer"
      },
      axisY: {
        title: "Number of Requests"
      },
      data: [{
        type: "line", // You can also use "line" for a line chart
        dataPoints: []
      }]
    });

    fetch('get_requests_data.php')
      .then(response => response.json())
      .then(data => {
        var customerData = {};

        data.forEach(row => {
          var customerId = row.customer_id;
          var requestCount = parseInt(row.request_count);

          customerData[customerId] = requestCount;
        });

        var seriesData = [];
        for (var customerId in customerData) {
          seriesData.push({ label: "Customer " + customerId, y: customerData[customerId] });
        }

        requestsChart.options.data[0].dataPoints = seriesData;
        requestsChart.render();
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  }
</script>

</body>
</html>

<?php
// index.php - PHP version of Smart Station Dashboard
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Smart Station Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <link rel="stylesheet" href="/assets/styles.css" />
</head>
<body>
  <header>
    <h1>Smart Station Dashboard</h1>
    <button id="toggleTheme">Toggle Dark Mode</button>
  </header>
  <main>
    <div class="station-selector">
      <label for="station">Select Station: </label>
      <select id="station">
        <option value="1">Station 1</option>
        <option value="2" selected>Station 2</option>
        <option value="3">Station 3</option>
      </select>
    </div>
    <div id="map"></div>
    <div class="charts">
      <div class="chart-container">
        <canvas id="tempChart" width="150" height="150"></canvas>
        <p><strong>Temperature</strong><br><span id="tempValue">--</span>°C</p>
      </div>
      <div class="chart-container">
        <canvas id="humidityChart" width="150" height="150"></canvas>
        <p><strong>Humidity</strong><br><span id="humidityValue">--</span>%</p>
      </div>
      <div class="chart-container">
        <canvas id="pressureChart" width="150" height="150"></canvas>
        <p><strong>Pressure</strong><br><span id="pressureValue">--</span> hPa</p>
      </div>
    </div>
    <table class="data-table">
      <thead>
        <tr>
          <th>#</th>
          <th>Temperature</th>
          <th>Humidity</th>
          <th>Pressure</th>
          <th>Date Time</th>
        </tr>
      </thead>
      <tbody id="dataRows">
        <!-- JS-injected rows -->
        <?php
          $temperature = 33.8;
          $humidity = 71;
          $pressure = 1013.25;
          $time = date("Y-m-d h:i A");
          for ($i = 1; $i <= 5; $i++) {
            echo "<tr>
              <td>$i</td>
              <td>$temperature</td>
              <td>$humidity</td>
              <td>$pressure</td>
              <td>$time</td>
            </tr>";
          }
        ?>
      </tbody>
    </table>
  </main>
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="/assets/script.js"></script>
</body>
</html>

// Leaflet map
const map = L.map("map").setView([23.8103, 90.4125], 14);
L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
  maxZoom: 19,
  attribution: "&copy; OpenStreetMap",
}).addTo(map);
L.marker([23.8103, 90.4125]).addTo(map);

// Charts
const createDoughnutChart = (id, value, color) => {
  return new Chart(document.getElementById(id), {
    type: "doughnut",
    data: {
      datasets: [
        {
          data: [value, 100 - value],
          backgroundColor: [color, "#e5e7eb"],
          borderWidth: 0,
        },
      ],
    },
    options: {
      cutout: "70%",
      plugins: { legend: { display: false } },
      responsive: false,
    },
  });
};

// Example dynamic values
const temperature = 33.8;
const humidity = 71;
const pressure = 1013.25;

createDoughnutChart("tempChart", temperature, "#f59e0b");
document.getElementById("tempValue").textContent = temperature;

createDoughnutChart("humidityChart", humidity, "#3b82f6");
document.getElementById("humidityValue").textContent = humidity;

createDoughnutChart("pressureChart", 95, "#10b981");
document.getElementById("pressureValue").textContent = pressure;

// Table rows
const data = Array(5).fill({
  temperature,
  humidity,
  pressure,
  time: "2025-05-12 04:28 AM",
});

const tableBody = document.getElementById("dataRows");
data.forEach((entry, index) => {
  const row = `<tr>
    <td>${index + 1}</td>
    <td>${entry.temperature}</td>
    <td>${entry.humidity}</td>
    <td>${entry.pressure}</td>
    <td>${entry.time}</td>
  </tr>`;
  tableBody.insertAdjacentHTML("beforeend", row);
});

// Dark mode toggle
const toggleButton = document.getElementById("toggleTheme");
toggleButton.addEventListener("click", () => {
  document.body.classList.toggle("dark");
});

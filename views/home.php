<h1>Base MVC</h1>
<p>Welcome to this base mvc project.</p>



<div class="flex justify-center space-x-4">
  <div class="w-1/2 h-64" style="width: 40rem; height: 20rem;">
    <canvas id="productChart"></canvas>
  </div>
  <div class="w-1/2 h-64" style="width: 40rem; height: 20rem;">
    <canvas id="monthlySalesChart"></canvas>
  </div>
</div>

<section class="bg-blue-50 py-8 px-4 rounded-lg shadow-lg mb-8">
  <h3 class="text-2xl font-semibold text-blue-700 mb-4">Meer Informatie</h3>
  <p class="text-gray-600 mb-4">Deze app is gebouwd met behulp van PHP en de MVC-architectuur. De gegevens worden dynamisch geladen en weergegeven in grafieken voor een betere gebruikerservaring.</p>
  <p class="text-gray-600">Voor meer informatie over de technologieën die gebruikt zijn, zoals Chart.js en TailwindCSS, kun je de respectieve documentatie raadplegen:</p>
  <ul class="mt-4 text-blue-600">
    <li><a href="https://www.chartjs.org/" target="_blank" class="underline">Chart.js</a></li>
    <li><a href="https://tailwindcss.com/" target="_blank" class="underline">TailwindCSS</a></li>
  </ul>
</section>


<script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>

<script>
  const ctx = document.getElementById('productChart').getContext('2d');
  const productChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Aantal Producten'],
      datasets: [{
        label: 'Producten',
        data: [<?= (int) $productCount; ?>],
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>


<script>
  const months = JSON.parse('<?= $months; ?>');
  const salesAmounts = JSON.parse('<?= $salesAmounts; ?>');


  const ctx2 = document.getElementById('monthlySalesChart').getContext('2d');
  const monthlySalesChart = new Chart(ctx2, {
    type: 'line',
    data: {
      labels: months,
      datasets: [{
        label: 'Totale Verkoop per Maand (€)',
        data: salesAmounts,
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1,
        fill: true
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        y: {
          beginAtZero: true
        }
      },
      plugins: {
        legend: {
          display: true
        }
      }
    }
  });
</script>
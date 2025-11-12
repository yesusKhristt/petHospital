<html>

<head>
    <title>Sales Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body style="display: flex; justify-content: center; align-items: center; height: 100vh; background: #f9fafb;">
    <div style="width: 600px;">
        <canvas id="myChart"></canvas>
    </div>
    <script>
        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple'],
                datasets: [{
                    label: 'Votes',
                    data: [12, 19, 3, 5, 2],
                    backgroundColor: ['#f87171', '#60a5fa', '#facc15', '#34d399', '#a78bfa']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'bottom' },
                    title: { display: true, text: 'Color Votes' }
                }
            }
        });
    </script>
</body>


</html>
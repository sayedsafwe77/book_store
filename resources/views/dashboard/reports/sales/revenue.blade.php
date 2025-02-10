@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Total Revenue Report</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Total Revenue Chart</h3>
        <select id="revenueFilter" class="form-control" style="width: 200px; display:inline-block; float: right;">
            <option value="daily">Last 7 Days</option>
            <option value="weekly">Last 6 Weeks</option>
            <option value="monthly">Last 6 Months</option>
        </select>
    </div>
    <div class="card-body">
        <canvas id="revenueChart"></canvas>
    </div>
</div>

@push('js')
    <script>
        var ctx = document.getElementById('revenueChart').getContext('2d');
        var revenueChart;

        function updateChart(type) {
            var labels = [];
            var data = [];

            if (type === 'daily') {
                labels = {!! json_encode($dailyRevenue->pluck('date')) !!};
                data = {!! json_encode($dailyRevenue->pluck('revenue')) !!};
            } else if (type === 'weekly') {
                labels = {!! json_encode($weeklyRevenue->pluck('week')) !!};
                data = {!! json_encode($weeklyRevenue->pluck('revenue')) !!};
            } else if (type === 'monthly') {
                labels = {!! json_encode($monthlyRevenue->pluck('month')) !!};
                data = {!! json_encode($monthlyRevenue->pluck('revenue')) !!};
            }

            if (revenueChart) {
                revenueChart.destroy();
            }

            revenueChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Total Revenue ($)',
                        data: data,
                        backgroundColor: 'rgba(75, 192, 192, 0.5)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 2
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
        }

        document.getElementById('revenueFilter').addEventListener('change', function () {
            updateChart(this.value);
        });

        updateChart('daily'); // Load daily revenue by default
    </script>

@endpush

@endsection

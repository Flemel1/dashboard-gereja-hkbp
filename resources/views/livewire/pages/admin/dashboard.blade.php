<div>
    <div class="d-flex">
        <div class="w-100 py-2 ">
            <h3>Total Kehadiran per Bulan Pada Tahun Ini</h3>
            <div class="chart-container" style="position: relative; height:40vh; width:100%">
                <!-- 2. Add a canvas element for the chart -->
                <canvas id="attendance_by_month"></canvas>
            </div>
        </div>

        <div class="w-100 py-2 ">
            <h3>Total Kehadiran per Minggu Pada Bulan Ini</h3>
            <div class="chart-container" style="position: relative; height:40vh; width:100%">
                <!-- 2. Add a canvas element for the chart -->
                <canvas id="attendance_by_week"></canvas>
            </div>
        </div>
    </div>

    <div class="d-flex">
        <div class="w-50 py-2 ">
            <h3>Total Jemaat Berulang Tahun per Minggu Pada Bulan Ini</h3>
            <div class="chart-container" style="position: relative; height:40vh; width:100%">
                <!-- 2. Add a canvas element for the chart -->
                <canvas id="birthday_by_week"></canvas>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            document.addEventListener('livewire:init', () => {
                const initial_chart_attendance_by_month_data = @json($chart_attendance_data_by_month);
                const initial_chart_attendance_by_week_data = @json($chart_attendance_data_by_week);
                const initial_chart_birthday_by_week_data = @json($chart_birthday_data_by_month_week);

                let attendance_by_month_chart;
                let attendance_by_week_chart;
                let birthday_by_week_chart;

                const ctx = document.getElementById('attendance_by_month').getContext('2d');
                const ctx_week = document.getElementById('attendance_by_week').getContext('2d');
                const ctx_birthday_week = document.getElementById('birthday_by_week').getContext('2d');

                function create_attendance_by_month_chart(data) {
                    if (attendance_by_month_chart) {
                        attendance_by_month_chart.destroy();
                    }

                    attendance_by_month_chart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: initial_chart_attendance_by_month_data.labels,
                            datasets: [{
                                label: 'Total Kehadiran',
                                data: initial_chart_attendance_by_month_data.data,
                                fill: true,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                tension: 0.1,
                                borderWidth: 2
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {

                                        precision: 0
                                    }
                                }
                            },
                            plugins: {
                                legend: {
                                    position: 'top',
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            let label = context.dataset.label || '';
                                            if (label) {
                                                label += ': ';
                                            }
                                            if (context.parsed.y !== null) {
                                                label += context.parsed.y;
                                            }
                                            return label;
                                        }
                                    }
                                }
                            }
                        }
                    });
                }

                function create_attendance_by_week_chart(data) {
                    if (attendance_by_week_chart) {
                        attendance_by_week_chart.destroy();
                    }

                    attendance_by_week_chart = new Chart(ctx_week, {
                        type: 'line',
                        data: {
                            labels: initial_chart_attendance_by_week_data.labels,
                            datasets: [{
                                label: 'Total Kehadiran',
                                data: initial_chart_attendance_by_week_data.data,
                                fill: true,
                                backgroundColor: 'rgba(65, 182, 182, 0.2)',
                                borderColor: 'rgba(65, 182, 182, 1)',
                                tension: 0.1,
                                borderWidth: 2
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {

                                        precision: 0
                                    }
                                }
                            },
                            plugins: {
                                legend: {
                                    position: 'top',
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            let label = context.dataset.label || '';
                                            if (label) {
                                                label += ': ';
                                            }
                                            if (context.parsed.y !== null) {
                                                label += context.parsed.y;
                                            }
                                            return label;
                                        }
                                    }
                                }
                            }
                        }
                    });
                }

                function create_birthday_by_week_chart(data) {
                    if (birthday_by_week_chart) {
                        birthday_by_week_chart.destroy();
                    }

                    birthday_by_week_chart = new Chart(ctx_birthday_week, {
                        type: 'line',
                        data: {
                            labels: initial_chart_birthday_by_week_data.labels,
                            datasets: [{
                                label: 'Total Berulang Tahun',
                                data: initial_chart_birthday_by_week_data.data,
                                fill: true,
                                backgroundColor: 'rgba(65, 182, 182, 0.2)',
                                borderColor: 'rgba(65, 182, 182, 1)',
                                tension: 0.1,
                                borderWidth: 2
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {

                                        precision: 0
                                    }
                                }
                            },
                            plugins: {
                                legend: {
                                    position: 'top',
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            let label = context.dataset.label || '';
                                            if (label) {
                                                label += ': ';
                                            }
                                            if (context.parsed.y !== null) {
                                                label += context.parsed.y;
                                            }
                                            return label;
                                        }
                                    }
                                }
                            }
                        }
                    });
                }

                create_birthday_by_week_chart(initial_chart_birthday_by_week_data)
                create_attendance_by_month_chart(initial_chart_attendance_by_month_data)
                create_attendance_by_week_chart(initial_chart_attendance_by_week_data)
            });
        </script>
    @endpush

</div>

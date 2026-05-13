<div>
    <div class="d-flex">
        <div class="w-100 py-2 ">
            <h3>Total Kehadiran per Bulan Pada Tahun Ini</h3>
            <div class="d-flex justify-content-end mb-3">
                <div class="form-group mb-0 mr-2">
                    <select class="form-control" wire:model.live="selectedYearMonthChart">
                        @php
                            $currentYear = now()->year;
                            $startYear = $currentYear - 20;
                        @endphp
                        @for ($year = $currentYear; $year >= $startYear; $year--)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="chart-container" style="position: relative; height:40vh; width:100%">
                <!-- 2. Add a canvas element for the chart -->
                <canvas wire:ignore id="attendance_by_month"></canvas>
            </div>
        </div>

        <div class="w-100 py-2 ">
            <h3>Total Kehadiran per Minggu Pada Bulan Ini</h3>
            <div class="d-flex justify-content-end mb-3">
                <div class="form-group mb-0 mr-2">
                    <select class="form-control" wire:model.live="selectedYearWeekChart">
                        @php
                            $currentYear = now()->year;
                            $startYear = $currentYear - 20;
                        @endphp
                        @for ($year = $currentYear; $year >= $startYear; $year--)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                </div>
                <div class="form-group mb-0">
                    <select class="form-control" wire:model.live="selectedMonthWeekChart">
                        @for ($month = 1; $month <= 12; $month++)
                            <option value="{{ $month }}">{{ \Carbon\Carbon::create()->month($month)->translatedFormat('F') }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="chart-container" style="position: relative; height:40vh; width:100%">
                <!-- 2. Add a canvas element for the chart -->
                <canvas wire:ignore id="attendance_by_week"></canvas>
            </div>
        </div>
    </div>

    <div class="w-100 py-2 ">
        <h3>Jemaat yang Berulang Tahun Hari Ini</h3>
        <div class="w-100 position-relative">
            <input class="position-absolute" style="right: 0;" type="text" name="daterange"
                value="{{ now()->format('m/d/Y') }} - {{ now()->addWeek()->format('m/d/Y') }}" />
        </div>
        <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
            <table class="table">
                <tbody>
                    @forelse ($birthdayJemaats as $jemaat)
                        <tr>
                            <td>
                                <p class="font-weight-bold">
                                    {{ $jemaat->nama }}

                                </p>
                                <p>{{ \Carbon\Carbon::parse($jemaat->tanggal_lahir)->format('d M Y') }}

                                </p>
                            </td>
                            <td><span class="text-info">
                                    Umur: {{ \Carbon\Carbon::parse($jemaat->tanggal_lahir)->age }} Tahun</span></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Tidak ada yang berulang tahun hari ini 🎉</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>



    @push('js')
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <script>
            document.addEventListener('livewire:init', () => {
                const initial_chart_attendance_by_month_data = @json($chart_attendance_data_by_month);
                const initial_chart_attendance_by_week_data = @json($chart_attendance_data_by_week);

                let attendance_by_month_chart;
                let attendance_by_week_chart;

                const ctx = document.getElementById('attendance_by_month').getContext('2d');
                const ctx_week = document.getElementById('attendance_by_week').getContext('2d');

                function create_attendance_by_month_chart(data) {
                    if (attendance_by_month_chart) {
                        attendance_by_month_chart.destroy();
                    }

                    attendance_by_month_chart = new Chart(ctx, {
                        type: 'bar',
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
                        type: 'bar',
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

                function initial_datepicker() {
                    $('input[name="daterange"]').daterangepicker({
                        opens: 'left'
                    }, function(start, end, label) {
                        const startDate = start.format('YYYY-MM-DD')
                        const endDate = end.format('YYYY-MM-DD')

                        Livewire.dispatch('change-birthday-range', {
                            startDate: startDate,
                            endDate: endDate
                        });
                    });
                }



                initial_datepicker()
                create_attendance_by_month_chart(initial_chart_attendance_by_month_data)
                create_attendance_by_week_chart(initial_chart_attendance_by_week_data)

                // Listen for Livewire events to update charts
                Livewire.on('update-chart-month', (event) => {
                    const data = event.data;
                    attendance_by_month_chart.data.labels = data.labels;
                    attendance_by_month_chart.data.datasets[0].data = data.data;
                    attendance_by_month_chart.update();
                });

                Livewire.on('update-chart-week', (event) => {
                    const data = event.data;
                    attendance_by_week_chart.data.labels = data.labels;
                    attendance_by_week_chart.data.datasets[0].data = data.data;
                    attendance_by_week_chart.update();
                });
            });
        </script>
    @endpush

</div>

<?php

namespace App\Livewire\Pages\Admin;

use App\Models\Jemaat;
use App\Models\Kehadiran;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class Dashboard extends Component
{
    public $birthdayJemaats;

    public $selectedYearMonthChart;
    public $selectedYearWeekChart;
    public $selectedMonthWeekChart;

    public function mount()
    {
        $today = Carbon::now();

        $this->birthdayJemaats = Jemaat::whereMonth('tanggal_lahir', $today->month)
            ->whereDay('tanggal_lahir', $today->day)
            ->get();

        // Initialize filters with current date
        $this->selectedYearMonthChart = $today->year;
        $this->selectedYearWeekChart = $today->year;
        $this->selectedMonthWeekChart = $today->month;
    }

    public function updatedSelectedYearMonthChart()
    {
        $this->dispatch('update-chart-month', data: $this->getChartDataGroupByMonth());
    }

    public function updatedSelectedYearWeekChart()
    {
        $this->dispatch('update-chart-week', data: $this->getChartDataGroupByWeek());
    }

    public function updatedSelectedMonthWeekChart()
    {
        $this->dispatch('update-chart-week', data: $this->getChartDataGroupByWeek());
    }

    public function getChartDataGroupByMonth()
    {
        $year = $this->selectedYearMonthChart;

        $attendance_by_month = [];
        for ($i = 1; $i <= 12; $i++) {
            $attendance_by_month[$i] = 0;
        }

        $attendance_data = Kehadiran::select(
            DB::raw('MONTH(tanggal) as month'),
            DB::raw('AVG(jumlah_hadir) as total')
        )
            ->whereYear('tanggal', $year)
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get()
            ->pluck('total', 'month');


        foreach ($attendance_data as $month => $total) {
            if (isset($attendance_by_month[$month])) {
                $attendance_by_month[$month] = $total;
            }
        }

        $labels = [];
        for ($i = 1; $i <= 12; $i++) {
            $labels[] = Carbon::create($year, $i, 1)->translatedFormat('M');
        }

        $data = array_values($attendance_by_month);

        return [
            'labels' => $labels,
            'data' => $data
        ];
    }

    public function getChartDataGroupByWeek()
    {
        $start_of_month = Carbon::create($this->selectedYearWeekChart, $this->selectedMonthWeekChart, 1)->startOfMonth();
        $end_of_month = $start_of_month->copy()->endOfMonth();


        $week_template = [];
        $current_week_start = $start_of_month->copy()->startOfWeek(Carbon::SUNDAY);

        while ($current_week_start->lte($end_of_month)) {
            $week_template[$current_week_start->format('Y-m-d')] = 0;
            $current_week_start->addWeek();
        }

        // Using DAYOFWEEK: 1=Sun, 2=Mon... Subtracting (DAYOFWEEK - 1) days always points to the preceding Sunday
        $week_start_expression = DB::raw('DATE_SUB(tanggal, INTERVAL (DAYOFWEEK(tanggal) - 1) DAY) as week_start');

        $attendance_data = Kehadiran::select(
            $week_start_expression,
            DB::raw('AVG(jumlah_hadir) as total')
        )
            ->whereBetween('tanggal', [$start_of_month, $end_of_month])
            ->groupBy('week_start')
            ->orderBy('week_start', 'asc')
            ->get()
            ->pluck('total', 'week_start');


        foreach ($attendance_data as $week => $total) {
            $formatted_week = Carbon::parse($week)->format('Y-m-d');
            if (isset($week_template[$formatted_week])) {
                $week_template[$formatted_week] = $total;
            }
        }


        $labels = [];
        $week_index = 1;
        foreach ($week_template as $total) {
            $labels[] = 'Minggu ke-' . $week_index++;
        }

        $data = array_values($week_template);


        return [
            'labels' => $labels,
            'data' => $data,
        ];
    }

    #[On('change-birthday-range')]
    public function filterJemaatByBirthday($startDate, $endDate)
    {

        $from = Carbon::parse($startDate);
        $to = Carbon::parse($endDate);

        $startMonthDay = $from->format('m-d');
        $endMonthDay = $to->format('m-d');

        if ($startMonthDay <= $endMonthDay) {
            $this->birthdayJemaats = Jemaat::whereRaw("DATE_FORMAT(tanggal_lahir, '%m-%d') BETWEEN ? AND ?", [$startMonthDay, $endMonthDay])->get();
        } else {
            $this->birthdayJemaats = Jemaat::whereRaw("(DATE_FORMAT(tanggal_lahir, '%m-%d') >= ? OR DATE_FORMAT(tanggal_lahir, '%m-%d') <= ?)", [$startMonthDay, $endMonthDay])->get();
        }
    }

    public function render()
    {

        $chart_attendance_data_by_month = $this->getChartDataGroupByMonth();
        $chart_attendance_data_by_week = $this->getChartDataGroupByWeek();
        return view('livewire.pages.admin.dashboard', compact(
            'chart_attendance_data_by_month',
            'chart_attendance_data_by_week',
        ));
    }
}

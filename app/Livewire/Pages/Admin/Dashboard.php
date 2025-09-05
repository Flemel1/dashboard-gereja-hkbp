<?php

namespace App\Livewire\Pages\Admin;

use App\Models\Kehadiran;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{
    public function getChartDataGroupByMonth()
    {

        $current_year = now()->year;

        $attendance_by_month = [];
        for ($i = 1; $i <= 12; $i++) {
            $attendance_by_month[$i] = 0;
        }

        $attendance_data = Kehadiran::select(
            DB::raw('MONTH(tanggal) as month'),
            DB::raw('SUM(jumlah_hadir) as total')
        )
            ->whereYear('tanggal', $current_year)
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
            $labels[] = Carbon::create()->month($i)->format('M');
        }

        $data = array_values($attendance_by_month);

        return [
            'labels' => $labels,
            'data' => $data
        ];
    }

    public function getChartDataGroupByWeek()
    {

        $current_date = Carbon::now();
        $start_of_month = $current_date->copy()->startOfMonth();
        $end_of_month = $current_date->copy()->endOfMonth();


        $week_template = [];
        $date = $start_of_month->copy();
        while ($date->lte($end_of_month)) {
            $week_start = $date->copy()->startOfWeek()->format('Y-m-d');
            $week_template[$week_start] = 0;

            $date->addWeek();
        }


        $week_start_expression = DB::raw('DATE_SUB(tanggal, INTERVAL WEEKDAY(tanggal) DAY) as week_start');

        $attendance_data = Kehadiran::select(
            $week_start_expression,
            DB::raw('SUM(jumlah_hadir) as total')
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
        foreach (array_keys($week_template) as $index => $week_start_string) {
            if ($index === 0) {
                continue;
            }
            $labels[] = 'Minggu ke-' . $index;
        }


        $data = array_values($week_template);


        return [
            'labels' => $labels,
            'data' => $data,
        ];
    }



    public function getBirthdayDataGroupByWeek()
    {

        // 1. Set the target month. Default to the current month if none is provided.
        $targetMonth =  now()->month;
        $monthName = Carbon::create()->month($targetMonth)->format('F');

        // 2. Perform the database query.
        $birthdayCounts = DB::table('jemaats')
            ->select(
                DB::raw('COUNT(*) as total_jemaats'),
                DB::raw('CEIL(DAY(tanggal_lahir) / 7) as week_of_month')
            )
            ->whereMonth('tanggal_lahir', $targetMonth)
            ->groupBy('week_of_month')
            ->orderBy('week_of_month', 'asc')
            ->get()
            ->keyBy('week_of_month'); // keyBy makes it easy to look up week numbers

        $weeks = [
            '1' => $birthdayCounts->get(1)->total_jemaats ?? 0,
            '2' => $birthdayCounts->get(2)->total_jemaats ?? 0,
            '3' => $birthdayCounts->get(3)->total_jemaats ?? 0,
            '4' => $birthdayCounts->get(4)->total_jemaats ?? 0,
        ];
        $week_fifth = $birthdayCounts->get(5)->total_jemaats ?? 0;
        $weeks['4'] = $weeks['4'] + $week_fifth;

        $labels = [];
        $data = [];

        foreach ($weeks as $key => $value) {

            $labels[] = 'Minggu ke-' . $key;
            $data[] = $value;
        }

        return [
            'labels' => $labels,
            'data' => $data,
        ];
    }

    public function render()
    {

        $chart_attendance_data_by_month = $this->getChartDataGroupByMonth();
        $chart_attendance_data_by_week = $this->getChartDataGroupByWeek();
        $chart_birthday_data_by_month_week = $this->getBirthdayDataGroupByWeek();
        return view('livewire.pages.admin.dashboard', compact(
            'chart_attendance_data_by_month',
            'chart_attendance_data_by_week',
            'chart_birthday_data_by_month_week'
        ));
    }
}

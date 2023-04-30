<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pemeriksaan;
use App\Models\Siswa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $chart_options = [
            'chart_title' => 'Jumlah Pengunjung UKS',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Pemeriksaan',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
            'chart_color' => '20,108,148',
            'date_format' => 'M Y',
        ];

        $chart = new LaravelChart($chart_options);

        $siswa = Siswa::count();
        $petugas = User::count();
        $pemeriksaan = Pemeriksaan::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();

        return view('pages.dashboard', compact('chart', 'siswa', 'petugas', 'pemeriksaan'));
    }
}

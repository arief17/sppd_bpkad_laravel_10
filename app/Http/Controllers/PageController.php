<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\DataPerdin;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $totals = [
            [
                'title' => 'Jumlah SPPD',
                'class' => 'bg-primary-gradient',
                'total' => DataPerdin::getTotalByStatus(),
                'difference' => DataPerdin::getTotalByStatus(null, true),
                'chart_id' => 'compositeline',
                'chart_data' => [5, 9, 5, 6, 4, 12, 18, 14, 10, 15, 12, 5, 8, 5, 12, 5, 12, 10, 16, 12],
            ],
            [
                'title' => 'Jumlah SPPD di Approve',
                'class' => 'bg-danger-gradient',
                'total' => DataPerdin::getTotalByStatus(['approve' => 1]),
                'difference' => DataPerdin::getTotalByStatus(['approve' => 1], true),
                'chart_id' => 'compositeline2',
                'chart_data' => [3, 2, 4, 6, 12, 14, 8, 7, 14, 16, 12, 7, 8, 4, 3, 2, 2, 5, 6, 7],
            ],
            [
                'title' => 'Jumlah SPPD di Tolak',
                'class' => 'bg-success-gradient',
                'total' => DataPerdin::getTotalByStatus(['approve' => 0]),
                'difference' => DataPerdin::getTotalByStatus(['approve' => 0], true),
                'chart_id' => 'compositeline3',
                'chart_data' => [5, 10, 5, 20, 22, 12, 15, 18, 20, 15, 8, 12, 22, 5, 10, 12, 22, 15, 16, 10],
            ],
            [
                'title' => 'Jumlah SPPD telah Lunas',
                'class' => 'bg-warning-gradient',
                'total' => DataPerdin::getTotalByStatus(['kwitansi' => 1]),
                'difference' => DataPerdin::getTotalByStatus(['kwitansi' => 1], true),
                'chart_id' => 'compositeline4',
                'chart_data' => [5, 9, 5, 6, 4, 12, 18, 14, 10, 15, 12, 5, 8, 5, 12, 5, 12, 10, 16, 12],
            ],
        ];

        $bidangs = Bidang::all();

        $morrisData = [];
        $labels = [];
        $barColors = [];

        $grouped_perdins_global = DataPerdin::all()->groupBy(function ($perdin) {
            return Carbon::parse($perdin->created_at)->format('M Y');
        });

        foreach ($grouped_perdins_global as $periode => $perdins_bulan_ini) {
            $data = [
                'y' => $periode,
            ];

            foreach ($bidangs as $bidang) {
                $perdins_bulan_ini_bidang = $perdins_bulan_ini->where('author.bidang_id', $bidang->id);

                $id_bidang = $bidang->id;
                $nama_bidang = $bidang->nama;

                if (!in_array($nama_bidang, $labels)) {
                    $labels[] = $nama_bidang;
                }

                if (!isset($barColors[$id_bidang])) {
                    $barColors[$id_bidang] = $this->generateRandomColor();
                }

                $jumlah_perdin = $perdins_bulan_ini_bidang->count();

                $data['bidang_' . $id_bidang] = $jumlah_perdin;
            }

            $morrisData[] = $data;
        }

        $ykeys = array_keys(array_slice($morrisData[0], 1));

        return view('dashboard.index', [
            'title' => 'Home',
            'morrisData' => json_encode($morrisData),
            'ykeys' => json_encode($ykeys),
            'labels' => json_encode($labels),
            'barColors' => json_encode(array_values($barColors)),
            'totals' => $totals,
        ]);
    }

    private function generateRandomColor()
    {
        return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }
}

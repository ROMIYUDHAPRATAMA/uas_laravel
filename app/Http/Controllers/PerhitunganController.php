<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerhitunganController extends Controller
{
    public function wp()
    {
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::all();
        $penilaians = Penilaian::all();

        // Langkah 1: Normalisasi Bobot
        $totalBobot = $kriterias->sum('bobot');
        foreach ($kriterias as $kriteria) {
            $kriteria->bobot_normalized = $kriteria->bobot / $totalBobot;
        }

        // Langkah 2: Menghitung Vektor S
        $vektorS = [];
        foreach ($alternatifs as $alternatif) {
            $vektorS[$alternatif->id] = 1.0;
            foreach ($kriterias as $kriteria) {
                $penilaian = $penilaians->where('alternatif_id', $alternatif->id)->where('kriteria_id', $kriteria->id)->first();
                $nilai = $penilaian ? floatval($penilaian->nilai) : 1.0;
                $bobotNormalized = floatval($kriteria->bobot_normalized);

                if ($kriteria->jenis_kriteria == 'Cost') {
                    $vektorS[$alternatif->id] *= pow($nilai, -$bobotNormalized);
                } else {
                    $vektorS[$alternatif->id] *= pow($nilai, $bobotNormalized);
                }
            }
        }

        // Langkah 3: Menghitung Vektor V
        $totalVektorS = array_sum($vektorS);
        $vektorV = [];
        foreach ($vektorS as $altId => $nilaiS) {
            $vektorV[$altId] = $nilaiS / $totalVektorS;
        }

        // Langkah 4: Perankingan
        arsort($vektorV);

        return view('perhitungan.wp', compact('alternatifs', 'kriterias', 'penilaians', 'vektorS', 'vektorV'));
    }
}

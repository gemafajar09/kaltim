<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $tahun = date('Y');
        for($i = 1; $i < 13; $i++)
        {
            $bulan = str_pad($i, 2 , "0", STR_PAD_LEFT);
            $simAbaru = DB::table('tb_data_polres')
            ->where(DB::raw('YEAR(data_polres_tgl)'),$tahun)
            ->select(
                DB::raw('SUM(data_polres_sim_a_baru) as simabaru'),
                DB::raw('SUM(data_polres_sim_a_umum_baru) as simabaruumum'),
                DB::raw('SUM(data_polres_sim_b1_baru) as simb1baru'),
                DB::raw('SUM(data_polres_sim_b2_baru) as simb2baru'),
                DB::raw('SUM(data_polres_sim_c_baru) as simcbaru'),
                DB::raw('SUM(data_polres_sim_d_baru) as simdbaru'),
                DB::raw('SUM(data_polres_sim_a_perpanjang) as simabarup'),
                DB::raw('SUM(data_polres_sim_a_umum_perpanjang) as simabaruumump'),
                DB::raw('SUM(data_polres_sim_b1_perpanjang) as simb1barup'),
                DB::raw('SUM(data_polres_sim_b2_perpanjang) as simb2barup'),
                DB::raw('SUM(data_polres_sim_c_perpanjang) as simcbarup'),
                DB::raw('SUM(data_polres_sim_d_perpanjang) as simdbarup')
            )
            ->first();
            
            $datasimA = $simAbaru->simabaru != null ? $simAbaru->simabaru : 0;
            $datasimAumum = $simAbaru->simabaruumum != null ? $simAbaru->simabaruumum : 0;
            $datasimB1 = $simAbaru->simb1baru != null ? $simAbaru->simb1baru : 0;
            $datasimB2 = $simAbaru->simb2baru != null ? $simAbaru->simb2baru : 0;
            $datasimC = $simAbaru->simcbaru != null ? $simAbaru->simcbaru : 0;
            $datasimD = $simAbaru->simdbaru != null ? $simAbaru->simdbaru : 0;
            $datasimAP = $simAbaru->simabarup != null ? $simAbaru->simabaru : 0;
            $datasimAumumP = $simAbaru->simabaruumump != null ? $simAbaru->simabaruumump : 0;
            $datasimB1P = $simAbaru->simb1barup != null ? $simAbaru->simb1barup : 0;
            $datasimB2P = $simAbaru->simb2barup != null ? $simAbaru->simb2barup : 0;
            $datasimCP = $simAbaru->simcbarup != null ? $simAbaru->simcbarup : 0;
            $datasimDP = $simAbaru->simdbarup != null ? $simAbaru->simdbarup : 0;
            
        }
        $data['datasimbaru'] = [$datasimA,$datasimAumum,$datasimB1,$datasimB2,$datasimC,$datasimD];
        $data['datasimperpanjang'] = [$datasimAP,$datasimAumumP,$datasimB1P,$datasimB2P,$datasimCP,$datasimDP];
        
        return view('backend.template.home',$data);
    }

    public function realcount()
    {
        $tahun = date('Y');
        for($i = 1; $i < 13; $i++)
        {
            $bulan = str_pad($i, 2 , "0", STR_PAD_LEFT);
            $simAbaru = DB::table('tb_data_polres')
            ->where(DB::raw('YEAR(data_polres_tgl)'),$tahun)
            ->select(
                DB::raw('SUM(data_polres_sim_a_baru) as simabaru'),
                DB::raw('SUM(data_polres_sim_a_umum_baru) as simabaruumum'),
                DB::raw('SUM(data_polres_sim_b1_baru) as simb1baru'),
                DB::raw('SUM(data_polres_sim_b2_baru) as simb2baru'),
                DB::raw('SUM(data_polres_sim_c_baru) as simcbaru'),
                DB::raw('SUM(data_polres_sim_d_baru) as simdbaru'),
                DB::raw('SUM(data_polres_sim_a_perpanjang) as simabarup'),
                DB::raw('SUM(data_polres_sim_a_umum_perpanjang) as simabaruumump'),
                DB::raw('SUM(data_polres_sim_b1_perpanjang) as simb1barup'),
                DB::raw('SUM(data_polres_sim_b2_perpanjang) as simb2barup'),
                DB::raw('SUM(data_polres_sim_c_perpanjang) as simcbarup'),
                DB::raw('SUM(data_polres_sim_d_perpanjang) as simdbarup')
            )
            ->first();
            $data['abaru'] = $simAbaru->simabaru != null ? $simAbaru->simabaru : 0;
            $data['aumumbaru'] = $simAbaru->simabaruumum != null ? $simAbaru->simabaruumum : 0;
            $data['b1baru'] = $simAbaru->simb1baru != null ? $simAbaru->simb1baru : 0;
            $data['b2baru'] = $simAbaru->simb2baru != null ? $simAbaru->simb2baru : 0;
            $data['cbaru'] = $simAbaru->simcbaru != null ? $simAbaru->simcbaru : 0;
            $data['dbaru'] = $simAbaru->simdbaru != null ? $simAbaru->simdbaru : 0;
            $data['aperpanjang'] = $simAbaru->simabarup != null ? $simAbaru->simabaru : 0;
            $data['aumumperpanjang'] = $simAbaru->simabaruumump != null ? $simAbaru->simabaruumump : 0;
            $data['b1perpanjang'] = $simAbaru->simb1barup != null ? $simAbaru->simb1barup : 0;
            $data['b2perpanjang'] = $simAbaru->simb2barup != null ? $simAbaru->simb2barup : 0;
            $data['cperpanjang'] = $simAbaru->simcbarup != null ? $simAbaru->simcbarup : 0;
            $data['dperpanjang'] = $simAbaru->simdbarup != null ? $simAbaru->simdbarup : 0;
        }

        echo json_encode($data);
    }
}

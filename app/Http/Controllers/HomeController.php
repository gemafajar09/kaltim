<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $tahun = date('Y');
        if(session('user_level') == 1)
        {
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
                    DB::raw('SUM(data_polres_sim_d_perpanjang) as simdbarup'),
                    DB::raw('SUM(data_polres_sim_b1_umum) as simb1ubaruum'),
                    DB::raw('SUM(data_polres_sim_b2_umum) as simb2ubaruum'),
                    DB::raw('SUM(data_polres_sim_b1_umum_perpanjang) as simb1ubaruumper'),
                    DB::raw('SUM(data_polres_sim_b2_umum_perpanjang) as simb2ubaruumper')
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
                $datasimb1u = $simAbaru->simb1ubaruum != null ? $simAbaru->simb1ubaruum : 0;
                $datasimb2u = $simAbaru->simb2ubaruum != null ? $simAbaru->simb2ubaruum : 0;
                $datasimb1up = $simAbaru->simb1ubaruumper != null ? $simAbaru->simb1ubaruumper : 0;
                $datasimb2up = $simAbaru->simb2ubaruumper != null ? $simAbaru->simb2ubaruumper : 0;
                
            }
            $data['datasimbaru'] = [$datasimA,$datasimC,$datasimD,$datasimB1,$datasimb1u,$datasimB2,$datasimb2u,$datasimAumum];
            $data['datasimperpanjang'] = [$datasimAP,$datasimCP,$datasimDP,$datasimB1P,$datasimb1up,$datasimB2P,$datasimb2up,$datasimAumumP];
        }else{
            $cabang = session('cabang_id');
            for($i = 1; $i < 13; $i++)
            {
                $bulan = str_pad($i, 2 , "0", STR_PAD_LEFT);
                $simAbaru = DB::table('tb_data_polres')
                ->where('polres_id',$cabang)
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
                    DB::raw('SUM(data_polres_sim_d_perpanjang) as simdbarup'),
                    DB::raw('SUM(data_polres_sim_b1_umum) as simb1ubaruum'),
                    DB::raw('SUM(data_polres_sim_b2_umum) as simb2ubaruum'),
                    DB::raw('SUM(data_polres_sim_b1_umum_perpanjang) as simb1ubaruumper'),
                    DB::raw('SUM(data_polres_sim_b2_umum_perpanjang) as simb2ubaruumper')
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
                $datasimb1u = $simAbaru->simb1ubaruum != null ? $simAbaru->simb1ubaruum : 0;
                $datasimb2u = $simAbaru->simb2ubaruum != null ? $simAbaru->simb2ubaruum : 0;
                $datasimb1up = $simAbaru->simb1ubaruumper != null ? $simAbaru->simb1ubaruumper : 0;
                $datasimb2up = $simAbaru->simb2ubaruumper != null ? $simAbaru->simb2ubaruumper : 0;
                
            }
            $data['datasimbaru'] = [$datasimA,$datasimC,$datasimD,$datasimB1,$datasimb1u,$datasimB2,$datasimb2u,$datasimAumum];
            $data['datasimperpanjang'] = [$datasimAP,$datasimCP,$datasimDP,$datasimB1P,$datasimb1up,$datasimB2P,$datasimb2up,$datasimAumumP];
        }
        
        
        return view('backend.template.home',$data);
    }

    public function realcount($level,$cabang)
    {
        $tahun = date('Y');
        if($level == 1)
        {

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
                    DB::raw('SUM(data_polres_sim_d_perpanjang) as simdbarup'),
                    DB::raw('SUM(data_polres_sim_b1_umum) as simb1ubaruum'),
                    DB::raw('SUM(data_polres_sim_b2_umum) as simb2ubaruum'),
                    DB::raw('SUM(data_polres_sim_b1_umum_perpanjang) as simb1ubaruumper'),
                    DB::raw('SUM(data_polres_sim_b2_umum_perpanjang) as simb2ubaruumper')
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
                $data['datasimb1u'] = $simAbaru->simb1ubaruum != null ? $simAbaru->simb1ubaruum : 0;
                $data['datasimb2u'] = $simAbaru->simb2ubaruum != null ? $simAbaru->simb2ubaruum : 0;
                $data['datasimb1up'] = $simAbaru->simb1ubaruumper != null ? $simAbaru->simb1ubaruumper : 0;
                $data['datasimb2up'] = $simAbaru->simb2ubaruumper != null ? $simAbaru->simb2ubaruumper : 0;
            }
        }else{
            for($i = 1; $i < 13; $i++)
            {
                $bulan = str_pad($i, 2 , "0", STR_PAD_LEFT);
                $simAbaru = DB::table('tb_data_polres')
                ->where('polres_id',$cabang)
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
                    DB::raw('SUM(data_polres_sim_d_perpanjang) as simdbarup'),
                    DB::raw('SUM(data_polres_sim_b1_umum) as simb1ubaruum'),
                    DB::raw('SUM(data_polres_sim_b2_umum) as simb2ubaruum'),
                    DB::raw('SUM(data_polres_sim_b1_umum_perpanjang) as simb1ubaruumper'),
                    DB::raw('SUM(data_polres_sim_b2_umum_perpanjang) as simb2ubaruumper')
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
                $data['datasimb1u'] = $simAbaru->simb1ubaruum != null ? $simAbaru->simb1ubaruum : 0;
                $data['datasimb2u'] = $simAbaru->simb2ubaruum != null ? $simAbaru->simb2ubaruum : 0;
                $data['datasimb1up'] = $simAbaru->simb1ubaruumper != null ? $simAbaru->simb1ubaruumper : 0;
                $data['datasimb2up'] = $simAbaru->simb2ubaruumper != null ? $simAbaru->simb2ubaruumper : 0;
            }
        }

        echo json_encode($data);
    }
}

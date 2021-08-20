<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $tahun = date('Y');
        $data['polres'] = DB::table('tb_cabang')->where('cabang_kode', '=', 1)->get();   
        for($i = 1; $i < 13; $i++)
            {
                $bulan = str_pad($i, 2 , "0", STR_PAD_LEFT);
                $simAbaru = DB::table('tb_data_biro')
                ->where(DB::raw('YEAR(data_biro_tgl)'),$tahun)
                ->select(
                    DB::raw('SUM(data_biro_sim_a_baru) as simabaru'),
                    DB::raw('SUM(data_biro_sim_c_baru) as simcbaru'),
                    DB::raw('SUM(data_biro_sim_ac_baru) as simacbaru'),
                    DB::raw('SUM(data_biro_sim_a_perpanjang) as simabarup'),
                    DB::raw('SUM(data_biro_sim_c_perpanjang) as simcbarup'),
                    DB::raw('SUM(data_biro_sim_ac_perpanjang) as simacbarup')
                )->first();

                $abaru = $simAbaru->simabaru != null ? $simAbaru->simabaru : 0;
                $cbaru = $simAbaru->simcbaru != null ? $simAbaru->simcbaru : 0;
                $acbaru = $simAbaru->simacbaru != null ? $simAbaru->simacbaru : 0;
                $abarup = $simAbaru->simabarup != null ? $simAbaru->simabarup : 0;
                $cbarup = $simAbaru->simcbarup != null ? $simAbaru->simcbarup : 0;
                $acbarup = $simAbaru->simacbarup != null ? $simAbaru->simacbarup : 0;
                
            }

            $data['datasimbaru'] = [$abaru,$cbaru,$acbaru];
            $data['datasimperpanjang'] = [$abarup,$cbarup,$acbarup];  
        
        return view('backend.template.home',$data);
    }

    public function grafik($level,$cabang,$bulan)
    {
        $bln = explode("-",$bulan);
        
        if(session('user_level') == 1)
        {
            if($cabang == 0)
            {
                $simAbaru = DB::table('tb_data_polres')
                ->join('tb_simlink','tb_simlink.id_data','=','tb_data_polres.data_polres_id')
                ->join('tb_bus','tb_bus.id_data','=','tb_data_polres.data_polres_id')
                ->where(DB::raw('MONTH(tb_data_polres.data_polres_tgl)'),$bln[1])
                ->where(DB::raw('YEAR(tb_data_polres.data_polres_tgl)'),$bln[0])
                ->select(
                    DB::raw('SUM(tb_data_polres.data_polres_sim_a_baru) as simabaru'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_a_umum_baru) as simabaruumum'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b1_baru) as simb1baru'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b2_baru) as simb2baru'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_c_baru) as simcbaru'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_d_baru) as simdbaru'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_a_perpanjang) as simabarup'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_a_umum_perpanjang) as simabaruumump'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b1_perpanjang) as simb1barup'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b2_perpanjang) as simb2barup'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_c_perpanjang) as simcbarup'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_d_perpanjang) as simdbarup'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b1_umum) as simb1ubaruum'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b2_umum) as simb2ubaruum'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b1_umum_perpanjang) as simb1ubaruumper'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b2_umum_perpanjang) as simb2ubaruumper'),
                    DB::raw('SUM(tb_data_polres.gerai_a) as gerai_a'),
                    DB::raw('SUM(tb_data_polres.gerai_c) as gerai_c'),
                    DB::raw('SUM(tb_data_polres.mpp_a) as mpp_a'),
                    DB::raw('SUM(tb_data_polres.mpp_c) as mpp_c'),
                    DB::raw('SUM(tb_bus.bus_a) as bus_a'),
                    DB::raw('SUM(tb_bus.bus_c) as bus_c'),
                    DB::raw('SUM(tb_simlink.simlink1_a) as simlink1_a'),
                    DB::raw('SUM(tb_simlink.simlink1_c) as simlink1_c'),
                    DB::raw('SUM(tb_simlink.simlink2_a) as simlink2_a'),
                    DB::raw('SUM(tb_simlink.simlink2_c) as simlink2_c'),
                )
                ->first();
            }else{
                $simAbaru = DB::table('tb_data_polres')
                ->join('tb_simlink','tb_simlink.id_data','=','tb_data_polres.data_polres_id')
                ->join('tb_bus','tb_bus.id_data','=','tb_data_polres.data_polres_id')
                ->where(DB::raw('MONTH(tb_data_polres.data_polres_tgl)'),$bln[1])
                ->where(DB::raw('YEAR(tb_data_polres.data_polres_tgl)'),$bln[0])
                ->where('tb_data_polres.polres_id',$cabang)
                ->select(
                    DB::raw('SUM(tb_data_polres.data_polres_sim_a_baru) as simabaru'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_a_umum_baru) as simabaruumum'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b1_baru) as simb1baru'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b2_baru) as simb2baru'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_c_baru) as simcbaru'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_d_baru) as simdbaru'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_a_perpanjang) as simabarup'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_a_umum_perpanjang) as simabaruumump'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b1_perpanjang) as simb1barup'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b2_perpanjang) as simb2barup'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_c_perpanjang) as simcbarup'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_d_perpanjang) as simdbarup'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b1_umum) as simb1ubaruum'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b2_umum) as simb2ubaruum'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b1_umum_perpanjang) as simb1ubaruumper'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b2_umum_perpanjang) as simb2ubaruumper'),
                    DB::raw('SUM(tb_data_polres.gerai_a) as gerai_a'),
                    DB::raw('SUM(tb_data_polres.gerai_c) as gerai_c'),
                    DB::raw('SUM(tb_data_polres.mpp_a) as mpp_a'),
                    DB::raw('SUM(tb_data_polres.mpp_c) as mpp_c'),
                    DB::raw('SUM(tb_bus.bus_a) as bus_a'),
                    DB::raw('SUM(tb_bus.bus_c) as bus_c'),
                    DB::raw('SUM(tb_simlink.simlink1_a) as simlink1_a'),
                    DB::raw('SUM(tb_simlink.simlink1_c) as simlink1_c'),
                    DB::raw('SUM(tb_simlink.simlink2_a) as simlink2_a'),
                    DB::raw('SUM(tb_simlink.simlink2_c) as simlink2_c'),
                )
                ->first();
            } 
        }else{
            $simAbaru = DB::table('tb_data_polres')
                ->join('tb_simlink','tb_simlink.id_data','=','tb_data_polres.data_polres_id')
                ->join('tb_bus','tb_bus.id_data','=','tb_data_polres.data_polres_id')
                ->where(DB::raw('MONTH(tb_data_polres.data_polres_tgl)'),$bln[1])
                ->where(DB::raw('YEAR(tb_data_polres.data_polres_tgl)'),$bln[0])
                ->where('tb_data_polres.polres_id',$cabang)
                ->select(
                    DB::raw('SUM(tb_data_polres.data_polres_sim_a_baru) as simabaru'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_a_umum_baru) as simabaruumum'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b1_baru) as simb1baru'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b2_baru) as simb2baru'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_c_baru) as simcbaru'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_d_baru) as simdbaru'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_a_perpanjang) as simabarup'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_a_umum_perpanjang) as simabaruumump'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b1_perpanjang) as simb1barup'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b2_perpanjang) as simb2barup'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_c_perpanjang) as simcbarup'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_d_perpanjang) as simdbarup'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b1_umum) as simb1ubaruum'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b2_umum) as simb2ubaruum'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b1_umum_perpanjang) as simb1ubaruumper'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b2_umum_perpanjang) as simb2ubaruumper'),
                    DB::raw('SUM(tb_data_polres.gerai_a) as gerai_a'),
                    DB::raw('SUM(tb_data_polres.gerai_c) as gerai_c'),
                    DB::raw('SUM(tb_data_polres.mpp_a) as mpp_a'),
                    DB::raw('SUM(tb_data_polres.mpp_c) as mpp_c'),
                    DB::raw('SUM(tb_bus.bus_a) as bus_a'),
                    DB::raw('SUM(tb_bus.bus_c) as bus_c'),
                    DB::raw('SUM(tb_simlink.simlink1_a) as simlink1_a'),
                    DB::raw('SUM(tb_simlink.simlink1_c) as simlink1_c'),
                    DB::raw('SUM(tb_simlink.simlink2_a) as simlink2_a'),
                    DB::raw('SUM(tb_simlink.simlink2_c) as simlink2_c'),
                )
                ->first();
                
            
        }
                $abaru = $simAbaru->simabaru != null ? $simAbaru->simabaru : 0;
                $cbaru = $simAbaru->simcbaru != null ? $simAbaru->simcbaru : 0;
                $dbaru = $simAbaru->simdbaru != null ? $simAbaru->simdbaru : 0;
                // peningkatan
                $aumumbaru = $simAbaru->simabaruumum != null ? $simAbaru->simabaruumum : 0;
                $b1baru = $simAbaru->simb1baru != null ? $simAbaru->simb1baru : 0;
                $datasimb1u = $simAbaru->simb1ubaruum != null ? $simAbaru->simb1ubaruum : 0;
                $b2baru = $simAbaru->simb2baru != null ? $simAbaru->simb2baru : 0;
                $datasimb2u = $simAbaru->simb2ubaruum != null ? $simAbaru->simb2ubaruum : 0;
                // perpanjang
                $aperpanjang = $simAbaru->simabarup != null ? $simAbaru->simabarup : 0;
                $aumumperpanjang = $simAbaru->simabaruumump != null ? $simAbaru->simabaruumump : 0;
                $cperpanjang = $simAbaru->simcbarup != null ? $simAbaru->simcbarup : 0;
                $b1perpanjang = $simAbaru->simb1barup != null ? $simAbaru->simb1barup : 0;
                $b2perpanjang = $simAbaru->simb2barup != null ? $simAbaru->simb2barup : 0;
                $dperpanjang = $simAbaru->simdbarup != null ? $simAbaru->simdbarup : 0;
                $datasimb1up = $simAbaru->simb1ubaruumper != null ? $simAbaru->simb1ubaruumper : 0;
                $datasimb2up = $simAbaru->simb2ubaruumper != null ? $simAbaru->simb2ubaruumper : 0;
                $gerai_a = $simAbaru->gerai_a != null ? $simAbaru->gerai_a : 0;
                $gerai_c = $simAbaru->gerai_c != null ? $simAbaru->gerai_c : 0;
                $bus_a = $simAbaru->bus_a != null ? $simAbaru->bus_a : 0;
                $bus_c = $simAbaru->bus_c != null ? $simAbaru->bus_c : 0;
                $mpp_a = $simAbaru->mpp_a != null ? $simAbaru->mpp_a : 0;
                $mpp_c = $simAbaru->mpp_c != null ? $simAbaru->mpp_c : 0;
                $simlink1_a = $simAbaru->simlink1_a != null ? $simAbaru->simlink1_a : 0;
                $simlink1_c = $simAbaru->simlink1_c != null ? $simAbaru->simlink1_c : 0;
                $simlink2_a = $simAbaru->simlink2_a != null ? $simAbaru->simlink2_a : 0;
                $simlink2_c = $simAbaru->simlink2_c != null ? $simAbaru->simlink2_c : 0;

        $data['datasimbaru'] = [
            $abaru,
            $cbaru,
            $dbaru,
            $aumumbaru,
            $b1baru,
            $datasimb1u,
            $b2baru,
            $datasimb2u];
        $data['datasimperpanjang'] = [
            ($aperpanjang + $gerai_a + $bus_a + $mpp_a + $simlink1_a + $simlink2_a),
            ($cperpanjang + $gerai_c + $bus_c + $mpp_c + $simlink1_c + $simlink2_c),
            $dperpanjang,
            $b1perpanjang,
            $datasimb1up,
            $b2perpanjang,
            $datasimb2up,
            $aumumperpanjang,
        ];
        return view('backend.template.chart.chartHome',$data);
    }
 
    public function realcount($level,$cabang,$bulan)
    {
        $bln = explode("-",$bulan);
        $data['periode'] = bulantahun($bulan);
        if($level == 1)
        {
            if($cabang == 0)
            {
                $simAbaru = DB::table('tb_data_polres')
                ->join('tb_simlink','tb_simlink.id_data','=','tb_data_polres.data_polres_id')
                ->join('tb_bus','tb_bus.id_data','=','tb_data_polres.data_polres_id')
                ->where(DB::raw('MONTH(tb_data_polres.data_polres_tgl)'),$bln[1])
                ->where(DB::raw('YEAR(tb_data_polres.data_polres_tgl)'),$bln[0])
                ->select(
                    DB::raw('SUM(tb_data_polres.data_polres_sim_a_baru) as simabaru'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_a_umum_baru) as simabaruumum'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b1_baru) as simb1baru'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b2_baru) as simb2baru'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_c_baru) as simcbaru'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_d_baru) as simdbaru'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_a_perpanjang) as simabarup'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_a_umum_perpanjang) as simabaruumump'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b1_perpanjang) as simb1barup'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b2_perpanjang) as simb2barup'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_c_perpanjang) as simcbarup'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_d_perpanjang) as simdbarup'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b1_umum) as simb1ubaruum'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b2_umum) as simb2ubaruum'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b1_umum_perpanjang) as simb1ubaruumper'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b2_umum_perpanjang) as simb2ubaruumper'),
                    DB::raw('SUM(tb_data_polres.gerai_a) as gerai_a'),
                    DB::raw('SUM(tb_data_polres.gerai_c) as gerai_c'),
                    DB::raw('SUM(tb_data_polres.mpp_a) as mpp_a'),
                    DB::raw('SUM(tb_data_polres.mpp_c) as mpp_c'),
                    DB::raw('SUM(tb_bus.bus_a) as bus_a'),
                    DB::raw('SUM(tb_bus.bus_c) as bus_c'),
                    DB::raw('SUM(tb_simlink.simlink1_a) as simlink1_a'),
                    DB::raw('SUM(tb_simlink.simlink1_c) as simlink1_c'),
                    DB::raw('SUM(tb_simlink.simlink2_a) as simlink2_a'),
                    DB::raw('SUM(tb_simlink.simlink2_c) as simlink2_c'),
                )
                ->first();
                
            }else{
                $simAbaru = DB::table('tb_data_polres')
                ->join('tb_simlink','tb_simlink.id_data','=','tb_data_polres.data_polres_id')
                ->join('tb_bus','tb_bus.id_data','=','tb_data_polres.data_polres_id')
                ->where(DB::raw('MONTH(tb_data_polres.data_polres_tgl)'),$bln[1])
                ->where(DB::raw('YEAR(tb_data_polres.data_polres_tgl)'),$bln[0])
                ->where('tb_data_polres.polres_id',$cabang)
                ->select(
                    DB::raw('SUM(data_polres_sim_a_baru) as simabaru'),
                    DB::raw('SUM(data_polres_sim_c_baru) as simcbaru'),
                    DB::raw('SUM(data_polres_sim_d_baru) as simdbaru'),
                    DB::raw('SUM(data_polres_sim_a_umum_baru) as simabaruumum'),
                    DB::raw('SUM(data_polres_sim_b1_baru) as simb1baru'),
                    DB::raw('SUM(data_polres_sim_b2_baru) as simb2baru'),
                    DB::raw('SUM(data_polres_sim_a_perpanjang) as simabarup'),
                    DB::raw('SUM(data_polres_sim_a_umum_perpanjang) as simabaruumump'),
                    DB::raw('SUM(data_polres_sim_b1_perpanjang) as simb1barup'),
                    DB::raw('SUM(data_polres_sim_b2_perpanjang) as simb2barup'),
                    DB::raw('SUM(data_polres_sim_c_perpanjang) as simcbarup'),
                    DB::raw('SUM(data_polres_sim_d_perpanjang) as simdbarup'),
                    DB::raw('SUM(data_polres_sim_b1_umum) as simb1ubaruum'),
                    DB::raw('SUM(data_polres_sim_b2_umum) as simb2ubaruum'),
                    DB::raw('SUM(data_polres_sim_b1_umum_perpanjang) as simb1ubaruumper'),
                    DB::raw('SUM(data_polres_sim_b2_umum_perpanjang) as simb2ubaruumper'),
                    DB::raw('SUM(tb_data_polres.gerai_a) as gerai_a'),
                    DB::raw('SUM(tb_data_polres.gerai_c) as gerai_c'),
                    DB::raw('SUM(tb_data_polres.mpp_a) as mpp_a'),
                    DB::raw('SUM(tb_data_polres.mpp_c) as mpp_c'),
                    DB::raw('SUM(tb_bus.bus_a) as bus_a'),
                    DB::raw('SUM(tb_bus.bus_c) as bus_c'),
                    DB::raw('SUM(tb_simlink.simlink1_a) as simlink1_a'),
                    DB::raw('SUM(tb_simlink.simlink1_c) as simlink1_c'),
                    DB::raw('SUM(tb_simlink.simlink2_a) as simlink2_a'),
                    DB::raw('SUM(tb_simlink.simlink2_c) as simlink2_c'),
                )
                ->first();
            }
            $data['abaru'] = $simAbaru->simabaru != null ? $simAbaru->simabaru : 0;
            $data['cbaru'] = $simAbaru->simcbaru != null ? $simAbaru->simcbaru : 0;
            $data['dbaru'] = $simAbaru->simdbaru != null ? $simAbaru->simdbaru : 0;
            // peningkatan
            $data['aumumbaru'] = $simAbaru->simabaruumum != null ? $simAbaru->simabaruumum : 0;
            $data['b1baru'] = $simAbaru->simb1baru != null ? $simAbaru->simb1baru : 0;
            $data['datasimb1u'] = $simAbaru->simb1ubaruum != null ? $simAbaru->simb1ubaruum : 0;
            $data['b2baru'] = $simAbaru->simb2baru != null ? $simAbaru->simb2baru : 0;
            $data['datasimb2u'] = $simAbaru->simb2ubaruum != null ? $simAbaru->simb2ubaruum : 0;
            // perpanjang
            $simab = $simAbaru->simabarup != null ? $simAbaru->simabarup : 0;
            $gerai_a = $simAbaru->gerai_a != null ? $simAbaru->gerai_a : 0;
            $mpp_a = $simAbaru->mpp_a != null ? $simAbaru->mpp_a : 0;
            $bus_a = $simAbaru->bus_a != null ? $simAbaru->bus_a : 0;
            $simlink1_a = $simAbaru->simlink1_a != null ? $simAbaru->simlink1_a : 0;
            $simlink2_a = $simAbaru->simlink2_a != null ? $simAbaru->simlink2_a : 0;
            // 
            $simcb = $simAbaru->simcbarup != null ? $simAbaru->simcbarup : 0;
            $gerai_c = $simAbaru->gerai_c != null ? $simAbaru->gerai_c : 0;
            $mpp_c = $simAbaru->mpp_c != null ? $simAbaru->mpp_c : 0;
            $bus_c = $simAbaru->bus_c != null ? $simAbaru->bus_c : 0;
            $simlink1_c = $simAbaru->simlink1_c != null ? $simAbaru->simlink1_c : 0;
            $simlink2_c = $simAbaru->simlink2_c != null ? $simAbaru->simlink2_c : 0;
            
            $data['aperpanjang'] = ($simab + $gerai_a + $mpp_a + $bus_a + $simlink1_a + $simlink2_a);
            $data['aumumperpanjang'] = $simAbaru->simabaruumump != null ? $simAbaru->simabaruumump : 0;
            $data['cperpanjang'] = ($simcb + $gerai_c + $mpp_c + $bus_c + $simlink1_c + $simlink2_c);
            $data['b1perpanjang'] = $simAbaru->simb1barup != null ? $simAbaru->simb1barup : 0;
            $data['b2perpanjang'] = $simAbaru->simb2barup != null ? $simAbaru->simb2barup : 0;
            $data['dperpanjang'] = $simAbaru->simdbarup != null ? $simAbaru->simdbarup : 0;
            $data['datasimb1up'] = $simAbaru->simb1ubaruumper != null ? $simAbaru->simb1ubaruumper : 0;
            $data['datasimb2up'] = $simAbaru->simb2ubaruumper != null ? $simAbaru->simb2ubaruumper : 0;
        }elseif($level == 3){
            for($i = 1; $i < 13; $i++)
            {
                $bulan = str_pad($i, 2 , "0", STR_PAD_LEFT);
                $simAbaru = DB::table('tb_data_biro')
                ->where('biro_id',$cabang)
                ->where(DB::raw('YEAR(data_biro_tgl)'),$tahun)
                ->select(
                    DB::raw('SUM(data_biro_sim_a_baru) as simabaru'),
                    DB::raw('SUM(data_biro_sim_c_baru) as simcbaru'),
                    DB::raw('SUM(data_biro_sim_ac_baru) as simacbaru'),
                    DB::raw('SUM(data_biro_sim_a_perpanjang) as simabarup'),
                    DB::raw('SUM(data_biro_sim_c_perpanjang) as simcbarup'),
                    DB::raw('SUM(data_biro_sim_ac_perpanjang) as simacbarup')
                )->first();

                $data['abaru'] = $simAbaru->simabaru != null ? $simAbaru->simabaru : 0;
                $data['cbaru'] = $simAbaru->simcbaru != null ? $simAbaru->simcbaru : 0;
                $data['acbaru'] = $simAbaru->simacbaru != null ? $simAbaru->simacbaru : 0;
                $data['abarup'] = $simAbaru->simabarup != null ? $simAbaru->simabarup : 0;
                $data['cbarup'] = $simAbaru->simcbarup != null ? $simAbaru->simcbarup : 0;
                $data['acbarup'] = $simAbaru->simacbarup != null ? $simAbaru->simacbarup : 0;
                
            }
        }else{
                $simAbaru = DB::table('tb_data_polres')
                ->join('tb_simlink','tb_simlink.id_data','=','tb_data_polres.data_polres_id')
                ->join('tb_bus','tb_bus.id_data','=','tb_data_polres.data_polres_id')
                ->where('tb_data_polres.polres_id',$cabang)
                ->where(DB::raw('MONTH(tb_data_polres.data_polres_tgl)'),$bln[1])
                ->where(DB::raw('YEAR(tb_data_polres.data_polres_tgl)'),$bln[0])
                ->select(
                    DB::raw('SUM(tb_data_polres.data_polres_sim_a_baru) as simabaru'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_a_umum_baru) as simabaruumum'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b1_baru) as simb1baru'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b2_baru) as simb2baru'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_c_baru) as simcbaru'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_d_baru) as simdbaru'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_a_perpanjang) as simabarup'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_a_umum_perpanjang) as simabaruumump'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b1_perpanjang) as simb1barup'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b2_perpanjang) as simb2barup'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_c_perpanjang) as simcbarup'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_d_perpanjang) as simdbarup'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b1_umum) as simb1ubaruum'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b2_umum) as simb2ubaruum'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b1_umum_perpanjang) as simb1ubaruumper'),
                    DB::raw('SUM(tb_data_polres.data_polres_sim_b2_umum_perpanjang) as simb2ubaruumper'),
                    DB::raw('SUM(tb_data_polres.gerai_a) as gerai_a'),
                    DB::raw('SUM(tb_data_polres.gerai_c) as gerai_c'),
                    DB::raw('SUM(tb_data_polres.mpp_a) as mpp_a'),
                    DB::raw('SUM(tb_data_polres.mpp_c) as mpp_c'),
                    DB::raw('SUM(tb_bus.bus_a) as bus_a'),
                    DB::raw('SUM(tb_bus.bus_c) as bus_c'),
                    DB::raw('SUM(tb_simlink.simlink1_a) as simlink1_a'),
                    DB::raw('SUM(tb_simlink.simlink1_c) as simlink1_c'),
                    DB::raw('SUM(tb_simlink.simlink2_a) as simlink2_a'),
                    DB::raw('SUM(tb_simlink.simlink2_c) as simlink2_c'),
                )
                ->first();
                $data['abaru'] = $simAbaru->simabaru != null ? $simAbaru->simabaru : 0;
                $data['cbaru'] = $simAbaru->simcbaru != null ? $simAbaru->simcbaru : 0;
                $data['dbaru'] = $simAbaru->simdbaru != null ? $simAbaru->simdbaru : 0;
                // peningkatan
                $data['aumumbaru'] = $simAbaru->simabaruumum != null ? $simAbaru->simabaruumum : 0;
                $data['b1baru'] = $simAbaru->simb1baru != null ? $simAbaru->simb1baru : 0;
                $data['datasimb1u'] = $simAbaru->simb1ubaruum != null ? $simAbaru->simb1ubaruum : 0;
                $data['b2baru'] = $simAbaru->simb2baru != null ? $simAbaru->simb2baru : 0;
                $data['datasimb2u'] = $simAbaru->simb2ubaruum != null ? $simAbaru->simb2ubaruum : 0;
                // perpanjang
                $simab = $simAbaru->simabarup != null ? $simAbaru->simabarup : 0;
                $gerai_a = $simAbaru->gerai_a != null ? $simAbaru->gerai_a : 0;
                $mpp_a = $simAbaru->mpp_a != null ? $simAbaru->mpp_a : 0;
                $bus_a = $simAbaru->bus_a != null ? $simAbaru->bus_a : 0;
                $simlink1_a = $simAbaru->simlink1_a != null ? $simAbaru->simlink1_a : 0;
                $simlink2_a = $simAbaru->simlink2_a != null ? $simAbaru->simlink2_a : 0;
                // 
                $simcb = $simAbaru->simcbarup != null ? $simAbaru->simcbarup : 0;
                $gerai_c = $simAbaru->gerai_c != null ? $simAbaru->gerai_c : 0;
                $mpp_c = $simAbaru->mpp_c != null ? $simAbaru->mpp_c : 0;
                $bus_c = $simAbaru->bus_c != null ? $simAbaru->bus_c : 0;
                $simlink1_c = $simAbaru->simlink1_c != null ? $simAbaru->simlink1_c : 0;
                $simlink2_c = $simAbaru->simlink2_c != null ? $simAbaru->simlink2_c : 0;
                
                $data['aperpanjang'] = ($simab + $gerai_a + $mpp_a + $bus_a + $simlink1_a + $simlink2_a);
                $data['aumumperpanjang'] = $simAbaru->simabaruumump != null ? $simAbaru->simabaruumump : 0;
                $data['cperpanjang'] = ($simcb + $gerai_c + $mpp_c + $bus_c + $simlink1_c + $simlink2_c);
                $data['b1perpanjang'] = $simAbaru->simb1barup != null ? $simAbaru->simb1barup : 0;
                $data['b2perpanjang'] = $simAbaru->simb2barup != null ? $simAbaru->simb2barup : 0;
                $data['dperpanjang'] = $simAbaru->simdbarup != null ? $simAbaru->simdbarup : 0;
                $data['datasimb1up'] = $simAbaru->simb1ubaruumper != null ? $simAbaru->simb1ubaruumper : 0;
                $data['datasimb2up'] = $simAbaru->simb2ubaruumper != null ? $simAbaru->simb2ubaruumper : 0;
            
        }

        echo json_encode($data);
    }
}

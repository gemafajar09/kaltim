<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ReportPolda;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use Illuminate\Support\Facades\Validator;
use File;

class DataPolresController extends Controller
{
    public function index()
    {
        return view('backend.input.polres');
    }

    public function save(Request $r)
    {
        if($r->data_polres_id == '')
        {
            // input ke tb_data_polres
            $id = DB::table('tb_data_polres')->insertGetId([
                'polres_id' => $r->polres_id,
                'data_polres_tgl' => $r->data_polres_tgl,
                'data_polres_sim_a_baru' => $r->data_polres_sim_a_baru != '' ? $r->data_polres_sim_a_baru : 0,
                'data_polres_sim_a_umum_baru' => $r->data_polres_sim_a_umum_baru != '' ? $r->data_polres_sim_a_umum_baru : 0,
                'data_polres_sim_b1_baru' => $r->data_polres_sim_b1_baru != '' ? $r->data_polres_sim_b1_baru : 0,
                'data_polres_sim_b2_baru' => $r->data_polres_sim_b2_baru != '' ? $r->data_polres_sim_b2_baru : 0,
                'data_polres_sim_c_baru' => $r->data_polres_sim_c_baru != '' ? $r->data_polres_sim_c_baru : 0,
                'data_polres_sim_d_baru' => $r->data_polres_sim_d_baru != '' ? $r->data_polres_sim_d_baru : 0,
                'data_polres_sim_a_perpanjang' => $r->data_polres_sim_a_perpanjang != '' ? $r->data_polres_sim_a_perpanjang : 0,
                'data_polres_sim_a_umum_perpanjang' => $r->data_polres_sim_a_umum_perpanjang != '' ? $r->data_polres_sim_a_umum_perpanjang : 0,
                'data_polres_sim_b1_perpanjang' => $r->data_polres_sim_b1_perpanjang != '' ? $r->data_polres_sim_b1_perpanjang : 0,
                'data_polres_sim_b2_perpanjang' => $r->data_polres_sim_b2_perpanjang != '' ? $r->data_polres_sim_b2_perpanjang : 0,
                'data_polres_sim_c_perpanjang' => $r->data_polres_sim_c_perpanjang != '' ? $r->data_polres_sim_c_perpanjang : 0,
                'data_polres_sim_d_perpanjang' => $r->data_polres_sim_d_perpanjang != '' ? $r->data_polres_sim_d_perpanjang : 0,
                'data_polres_sim_b1_umum' => $r->data_polres_sim_b1_umum != '' ? $r->data_polres_sim_b1_umum : 0,
                'data_polres_sim_b2_umum' => $r->data_polres_sim_b2_umum != '' ? $r->data_polres_sim_b2_umum : 0,
                'data_polres_sim_b1_umum_perpanjang' => $r->data_polres_sim_b1_umum_perpanjang != '' ? $r->data_polres_sim_b1_umum_perpanjang : 0,
                'data_polres_sim_b2_umum_perpanjang' => $r->data_polres_sim_b2_umum_perpanjang != '' ? $r->data_polres_sim_b2_umum_perpanjang : 0,
                'rusak' => $r->rusak != '' ? $r->rusak : 0,
                'gerai_a' => $r->geraia != '' ? $r->geraia : 0,
                'gerai_c' => $r->geraic != '' ? $r->geraic : 0,
                'gerai_rusak' => $r->gerairusak != '' ? $r->gerairusak : 0,
                'mpp_a' => $r->mppa != '' ? $r->mppa : 0,
                'mpp_c' => $r->mppc != '' ? $r->mppc : 0,
                'mpp_rusak' => $r->mpprusak != '' ? $r->mpprusak : 0
            ]);
            $id_biro = $r->id_biro;
            
            // dd($id_biro);
            DB::table('tb_simlink')->insert([
                'id_data' => $id, 
                'simlink1_a' => $r->simlink1_a != '' ? $r->simlink1_a : 0, 
                'simlink1_c' => $r->simlink1_c != '' ? $r->simlink1_c : 0,
                'simlink1_rusak' => $r->simlink1_rusak != '' ? $r->simlink1_rusak : 0,
                'simlink2_a' => $r->simlink2_a != '' ? $r->simlink2_a : 0,
                'simlink2_c' => $r->simlink2_c != '' ? $r->simlink2_c : 0,
                'simlink2_rusak' => $r->simlink2_rusak != '' ? $r->simlink2_rusak : 0,
                'id_cabang' => $r->polres_id,
                'tanggal' => date('Y-m-d')
            ]);

            DB::table('tb_bus')->insert([
                'bus_a' => $r->bus_a != '' ? $r->bus_a : 0,
                'bus_c' => $r->bus_c != '' ? $r->bus_c : 0,
                'bus_rusak' => $r->bus_rusak != '' ? $r->bus_rusak : 0,
                'id_data' => $id,
                'tanggal' => date('Y-m-d'),
                'id_polres' => $r->polres_id

            ]);

            foreach($id_biro as $i => $a)
            {
                DB::table('tb_detail')->insert([
                    'id_data' => $id,
                    'id_biro' => $id_biro[$i],
                    'sim_a_baru' => $r->data_biro_sim_a_baru[$i],
                    'sim_c_baru' => $r->data_biro_sim_c_baru[$i],
                    'sim_ac_baru' => $r->data_biro_sim_ac_baru[$i],
                    'id_cabang' => $r->polres_id,
                    'tanggal' => date('Y-m-d')
                    ]);
            }
            return redirect('report-polres')->with('pesan','Input Data Success');
        }else{
            $up = DB::table('tb_data_polres')->where('data_polres_id',$r->data_polres_id)->update([
                'data_polres_sim_a_baru' => $r->data_polres_sim_a_baru != '' ? $r->data_polres_sim_a_baru : 0,
                'data_polres_sim_a_umum_baru' => $r->data_polres_sim_a_umum_baru != '' ? $r->data_polres_sim_a_umum_baru : 0,
                'data_polres_sim_b1_baru' => $r->data_polres_sim_b1_baru != '' ? $r->data_polres_sim_b1_baru : 0,
                'data_polres_sim_b2_baru' => $r->data_polres_sim_b2_baru != '' ? $r->data_polres_sim_b2_baru : 0,
                'data_polres_sim_c_baru' => $r->data_polres_sim_c_baru != '' ? $r->data_polres_sim_c_baru : 0,
                'data_polres_sim_d_baru' => $r->data_polres_sim_d_baru != '' ? $r->data_polres_sim_d_baru : 0,
                'data_polres_sim_a_perpanjang' => $r->data_polres_sim_a_perpanjang != '' ? $r->data_polres_sim_a_perpanjang : 0,
                'data_polres_sim_a_umum_perpanjang' => $r->data_polres_sim_a_umum_perpanjang != '' ? $r->data_polres_sim_a_umum_perpanjang : 0,
                'data_polres_sim_b1_perpanjang' => $r->data_polres_sim_b1_perpanjang != '' ? $r->data_polres_sim_b1_perpanjang : 0,
                'data_polres_sim_b2_perpanjang' => $r->data_polres_sim_b2_perpanjang != '' ? $r->data_polres_sim_b2_perpanjang : 0,
                'data_polres_sim_c_perpanjang' => $r->data_polres_sim_c_perpanjang != '' ? $r->data_polres_sim_c_perpanjang : 0,
                'data_polres_sim_d_perpanjang' => $r->data_polres_sim_d_perpanjang != '' ? $r->data_polres_sim_d_perpanjang : 0,
                'data_polres_sim_b1_umum' => $r->data_polres_sim_b1_umum != '' ? $r->data_polres_sim_b1_umum : 0,
                'data_polres_sim_b2_umum' => $r->data_polres_sim_b2_umum != '' ? $r->data_polres_sim_b2_umum : 0,
                'data_polres_sim_b1_umum_perpanjang' => $r->data_polres_sim_b1_umum_perpanjang != '' ? $r->data_polres_sim_b1_umum_perpanjang : 0,
                'data_polres_sim_b2_umum_perpanjang' => $r->data_polres_sim_b2_umum_perpanjang != '' ? $r->data_polres_sim_b2_umum_perpanjang : 0,
                'rusak' => $r->rusak != '' ? $r->rusak : 0,
                'gerai_a' => $r->geraia != '' ? $r->geraia : 0,
                'gerai_c' => $r->geraic != '' ? $r->geraic : 0,
                'gerai_rusak' => $r->gerairusak != '' ? $r->gerairusak : 0,
                'mpp_a' => $r->mppa != '' ? $r->mppa : 0,
                'mpp_c' => $r->mppc != '' ? $r->mppc : 0,
                'mpp_rusak' => $r->mpprusak != '' ? $r->mpprusak : 0
            ]);
            
            // dd($id_biro);
            DB::table('tb_simlink')->where('simlink_id', $r->simlink_id)->update([
                'simlink1_a' => $r->simlink1_a != '' ? $r->simlink1_a : 0, 
                'simlink1_c' => $r->simlink1_c != '' ? $r->simlink1_c : 0,
                'simlink1_rusak' => $r->simlink1_rusak != '' ? $r->simlink1_rusak : 0,
                'simlink2_a' => $r->simlink2_a != '' ? $r->simlink2_a : 0,
                'simlink2_c' => $r->simlink2_c != '' ? $r->simlink2_c : 0,
                'simlink2_rusak' => $r->simlink2_rusak != '' ? $r->simlink2_rusak : 0
            ]);

            DB::table('tb_bus')->where('bus_id',$r->bus_id)->update([
                'bus_a' => $r->bus_a != '' ? $r->bus_a : 0,
                'bus_c' => $r->bus_c != '' ? $r->bus_c : 0,
                'bus_rusak' => $r->bus_rusak != '' ? $r->bus_rusak : 0

            ]);

            $id_detail = $r->id_detail;
            foreach($id_detail as $i => $a)
            {
                DB::table('tb_detail')->where('id_detail',$id_detail)->update([
                    'sim_a_baru' => $r->data_biro_sim_a_baru[$i] != '' ? $r->data_biro_sim_a_baru[$i] : 0,
                    'sim_c_baru' => $r->data_biro_sim_c_baru[$i] != '' ? $r->data_biro_sim_c_baru[$i] : 0,
                    'sim_ac_baru' => $r->data_biro_sim_ac_baru[$i] != '' ? $r->data_biro_sim_ac_baru[$i] : 0
                    ]);
            }
            return redirect('report-polres')->with('pesan','Update Data Success');
        }
    }

    public function delete($idb)
    {
        $id = decrypt($idb);
        $del = DB::table('tb_data_polres')->where('data_polres_id',$id)->delete();
        DB::table('tb_bus')->where('id_data',$id)->delete();
        DB::table('tb_detail')->where('id_data',$id)->delete();
        DB::table('tb_simlink')->where('id_data',$id)->delete();
        
        if($del == TRUE)
        {
            return back()->with('pesan', 'Hapus Data Berhasil');
        }else{
            return back()->with('error', 'Hapus Data Gagal');
        }
    }

    public function report_polres()
    {
        $polres = DB::table('tb_cabang')->where('cabang_kode', '=', 1)->get();
        return view('backend.report.polres', compact('polres'));
    }

    public function datatable($cabang, $dari, $sampai)
    {
        if($cabang == 0 && $dari == 0 && $sampai == 0)
        {
            $bulan = date('Y-m-d');

            if(session()->get('user_level')  == 1){
                $data = DB::table('tb_data_polres')
                    ->join('tb_cabang','tb_cabang.cabang_id','=','tb_data_polres.polres_id')
                    ->select('tb_data_polres.*', 'tb_cabang.cabang_nama')
                    ->where('tb_data_polres.data_polres_tgl',$bulan)
                    ->get();
            
            }else{

                $data = DB::table('tb_data_polres')
                    ->join('tb_cabang','tb_cabang.cabang_id','=','tb_data_polres.polres_id')
                    ->select('tb_data_polres.*', 'tb_cabang.cabang_nama')
                    ->where('tb_data_polres.data_polres_tgl',$bulan)
                    ->where('tb_data_polres.polres_id','=', $cabang)
                    ->get();
                
            }


        }elseif($cabang != 0 && $dari == 0 && $sampai == 0){
            $data = DB::table('tb_data_polres')
                    ->join('tb_cabang','tb_cabang.cabang_id','=','tb_data_polres.polres_id')
                    ->select('tb_data_polres.*', 'tb_cabang.cabang_nama')
                    ->where('tb_data_polres.polres_id','=', $cabang)
                    ->get();

        }elseif($cabang == 0 && $dari != 0 && $sampai != 0){
            $data = DB::table('tb_data_polres')
                    ->join('tb_cabang','tb_cabang.cabang_id','=','tb_data_polres.polres_id')
                    ->select('tb_data_polres.*', 'tb_cabang.cabang_nama')
                    ->whereBetween('tb_data_polres.data_polres_tgl',[$dari,$sampai])
                    ->get();

        }else{
            $data = DB::table('tb_data_polres')
                    ->join('tb_cabang','tb_cabang.cabang_id','=','tb_data_polres.polres_id')
                    ->select('tb_data_polres.*', 'tb_cabang.cabang_nama')
                    ->whereBetween('tb_data_polres.data_polres_tgl',[$dari,$sampai])
                    ->where('tb_data_polres.polres_id','=', $cabang)
                    ->get();
        }
        return view('backend.report.tabelpolres',compact('data'));
    }

    public function detail(Request $r)
    {
        $id = $r->id;
        $data['isi'] = DB::table('tb_detail')
                        ->join('tb_cabang','tb_cabang.cabang_id','tb_detail.id_biro')
                        ->where('tb_detail.id_data',$id)
                        ->get();

        $data['isi_simlink'] = DB::table('tb_simlink')
                                ->join('tb_data_polres','tb_data_polres.data_polres_id','tb_simlink.id_data')
                                ->where('tb_simlink.id_data',$id)
                                ->get();
        // dd($data['isi']);
        return view('backend.report.polresdetail',$data);
    }
 
    public function exportexcel($cabang, $dari, $sampai)
    {
        $bulan = date('m');
        if($cabang == 0 && $dari == 0 && $sampai == 0)
        {

            if(session()->get('user_level')  == 1){
                $data['type'] = 'Semua Data';
                $data['isi'] = DB::table('tb_data_polres')
                    ->join('tb_cabang','tb_cabang.cabang_id','tb_data_polres.polres_id')
                    ->groupBy('tb_data_polres.polres_id')
                    ->where(DB::raw('MONTH(tb_data_polres.data_polres_tgl)'),$bulan)
                    ->select(
                        DB::raw('tb_cabang.*'),
                        DB::raw('tb_data_polres.data_polres_id as data_polres_id'),
                        DB::raw('SUM(tb_data_polres.data_polres_sim_a_baru) as data_polres_sim_a_baru'),
                        DB::raw('SUM(tb_data_polres.data_polres_sim_a_umum_baru) as data_polres_sim_a_umum_baru'),
                        DB::raw('SUM(tb_data_polres.data_polres_sim_b1_baru) as data_polres_sim_b1_baru'),
                        DB::raw('SUM(tb_data_polres.data_polres_sim_b2_baru) as data_polres_sim_b2_baru'),
                        DB::raw('SUM(tb_data_polres.data_polres_sim_c_baru) as data_polres_sim_c_baru'),
                        DB::raw('SUM(tb_data_polres.data_polres_sim_d_baru) as data_polres_sim_d_baru'),
                        DB::raw('SUM(tb_data_polres.data_polres_sim_a_perpanjang) as data_polres_sim_a_perpanjang'),
                        DB::raw('SUM(tb_data_polres.data_polres_sim_a_umum_perpanjang) as data_polres_sim_a_umum_perpanjang'),
                        DB::raw('SUM(tb_data_polres.data_polres_sim_b1_perpanjang) as data_polres_sim_b1_perpanjang'),
                        DB::raw('SUM(tb_data_polres.data_polres_sim_b2_perpanjang) as data_polres_sim_b2_perpanjang'),
                        DB::raw('SUM(tb_data_polres.data_polres_sim_c_perpanjang) as data_polres_sim_c_perpanjang'),
                        DB::raw('SUM(tb_data_polres.data_polres_sim_d_perpanjang) as data_polres_sim_d_perpanjang'),
                        DB::raw('SUM(tb_data_polres.data_polres_sim_b1_umum) as data_polres_sim_b1_umum'),
                        DB::raw('SUM(tb_data_polres.data_polres_sim_b2_umum) as data_polres_sim_b2_umum'),
                        DB::raw('SUM(tb_data_polres.data_polres_sim_b1_umum_perpanjang) as data_polres_sim_b1_umum_perpanjang'),
                        DB::raw('SUM(tb_data_polres.data_polres_sim_b2_umum_perpanjang) as data_polres_sim_b2_umum_perpanjang'),
                        DB::raw('SUM(tb_data_polres.rusak) as rusak'),
                        DB::raw('SUM(tb_data_polres.gerai_a) as gerai_a'),
                        DB::raw('SUM(tb_data_polres.gerai_c) as gerai_c'),
                        DB::raw('SUM(tb_data_polres.gerai_rusak) as gerai_rusak'),
                        DB::raw('SUM(tb_data_polres.mpp_a) as mpp_a'),
                        DB::raw('SUM(tb_data_polres.mpp_c) as mpp_c'),
                        DB::raw('SUM(tb_data_polres.mpp_rusak) as mpp_rusak')
                        )
                    ->get();
            }else{
                $data['type'] = 'Semua Data';
                $data['isi'] = DB::table('tb_data_polres')
                    ->join('tb_cabang','tb_cabang.cabang_id','=','tb_data_polres.polres_id')
                    ->where(DB::raw('MONTH(tb_data_polres.data_polres_tgl)'),$bulan)
                    ->where('tb_data_polres.polres_id','=', session()->get('cabang_id'))
                    ->select(
                        DB::raw('tb_cabang.cabang_nama as cabang_nama'),
                        DB::raw('tb_cabang.cabang_id as cabang_id'),
                        DB::raw('tb_data_polres.data_polres_id as data_polres_id'),
                        DB::raw('SUM(tb_data_polres.data_polres_sim_a_baru) as data_polres_sim_a_baru'),
                        DB::raw('SUM(tb_data_polres.data_polres_sim_a_umum_baru) as data_polres_sim_a_umum_baru'),
                        DB::raw('SUM(tb_data_polres.data_polres_sim_b1_baru) as data_polres_sim_b1_baru'),
                        DB::raw('SUM(tb_data_polres.data_polres_sim_b2_baru) as data_polres_sim_b2_baru'),
                        DB::raw('SUM(tb_data_polres.data_polres_sim_c_baru) as data_polres_sim_c_baru'),
                        DB::raw('SUM(tb_data_polres.data_polres_sim_d_baru) as data_polres_sim_d_baru'),
                        DB::raw('SUM(tb_data_polres.data_polres_sim_a_perpanjang) as data_polres_sim_a_perpanjang'),
                        DB::raw('SUM(tb_data_polres.data_polres_sim_a_umum_perpanjang) as data_polres_sim_a_umum_perpanjang'),
                        DB::raw('SUM(tb_data_polres.data_polres_sim_b1_perpanjang) as data_polres_sim_b1_perpanjang'),
                        DB::raw('SUM(tb_data_polres.data_polres_sim_b2_perpanjang) as data_polres_sim_b2_perpanjang'),
                        DB::raw('SUM(tb_data_polres.data_polres_sim_c_perpanjang) as data_polres_sim_c_perpanjang'),
                        DB::raw('SUM(tb_data_polres.data_polres_sim_d_perpanjang) as data_polres_sim_d_perpanjang'),
                        DB::raw('SUM(tb_data_polres.data_polres_sim_b1_umum) as data_polres_sim_b1_umum'),
                        DB::raw('SUM(tb_data_polres.data_polres_sim_b2_umum) as data_polres_sim_b2_umum'),
                        DB::raw('SUM(tb_data_polres.data_polres_sim_b1_umum_perpanjang) as data_polres_sim_b1_umum_perpanjang'),
                        DB::raw('SUM(tb_data_polres.data_polres_sim_b2_umum_perpanjang) as data_polres_sim_b2_umum_perpanjang'),
                        DB::raw('SUM(tb_data_polres.rusak) as rusak'),
                        DB::raw('SUM(tb_data_polres.gerai_a) as gerai_a'),
                        DB::raw('SUM(tb_data_polres.gerai_c) as gerai_c'),
                        DB::raw('SUM(tb_data_polres.gerai_rusak) as gerai_rusak'),
                        DB::raw('SUM(tb_data_polres.mpp_a) as mpp_a'),
                        DB::raw('SUM(tb_data_polres.mpp_c) as mpp_c'),
                        DB::raw('SUM(tb_data_polres.mpp_rusak) as mpp_rusak')
                        )
                    ->get();
                
            }

        }elseif($cabang != 0 && $dari == 0 && $sampai == 0){
            $data['type'] = 'Semua Data';
            $data['isi'] = DB::table('tb_data_polres')
            ->join('tb_cabang','tb_cabang.cabang_id','=','tb_data_polres.polres_id')
            ->where(DB::raw('MONTH(tb_data_polres.data_polres_tgl)'),$bulan)
            ->where('tb_data_polres.polres_id','=', session()->get('cabang_id'))
            ->select(
                DB::raw('tb_cabang.cabang_nama as cabang_nama'),
                DB::raw('tb_cabang.cabang_id as cabang_id'),
                DB::raw('tb_data_polres.data_polres_id as data_polres_id'),
                DB::raw('SUM(tb_data_polres.data_polres_sim_a_baru) as data_polres_sim_a_baru'),
                DB::raw('SUM(tb_data_polres.data_polres_sim_a_umum_baru) as data_polres_sim_a_umum_baru'),
                DB::raw('SUM(tb_data_polres.data_polres_sim_b1_baru) as data_polres_sim_b1_baru'),
                DB::raw('SUM(tb_data_polres.data_polres_sim_b2_baru) as data_polres_sim_b2_baru'),
                DB::raw('SUM(tb_data_polres.data_polres_sim_c_baru) as data_polres_sim_c_baru'),
                DB::raw('SUM(tb_data_polres.data_polres_sim_d_baru) as data_polres_sim_d_baru'),
                DB::raw('SUM(tb_data_polres.data_polres_sim_a_perpanjang) as data_polres_sim_a_perpanjang'),
                DB::raw('SUM(tb_data_polres.data_polres_sim_a_umum_perpanjang) as data_polres_sim_a_umum_perpanjang'),
                DB::raw('SUM(tb_data_polres.data_polres_sim_b1_perpanjang) as data_polres_sim_b1_perpanjang'),
                DB::raw('SUM(tb_data_polres.data_polres_sim_b2_perpanjang) as data_polres_sim_b2_perpanjang'),
                DB::raw('SUM(tb_data_polres.data_polres_sim_c_perpanjang) as data_polres_sim_c_perpanjang'),
                DB::raw('SUM(tb_data_polres.data_polres_sim_d_perpanjang) as data_polres_sim_d_perpanjang'),
                DB::raw('SUM(tb_data_polres.data_polres_sim_b1_umum) as data_polres_sim_b1_umum'),
                DB::raw('SUM(tb_data_polres.data_polres_sim_b2_umum) as data_polres_sim_b2_umum'),
                DB::raw('SUM(tb_data_polres.data_polres_sim_b1_umum_perpanjang) as data_polres_sim_b1_umum_perpanjang'),
                DB::raw('SUM(tb_data_polres.data_polres_sim_b2_umum_perpanjang) as data_polres_sim_b2_umum_perpanjang'),
                DB::raw('SUM(tb_data_polres.rusak) as rusak'),
                DB::raw('SUM(tb_data_polres.gerai_a) as gerai_a'),
                DB::raw('SUM(tb_data_polres.gerai_c) as gerai_c'),
                DB::raw('SUM(tb_data_polres.gerai_rusak) as gerai_rusak'),
                DB::raw('SUM(tb_data_polres.mpp_a) as mpp_a'),
                DB::raw('SUM(tb_data_polres.mpp_c) as mpp_c'),
                DB::raw('SUM(tb_data_polres.mpp_rusak) as mpp_rusak')
                )
            ->get();

        }elseif($cabang != 0 && $dari != 0 && $sampai != 0){
            $data['type'] = bulantahun($dari)."  -  ".bulantahun($sampai);
            $data['isi'] = DB::table('tb_data_polres')
                    ->join('tb_cabang','tb_cabang.cabang_id','=','tb_data_polres.polres_id')
                    ->select('tb_data_polres.*', 'tb_cabang.cabang_nama','tb_data_polres.polres_id as cabang_id')
                    ->where('tb_data_polres.polres_id','=', $cabang)
                    ->whereBetween('tb_data_polres.data_polres_tgl',[$dari,$sampai])
                    ->get();

        }else{
            $data['type'] = $dari.' s/d '.$sampai;
            $data['isi'] = DB::table('tb_data_polres')
                    ->join('tb_cabang','tb_cabang.cabang_id','=','tb_data_polres.polres_id')
                    ->select('tb_data_polres.*', 'tb_cabang.cabang_nama','tb_data_polres.polres_id as cabang_id')
                    ->whereBetween('tb_data_polres.data_polres_tgl',[$dari,$sampai])
                    ->get();
        }
        $data['polres'] = DB::table('tb_cabang')->where('cabang_kode',1)->get();
        return view('backend.report.export',$data);
    }

    public function report_polres_detail(Request $r)
    {
        $id = decrypt($r->id);

        $data['isi'] = DB::table('tb_detail')
                        ->join('tb_cabang','tb_cabang.cabang_id','tb_detail.id_biro')
                        ->where('tb_detail.id_data',$id)
                        ->get();


        $data['sim'] = DB::table('tb_data_polres')
                                ->where('data_polres_id',$id)
                                ->first();

        $data['simlink'] = DB::table('tb_simlink')
                                ->where('tb_simlink.id_data',$id)
                                ->first();

        $data['bus'] = DB::table('tb_bus')
                        ->where('tb_bus.id_data',$id)
                        ->first();

        // dd($data['isi']);
        return view('backend.report.report_polres_detail',$data);
    }

    public function report_polres_edit(Request $r)
    {
        $id = decrypt($r->id);

        $data['isi'] = DB::table('tb_detail')
                        ->join('tb_cabang','tb_cabang.cabang_id','tb_detail.id_biro')
                        ->where('tb_detail.id_data',$id)
                        ->get();


        $data['sim'] = DB::table('tb_data_polres')
                                ->where('data_polres_id',$id)
                                ->first();

        $data['simlink'] = DB::table('tb_simlink')
                                ->where('tb_simlink.id_data',$id)
                                ->first();

        $data['bus'] = DB::table('tb_bus')
                        ->where('tb_bus.id_data',$id)
                        ->first();

        // dd($data['isi']);
        return view('backend.report.report_polres_edit',$data);
    }

    public function reportharian($cabang)
    {
        $tanggal = date('Y-m-d');
        if(session('user_level') != 1)
        {
            if($cabang == 0)
            {
                $data = DB::table('tb_data_polres')
                            ->join('tb_cabang','tb_cabang.cabang_id','=','tb_data_polres.polres_id')
                            ->select('tb_data_polres.*', 'tb_cabang.cabang_nama')
                            ->where('tb_data_polres.data_polres_tgl',$tanggal)
                            ->get();
            }else{
                $data = DB::table('tb_data_polres')
                            ->join('tb_cabang','tb_cabang.cabang_id','=','tb_data_polres.polres_id')
                            ->select('tb_data_polres.*', 'tb_cabang.cabang_nama')
                            ->where('tb_data_polres.polres_id',$cabang)
                            ->where('tb_data_polres.data_polres_tgl',$tanggal)
                            ->get();
            }
        }else{
            $data = DB::table('tb_data_polres')
                            ->join('tb_cabang','tb_cabang.cabang_id','=','tb_data_polres.polres_id')
                            ->select('tb_data_polres.*', 'tb_cabang.cabang_nama')
                            ->where('tb_data_polres.data_polres_tgl',$tanggal)
                            ->get();
        }
        return view('backend.report.reportharian',compact('data'));
    }

}

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
            $id = DB::table('tb_data_polres')->insertGetId([
                'polres_id' => $r->polres_id,
                'data_polres_tgl' => $r->data_polres_tgl,
                'data_polres_sim_a_baru' => $r->data_polres_sim_a_baru,
                'data_polres_sim_a_umum_baru' => $r->data_polres_sim_a_umum_baru,
                'data_polres_sim_b1_baru' => $r->data_polres_sim_b1_baru,
                'data_polres_sim_b2_baru' => $r->data_polres_sim_b2_baru,
                'data_polres_sim_c_baru' => $r->data_polres_sim_c_baru,
                'data_polres_sim_d_baru' => $r->data_polres_sim_d_baru,
                'data_polres_sim_a_perpanjang' => $r->data_polres_sim_a_perpanjang,
                'data_polres_sim_a_umum_perpanjang' => $r->data_polres_sim_a_umum_perpanjang,
                'data_polres_sim_b1_perpanjang' => $r->data_polres_sim_b1_perpanjang,
                'data_polres_sim_b2_perpanjang' => $r->data_polres_sim_b2_perpanjang,
                'data_polres_sim_c_perpanjang' => $r->data_polres_sim_c_perpanjang,
                'data_polres_sim_d_perpanjang' => $r->data_polres_sim_d_perpanjang,
                'data_polres_sim_b1_umum' => $r->data_polres_sim_b1_umum,
                'data_polres_sim_b2_umum' => $r->data_polres_sim_b2_umum,
                'data_polres_sim_b1_umum_perpanjang' => $r->data_polres_sim_b1_umum_perpanjang,
                'data_polres_sim_b2_umum_perpanjang' => $r->data_polres_sim_b2_umum_perpanjang,
                'rusak' => $r->rusak,
            ]);
            $id_biro = $r->id_biro;
            // dd($id_biro);
            DB::table('tb_simlink')->insert(['id_data' => $id, 'simlink1' => $r->simlink1, 'simlink2' => $r->simlink2]);
            foreach($id_biro as $i => $a)
            {
                DB::table('tb_detail')->insert([
                    'id_data' => $id,
                    'id_biro' => $id_biro[$i],
                    'sim_a_baru' => $r->data_biro_sim_a_baru[$i],
                    'sim_c_baru' => $r->data_biro_sim_c_baru[$i],
                    'sim_ac_baru' => $r->data_biro_sim_ac_baru[$i],
                    'tanggal' => date('Y-m-d')
                    ]);
            }
            return back()->with('pesan','Input Data Success');
        }else{
            $up = DB::table('tb_data_polres')
                    ->where('data_polres_id',$r->data_polres_id)
                    ->update([
                        'polres_id' => $r->polres_id,
                        'data_polres_tgl' => $r->data_polres_tgl,
                        'data_polres_sim_a_baru' => $r->data_polres_sim_a_baru,
                        'data_polres_sim_a_umum_baru' => $r->data_polres_sim_a_umum_baru,
                        'data_polres_sim_b1_baru' => $r->data_polres_sim_b1_baru,
                        'data_polres_sim_b2_baru' => $r->data_polres_sim_b2_baru,
                        'data_polres_sim_c_baru' => $r->data_polres_sim_c_baru,
                        'data_polres_sim_d_baru' => $r->data_polres_sim_d_baru,
                        'data_polres_sim_a_perpanjang' => $r->data_polres_sim_a_perpanjang,
                        'data_polres_sim_a_umum_perpanjang' => $r->data_polres_sim_a_umum_perpanjang,
                        'data_polres_sim_b1_perpanjang' => $r->data_polres_sim_b1_perpanjang,
                        'data_polres_sim_b2_perpanjang' => $r->data_polres_sim_b2_perpanjang,
                        'data_polres_sim_c_perpanjang' => $r->data_polres_sim_c_perpanjang,
                        'data_polres_sim_d_perpanjang' => $r->data_polres_sim_d_perpanjang
                    ]);

            if($up == TRUE){
                return back()->with('pesan','Update Data Success');
            }else{
                return back()->with('error','Pastikan Format polres_foto Dengan Benar.');
            }
        }
    }

    public function delete($idb)
    {
        $id = decrypt($idb);
        $del = DB::table('tb_data_polres')->where('data_polres_id',$id)->delete();
        
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
            $bulan = date('m');
            $data = DB::table('tb_data_polres')
                    ->join('tb_cabang','tb_cabang.cabang_id','=','tb_data_polres.polres_id')
                    ->select('tb_data_polres.*', 'tb_cabang.cabang_nama')
                    ->where(DB::raw('MONTH(tb_data_polres.data_polres_tgl)'),$bulan)
                    ->get();

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
        if($cabang == 0 && $dari == 0 && $sampai == 0)
        {
            $bulan = date('m');
            $data['isi'] = DB::table('tb_data_polres')
                    ->join('tb_cabang','tb_cabang.cabang_id','=','tb_data_polres.polres_id')
                    ->select('tb_data_polres.*', 'tb_cabang.cabang_nama')
                    ->where(DB::raw('MONTH(tb_data_polres.data_polres_tgl)'),$bulan)
                    ->get();

        }elseif($cabang != 0 && $dari == 0 && $sampai == 0){
            $data['isi'] = DB::table('tb_data_polres')
                    ->join('tb_cabang','tb_cabang.cabang_id','=','tb_data_polres.polres_id')
                    ->select('tb_data_polres.*', 'tb_cabang.cabang_nama')
                    ->where('tb_data_polres.polres_id','=', $cabang)
                    ->get();

        }elseif($cabang == 0 && $dari != 0 && $sampai != 0){
            $data['isi'] = DB::table('tb_data_polres')
                    ->join('tb_cabang','tb_cabang.cabang_id','=','tb_data_polres.polres_id')
                    ->select('tb_data_polres.*', 'tb_cabang.cabang_nama')
                    ->whereBetween('tb_data_polres.data_polres_tgl',[$dari,$sampai])
                    ->get();

        }else{
            $data['isi'] = DB::table('tb_data_polres')
                    ->join('tb_cabang','tb_cabang.cabang_id','=','tb_data_polres.polres_id')
                    ->select('tb_data_polres.*', 'tb_cabang.cabang_nama')
                    ->whereBetween('tb_data_polres.data_polres_tgl',[$dari,$sampai])
                    ->where('tb_data_polres.polres_id','=', $cabang)
                    ->get();
        }
        $data['biro'] = DB::table('tb_cabang')->where('cabang_kode',2)->get();
        return view('backend.report.export',$data);
    }
}

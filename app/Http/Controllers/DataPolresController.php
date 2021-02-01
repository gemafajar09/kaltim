<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use File;

class DataPolresController extends Controller
{
    public function __construct()
    {
        $this->rules = array(
            'image' => 'mimes:jpeg,jpg,png|max:50000'
        );
    }

    public function index()
    {
        return view('backend.input.polres');
    }

    public function save(Request $r)
    {
        $validator = Validator::make($r->all(),$this->rules);

        if($validator->fails()){
            return back()->with('validasi','Pastikan Format Gambar Dengan Benar.');
        }else{
            if($r->data_polres_id == '')
            {
                DB::table('tb_data_polres')->insert([
                    'polres_id' => $r->polres_id,
                    'data_polres_tgl' => $r->data_polres_tgl,
                    'data_polres_sim_a_baru' => $r->data_polres_sim_a_baru,
                    'data_polres_sim_a_umum_baru' => $r->data_polres_sim_a_umum_baru,
                    'data_polres_sim_b1_baru' => $r->data_polres_sim_b1_baru,
                    'data_polres_sim_b2_baru' => $r->data_polres_sim_b2_baru,
                    'data_polres_sim_c_baru' => $r->data_polres_sim_c_baru,
                    'data_polres_sim_d_baru' => $r->data_polres_simd1_baru,
                    'data_polres_sim_a_perpanjang' => $r->data_polres_sim_a_perpanjang,
                    'data_polres_sim_a_umum_perpanjang' => $r->data_polres_sim_a_umum_perpanjang,
                    'data_polres_sim_b1_perpanjang' => $r->data_polres_sim_b1_perpanjang,
                    'data_polres_sim_b2_perpanjang' => $r->data_polres_sim_b2_perpanjang,
                    'data_polres_sim_c_perpanjang' => $r->data_polres_sim_c_perpanjang,
                    'data_polres_sim_d_perpanjang' => $r->data_polres_simd1_perpanjang
                ]);
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
        $bulan = date('m');
        $data = DB::table('tb_data_polres')
                ->join('tb_cabang','tb_cabang.cabang_id','=','tb_data_polres.polres_id')
                ->select('tb_data_polres.*', 'tb_cabang.cabang_nama')
                ->where(DB::raw('MONTH(tb_data_polres.data_polres_tgl)'),$bulan)
                ->get();
        return view('backend.report.polres',compact('data'));
    }
}

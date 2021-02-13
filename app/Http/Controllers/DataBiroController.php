<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use File;

class DataBiroController extends Controller
{
    public function __construct()
    {
        $this->rules = array(
            'image' => 'mimes:jpeg,jpg,png|max:50000'
        );
    }

    public function index()
    {
        return view('backend.input.biro');
    }

    public function save(Request $r)
    {
        $validator = Validator::make($r->all(),$this->rules);

        if($validator->fails()){
            return back()->with('validasi','Pastikan Format Gambar Dengan Benar.');
        }else{
            if($r->data_biro_id == '')
            {
                DB::table('tb_data_biro')->insert([
                    'biro_id' => $r->biro_id,
                    'data_biro_tgl' => $r->data_biro_tgl,
                    'data_biro_sim_a_baru' => $r->data_biro_sim_a_baru,
                    'data_biro_sim_c_baru' => $r->data_biro_sim_c_baru,
                    'data_biro_sim_ac_baru' => $r->data_biro_sim_d_baru,
                    'data_biro_sim_a_perpanjang' => $r->data_biro_sim_a_perpanjang,
                    'data_biro_sim_c_perpanjang' => $r->data_biro_sim_c_perpanjang,
                    'data_biro_sim_ac_perpanjang' => $r->data_biro_sim_d_perpanjang
                ]);
                return back()->with('pesan','Input Data Success');
            }else{
                $up = DB::table('tb_data_biro')
                        ->where('data_biro_id',$r->data_biro_id)
                        ->update([
                            'biro_id' => $r->biro_id,
                            'data_biro_tgl' => $r->data_biro_tgl,
                            'data_biro_sim_a_baru' => $r->data_biro_sim_a_baru,
                            'data_biro_sim_c_baru' => $r->data_biro_sim_c_baru,
                            'data_biro_sim_ac_baru' => $r->data_biro_sim_d_baru,
                            'data_biro_sim_a_perpanjang' => $r->data_biro_sim_a_perpanjang,
                            'data_biro_sim_c_perpanjang' => $r->data_biro_sim_c_perpanjang,
                            'data_biro_sim_ac_perpanjang' => $r->data_biro_sim_d_perpanjang
                        ]);

                if($up == TRUE){
                    return back()->with('pesan','Update Data Success');
                }else{
                    return back()->with('error','Pastikan Format biro_foto Dengan Benar.');
                }
            }
        }
    }

    public function delete($idb)
    {
        $id = decrypt($idb);
        $del = DB::table('tb_data_biro')->where('data_biro_id',$id)->delete();
        
        if($del == TRUE)
        {
            return back()->with('pesan', 'Hapus Data Berhasil');
        }else{
            return back()->with('error', 'Hapus Data Gagal');
        }
    }

    public function report_biro()
    {           
        $bulan = date('m');
        $data = DB::table('tb_data_biro')
                ->join('tb_cabang','tb_cabang.cabang_id','=','tb_data_biro.biro_id')
                ->select('tb_data_biro.*', 'tb_cabang.cabang_nama')
                ->where(DB::raw('MONTH(tb_data_biro.data_biro_tgl)'),$bulan)
                ->get();
        return view('backend.report.biro',compact('data'));
    }
}

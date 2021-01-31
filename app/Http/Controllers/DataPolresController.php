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
                    'data_polres_sim_a_perpanjang' => $r->data_polres_sim_a_perpanjang,
                    'data_polres_sim_c_baru' => $r->data_polres_sim_c_baru,
                    'data_polres_sim_c_perpanjang' => $r->data_polres_sim_c_perpanjang,
                    'data_polres_surat_pengantar_dari_biro' => $r->data_polres_surat_pengantar_dari_biro,
                ]);
                return back()->with('pesan','Input Data Success');
            }else{
                $up = DB::table('tb_data_polres')
                        ->where('data_polres_id',$r->data_polres_id)
                        ->update([
                            'polres_id' => $r->polres_id,
                            'data_polres_tgl' => $r->data_polres_tgl,
                            'data_polres_sim_a_baru' => $r->data_polres_sim_a_baru,
                            'data_polres_sim_a_perpanjang' => $r->data_polres_sim_a_perpanjang,
                            'data_polres_sim_c_baru' => $r->data_polres_sim_c_baru,
                            'data_polres_sim_c_perpanjang' => $r->data_polres_sim_c_perpanjang,
                            'data_polres_surat_pengantar_dari_biro' => $r->data_polres_surat_pengantar_dari_biro,
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
        $data = DB::table('tb_data_polres')
                ->join('tb_polres','tb_polres.polres_id','=','tb_data_polres.polres_id')
                ->select('tb_data_polres.*', 'tb_polres.polres_nama')
                ->get();
        return view('backend.report.polres',compact('data'));
    }
}

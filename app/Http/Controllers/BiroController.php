<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use File;

class BiroController extends Controller
{
    public function __construct()
    {
        $this->rules = array(
            'cabang_foto' => 'mimes:jpeg,jpg,png|max:50000'
        );
    }

    public function index()
    {
        $data = DB::table('tb_cabang')->where('cabang_kode', '=', 2)->get();
        return view('backend.biro.biro',compact('data'));
    }

    public function save(Request $r)
    {
        $validator = Validator::make($r->all(),$this->rules);

        if($validator->fails()){
            return back()->with('validasi','Pastikan Format Gambar Dengan Benar.');
        }else{
            if($r->cabang_id == '')
            {
                DB::table('tb_cabang')->insert([
                    'cabang_nama' => $r->cabang_nama,
                    'cabang_alamat' => $r->cabang_alamat,
                    'cabang_kode' => 2,
                ]);
                return back()->with('pesan','Input Data Success');
            }else{
                $up = DB::table('tb_cabang')
                    ->where('cabang_id',$r->cabang_id)
                    ->update([
                        'cabang_nama' => $r->cabang_nama, 
                        'cabang_alamat' => $r->cabang_alamat
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
        $del = DB::table('tb_cabang')->where('cabang_id',$id)->delete();
        
        if($del == TRUE)
        {
            return back()->with('pesan', 'Hapus Data Berhasil');
        }else{
            return back()->with('error', 'Hapus Data Gagal');
        }
    }
}

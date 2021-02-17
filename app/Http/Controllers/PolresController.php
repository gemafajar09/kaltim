<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use File;

class PolresController extends Controller
{
    public function index()
    {
        $data = DB::table('tb_cabang')->where('cabang_kode',1)->get();
        return view('backend.polres.polres');
    }

    public function save(Request $r)
    {
        if($r->polres_id == '')
        {
            // simpan
            DB::table('tb_cabang')->insert([
                'cabang_nama' => $r->cabang_nama,
                'cabang_alamat' => $r->cabang_alamat,
                'cabang_kode' => $r->cabang_kode
            ]);

            return back()->with('pesan','Input Data Success');
        }else{
            $up = DB::table('tb_cabang')
                ->where('cabang_id',$r->cabang_id)
                ->update([
                    'cabang_nama' => $r->cabang_nama, 
                    'cabang_alamat' => $r->cabang_alamat
                ]);
            
                return back()->with('pesan','Update Data Success');
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

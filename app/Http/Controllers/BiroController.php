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
            'biro_foto' => 'mimes:jpeg,jpg,png|max:50000'
        );
    }

    public function index()
    {
        $data = DB::table('tb_biro')->get();
        return view('backend.biro.biro',compact('data'));
    }

    public function save(Request $r)
    {
        $validator = Validator::make($r->all(),$this->rules);

        if($validator->fails()){
            return back()->with('validasi','Pastikan Format Gambar Dengan Benar.');
        }else{
            if($r->biro_id == '')
            {
                if($r->file('biro_foto') != NULL)
                {
                    $filename = $r->biro_foto->getClientOriginalName();
                    $r->file('biro_foto')->move('biro',$r->biro_foto->getClientOriginalName());
                    // simpan
                    DB::table('tb_biro')->insert([
                        'biro_nama' => $r->biro_nama,
                        'biro_alamat' => $r->biro_alamat,
                        'biro_foto' => $filename,
                    ]);
                }else{
                    DB::table('tb_biro')->insert([
                        'biro_nama' => $r->biro_nama,
                        'biro_alamat' => $r->biro_alamat,
                        'biro_foto' => null,
                    ]);
                }

                return back()->with('pesan','Input Data Success');
            }else{
                if($r->file('biro_foto') == NULL)
                {
                    $up = DB::table('tb_biro')
                        ->where('biro_id',$r->biro_id)
                        ->update([
                            'biro_nama' => $r->biro_nama, 
                            'biro_alamat' => $r->biro_alamat
                        ]);
                }else{
                    $cek = DB::table('tb_biro')->where('biro_id',$r->biro_id)->first();
                    File::delete('biro/' . $cek->biro_foto);

                    $filename = $r->biro_foto->getClientOriginalName();
                    $r->file('biro_foto')->move('biro',$r->biro_foto->getClientOriginalName());
                    $up = DB::table('tb_biro')
                            ->where('biro_id',$r->biro_id)
                            ->update([
                                'biro_nama' => $r->biro_nama, 
                                'biro_alamat' => $r->biro_alamat,
                                'biro_foto' => $filename,
                            ]);
                }
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
        $cek = DB::table('tb_biro')->where('biro_id',$id)->first();

        File::delete('biro/' . $cek->biro_foto);
        
        $del = DB::table('tb_biro')->where('biro_id',$id)->delete();
        
        if($del == TRUE)
        {
            return back()->with('pesan', 'Hapus Data Berhasil');
        }else{
            return back()->with('error', 'Hapus Data Gagal');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use File;

class PolresController extends Controller
{
    public function __construct()
    {
        $this->rules = array(
            'polres_foto' => 'mimes:jpeg,jpg,png|max:50000'
        );
    }

    public function index()
    {
        $data = DB::table('tb_polres')->get();
        return view('backend.polres.polres',compact('data'));
    }

    public function save(Request $r)
    {
        $validator = Validator::make($r->all(),$this->rules);

        if($validator->fails()){
            return back()->with('validasi','Pastikan Format Gambar Dengan Benar.');
        }else{
            if($r->polres_id == '')
            {
                if($r->file('polres_foto') != NULL)
                {
                    $filename = $r->polres_foto->getClientOriginalName();
                    $r->file('polres_foto')->move('polres',$r->polres_foto->getClientOriginalName());
                    // simpan
                    DB::table('tb_polres')->insert([
                        'polres_nama' => $r->polres_nama,
                        'polres_alamat' => $r->polres_alamat,
                        'polres_foto' => $filename,
                    ]);
                }else{
                    DB::table('tb_polres')->insert([
                        'polres_nama' => $r->polres_nama,
                        'polres_alamat' => $r->polres_alamat,
                        'polres_foto' => null,
                    ]);
                }

                return back()->with('pesan','Input Data Success');
            }else{
                if($r->file('polres_foto') == NULL)
                {
                    $up = DB::table('tb_polres')
                        ->where('polres_id',$r->polres_id)
                        ->update([
                            'polres_nama' => $r->polres_nama, 
                            'polres_alamat' => $r->polres_alamat
                        ]);
                }else{
                    $cek = DB::table('tb_polres')->where('polres_id',$r->polres_id)->first();
                    File::delete('polres/' . $cek->polres_foto);

                    $filename = $r->polres_foto->getClientOriginalName();
                    $r->file('polres_foto')->move('polres',$r->polres_foto->getClientOriginalName());
                    $up = DB::table('tb_polres')
                            ->where('polres_id',$r->polres_id)
                            ->update([
                                'polres_nama' => $r->polres_nama, 
                                'polres_alamat' => $r->polres_alamat,
                                'polres_foto' => $filename,
                            ]);
                }
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
        $cek = DB::table('tb_polres')->where('polres_id',$id)->first();

        File::delete('polres/' . $cek->polres_foto);
        
        $del = DB::table('tb_polres')->where('polres_id',$id)->delete();
        
        if($del == TRUE)
        {
            return back()->with('pesan', 'Hapus Data Berhasil');
        }else{
            return back()->with('error', 'Hapus Data Gagal');
        }
    }
}

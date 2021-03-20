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
    
    public function indexx()
    {
        return view('backend.input.birocabang');
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
                    'biro_id' => $r->biro_id[0],
                    'data_biro_tgl' => $r->data_biro_tgl,
                    'data_biro_sim_a_baru' => $r->data_biro_sim_a_baru,
                    'data_biro_sim_c_baru' => $r->data_biro_sim_c_baru,
                    'data_biro_sim_ac_baru' => $r->data_biro_sim_ac_baru,
                    'data_biro_sim_a_perpanjang' => $r->data_biro_sim_a_perpanjang,
                    'data_biro_sim_c_perpanjang' => $r->data_biro_sim_c_perpanjang,
                    'data_biro_sim_ac_perpanjang' => $r->data_biro_sim_ac_perpanjang,
                    'cabang_utama' => $r->cabang_utama
                ]);
                return redirect('report-biro')->with('pesan','Input Data Success');
            }else{
                $up = DB::table('tb_data_biro')
                        ->where('data_biro_id',$r->data_biro_id)
                        ->update([
                            'biro_id' => $r->biro_id,
                            'data_biro_tgl' => $r->data_biro_tgl,
                            'data_biro_sim_a_baru' => $r->data_biro_sim_a_baru,
                            'data_biro_sim_c_baru' => $r->data_biro_sim_c_baru,
                            'data_biro_sim_ac_baru' => $r->data_biro_sim_ac_baru,
                            'data_biro_sim_a_perpanjang' => $r->data_biro_sim_a_perpanjang,
                            'data_biro_sim_c_perpanjang' => $r->data_biro_sim_c_perpanjang,
                            'data_biro_sim_ac_perpanjang' => $r->data_biro_sim_ac_perpanjang
                        ]);

                    return redirect('report-biro')->with('pesan','Update Data Success');
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
        $data['biro'] = DB::table('tb_cabang')->where('cabang_kode',2)->get();
        return view('backend.report.biro',$data);
    }

    public function datatable($cabang, $dari, $sampai)
    { 
        $bulan = date('m');
        if($cabang == 0 && $dari == 0 && $sampai == 0)
        {
            if(session()->get('user_level')  == 1){
                $data = DB::table('tb_data_biro')
                        ->join('tb_cabang','tb_cabang.cabang_id','=','tb_data_biro.biro_id')
                        ->select('tb_data_biro.*', 'tb_cabang.cabang_nama')
                        ->where(DB::raw('MONTH(tb_data_biro.data_biro_tgl)'),$bulan)
                        ->get();
            }elseif(session()->get('user_level')  == 3){
                $data = DB::table('tb_data_biro')
                    ->join('tb_cabang','tb_cabang.cabang_id','=','tb_data_biro.biro_id')
                    ->select('tb_data_biro.*', 'tb_cabang.cabang_nama')
                    ->where('tb_data_biro.cabang_utama',$cabang)
                    ->where(DB::raw('MONTH(tb_data_biro.data_biro_tgl)'),$bulan)
                    ->get();    
            }elseif(session('user_level') == 4){
                $data = DB::table('tb_data_biro')
                    ->join('tb_cabang','tb_cabang.cabang_id','=','tb_data_biro.biro_id')
                    ->select('tb_data_biro.*', 'tb_cabang.cabang_nama')
                    ->where('biro_id',$cabang)
                    ->where(DB::raw('MONTH(tb_data_biro.data_biro_tgl)'),$bulan)
                    ->get();    
            }
        }elseif($cabang != 0 && $dari == 0 && $sampai == 0){
            if(session('user_level') == 3)
            {
                $data = DB::table('tb_data_biro')
                        ->join('tb_cabang','tb_cabang.cabang_id','=','tb_data_biro.biro_id')
                        ->select('tb_data_biro.*', 'tb_cabang.cabang_nama')
                        ->where('tb_data_biro.cabang_utama','=', $cabang)
                        ->get();
            }else{
                $data = DB::table('tb_data_biro')
                        ->join('tb_cabang','tb_cabang.cabang_id','=','tb_data_biro.biro_id')
                        ->select('tb_data_biro.*', 'tb_cabang.cabang_nama')
                        ->where('tb_data_biro.biro_id','=', $cabang)
                        ->get();
            }

        }elseif($cabang == 0 && $dari != 0 && $sampai != 0){
            $data = DB::table('tb_data_biro')
                    ->join('tb_cabang','tb_cabang.cabang_id','=','tb_data_biro.biro_id')
                    ->select('tb_data_biro.*', 'tb_cabang.cabang_nama')
                    ->whereBetween('tb_data_biro.data_biro_tgl',[$dari,$sampai])
                    ->get();

        }else{
            $data = DB::table('tb_data_biro')
                    ->join('tb_cabang','tb_cabang.cabang_id','=','tb_data_biro.biro_id')
                    ->select('tb_data_biro.*', 'tb_cabang.cabang_nama')
                    ->whereBetween('tb_data_biro.data_biro_tgl',[$dari,$sampai])
                    ->where('tb_data_biro.biro_id','=', $cabang)
                    ->get();
        }
        return view('backend.report.birotable',compact('data'));
    }
    
    public function exportdetail($cabang, $dari, $sampai)
    {
        $bulan = date('m');
        if($cabang == 0 && $dari == 0 && $sampai == 0)
        {
            if(session()->get('user_level')  == 1){
                $data = DB::table('tb_data_biro')
                        ->join('tb_cabang','tb_cabang.cabang_id','=','tb_data_biro.biro_id')
                        ->select('tb_data_biro.*', 'tb_cabang.cabang_nama')
                        ->where(DB::raw('MONTH(tb_data_biro.data_biro_tgl)'),$bulan)
                        ->get();
            }elseif(session()->get('user_level')  == 3){
                $data = DB::table('tb_data_biro')
                    ->join('tb_cabang','tb_cabang.cabang_id','=','tb_data_biro.biro_id')
                    ->select('tb_data_biro.*', 'tb_cabang.cabang_nama')
                    ->where('tb_data_biro.cabang_utama',$cabang)
                    ->where(DB::raw('MONTH(tb_data_biro.data_biro_tgl)'),$bulan)
                    ->get();    
            }elseif(session('user_level') == 4){
                $data = DB::table('tb_data_biro')
                    ->join('tb_cabang','tb_cabang.cabang_id','=','tb_data_biro.biro_id')
                    ->select('tb_data_biro.*', 'tb_cabang.cabang_nama')
                    ->where('biro_id',$cabang)
                    ->where(DB::raw('MONTH(tb_data_biro.data_biro_tgl)'),$bulan)
                    ->get();    
            }
        }elseif($cabang != 0 && $dari == 0 && $sampai == 0){
            if(session('user_level') == 3)
            {
                $data = DB::table('tb_data_biro')
                        ->join('tb_cabang','tb_cabang.cabang_id','=','tb_data_biro.biro_id')
                        ->select('tb_data_biro.*', 'tb_cabang.cabang_nama')
                        ->where('tb_data_biro.cabang_utama','=', $cabang)
                        ->get();
            }else{
                $data = DB::table('tb_data_biro')
                        ->join('tb_cabang','tb_cabang.cabang_id','=','tb_data_biro.biro_id')
                        ->select('tb_data_biro.*', 'tb_cabang.cabang_nama')
                        ->where('tb_data_biro.biro_id','=', $cabang)
                        ->get();
            }

        }elseif($cabang == 0 && $dari != 0 && $sampai != 0){
            $data = DB::table('tb_data_biro')
                    ->join('tb_cabang','tb_cabang.cabang_id','=','tb_data_biro.biro_id')
                    ->select('tb_data_biro.*', 'tb_cabang.cabang_nama')
                    ->whereBetween('tb_data_biro.data_biro_tgl',[$dari,$sampai])
                    ->get();

        }else{
            $data = DB::table('tb_data_biro')
                    ->join('tb_cabang','tb_cabang.cabang_id','=','tb_data_biro.biro_id')
                    ->select('tb_data_biro.*', 'tb_cabang.cabang_nama')
                    ->whereBetween('tb_data_biro.data_biro_tgl',[$dari,$sampai])
                    ->where('tb_data_biro.biro_id','=', $cabang)
                    ->get();
        }
        return view('backend.report.exportbiro',compact('data'));
    }
}

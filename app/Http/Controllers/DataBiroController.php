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
        $data['polres'] = DB::table('tb_cabang')->where('cabang_kode', '=', 1)->get();

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

    public function report_polres_biro()
    {           
        $data['biro'] = DB::table('tb_cabang')->where('cabang_kode',1)->get();
        $data['polres'] = DB::table('tb_cabang')->where('cabang_kode', '=', 1)->get();
        return view('backend.report.report_biro_polres',$data);
    }

    public function datatable_polres($cabang, $dari, $sampai)
    { 
        $bulan = date('m');
        if($cabang == 0 && $dari == 0 && $sampai == 0){
            if(session()->get('user_level') == 1){
                $data = DB::table('tb_detail')
                        ->join('tb_cabang','tb_cabang.cabang_id','=','tb_detail.id_cabang')
                        ->select(
                            'tb_cabang.cabang_nama',
                            'tb_detail.tanggal',
                            'tb_detail.id_detail',
                            DB::raw('SUM(tb_detail.sim_a_baru) as sim_a'),
                            DB::raw('SUM(tb_detail.sim_c_baru) as sim_c'),
                            DB::raw('SUM(tb_detail.sim_ac_baru) as sim_ac'),
                        )
                        ->where(DB::raw('MONTH(tb_detail.tanggal)'),$bulan)
                        ->groupBy('tb_detail.tanggal')
                        ->get();
            }elseif(session()->get('user_level') == 2){
                $data = DB::table('tb_detail')
                    ->join('tb_cabang','tb_cabang.cabang_id','=','tb_detail.id_biro')
                    ->select(
                            'tb_cabang.cabang_nama',
                            'tb_detail.tanggal',
                            'tb_detail.id_detail',
                            DB::raw('SUM(tb_detail.sim_a_baru) as sim_a'),
                            DB::raw('SUM(tb_detail.sim_c_baru) as sim_c'),
                            DB::raw('SUM(tb_detail.sim_ac_baru) as sim_ac'),
                        )
                    ->where('tb_detail.id_cabang',$cabang)
                    ->where(DB::raw('MONTH(tb_detail.tanggal)'),$bulan)
                    ->groupBy('tb_detail.tanggal')
                    ->get();    
            }
        }elseif($cabang != 0 && $dari == 0 && $sampai == 0){
                $data = DB::table('tb_detail')
                        ->join('tb_cabang','tb_cabang.cabang_id','=','tb_detail.id_cabang')
                        ->select(
                            'tb_cabang.cabang_nama',
                            'tb_detail.tanggal',
                            'tb_detail.id_detail',
                            DB::raw('SUM(tb_detail.sim_a_baru) as sim_a'),
                            DB::raw('SUM(tb_detail.sim_c_baru) as sim_c'),
                            DB::raw('SUM(tb_detail.sim_ac_baru) as sim_ac'),
                        )
                        ->where('tb_detail.id_cabang','=', $cabang)
                        ->where(DB::raw('MONTH(tb_detail.tanggal)'),$bulan)
                        ->groupBy('tb_detail.tanggal')
                        ->get();
            
        }elseif($cabang == 0 && $dari != 0 && $sampai != 0){
            $data = DB::table('tb_detail')
                    ->join('tb_cabang','tb_cabang.cabang_id','=','tb_detail.id_biro')
                    ->select(
                            'tb_cabang.cabang_nama',
                            'tb_detail.tanggal',
                            'tb_detail.id_detail',
                            DB::raw('SUM(tb_detail.sim_a_baru) as sim_a'),
                            DB::raw('SUM(tb_detail.sim_c_baru) as sim_c'),
                            DB::raw('SUM(tb_detail.sim_ac_baru) as sim_ac'),
                        )
                    ->whereBetween('tb_detail.tanggal',[$dari,$sampai])
                    ->groupBy('tb_detail.tanggal')
                    ->get();

        }else{
            $data = DB::table('tb_detail')
                    ->join('tb_cabang','tb_cabang.cabang_id','=','tb_detail.id_biro')
                    ->select(
                            'tb_cabang.cabang_nama',
                            'tb_detail.tanggal',
                            'tb_detail.id_detail',
                            DB::raw('SUM(tb_detail.sim_a_baru) as sim_a'),
                            DB::raw('SUM(tb_detail.sim_c_baru) as sim_c'),
                            DB::raw('SUM(tb_detail.sim_ac_baru) as sim_ac'),
                        )
                    ->whereBetween('tb_detail.tanggal',[$dari,$sampai])
                    ->where('tb_detail.id_cabang','=', $cabang)
                    ->groupBy('tb_detail.tanggal')
                    ->get();
        }
        return view('backend.report.report_biro_tabel',compact('data'));
    }

    public function reportharian($cabang, $tgl)
    {
        $data['cabang'] = $cabang;
        $data['tgl'] = $tgl;
        if($cabang == 0)
        {
            $data['satpat'] = DB::table('tb_cabang')->where('cabang_kode', '1')->get();
            
        }else{
            $data['satpat'] = DB::table('tb_cabang')->where('cabang_id', $cabang)->first(); 
            // $data['data'] = DB::table('tb_detail')
            //                 ->join('tb_cabang','tb_cabang.cabang_id','tb_detail.id_biro')
            //                 ->join('tb_lulus_kesehatan','tb_cabang.cabang_id','tb_lulus_kesehatan.id_biro')
            //                 ->where('tb_detail.tanggal',$tgl)
            //                 ->where('tb_detail.id_cabang',$cabang)
            //                 ->get();
        }
        $data['penanda'] = $cabang;
        $data['biros'] = DB::table('tb_cabang')->where('cabang_kode',2)->where('turunan',0)->get();
        $data['tanggal'] = $tgl;
        $data['cabang'] = DB::table('tb_cabang')->where('cabang_id',$cabang)->first();
        return view('backend.report.reportharianbiro', $data);



    }

    public function reportbulanan($cabang, $bulan)
    {
        if($cabang == 0)
        {
            $pecah = explode("-",$bulan);
            $bln = $pecah[1];
            $thn = $pecah[0];
            $data['type'] = bulantahun($bulan);
            $data['bulan'] = $bulan;


            $data['biro'] = DB::table('tb_cabang')->where('cabang_kode',2)->where('turunan',0)->get();
            $data['satpat'] = DB::table('tb_cabang')->where('cabang_kode', '1')->get();
            $data['bln'] = $pecah[1];
            $data['thn'] = $pecah[0];
            $data['cabang'] = $cabang;
        }else{
            $pecah = explode("-",$bulan);
            $bln = $pecah[1];
            $thn = $pecah[0];
            $data['type'] = bulantahun($bulan);
            $data['bulan'] = $bulan;

            $data['isi'] = DB::table('tb_detail')
                ->select(
                    DB::raw('tb_cabang.*'),
                    DB::raw('tb_detail.id_data as id_data'),
                    DB::raw('tb_detail.id_biro as id_biro'),
                    DB::raw('tb_detail.id_biro as id_biro'),
                    DB::raw('tb_detail.id_cabang as id_cabang'),
                    DB::raw('tb_detail.tanggal as tanggal'),

                    DB::raw('SUM(tb_detail.sim_a_baru) as sim_a_baru'),
                    DB::raw('SUM(tb_detail.sim_c_baru) as sim_c_baru'),
                    DB::raw('SUM(tb_detail.sim_b1) as sim_b1'),
                    DB::raw('SUM(tb_detail.sim_b2) as sim_b2'),
                    DB::raw('SUM(tb_detail.sim_a_umum) as sim_a_umum'),
                    DB::raw('SUM(tb_detail.sim_b1_umum) as sim_b1_umum'),
                    DB::raw('SUM(tb_detail.sim_b2_umum) as sim_b2_umum'),
                    DB::raw('SUM(tb_detail.sim_ac_baru) as sim_ac_baru'),

                    DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_a_baru) as kesehatan_sim_a_baru'),
                    DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_c_baru) as kesehatan_sim_c_baru'),
                    DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_b1) as kesehatan_sim_b1'),
                    DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_b2) as kesehatan_sim_b2'),
                    DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_a_umum) as kesehatan_sim_a_umum'),
                    DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_b1_umum) as kesehatan_sim_b1_umum'),
                    DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_b2_umum) as kesehatan_sim_b2_umum'),

                    )
                ->join('tb_cabang','tb_cabang.cabang_id','tb_detail.id_biro')
                ->join('tb_lulus_kesehatan','tb_cabang.cabang_id','tb_lulus_kesehatan.id_biro')
                ->where(DB::raw('MONTH(tb_detail.tanggal)'),$bln)
                ->where(DB::raw('Year(tb_detail.tanggal)'),$thn)
                ->where('tb_detail.id_cabang',$cabang)
                ->groupBy('tb_detail.id_biro')
                ->get();

            $data['biro'] = DB::table('tb_cabang')->where('cabang_kode',2)->where('turunan',0)->get();
            $data['satpat'] = DB::table('tb_cabang')->where('cabang_kode', '1')->where('cabang_id', $cabang)->get();
            $data['bln'] = $pecah[1];
            $data['thn'] = $pecah[0];
            $data['cabang'] = $cabang;
        }
        
        return view('backend.report.reportbulananbiro',$data);
    }
}

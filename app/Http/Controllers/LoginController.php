<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\UserModel;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->rules = array(
            'username' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/',
            'password' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/'
        );
    }

    public function addcabang()
    {
        $data['user'] = DB::table('tb_data_user')
                        ->join('tb_cabang','tb_cabang.cabang_id','tb_data_user.cabang_id')
                        ->where('user_level',4)
                        ->where('tb_cabang.turunan',session('cabang_id'))
                        ->get();
        $data['cabang'] = DB::table('tb_cabang')->where('turunan',session('cabang_id'))->get();
        return view ("backend.biro.addakun",$data);
    }

    public function index(Request $r)
    {
        if ($r->session()->has('user_id')) 
        {
            return redirect("home");
        }
        else
        {
            return view ("backend.login.index");
        }
    }

    public function datauser()
    {
        $data['user'] = DB::table('tb_data_user')->join('tb_cabang','tb_cabang.cabang_id','tb_data_user.cabang_id')->get();
        $data['cabang'] = DB::table('tb_cabang')->orderBy('cabang_kode','ASC')->get();
        $data['level'] = DB::table('tb_level')->get();
        return view("backend.user.index",$data);
    }

    public function login(Request $r)
    {
        $validator = Validator::make($r->all(),$this->rules);
        if($validator->fails()){
            return back()->with('error','Silahkan Login Kembali');
        }else{
            $username = $r->username;
            $password = hash("sha512", md5($r->password));
    
            $cek = DB::table('tb_data_user')->where('user_username',$username)->where('user_password',$password)->first();
            if($cek == TRUE)
            {
                $r->session()->put("user_id", $cek->user_id);
                $r->session()->put("user_nama", $cek->user_nama);
                $r->session()->put("user_username", $cek->user_username);
                $r->session()->put("cabang_id", $cek->cabang_id);
                $r->session()->put("user_level", $cek->user_level);
                return redirect('home')->with('pesan','Selamat Datang');
            }else{
                return back()->with('error','Silahkan Login Kembali');
            }
        }
    }

    public function register(Request $r)
    {
        if($r->user_id == '')
        {
            $user_nama = $r->user_nama;
            $cabang_id = $r->cabang_id;
            $user_level = $r->user_level;
            $user_username = $r->user_username;
            $user_password = $r->user_password;
            $user_ulangi_password = $r->user_ulangi_password;
            if($user_password == $user_ulangi_password)
            {
                $pass = hash("sha512", md5($r->user_password));
                $input = new UserModel();
                $input->user_nama = $user_nama;
                $input->cabang_id = $cabang_id;
                $input->user_level = $user_level;
                $input->user_username = $user_username;
                $input->user_password = $pass;
                $input->user_ulangi_password = $user_password;
                $input->save();
    
                return back()->with('success','Data Berhasil Di Inputkan.');
            }else{
                return back()->with('pesan','Data Gagal Di Inputkan.');
            }
        }else{
            $user_nama = $r->user_nama;
            $cabang_id = $r->cabang_id;
            $user_level = $r->user_level;
            $user_username = $r->user_username;
            $user_password = $r->user_password;
            $user_ulangi_password = $r->user_ulangi_password;
            if($user_password == $user_ulangi_password)
            {
                $pass = hash("sha512", md5($r->user_password));
                $input = DB::table('tb_data_user')->where('user_id',$r->user_id)->update([
                    'user_nama' => $user_nama,
                    'cabang_id' => $cabang_id,
                    'user_level' => $user_level,
                    'user_username' => $user_username,
                    'user_password' => $pass,
                    'user_ulangi_password' => $user_ulangi_password,
                ]);
    
                return back()->with('success','Data Berhasil Di Inputkan.');
            }else{
                return back()->with('error','Data Gagal Di Inputkan.');
            }
        }
    }

    public function registerr(Request $r)
    {
        if($r->user_id == '')
        {
            $user_nama = $r->user_nama;
            $cabang_id = $r->cabang_id;
            $user_username = $r->user_username;
            $user_password = $r->user_password;
            $user_ulangi_password = $r->user_ulangi_password;
            if($user_password == $user_ulangi_password)
            {
                $pass = hash("sha512", md5($r->user_password));
                $input = new UserModel();
                $input->user_nama = $user_nama;
                $input->cabang_id = $cabang_id;
                $input->user_level = 4;
                $input->user_username = $user_username;
                $input->user_password = $pass;
                $input->user_ulangi_password = $user_password;
                $input->save();
    
                return back()->with('success','Data Berhasil Di Inputkan.');
            }else{
                return back()->with('pesan','Data Gagal Di Inputkan.');
            }
        }else{
            $user_nama = $r->user_nama;
            $cabang_id = $r->cabang_id;
            $user_level = $r->user_level;
            $user_username = $r->user_username;
            $user_password = $r->user_password;
            $user_ulangi_password = $r->user_ulangi_password;
            if($user_password == $user_ulangi_password)
            {
                $pass = hash("sha512", md5($r->user_password));
                $input = DB::table('tb_data_user')->where('user_id',$r->user_id)->update([
                    'user_nama' => $user_nama,
                    'cabang_id' => $cabang_id,
                    'user_level' => 4,
                    'user_username' => $user_username,
                    'user_password' => $pass,
                    'user_ulangi_password' => $user_ulangi_password,
                ]);
    
                return back()->with('success','Data Berhasil Di Inputkan.');
            }else{
                return back()->with('error','Data Gagal Di Inputkan.');
            }
        }
    }

    public function logout(Request $r)
    {
    	$r->session()->forget('user_id');
        $r->session()->forget('user_nama');
        $r->session()->forget('cabang_id');
        $r->session()->forget('user_level');
        $r->session()->flush();
    	return redirect("/")->with('pesan', 'Success Logout.');
    }

    public function deleteuser($ids)
    {
        $id = decrypt($ids);
        $hapus =DB::table('tb_data_user')->where('user_id',$id)->delete();
        if($hapus == true)
        {
            return back()->with('pesan','Data Berhasil Di Hapus.');
        }else{
            return back()->with('pesan','Data Gagal Di Hapus.');
        }
    }
}

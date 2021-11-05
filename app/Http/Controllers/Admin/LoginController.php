<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Users;
use Alert;
use DB;

class LoginController extends Controller
{
    public function index()
    {

        return view('auth/login');
    }

    public function prosesLogin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $data_user = Users::ChekLoginUser($username, $password);


        if ($data_user == True) {
            Session::put('username', $data_user->username);
            Session::put('level_user', $data_user->level_user);
            Session::put('id_user', $data_user->id_user);

            // Session::put('foto_user', $data_user->foto_user);
            if ($data_user->level_user == "Toko") {
                $id_usertoko = DB::table('tb_usertoko')->where('id_user', $data_user->id_user)->first()->id_usertoko ?? 0;
                Session::put('id_usertoko', $id_usertoko);
            }

            Alert::success('Congrats', 'Anda Berhasil Login');
            return redirect('dashboard');
        } else {

            echo '<script>
                alert("Username / Password Salah !")
                window.location = "/"
                </script>';
            // return back();
        }
    }

    public function dashboard(Request $request)
    {
        if($request->filled('dari') && $request->filled('sampai')) {
            // Ambil Data Toko Car
            $namaToko = array();
            $data_tokoCar = DB::table('tb_toko')
                ->join('tb_catatpenjualan', 'tb_toko.id_toko', 'tb_catatpenjualan.id_trans_toko')
                ->select(
                    'tb_toko.nama_toko',
                    'tb_catatpenjualan.*',
                    DB::raw("(SELECT IF(SUM(biaya_trans) IS NULL, 0, SUM(biaya_trans)) FROM tb_catatpenjualan WHERE id_trans_toko=tb_toko.id_toko AND tgl_trans LIKE '%-" . date('m') . "-%') AS detailOmset"),
                )
                
                ->whereBetween('tb_catatpenjualan.tgl_trans', [$request->dari, $request->sampai])
                ->groupBy('tb_toko.id_toko')
                ->orderBy('detailOmset', 'DESC')
                ->get();
    
            foreach ($data_tokoCar as $a) {
                $namaToko[] = $a->nama_toko;
            }
    
            // Ambil Data Total Car
            $omsetCar = array();
            $data_omsetCar = DB::table('tb_toko')
                ->join('tb_catatpenjualan', 'tb_toko.id_toko', 'tb_catatpenjualan.id_trans_toko')
                ->select(
                    'tb_toko.nama_toko',
                    'tb_catatpenjualan.*',
                    DB::raw("(SELECT IF(SUM(biaya_trans) IS NULL, 0, SUM(biaya_trans)) FROM tb_catatpenjualan WHERE id_trans_toko=tb_toko.id_toko AND tgl_trans LIKE '%-" . date('m') . "-%') AS detailOmset"),
                )
               
                ->whereBetween('tb_catatpenjualan.tgl_trans', [$request->dari, $request->sampai])
                ->groupBy('tb_toko.id_toko')
                ->orderBy('detailOmset', 'DESC')
                ->get();
    
            foreach ($data_omsetCar as $a) {
                $omsetCar[] = $a->detailOmset;
            }
    
    
            // isi tabel awal
            $data_Tabel = DB::table('tb_toko')
                ->join('tb_catatpenjualan', 'tb_toko.id_toko', 'tb_catatpenjualan.id_trans_toko')
                ->select(
                    'tb_toko.nama_toko',
                    'tb_catatpenjualan.*',
                    DB::raw("(SELECT IF(SUM(biaya_trans) IS NULL, 0, SUM(biaya_trans)) FROM tb_catatpenjualan WHERE id_trans_toko=tb_toko.id_toko AND tgl_trans LIKE '%-" . date('m') . "-%') AS detailOmset"),
                    DB::raw("(SELECT IF(SUM(biaya_trans) IS NULL, 0, SUM(biaya_trans)) FROM tb_catatpengeluaran WHERE id_trans_toko=tb_toko.id_toko AND tgl_trans LIKE '%-" . date('m') . "-%') AS detailKeluar"),
                )
                ->whereBetween('tb_catatpenjualan.tgl_trans', [$request->dari, $request->sampai])
                ->groupBy('tb_toko.id_toko')
                ->orderBy('detailOmset', 'DESC')
                ->get();
            
    
            $data['data_tokoCar'] = $namaToko;
            $data['data_omsetCar'] = $omsetCar;
            $data['data_Tabel'] = $data_Tabel;
        } else {
            // Ambil Data Toko Car
            $namaToko = array();
            $data_tokoCar = DB::table('tb_toko')
                ->join('tb_catatpenjualan', 'tb_toko.id_toko', 'tb_catatpenjualan.id_trans_toko')
                ->select(
                    'tb_toko.nama_toko',
                    'tb_catatpenjualan.*',
                    DB::raw("(SELECT IF(SUM(biaya_trans) IS NULL, 0, SUM(biaya_trans)) FROM tb_catatpenjualan WHERE id_trans_toko=tb_toko.id_toko AND tgl_trans LIKE '%-" . date('m') . "-%') AS detailOmset"),
                )
                
                ->groupBy('tb_toko.id_toko')
                ->orderBy('detailOmset', 'DESC')
                ->whereMonth('tb_catatpenjualan.tgl_trans', date("m"))
                ->get();
    
            foreach ($data_tokoCar as $a) {
                $namaToko[] = $a->nama_toko;
            }
    
            // Ambil Data Total Car
            $omsetCar = array();
            $data_omsetCar = DB::table('tb_toko')
                ->join('tb_catatpenjualan', 'tb_toko.id_toko', 'tb_catatpenjualan.id_trans_toko')
                ->select(
                    'tb_toko.nama_toko',
                    'tb_catatpenjualan.*',
                    DB::raw("(SELECT IF(SUM(biaya_trans) IS NULL, 0, SUM(biaya_trans)) FROM tb_catatpenjualan WHERE id_trans_toko=tb_toko.id_toko AND tgl_trans LIKE '%-" . date('m') . "-%') AS detailOmset"),
                )
               
                ->groupBy('tb_toko.id_toko')
                ->orderBy('detailOmset', 'DESC')
                ->whereMonth('tb_catatpenjualan.tgl_trans', date("m"))
                ->get();
    
            foreach ($data_omsetCar as $a) {
                $omsetCar[] = $a->detailOmset;
            }
    
    
            // isi tabel awal
            $data_Tabel = DB::table('tb_toko')
                ->join('tb_catatpenjualan', 'tb_toko.id_toko', 'tb_catatpenjualan.id_trans_toko')
                ->select(
                    'tb_toko.nama_toko',
                    'tb_catatpenjualan.*',
                    DB::raw("(SELECT IF(SUM(biaya_trans) IS NULL, 0, SUM(biaya_trans)) FROM tb_catatpenjualan WHERE id_trans_toko=tb_toko.id_toko AND tgl_trans LIKE '%-" . date('m') . "-%') AS detailOmset"),
                    DB::raw("(SELECT IF(SUM(biaya_trans) IS NULL, 0, SUM(biaya_trans)) FROM tb_catatpengeluaran WHERE id_trans_toko=tb_toko.id_toko AND tgl_trans LIKE '%-" . date('m') . "-%') AS detailKeluar"),
                )
                ->groupBy('tb_toko.id_toko')
                ->orderBy('detailOmset', 'DESC')
                ->whereMonth('tb_catatpenjualan.tgl_trans', date("m"))
                ->get();
    
            // return $data_Tabel;
    
            $data['data_tokoCar'] = $namaToko;
            $data['data_omsetCar'] = $omsetCar;
            $data['data_Tabel'] = $data_Tabel;
        }


        return view(
            'page/dashboard_toko/index',
            $data,
        );
    }

    public function logout(Request $request)
    {
        $request->session()->forget('username');
        $request->session()->forget('level_user');
        $request->session()->forget('id_user');
        $request->session()->flush();
        Alert::success('Congrats', 'Anda Berhasil Logout');
        return redirect("/");
    }
    
}

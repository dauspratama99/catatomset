<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Alert;
use DB;


class LaporanBiayatController extends Controller
{
    public function index()
    {
        $data_toko = DB::table('tb_toko')->get();
        return view(
            'page/laporan_biaya/index',
            [
                'data_toko' => $data_toko,
            ]
        );
    }

    public function isidatatabel($cabang, $dari, $sampai)
    {

        if($cabang == 'kosong' && $dari == 'kosong' && $sampai == 'kosong'){
            $data_tes = [];

        } elseif ($cabang == 0 && $dari == 0 && $sampai == 0){
            $data_tes = DB::table('tb_catatpengeluaran')
             ->join('tb_toko', 'tb_catatpengeluaran.id_trans_toko', 'tb_toko.id_toko')
             ->select('tb_catatpengeluaran.*', 'tb_toko.nama_toko')
             ->orderBy('tb_catatpengeluaran.tgl_trans','DESC')
             ->get();

         $data_total = DB::table('tb_catatpengeluaran')
             ->join('tb_toko', 'tb_catatpengeluaran.id_trans_toko', 'tb_toko.id_toko')
             ->select('tb_catatpengeluaran.*', 'tb_toko.nama_toko')
             ->get()->sum("biaya_trans");


        } elseif ($cabang != 0 && $dari == 0 && $sampai == 0){
            $data_tes = DB::table('tb_catatpengeluaran')
            ->join('tb_toko', 'tb_catatpengeluaran.id_trans_toko', 'tb_toko.id_toko')
            ->select('tb_catatpengeluaran.*', 'tb_toko.nama_toko')
            ->where('tb_catatpengeluaran.id_trans_toko', $cabang)
            ->orderBy('tb_catatpengeluaran.tgl_trans','DESC')
            ->get();

        $data_total = DB::table('tb_catatpengeluaran')
            ->join('tb_toko', 'tb_catatpengeluaran.id_trans_toko', 'tb_toko.id_toko')
            ->select('tb_catatpengeluaran.*', 'tb_toko.nama_toko')
            ->where('tb_catatpengeluaran.id_trans_toko', $cabang)
            ->get()->sum("biaya_trans");

        } elseif ($cabang == 0 && $dari != 0 && $sampai != 0){
            $data_tes = DB::table('tb_catatpengeluaran')
            ->join('tb_toko', 'tb_catatpengeluaran.id_trans_toko', 'tb_toko.id_toko')
            ->select('tb_catatpengeluaran.*', 'tb_toko.nama_toko')
            ->whereBetween('tb_catatpengeluaran.tgl_trans', [$dari, $sampai])
            ->orderBy('tb_catatpengeluaran.tgl_trans','DESC')
            ->get();

        $data_total = DB::table('tb_catatpengeluaran')
            ->join('tb_toko', 'tb_catatpengeluaran.id_trans_toko', 'tb_toko.id_toko')
            ->select('tb_catatpengeluaran.*', 'tb_toko.nama_toko')
            ->whereBetween('tb_catatpengeluaran.tgl_trans', [$dari, $sampai])
            ->get()->sum("biaya_trans");

        } elseif ($cabang != 0 && $dari != 0 && $sampai != 0){
            $data_tes = DB::table('tb_catatpengeluaran')
            ->join('tb_toko', 'tb_catatpengeluaran.id_trans_toko', 'tb_toko.id_toko')
            ->select('tb_catatpengeluaran.*', 'tb_toko.nama_toko')
            ->where('tb_catatpengeluaran.id_trans_toko', $cabang)
            ->whereBetween('tb_catatpengeluaran.tgl_trans', [$dari, $sampai])
            ->orderBy('tb_catatpengeluaran.tgl_trans','DESC')
            ->get();

        $data_total = DB::table('tb_catatpengeluaran')
            ->join('tb_toko', 'tb_catatpengeluaran.id_trans_toko', 'tb_toko.id_toko')
            ->select('tb_catatpengeluaran.*', 'tb_toko.nama_toko')
            ->where('tb_catatpengeluaran.id_trans_toko', $cabang)
            ->whereBetween('tb_catatpengeluaran.tgl_trans', [$dari, $sampai])
            ->get()->sum("biaya_trans");

        }

        return view(

            'page/laporan_biaya/biayatabel',
            [
                'data_tes' => $data_tes,
                'data_total' => $data_total,

            ]
        );
    }

    public function tampilCetak($cabang, $dari, $sampai)
    {
        
        if($cabang == 'kosong' && $dari == 'kosong' && $sampai == 'kosong'){
            $laporan = [];
            $data_total = [];

        } elseif ($cabang == 0 && $dari == 0 && $sampai == 0){
            $laporan = DB::table('tb_catatpengeluaran')
             ->join('tb_toko', 'tb_catatpengeluaran.id_trans_toko', 'tb_toko.id_toko')
             ->select('tb_catatpengeluaran.*', 'tb_toko.nama_toko')
             ->orderBy('tb_catatpengeluaran.tgl_trans','DESC')
             ->get();

         $data_total = DB::table('tb_catatpengeluaran')
             ->join('tb_toko', 'tb_catatpengeluaran.id_trans_toko', 'tb_toko.id_toko')
             ->select('tb_catatpengeluaran.*', 'tb_toko.nama_toko')
             ->get()->sum("biaya_trans");


        } elseif ($cabang != 0 && $dari == 0 && $sampai == 0){
            $laporan = DB::table('tb_catatpengeluaran')
            ->join('tb_toko', 'tb_catatpengeluaran.id_trans_toko', 'tb_toko.id_toko')
            ->select('tb_catatpengeluaran.*', 'tb_toko.nama_toko')
            ->where('tb_catatpengeluaran.id_trans_toko', $cabang)
            ->orderBy('tb_catatpengeluaran.tgl_trans','DESC')
            ->get();

        $data_total = DB::table('tb_catatpengeluaran')
            ->join('tb_toko', 'tb_catatpengeluaran.id_trans_toko', 'tb_toko.id_toko')
            ->select('tb_catatpengeluaran.*', 'tb_toko.nama_toko')
            ->where('tb_catatpengeluaran.id_trans_toko', $cabang)
            ->get()->sum("biaya_trans");

        } elseif ($cabang == 0 && $dari != 0 && $sampai != 0){
            $laporan = DB::table('tb_catatpengeluaran')
            ->join('tb_toko', 'tb_catatpengeluaran.id_trans_toko', 'tb_toko.id_toko')
            ->select('tb_catatpengeluaran.*', 'tb_toko.nama_toko')
            ->whereBetween('tb_catatpengeluaran.tgl_trans', [$dari, $sampai])
            ->orderBy('tb_catatpengeluaran.tgl_trans','DESC')
            ->get();

        $data_total = DB::table('tb_catatpengeluaran')
            ->join('tb_toko', 'tb_catatpengeluaran.id_trans_toko', 'tb_toko.id_toko')
            ->select('tb_catatpengeluaran.*', 'tb_toko.nama_toko')
            ->whereBetween('tb_catatpengeluaran.tgl_trans', [$dari, $sampai])
            ->get()->sum("biaya_trans");

        } elseif ($cabang != 0 && $dari != 0 && $sampai != 0){
            $laporan = DB::table('tb_catatpengeluaran')
            ->join('tb_toko', 'tb_catatpengeluaran.id_trans_toko', 'tb_toko.id_toko')
            ->select('tb_catatpengeluaran.*', 'tb_toko.nama_toko')
            ->where('tb_catatpengeluaran.id_trans_toko', $cabang)
            ->whereBetween('tb_catatpengeluaran.tgl_trans', [$dari, $sampai])
            ->orderBy('tb_catatpengeluaran.tgl_trans','DESC')
            ->get();

        $data_total = DB::table('tb_catatpengeluaran')
            ->join('tb_toko', 'tb_catatpengeluaran.id_trans_toko', 'tb_toko.id_toko')
            ->select('tb_catatpengeluaran.*', 'tb_toko.nama_toko')
            ->where('tb_catatpengeluaran.id_trans_toko', $cabang)
            ->whereBetween('tb_catatpengeluaran.tgl_trans', [$dari, $sampai])
            ->get()->sum("biaya_trans");

        }



        return view(
            'page/laporan_biaya/laporan_biaya',
            [
                'laporan' => $laporan,
                'data_total' => $data_total,
            ]
        );
    }
}

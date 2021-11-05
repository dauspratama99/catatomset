<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Alert;

class PencatatanController extends Controller
{
    public function index()

    {
        if (session('level_user') == "Toko") {

            $id_toko = DB::table('tb_usertoko')->where('id_usertoko', session('id_usertoko'))->first()->id_toko ?? 0;
            $data_omset = DB::table('tb_catatpenjualan')
                        ->join('tb_toko','tb_catatpenjualan.id_trans_toko', 'tb_toko.id_toko')
                        ->orderBy('tb_catatpenjualan.tgl_trans','DESC')
                        ->where('id_trans_toko', $id_toko)->get();

            $data_total = DB::table('tb_catatpenjualan')->where('id_trans_toko',$id_toko)->get()->sum("biaya_trans");

        } else {

            $data_omset = DB::table('tb_catatpenjualan')
                            ->join('tb_toko','tb_catatpenjualan.id_trans_toko', 'tb_toko.id_toko')
                            ->orderBy('tb_catatpenjualan.tgl_trans','DESC')
                            ->get();
            $data_total = DB::table('tb_catatpenjualan')->get()->sum("biaya_trans");


        }
        
        $data_toko = DB::table('tb_toko')->get();
        return view(
            'page/catat_data_omset/index',
            [
                'data_omset' => $data_omset,
                'data_toko' => $data_toko,
                'data_total' => $data_total,
            ]
        );
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'tgl_trans' => 'required',
            'biaya_trans' => 'required',
            'catatan_trans' => 'required',
        ]);

        DB::table('tb_catatpenjualan')->insert([
            'id_trans_toko' => $request->id_trans_toko,
            'tgl_trans' => $request->tgl_trans,
            'biaya_trans' => $request->biaya_trans,
            'catatan_trans' => $request->catatan_trans,
        ]);

        Alert::success('Congrats', 'Data Berhasil Ditambahkan');
        return redirect()
            ->route('catat_data_omset');
    }

    public function edit($id_trans)
    {
        $data_trans = DB::table('tb_catatpenjualan')->where('id_trans', $id_trans)->first();
        $data_toko = DB::table('tb_toko')->get();
        return view(
            'page/catat_data_omset/form_edit',
            [
                'data_toko' => $data_toko,
                'data_trans' => $data_trans,
                'url' => 'update.catat_data_omset',
            ]
            );
    }

    public function update(Request $request, $id_trans)
    {
        DB::table('tb_catatpenjualan')->where('id_trans',$id_trans)->update([
            'id_trans_toko' => $request->id_trans_toko,
            'tgl_trans' => $request->tgl_trans,
            'biaya_trans' => $request->biaya_trans,
            'catatan_trans' => $request->catatan_trans,
        ]);
        Alert::success('Congrats', 'Data Berhasil Diedit');
        return redirect()
            ->route('catat_data_omset');

    }

    public function destroy($id_trans)
    {
        DB::table('tb_catatpenjualan')->where('id_trans',$id_trans)->delete();
        Alert::success('Congrats', 'Data Berhasil Dihapus');
        return redirect()
            ->route('catat_data_omset'); 
    }
}

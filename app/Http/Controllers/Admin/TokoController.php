<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Alert;


class TokoController extends Controller
{
    public function index()
    {
        $data_toko = DB::table('tb_toko')->get();
        return view(
            'page/data_toko/index',[

                'data_toko'=>$data_toko
            ]
        );
    }

    public function tambah()
    {
        return view(
            'page/data_toko/form_tambah'
        );
    }

    public function simpan(Request $request)
    {
        DB::table('tb_toko')->insert([
            'nama_toko' => $request->nama_toko,
            'nama_pimpinan' => $request->nama_pimpinan,
            'alamat_toko' => $request->alamat_toko,
            'notlp_toko' => $request->notlp_toko,
        ]);

        Alert::success('Congrats', 'Data Berhasil Ditambahkan');
        return redirect()
            ->route('data_toko');
    }

    public function destroy($id_toko)
    {
        DB::table('tb_toko')->where('id_toko',$id_toko)->delete();
        Alert::success('Congrats', 'Data Berhasil Dihapus');
        return redirect()
            ->route('data_toko');
            

    }

    public function edit($id_toko)
    {
        $data_toko = DB::table('tb_toko')->where('id_toko',$id_toko)->first();
        return view(
            'page/data_toko/form_edit',
            [
                'data_toko' => $data_toko,
                'url' => 'update.data_toko',
            ]
            );
    }

    public function update(Request $request, $id_toko)
    {
        DB::table('tb_toko')->where('id_toko',$id_toko)->update([
            'nama_toko' => $request->nama_toko,
            'nama_pimpinan' => $request->nama_pimpinan,
            'alamat_toko' => $request->alamat_toko,
            'notlp_toko' => $request->notlp_toko,
        ]);
        Alert::success('Congrats', 'Data Berhasil Diedit');
        return redirect()
            ->route('data_toko');
           
    }
}

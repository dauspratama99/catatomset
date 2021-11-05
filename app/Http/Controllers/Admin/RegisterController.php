<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Alert;
use App\Models\RegisterModel;
use File;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\PseudoTypes\True_;

use Has;

class RegisterController extends Controller
{

    public function index()
    {
        $data_user = DB::table('tb_user')->get();

        return view(
            'page/data_user/index',
            [
                'data_user' => $data_user,
            ]
        );
    }

    public function tambah()
    {
        $data_user = DB::table('tb_user')->get();


        return view(
            'page/data_user/form_tambah',
            [
                'data_user' => $data_user,
            ]
        );
    }

    public function simpan(Request $request)
    {
        DB::table('tb_user')->insert([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'level_user' => $request->level_user,
        ]);

        Alert::success('Congrats', 'Data Berhasil Ditambahkan');
        return redirect()
            ->route('data_user');
    }


    public function destroy($id_user)
    {

        $del = DB::table('tb_user')->where('id_user', $id_user)->delete();
        if ($del == True) {
            Alert::success('Congrats', 'Data Berhasil Dihapus');
            return redirect()
                ->route('data_user');
        } else {

            Alert::error('Error', 'Data Gagal Dihapus');
            return redirect()
                ->route('data_user');
        }
    }

    public function edit($id_user)
    {
        $data_user = DB::table('tb_user')->where('id_user', $id_user)->first();
        return view(
            'page/data_user/form_edit',
            [
                'data_user' => $data_user,
                'url' => 'update.data_user',
            ]
        );
    }

    public function update(Request $request, $id_user)
    {

        $updt = DB::table('tb_user')->where('id_user', $id_user)->update([
            'username' => $request->username,
            'password' => Hash::make( $request->password),
            'level_user' => $request->level_user,
        ]);

        if ($updt == TRUE) {
            Alert::success('Congrats', 'Data Berhasil DiUpdate');
            return redirect()
                ->route('data_user');
        } else {
            Alert::warning('Warning', 'Pastikan Format Gambar Dengan benar');
            return back();
        }
    }


    public function profile()
    {
        return view('page/data_user/profile');
    }
}

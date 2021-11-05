<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Alert;
use File;
use App\Models\UserTokoModel;

class UserTokoController extends Controller
{
    public function __construct()
    {
        $this->rules = array(
            'foto_user' => 'mimes:jpeg,jpg,png|max:50000'
        );
    }

    public function index()
    {
        
        $data_user_toko = DB::table('tb_usertoko')
                        ->join('tb_user', 'tb_usertoko.id_user', 'tb_user.id_user')
                        ->join('tb_toko', 'tb_usertoko.id_toko', 'tb_toko.id_toko')
                        ->get();
    
        return view(
            'page/data_user_toko/index',
            [
                'data_user_toko' => $data_user_toko,
            ]
            );
    }

    public function tambah()
    {
        $data_user = DB::table('tb_user')->get();
        $data_toko = DB::table('tb_toko')->get();

        return view(
            'page/data_user_toko/form_tambah',
            [
                'data_user' => $data_user,
                'data_toko' => $data_toko,
            ]
            );
    }

    public function simpan(Request $request)
    {
        $validator = Validator::make($request->all(),$this->rules);
        if($validator->fails()){
            
           Alert::warning('Warning', 'Pastikan Format Gambar Dengan benar');
           return back();

        } else {

           $filename = $request->foto_usertoko->getClientOriginalName();
           $request->file('foto_usertoko')->move('images',$request->foto_usertoko->getClientOriginalName());

           //simpan
           $simpan = new UserTokoModel();
           $simpan->id_user = $request->id_user;
           $simpan->id_toko = $request->id_toko;
           $simpan->nama_usertoko = $request->nama_usertoko;
           $simpan->nohp_usertoko = $request->nohp_usertoko;
           $simpan->foto_usertoko = $filename;
           $simpan->save();

           Alert::success('Congrats', 'Data Berhasil Ditambahkan');
           return redirect()
               ->route('data_user_toko');

       }

    }

    public function edit($id_usertoko)
   {
      
      $data_user = DB::table('tb_user')->get();
      $data_toko = DB::table('tb_toko')->get();
      $data_user_toko = DB::table('tb_usertoko')->where('id_usertoko',$id_usertoko)->first();
      return view(
          'page/data_user_toko/form_edit',
          [
              'data_user_toko' => $data_user_toko,
              'data_user' => $data_user,
              'data_toko' => $data_toko,
              'url' => 'update.data_user_toko',
          ]
        ); 
   }

   public function update(Request $request, $id_usertoko)
   {
        $validator = Validator::make($request->all(),$this->rules);
        if($validator->fails()){
            Alert::warning('Warning', 'Pastikan Format Gambar Dengan benar');
            return back();
        }else{
            if($request->file('foto_usertoko') == NULL)
            {
                $updt = DB::table('tb_usertoko')->where('id_usertoko',$id_usertoko)->update([
                    'nohp_usertoko' => $request->nohp_usertoko
                ]);
            }else{
                $filename = $request->foto_usertoko->getClientOriginalName();
                $request->file('foto_usertoko')->move('images',$request->foto_usertoko->getClientOriginalName());
                $updt = DB::table('tb_usertoko')->where('id_usertoko',$id_usertoko)->update([
                            'id_user' => $request->id_user,
                            'id_toko' => $request->id_toko,
                            'nama_usertoko' => $request->nama_usertoko,
                            'nohp_usertoko' => $request->nohp_usertoko,
                            'foto_usertoko' => $filename,
               ]);
            }
            if($updt == TRUE){
                Alert::success('Congrats', 'Data Berhasil DiUpdate');
                return redirect()
                    ->route('data_user_toko');
            }else{
                Alert::warning('Warning', 'Pastikan Format Gambar Dengan benar');
                return back();
            }
        }
   }

   public function destroy($id_usertoko)
   {
       $cek = DB::table('tb_usertoko')->where('id_usertoko',$id_usertoko)->first();
       File::delete('images/'.$cek->foto_usertoko);

       $del = DB::table('tb_usertoko')->where('id_usertoko', $id_usertoko)->delete();
       if($del == True)
       {
            Alert::success('Congrats', 'Data Berhasil Dihapus');
            return redirect()
                ->route('data_user_toko');
       }else{

            Alert::error('Error', 'Data Gagal Dihapus');
            return redirect()
                ->route('data_user_toko');
       }
       
   }



}




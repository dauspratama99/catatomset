@extends('layout.index')
@section('content')


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Data Omset Masuk</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Data Omset</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="{{ route($url, $data_trans->id_trans ?? null) }}" method="POST">

                            @csrf
                            @if(isset($data_trans))
                            @method('put')
                            @endif

                            @if(session('level_user') == 'Toko')
                            @php
                            $id_usertoko = session('id_usertoko');
                            $usertoko = DB::table('tb_usertoko')->where('id_usertoko',$id_usertoko)->leftjoin('tb_toko','tb_toko.id_toko','=','tb_usertoko.id_toko')->select('tb_toko.id_toko','tb_toko.nama_toko')->first();
                            @endphp

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="">ID Toko</label>
                                        <label for="" style="color:red;"><i>*</i></label>
                                        <input type="text" class="form-control @error('id_trans_toko') {{ 'is-invalid' }} @enderror" name="id_trans_toko" value="{{$usertoko->id_toko}}" readonly>
                                        @error('id_trans_toko')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-8">
                                        <label for="">Nama Toko</label>
                                        <label for="" style="color:red;"><i>*</i></label>
                                        <input type="text" class="form-control @error('id_trans_toko') {{ 'is-invalid' }} @enderror" name="" value="{{$usertoko->nama_toko}}" readonly>
                                        @error('id_trans_toko')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            @endif

                            @if(session('level_user') == 'Super Admin')

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="">ID / Nama Toko</label>
                                        <label for="" style="color:red;"><i>*</i></label>
                                        <select name="id_trans_toko" id="id_trans_toko" class="form-control">
                                            <option value="" disabled selected>-- Pilih --</option>
                                            @foreach($data_toko as $data)
                                            <option value="{{$data->id_toko}}">{{$data->id_toko}} - {{$data->nama_toko}}</option>
                                            @endforeach
                                        </select>
                                        <script>
                                            document.getElementById('id_trans_toko').value="{{$data->id_toko}}"
                                        </script>
                                        @error('id_trans_toko')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @endif


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="">Tanggan Pencatatan Omset</label>
                                        <label for="" style="color:red;"><i>*</i></label>
                                        <input type="date" class="form-control @error('tgl_trans') {{ 'is-invalid' }} @enderror" name="tgl_trans" value="{{ old('tgl_trans') ?? ($data_trans->tgl_trans ?? '') }}">
                                        @error('tgl_trans')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="">Jumlah Omset Masuk (Rp.)</label>
                                        <label for="" style="color:red;"><i>*</i></label>
                                        <input type="text" style="font-weight:bold;" class="form-control @error('biaya_trans') {{ 'is-invalid' }} @enderror" name="biaya_trans" id="biaya_trans" value="{{ old('biaya_trans') ?? ($data_trans->biaya_trans ?? '') }}">
                                        @error('biaya_trans')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="">Keterangan</label>
                                        <label for="" style="color:red;"><i>*</i></label>
                                        <input type="text" class="form-control @error('catatan_trans') {{ 'is-invalid' }} @enderror" name="catatan_trans" value="{{ old('catatan_trans') ?? ($data_trans->catatan_trans ?? '') }}">
                                        @error('catatan_trans')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" name="simpan" value="Update"> <i class="far fa-save"></i> Update</button>
                                <!-- <button type="reset" class="btn btn-secondary" name="batal" value="Batal"> <i class="fas fa-undo-alt"></i> Batal</button> -->
                            </div>


                        </form>

                    </div>
                    <!-- /.card-body -->
                </div>


                <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->

            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content -->





@endsection

@push('js')
<script>
    $(document).ready(function() {
        $('#tabeltoko').DataTable();
    });
</script>
@endpush
@extends('layout.index')
@section('content')


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah User Toko</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Data User</a></li>
                    <li class="breadcrumb-item active">Tambah</li>
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
                    <div class="card-header">
                        <h3 align="middle" class="card-title text-danger"><i>* Isi data dengan benar !</i></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="{{ route('simpan.data_user_toko') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="quantity">Pilih Username </label>
                                <label for="" style="color:red;"><i>*</i></label>
                                <select name="id_user" id="id_user" class="form-control">
                                    <option value="" selected disabled>-- Pilih --</option>
                                    @foreach($data_user as $data)
                                    <option value="{{$data->id_user}}">{{$data->username}}</option>
                                    @endforeach
                                </select>
                                @error('nama_user')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="quantity">Nama Toko </label>
                                <label for="" style="color:red;"><i>*</i></label>
                                <select name="id_toko" id="id_toko" class="form-control">
                                    <option value="" selected disabled>-- Pilih --</option>
                                    @foreach($data_toko as $data)
                                    <option value="{{$data->id_toko}}">{{$data->nama_toko}}</option>
                                    @endforeach
                                </select>
                                @error('nama_user')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="quantity">Nama Lengkap</label>
                                <label for="" style="color:red;"><i>*</i></label>
                                <input type="text" class="form-control @error('nama_usertoko') {{ 'is-invalid' }} @enderror" name="nama_usertoko">
                                @error('nama_usertoko')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="quantity">Nohp / Wa</label>
                                <label for="" style="color:red;"><i>*</i></label>
                                <input type="text" class="form-control @error('nohp_usertoko') {{ 'is-invalid' }} @enderror" name="nohp_usertoko">
                                @error('nohp_usertoko')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="quantity">Foto</label>
                                <input type="file" class="form-control" name="foto_usertoko">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-info" name="simpan" value="Simpan"> <i class="far fa-save"></i> Simpan</button>
                                <button type="reset" class="btn btn-secondary" name="batal" value="Batal"> <i class="fas fa-undo-alt"></i> Batal</button>
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
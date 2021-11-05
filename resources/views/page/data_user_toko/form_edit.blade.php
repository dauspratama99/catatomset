@extends('layout.index')
@section('content')


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Data User</a></li>
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

                        <form action="{{ route($url, $data_user_toko->id_usertoko ?? null) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($data_user_toko))
                            @method('put')
                            @endif

                            <div class="form-group">
                                <label for="quantity">Pilih Username</label>
                                <label for="" style="color:red;"><i>*</i></label>
                                <select name="id_user" id="id_user" class="form-control">
                                    <option value="" selected disabled>-- Pilih --</option>
                                    @foreach($data_user as $data)
                                    <option value="{{$data->id_user}}">{{$data->username}}</option>
                                    @endforeach
                                </select>
                                <script>
                                    document.getElementById('id_user').value = '{{ $data_user_toko->id_user }}';
                                </script>
                               
                            </div>

                            <div class="form-group">
                                <label for="quantity">Nama Toko</label>
                                <label for="" style="color:red;"><i>*</i></label>
                                <select name="id_toko" id="id_toko" class="form-control">
                                    <option value="" selected disabled>-- Pilih --</option>
                                    @foreach($data_toko as $data)
                                    <option value="{{$data->id_toko}}">{{$data->nama_toko}}</option>
                                    @endforeach
                                </select>
                                <script>
                                    document.getElementById('id_toko').value = "{{$data_user_toko->id_toko}}"
                                </script>

                            </div>

                            <div class="form-group">
                                <label for="quantity">Nama Lengkap</label>
                                <label for="" style="color:red;"><i>*</i></label>
                                <input type="text" class="form-control @error('nama_usertoko') {{ 'is-invalid' }} @enderror" name="nama_usertoko" value="{{ old('nama_usertoko') ?? ($data_user_toko->nama_usertoko ?? '') }}">
                                @error('nama_usertoko')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="quantity">Nohp / Wa</label>
                                <label for="" style="color:red;"><i>*</i></label>
                                <input type="text" class="form-control @error('nohp_usertoko') {{ 'is-invalid' }} @enderror" name="nohp_usertoko" value="{{ old('nohp_usertoko') ?? ($data_user_toko->nohp_usertoko ?? '') }}">
                                @error('nohp_usertoko')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="quantity">Foto</label><br>
                                <input type="file" class="form-control @error('foto_usertoko') {{ 'is-invalid' }} @enderror" name="foto_usertoko">
                                <i style="color:red">File : <a style="color:black" href="{{asset('/images/'.$data_user_toko->foto_usertoko)}}">{{$data_user_toko->foto_usertoko}}</a></i>
                                @error('foto_usertoko')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" name="simpan" value="Simpan"> <i class="far fa-save"></i> Update</button>

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
@extends('layout.index')
@section('content')


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah User</h1>
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

                        <form action="{{ route('simpan.data_user') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group">
                                <label for="quantity">Username</label>
                                <label for="" style="color:red;"><i>*</i></label>
                                <input type="text" class="form-control @error('username') {{ 'is-invalid' }} @enderror" name="username" placeholder="Username">
                                @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="quantity">Password</label>
                                <label for="" style="color:red;"><i>*</i></label>
                                <input type="text" class="form-control @error('password') {{ 'is-invalid' }} @enderror" name="password" placeholder="Password">
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="quantity">Level</label>
                                <label for="" style="color:red;"><i>*</i></label>
                                <select name="level_user" id="level_user" class="form-control">
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <option value="Super Admin">Super Admin</option>
                                    <option value="Toko">Toko</option>
                                    <option value="Pimpinan">Pimpinan</option>     
                                </select>
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
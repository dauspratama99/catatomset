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

                        <form action="{{ route($url, $data_user->id_user ?? null) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($data_user))
                            @method('put')
                            @endif

                            <div class="form-group">
                                <label for="quantity">Username</label>
                                <label for="" style="color:red;"><i>*</i></label>
                                <input type="text" class="form-control @error('username') {{ 'is-invalid' }} @enderror" name="username" value="{{ old('username') ?? ($data_user->username ?? '') }}">
                                @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="quantity">Password</label>
                                <label for="" style="color:red;"><i>*</i></label>
                                <input type="text" class="form-control @error('password') {{ 'is-invalid' }} @enderror" name="password" value="{{ old('password') ?? ($data_user->password ?? '') }}">
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

                                <script>
                                    document.getElementById('level_user').value="{{$data_user->level_user}}"
                                </script>
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
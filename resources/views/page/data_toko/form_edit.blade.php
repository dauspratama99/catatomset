@extends('layout.index')
@section('content')


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Toko / Outlet</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Data Toko</a></li>
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

                        <form action="{{ route($url, $data_toko->id_toko ?? null) }}" method="POST">

                            @csrf
                            @if(isset($data_toko))
                            @method('put')
                            @endif

                            <div class="form-group">
                                <label for="quantity">Nama Toko</label>
                                <label for="" style="color:red;"><i>*</i></label>
                                <input type="text" class="form-control @error('nama_toko') {{ 'is-invalid' }} @enderror" name="nama_toko" value="{{ old('nama_toko') ?? ($data_toko->nama_toko ?? '') }}" >
                                    @error('nama_toko')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>

                            <div class="form-group">
                                <label for="quantity">Penanggung Jawab</label>
                                <label for="" style="color:red;"><i>*</i></label>
                                <input type="text" class="form-control @error('nama_pimpinan') {{ 'is-invalid' }} @enderror" name="nama_pimpinan" value="{{ old('nama_pimpinan') ?? ($data_toko->nama_pimpinan ?? '') }}" >
                                    @error('nama_pimpinan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>

                            <label for="quantity" style="">Alamat</label>
                            <label for="" style="color:red;"><i>*</i></label>
                            <div class="form-group">
                                <textarea rows="5" cols="50" class="form-control" style="color:black;" name="alamat_toko">
                                {{ old('alamat_toko') ?? ($data_toko->alamat_toko ?? '') }} 
                                </textarea>
                                @error('alamat_toko')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="quantity">No Telpon / Hp</label>
                                <label for="" style="color:red;"><i>*</i></label>
                                <input type="text" class="form-control @error('notlp_toko') {{ 'is-invalid' }} @enderror" name="notlp_toko" value="{{ old('notlp_toko') ?? ($data_toko->notlp_toko ?? '') }}" >
                                    @error('notlp_toko')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
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
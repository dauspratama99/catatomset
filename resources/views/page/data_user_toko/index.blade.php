@extends('layout.index')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data User Toko</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data User Toko</li>
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
                        <a href="{{route('tambah.data_user_toko')}}" class="btn btn-secondary" style="background-color:#483D8B ;"><i class="fas fa-plus-square"></i> Data User Toko</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tabeltoko" class="display table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Nama Toko</th>
                                    <th>Nama</th>
                                    <th>Nohp</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_user_toko as $no =>$data)
                                <tr>
                                    <td>{{$no+1}}</td>
                                    <td>{{$data->username}}</td>
                                    <td>{{$data->nama_toko}}</td>
                                    <td>{{$data->nama_usertoko}}</td>
                                    <td>{{$data->nohp_usertoko}}</td>
                                    <td style="width: 4vh; height:6vh ">
                                        <img class="w-100" src="{{ asset('/images/'. $data->foto_usertoko) }}" alt="">
                                    </td>
                                    <td>
                                        <a href="{{ route('edit.data_user_toko', $data->id_usertoko) }}" class="btn btn-warning btn-sm btn-circle"><i class="far fa-edit"></i></a>

                                        <button type="button" class="btn btn-danger btn-sm btn-circle" onclick="ModalHapus('{{ route('hapus.data_user_toko', $data->id_usertoko) }}')"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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

<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" id="formDelete">
                <div class="modal-body">
                    @csrf
                    @method('delete')
                    Yakin Hapus Data ?
                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>







@push('js')
<script>
    $(document).ready(function() {
        $('#tabeltoko').DataTable();
    });
</script>
@endpush





<script>
    // untuk hapus data
    function ModalHapus(url) {
        $('#ModalHapus').modal('show')
        $('#formDelete').attr('action', url);
    }
</script>


@endsection
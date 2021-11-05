@extends('layout.index')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Profile User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
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
                        <table id="tabeltoko" class="table table-striped">
                            <thead align="left">
                                <tr>
                                    <th style="text-align:top; vertical-align:middle;">Foto</th>
                                    <th>
                                        @if(session()->get('level_user') == "Toko")
                                        @php
                                            $id_usertoko = session('id_usertoko');
                                            $usertoko = DB::table('tb_usertoko')->where('id_usertoko',$id_usertoko)->first();
                                        @endphp
                                        <img src='{{ asset("/images/$usertoko->foto_usertoko")}}' width="120px" alt="User Image">
                                        @endif

                                        

                                    </th>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    @if(session()->get('level_user') == "Toko")
                                    <th>{{ $usertoko->nama_usertoko }}</th>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Username</th>
                                    <th>{{ session()->get('username') }}</th>
                                </tr>
                                <tr>
                                    <th>Level</th>
                                    <th>
                                        <button class="btn btn-secondary btn-sm" style="background-color: #483D8B;">

                                            {{ session()->get('level_user') }}
                                        </button>
                                    </th>
                                </tr>
                            </thead>
                           
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

@endsection







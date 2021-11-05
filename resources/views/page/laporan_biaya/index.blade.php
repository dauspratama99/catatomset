@extends('layout.index')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Laporan Biaya Pengeluaran </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Laporan Omset</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">

            <!-- /.col-md-6 -->
            <div class="col-lg-12">
                <div class="card" style="background-color: #B0C4DE;">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <div class="card-body">

                                <div class="form-row">
                                    <div class="col-md-3 mb-3">
                                        <label for="">ID / Nama Toko</label>
                                        <label for="" style="color:red;"><i>*</i></label>
                                        <select name="id_toko" id="cabang_toko" class="form-control">
                                            <option value="" disabled selected>-- Pilih --</option>
                                            <option value="0">Semua Cabang Outlet</option>
                                            @foreach($data_toko as $data)
                                            <option value="{{$data->id_toko}}">{{$data->id_toko}} - {{$data->nama_toko}}</option>
                                            @endforeach
                                        </select>
                                        @error('id_trans_toko')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">Pilih Tanggal Awal</label>
                                        <label for="" style="color:red;"><i>*</i></label>
                                        <input type="date" id="dari" class="form-control @error('tgl_trans') {{ 'is-invalid' }} @enderror" name="tgl_trans" value="">
                                        @error('id_trans_toko')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3 mb-6">
                                        <label for="">Pilih Tanggal Akhir</label>
                                        <label for="" style="color:red;"><i>*</i></label>
                                        <input type="date" id="sampai" class="form-control @error('tgl_trans') {{ 'is-invalid' }} @enderror" name="tgl_trans" value="">
                                        @error('id_trans_toko')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-1 pt-2 mb-2">
                                        <div class="col-auto my-4  ">
                                            <button type="button" onclick="caridata()" class="btn " style="background-color: #20B2AA; color:white;"><i class="fas fa-search"></i> Cari</button>
                                        </div>
                                    </div>

                                    <div class="col-md-2 pt-2 mb-2">
                                        <div class="col-auto my-4 pr-6">
                                            <button type="button" onclick="cetakbiayakeluar()" class="btn " style="background-color:  #483D8B; color:white;"><i class="fas fa-print"></i> Cetak</button>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tabeltoko" class="display table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Toko</th>
                                    <th>Tanggal Catat</th>
                                    <th>Keterangan</th>
                                    <th>Biaya Keluar</th>
                                </tr>
                            </thead>
                            <tbody id="isidata">

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>



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

    function caridata() {
        var c = $('#cabang_toko').val()
        var d = $('#dari').val()
        var s = $('#sampai').val()
      
        if(c == null && d == '' && s == ''){
            alert('Pilih Cabang Terlebih Dahulu !')
            var cabang = 'kosong';
            var dari = 'kosong';
            var sampai = 'kosong';
        }else if(c == 0 && d == '' && s == ''){
            var cabang = 0;
            var dari = 0;
            var sampai = 0;
        }else if(c == 0 && d != '' && s != ''){
            var cabang = 0;
            var dari = d;
            var sampai = s;
        }
        else if(c != null && d == '' && s == ''){
            var cabang = c;
            var dari = 0;
            var sampai = 0;
        } else {
            var cabang = c;
            var dari = d;
            var sampai = s;
        }
        $('#isidata').load("/laporan_biaya_keluar/" + cabang + "/" + dari + "/" + sampai)
    }

    function cetakbiayakeluar() {
        var cb = $('#cabang_toko').val()
        var d = $('#dari').val()
        var s = $('#sampai').val()

        if (d == '') {
            var cabang = cb != '' ? cb : 0;
            var dari = 0;
            var sampai = 0;

        } else {

            var cabang = cb;
            var dari = d;
            var sampai = s;

        }
        window.open(`{{ url('tampil_cetakbiaya_pdf') }}/` + cabang + "/" + dari + "/" + sampai, '_blank');
    }
</script>


@endsection
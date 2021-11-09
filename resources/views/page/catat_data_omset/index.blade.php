@extends('layout.index')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Pencatatan Omset Penjualan </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Pencatatan Omset</li>
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
                            <button type="button" class="btn btn-primary" style="background-color:#483D8B;" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-plus-square"></i> Catatan Omset
                            </button>
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
                                    <th>Omset Masuk</th>
                                   
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_omset as $no => $data)
                                <tr>
                                    <td>{{$no+1}}</td>
                                    <td>{{$data->nama_toko}}</td>
                                    <td>{{ date("d F Y", strtotime($data->tgl_trans))}}</td>
                                    <td>{{$data->catatan_trans}}</td>
                                    <td>
                                        Rp.
                                            {{ number_format( $data->biaya_trans)}}
                                    </td>
                                   
                                    <td>
                                        <a href="{{ route('edit.catat_data_omset', $data->id_trans) }}" class="btn btn-warning btn-sm btn-circle"><i class="far fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm btn-circle" onclick="ModalHapus(' {{ route('delete.catat_data_omset', $data->id_trans) }} ')"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>

                                    <th>TOTAL</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>
                                        Rp.
                                        {{ number_format( $data_total)}}
                                    </th>
                                    <th></th>
                                   
                                </tr>

                            </tfoot>


                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>



        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color: red;"><i>Masukan data omset dengan benar !</i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('simpan.catat_data_omset')}}" method="POST">
                    @csrf

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
                                <input type="date" class="form-control @error('tgl_trans') {{ 'is-invalid' }} @enderror" name="tgl_trans" value="">
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
                                <input type="text" style="font-weight:bold;" class="form-control @error('biaya_trans') {{ 'is-invalid' }} @enderror" name="biaya_trans" id="biaya_trans">
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
                                <input type="text" class="form-control" name="catatan_trans" value="">
                            </div>
                        </div>
                    </div>
                    <!-- 
                    <script>
                        var rupiah2 = document.getElementById("biaya_trans");

                        rupiah2.addEventListener("keyup", function(e) {
                            rupiah2.value = convertRupiah(this.value, "Rp. ");
                        });

                        rupiah2.addEventListener('keydown', function(event) {
                            return isNumberKey(event);
                        });

                        function convertRupiah(angka, prefix) {
                            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                                split = number_string.split(","),
                                sisa = split[0].length % 3,
                                rupiah = split[0].substr(0, sisa),
                                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                            if (ribuan) {
                                separator = sisa ? "." : "";
                                rupiah += separator + ribuan.join(".");
                            }

                            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
                            return prefix == undefined ? rupiah : rupiah ? prefix + rupiah : "";
                        }

                        function isNumberKey(evt) {
                            key = evt.which || evt.keyCode;
                            if (key != 188 // Comma
                                &&
                                key != 8 // Backspace
                                &&
                                key != 17 && key != 86 & key != 67 // Ctrl c, ctrl v
                                &&
                                (key < 48 || key > 57) // Non digit
                            ) {
                                evt.preventDefault();
                                return;
                            }
                        }
                    </script> -->
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info" name="simpan" value="Simpan"> <i class="far fa-save"></i> Simpan</button>
                <button type="reset" class="btn btn-secondary" data-dismiss="modal" name="batal" value="Batal"> <i class="fas fa-undo-alt"></i> Batal</button>
            </div>
            </form>
        </div>
    </div>
</div>


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
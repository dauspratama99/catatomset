@extends('layout.index')
@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1 class="m-0">
          <marquee>Selamat Datang Pengunjung . . . !</marquee>
        </h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container-fluid">


    @if(session('level_user') == "Super Admin")

    <div class="col-lg-12">
      <div class="card" style="background-color: #B0C4DE;">

        <div class="card-body">
          <form method="get">
            <div class="row g-4">
              <div class="col-sm-3">
                <b>Dari</b>
                <input type="date" class="form-control" name="dari">
              </div>
              <div class="col-sm-3">
                <b>Sampai</b>
                <input type="date" class="form-control" name="sampai">
              </div>
              <div class="col-md-3">
                <div class="col-auto my-4  ">
                  <button type="submit" class="btn " style="background-color: #20B2AA; color:white;"><i class="fas fa-search"></i> Cari</button>
                </div>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>

    <div class="col-md-12">
      <div class="card" style="background-color: #F5F5DC;">
      <div class="card-header">
          Grafik Omset Toko Bulan Sekarang
        </div>
        <div class="card-body">
          <div id="myChart"></div>
        </div>
      </div>
    </div>

    <div class="col-lg-12">
      <div class="card" style="background-color:#F5F5DC;">
        <div class="card-header">
          Statistik Biaya Toko Bulan Sekarang
        </div>
        <div class="card-body" id="isidata">
          <table class="table" id="tabeltoko">
            <thead class="thead-light">
              <tr>

                <th>Nama Toko</th>
                <th>Omset Masuk</th>
                <th>Biaya Pengeluaran</th>
                <th>Total Bersih</th>
              </tr>
            </thead>
            <tbody>

              @php
              $totalOmset = 0;
              $totalKeluar = 0;
              $totalBersih = 0;
              @endphp
              @foreach($data_Tabel as $data)
              <tr>
                <td>{{$data->nama_toko}}</td>
                <td>Rp. {{ number_format($data->detailOmset)}}</td>
                <td>Rp. {{ number_format($data->detailKeluar)}}</td>
                <td>Rp. {{ number_format($data->detailOmset-$data->detailKeluar)}}</td>
              </tr>

              @php
              $totalOmset += $data->detailOmset;
              $totalKeluar += $data->detailKeluar;
              @endphp
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>TOTAL</th>
                <th>Rp. {{ number_format( $totalOmset)}}</th>
                <th>Rp. {{ number_format( $totalKeluar)}}</th>
                <th>Rp. {{ number_format( $totalOmset-$totalKeluar)}}</th>
              </tr>
            </tfoot>

          </table>
        </div>
      </div>
    </div>
    @endif

    @if(session('level_user') == "Pimpinan")

    <div class="col-lg-12">
      <div class="card" style="background-color: #B0C4DE;">

        <div class="card-body">
          <form method="get">
            <div class="row g-4">
              <div class="col-sm-3">
                <b>Dari</b>
                <input type="date" class="form-control" name="dari">
              </div>
              <div class="col-sm-3">
                <b>Sampai</b>
                <input type="date" class="form-control" name="sampai">
              </div>
              <div class="col-md-3">
                <div class="col-auto my-4  ">
                  <button type="submit" class="btn " style="background-color: #20B2AA; color:white;"><i class="fas fa-search"></i> Cari</button>
                </div>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>

    <div class="col-md-12">
      <div class="card" style="background-color: #F5F5DC;">
      <div class="card-header">
          Grafik Omset Toko Bulan Sekarang
        </div>
        <div class="card-body">
          <div id="myChart"></div>
        </div>
      </div>
    </div>

    <div class="col-lg-12">
      <div class="card" style="background-color:#F5F5DC;">
        <div class="card-header">
          Statistik Biaya Toko Bulan Sekarang
        </div>
        <div class="card-body" id="isidata">
          <table class="table" id="tabeltoko">
            <thead class="thead-light">
              <tr>

                <th>Nama Toko</th>
                <th>Omset Masuk</th>
                <th>Biaya Pengeluaran</th>
                <th>Total Bersih</th>
              </tr>
            </thead>
            <tbody>

              @php
              $totalOmset = 0;
              $totalKeluar = 0;
              $totalBersih = 0;
              @endphp
              @foreach($data_Tabel as $data)
              <tr>
                <td>{{$data->nama_toko}}</td>
                <td>Rp. {{ number_format($data->detailOmset)}}</td>
                <td>Rp. {{ number_format($data->detailKeluar)}}</td>
                <td>Rp. {{ number_format($data->detailOmset-$data->detailKeluar)}}</td>
              </tr>

              @php
              $totalOmset += $data->detailOmset;
              $totalKeluar += $data->detailKeluar;
              @endphp
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>TOTAL</th>
                <th>Rp. {{ number_format( $totalOmset)}}</th>
                <th>Rp. {{ number_format( $totalKeluar)}}</th>
                <th>Rp. {{ number_format( $totalOmset-$totalKeluar)}}</th>
              </tr>
            </tfoot>

          </table>
        </div>
      </div>
    </div>
    @endif

    @if(session('level_user') == "Toko")

    <div class="col-md-12">
      <div class="card" style="background-color: #F5F5DC;">
        <div class="card-body">
          <div id="myChart"></div>
        </div>
      </div>
    </div>

    @endif

  </div>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
  Highcharts.chart('myChart', {
    chart: {
      type: 'column'
    },
    title: {
      text: ''
    },
    subtitle: {
      text: ''
    },
    xAxis: {
      categories: <?= json_encode($data_tokoCar) ?>,
      crosshair: true
    },
    yAxis: {
      min: 0,
      title: {
        text: ''
      }
    },
    tooltip: {
      headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
      pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
        '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
      footerFormat: '</table>',
      shared: true,
      useHTML: true
    },
    plotOptions: {
      column: {
        pointPadding: 0.2,
        borderWidth: 0
      }
    },
    series: [{
      name: 'Omset Tertinggi Bulan Sekarang',
      data: <?= json_encode($data_omsetCar) ?>,
    }]
  });
</script>

@push('js')
<script>
  $(document).ready(function() {
    $('#tabeltoko').DataTable();
  });
</script>
@endpush

<!-- <script>
  function caridata() {
    var d = $('#dari').val()
    var s = $('#sampai').val()

    if (d == '' && s == '') {
      alert('Pilih Tanggal Terlebih Dahulu !')
      var dari = 'kosong';
      var sampai = 'kosong';
    } else if (d != '' && s == '') {
      alert('Lengkapi Tanggal Terlebih Dahulu !')
      var dari = 'kosong';
      var sampai = 'kosong';
    } else if (d == '' && s != '') {
      alert('Lengkapi Tanggal Terlebih Dahulu !')
      var dari = 'kosong';
      var sampai = 'kosong';
    }else {
      var dari = d;
      var sampai = s;
    }

    $('.content').load("/tampil_data_das/" + dari + "/" + sampai)
  }
</script> -->

@endsection
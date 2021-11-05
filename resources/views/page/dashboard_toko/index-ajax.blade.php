
  <div class="container-fluid">

    @if(session('level_user') == "Super Admin")

    <div class="col-lg-12">
      <div class="card" style="background-color: #B0C4DE;">

        <div class="card-body">

          <div class="row g-4">
            <div class="col-sm-3">
              <b>Dari</b>
              <input type="date" class="form-control" id="dari">
            </div>
            <div class="col-sm-3">
              <b>Sampai</b>
              <input type="date" class="form-control" id="sampai">
            </div>
            <div class="col-md-3">
              <div class="col-auto my-4  ">
                <button type="button" onclick="caridata()" class="btn " style="background-color: #20B2AA; color:white;"><i class="fas fa-search"></i> Cari</button>
              </div>
            </div>
          </div>
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
              @foreach($data_Tabel as $data)
              <tr>
                <td>{{$data->nama_toko}}</td>
                <td>Rp. {{ number_format($data->detailOmset)}}</td>
                <td>Rp. {{ number_format($data->detailKeluar)}}</td>
                <td>Rp. {{ number_format($data->detailOmset-$data->detailKeluar)}}</td>
              </tr>
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

          <div class="row g-4">
            <div class="col-sm-3">
              <b>Dari</b>
              <input type="date" class="form-control" id="dari">
            </div>
            <div class="col-sm-3">
              <b>Sampai</b>
              <input type="date" class="form-control" id="sampai">
            </div>
            <div class="col-md-3">
              <div class="col-auto my-4  ">
                <button type="button" onclick="caridata()" class="btn " style="background-color: #20B2AA; color:white;"><i class="fas fa-search"></i> Cari</button>
              </div>
            </div>
          </div>
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
              @foreach($data_Tabel as $data)
              <tr>
                <td>{{$data->nama_toko}}</td>
                <td>Rp. {{ number_format($data->detailOmset)}}</td>
                <td>Rp. {{ number_format($data->detailKeluar)}}</td>
                <td>Rp. {{ number_format($data->detailOmset-$data->detailKeluar)}}</td>
              </tr>
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

  </div>
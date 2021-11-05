<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <h2 class="text-center mt-2">Laporan Biaya Pengeluaran</h2>
    <hr style="border:1px solid black;">
    <br>
    <div class="container">
        <table>
            <tr>
                <td>Tanggal Cetak</td>
                <td>
                    {{ date('d F Y') }}
                </td>
            </tr>
        </table>
    </div>
    <br>

    <div class="container">

        <table class="table table-bordered mb-4 table-striped">
            <tr>
                <th>No</th>
                <th>Nama Toko</th>
                <th>Tanggal Catat</th>
                <th>Keterangan</th>
                <th>Biaya Keluar</th>
            </tr>

            @foreach($laporan as $no => $data)
            <tr>
                <td>{{$no+1}}</td>
                <td>{{$data->nama_toko}}</td>
                <td>{{ date("d F y"), strtotime( $data->tgl_trans)}}</td>
                <td>{{$data->catatan_trans}}</td>
                <td>Rp.
                    <script>
                        var bilangan = " {{$data->biaya_trans}}";

                        var number_string = bilangan.toString(),
                            split = number_string.split(','),
                            sisa = split[0].length % 3,
                            rupiah = split[0].substr(0, sisa),
                            ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);

                        if (ribuan) {
                            separator = sisa ? '.' : '';
                            rupiah += separator + ribuan.join('.');
                        }
                        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;

                        // Cetak hasil	
                        document.write(rupiah); {
                            {
                                $data_total
                            }
                        }

                        var input = document.getElementById("terbilang-input").value.replace(/\./g, "");

                        //menampilkan hasil dari terbilang
                        document.getElementById("terbilang-output").value = terbilang(input).replace(/  +/g, ' ');
                    </script>
                   
                </td>
            </tr>

            @endforeach

            <tr>
                <td colspan="4" align="center"><b>TOTAL</b></td>

                <th colspan="" id="terbilang-input">Rp.
                    <script>
                        var bilangan = "{{$data_total}}";

                        var number_string = bilangan.toString(),
                            split = number_string.split(','),
                            sisa = split[0].length % 3,
                            rupiah = split[0].substr(0, sisa),
                            ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);

                        if (ribuan) {
                            separator = sisa ? '.' : '';
                            rupiah += separator + ribuan.join('.');
                        }
                        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;

                        // Cetak hasil	
                        document.write(rupiah); {
                            {
                                $data_total
                            }
                        }

                        var input = document.getElementById("terbilang-input").value.replace(/\./g, "");

                        //menampilkan hasil dari terbilang
                        document.getElementById("terbilang-output").value = terbilang(input).replace(/  +/g, ' ');
                    </script>
                </th>


            </tr>
        </table>

        <br>
        <br>

        <div class="float-end text-center" style="padding: 1cm;padding-top:0%">
            <!-- <h6 class="text-center" style="margin-bottom: 2cm;">{{ date('d F Y') }}</h6> -->
            <span>Kepala Toko / Outlet</span><br><br><br><br>
            <span>( ..................................... )</span><br>

        </div>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>
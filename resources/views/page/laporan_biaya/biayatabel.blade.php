@foreach($data_tes as $no => $data)
<tr>
    <td>{{$no+1}}</td>
    <td>{{$data->nama_toko}}</td>
    <td>{{ date("d F Y", strtotime($data->tgl_trans)) }}</td>
    <td>{{$data->catatan_trans}}</td>
    <td> Rp. 
    {{number_format($data->biaya_trans)}}
    </td>
</tr>



@endforeach

<tr>
    <th colspan="4">TOTAL</th>
    <th>Rp. 
    {{ number_format($data_total)}}
    </th>
</tr>
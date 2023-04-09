<table>
    <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Pemesanan</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Judul Film</th>
          <th scope="col">Harga Tiket</th>
          <th scope="col">Jumlah Penonton</th>
          <th scope="col">Subtotal</th>
          <th scope="col">Diskon</th>
          <th scope="col">Total</th>
        </tr>
    </thead>
    @php
        $no = 1;
    @endphp
    <tbody>
      @foreach ($tikets as $tiket)
        <tr>
            <td>{{$no }}</td>
            <td>{{$tiket -> nama }}</td>
            <td>{{$tiket -> tanggal }}</td>
            <td>{{$tiket -> judul_film }}</td>
            <td>{{$tiket -> harga_tiket }}</td>
            <td>{{$tiket -> jumlah_nonton }}</td>
            <td>{{$tiket -> subtotal }}</td>
            <td>{{$tiket -> diskon}}</td>
            <td>{{$tiket -> total }}</td>
            <td>
          
        </tr>
        @php
            $no++;
            @endphp
      @endforeach
        
    </tbody>
</table>
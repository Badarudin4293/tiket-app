@extends ('layouts.app')
@section ('content')
<h5>
    Daftar Pemesanan Tiket
</h5>
    
<div class="m-5">
    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pemesanan</th>
                <th>Tanggal</th>
                <th>Judul Film</th>
                <th>Harga Tiket</th>
                <th>Jumlah Penonton</th>
                <th>Subtotal</th>
                <th>Diskon</th>
                <th>Total</th>
                <th colspan="2">aksi</th>

                  <span class="m">
                    <div class="btn btn-danger">
                        <a class="badge" href={{route('exportPdf')}} style ="text-decoration:none">PDF</a>
                    
                      </div>
                </span>
                <span class="m">
                    <div class="btn btn-success">
                        <a class="badge" href={{route('downloadExcel')}} style ="text-decoration:none">ECXEL</a>
                    
                      </div>
                </span>
                <span class="m">
                    <button type="button" class="btn btn-primary dropdown" aria-expanded="false">
                        <a href="/Tiket/create"style ="text-decoration: none; color:black">Tambah Pemesanan</a>
                      </button>
                </span>
        <span class="m">
        <button type="button" class="btn btn-warning dropdown" aria-expanded="false">
            <a href="/home"style ="text-decoration: none; color:black">Kembali</a>
          </button>
          </span>


            </thead>
        </tr>
            
        </tr>
    </thead>
</tr>
</thead>
<tbody>
@php
    $no = 1;
@endphp
    
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
                    
                    <span class="badge badge">
                        <button type="button" class="btn btn-primary dropdown" aria-expanded="false">
                        <a href="/edit/{{$tiket->id}}" style ="text-decoration: none; color:black">UBAH</a>
                        </button>
                    </span>
        
                    <td>
                        <div class="btn btn-danger">
                        <a href="{{route('tiket.delete',$tiket->id)}}" style ="text-decoration: none; color:black">HAPUS</a>
                        </div>
                    </td>
                        </div>
                       
                </td>
            </tr>
            @php
            $no++;
            @endphp
        @endforeach
       
</tbody>
</table>
</div>
@endsection
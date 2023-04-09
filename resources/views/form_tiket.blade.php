@extends('layouts.app')

@section('content')
<form method="post" action=<?php @$edit? printf('/update_tiket'.'/'.$edit->id) :printf('/Tiket/create')?> >
    @csrf
       <input type="text" placeholder="Nama Pemesanan" name="nama"/>
       <input type="date" placeholder="Tanggal" name="tanggal"/>
       <input type="text" placeholder="Judul Film" name="judul_film"/>
       <input type="text" placeholder="Harga Tiket" name="harga_tiket"/>
       <input type="text" placeholder="Jumlah Penonton" name="jumlah_nonton"/>
       <span class=" ">
        <button type="submit" class="btn btn-primary dropdown">Simpan</button>
    </span>
   </form>
   
@endsection
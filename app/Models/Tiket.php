<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $table = 'tikets';
    protected $fillable = ['nama','tanggal','judul_film','harga_tiket','jumlah_nonton','subtotal','diskon','total'];
}

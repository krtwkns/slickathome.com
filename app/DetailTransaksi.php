<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
   protected $table = 'detail_transaksi';    
   protected $fillable = [
   		'barang',
		'detail_transaksi', 
		'stok_barang',
		'transaksi',
		'users',
   ];
}
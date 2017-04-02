<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
   protected $table = 'detail_transaksi';    
   protected $primaryKey = 'id';   
   protected $fillable = [
   		'sub_jumlah_barang',
		'sub_jumlah_harga',   		
		'transaksi_id', 
		'kode_barang',
		'created_at',
		'updated_at',
   ];
}
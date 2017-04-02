<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
   protected $table = 'detail_transaksi';    
   protected $primaryKey = 'id';   
   protected $fillable = [
   		'transaksi_id', 
		'barang_id',
   		'sub_jumlah_barang',
		'sub_jumlah_harga',   		
		'created_at',
		'updated_at',
   ];

   public function barang()
    {
        return $this->belongsTo('App\Barang');
    }
}
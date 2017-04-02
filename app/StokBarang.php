<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StokBarang extends Model
{
   protected $table = 'stok_barang';    
   protected $primaryKey = 'id';   
   protected $fillable = [
   		'satuan_stok',
		'jumlah_stok', 
		'barang_id',
   ];

    public function barang()
    {
        return $this->belongsTo('App\Barang')->withTrashed();
    }
}
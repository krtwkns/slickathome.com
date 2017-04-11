<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HargaBarang extends Model
{
   protected $table = 'harga_barang';    
   protected $primaryKey = 'id';    
   protected $fillable = [
		'harga_modal', 
		'harga_jual',
		'barang_kode_barang',		
   ];
}
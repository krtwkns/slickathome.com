<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
   protected $table = 'transaksi';    
   protected $primaryKey = 'id';   
   protected $fillable = [
   		'laba',
		'diskon', 
		'total_harga',
		'created_by',
		'created_at',
   ];
}
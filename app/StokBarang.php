<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StokBarang extends Model
{
  use SoftDeletes;
   protected $table = 'stok_barang';    
   protected $primaryKey = 'id';   
  public $timestamps = true;  
   protected $fillable = [
 		'satuan_stok',
		'jumlah_stok', 
		'barang_id',
   ];
    protected $dates = ['deleted_at'];    

    public function barang()
    {
      return $this->belongsTo('App\Barang')->withTrashed();
    }
}
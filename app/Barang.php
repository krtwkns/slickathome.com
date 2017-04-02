<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
	use SoftDeletes;
   	protected $table = 'barang';    
   	protected $primaryKey = 'id';   
	public $timestamps = true;
   	protected $fillable = [
   		'kode_barang',
		'nama_barang', 
		'kategori',
		'ukuran',
		'harga_modal',
		'harga_jual',
   	];
    protected $guarded = [];	   	
    protected $dates = ['deleted_at'];   	
}
<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Barang;
use App\StokBarang;
use Intervention\Image\ImageManagerStatic as Image;
use Session;
use Input;
use DB;
use Validator;
use Response;


class BarangController extends Controller
{

    public function index()
    {
        $data = [
            'page' => 'barang',
            'barang' => Barang::all()
        ];
        return view('admin.barang.index',$data);
    }

    public function tambah()
    {
        $data = [
            'page' => 'barang',
            'barang' => Barang::all()
        ];
    	return view('admin.barang.tambah',$data);
    }

    public function postTambah(Request $request)
    {                
        Barang::create($request->input());
        $in = $request->input();
        $in['barang_id'] = Barang::where('kode_barang', $request->input('kode_barang'))->first()->id;
        $in['jumlah_stok'] = 0;
        $in['satuan_stok'] = 'pcs';
        StokBarang::create($in);
        Session::put('alert-success', 'Barang "'.$request->input('nama_barang').'" berhasil ditambahkan');
        return Redirect::to('barang');
    }

    public function hapus($id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        $stokBarng = StokBarang::where('barang_id', $id)->first();
        $stokBarng->delete();
    	Session::put('alert-success', 'Barang '.$barang->nama_barang.' berhasil dihapus');
      	return Redirect::back();	  
    }

   public function edit($kode_barang)
    {
        $data = [
            'page' => 'barang',
            'barang' => Barang::where('kode_barang',$kode_barang)->first()
        ];
        return view('admin.barang.edit',$data);
    }

    public function postEdit(Request $request)
    {
        $barang = Barang::find($request->input('id'));
        $barang->kode_barang = $request->input('kode_barang');
        $barang->nama_barang = $request->input('nama_barang');
        $barang->kategori    = $request->input('kategori');
        $barang->ukuran      = $request->input('ukuran');
        $barang->harga_modal = $request->input('harga_modal');
        $barang->harga_jual  = $request->input('harga_jual');
        $barang->save();

        Session::put('alert-success', 'Barang "'.$request->input('nama_barang').'" berhasil diedit');
        return Redirect::to('barang');

    }

}
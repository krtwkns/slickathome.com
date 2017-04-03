<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Barang;
use App\HargaBarang;
use App\Transaksi;
use App\DetailTransaksi;
use App\StokBarang;
use Session;
use Input;
use DB;
use Validator;
use Response;


class KasirController extends Controller
{
 
    public function index($id)
    {   
        $detailTransaksi = DetailTransaksi::where('transaksi_id', $id)->get();
        $totalHarga = 0;
        $subtotal = $detailTransaksi->pluck('sub_jumlah_harga')->toArray();

        for ($i=0; $i < $detailTransaksi->count(); $i++) 
        { 
            $totalHarga = $totalHarga + $subtotal[$i];
        }


        $transaction = Transaksi::where('id', $id)->first();
        $data = [
            'page' => 'kasir',
            'transaction' => $transaction,
            'details' => $detailTransaksi,
            'totalHarga' => $totalHarga,
        ];
        return view('admin.kasir.index',$data);
    }

    public function autocomplete(Request $request)
    {   
        $term = $request->term;
        $results = array();
        $data = Barang::where('nama_barang','LIKE','%'.$term.'%')->take(10)->get();

        foreach ($data as $key => $v) {
          $results[]=[  'value'=>$v->kode_barang." -".$v->nama_barang,
                        'kode_barang'=>$v->kode_barang,
                        'nama_barang'=>$v->nama_barang,
                        'harga'=>$v->harga_jual,
                    ];
        }
        return response()->json($results);        
    }


    public function addItem($id, Request $request)
    {
        $this->validate($request,[
            'sub_jumlah_barang' => 'required|integer|min:1'
            ]);
        $in = $request->input();
        $in['transaksi_id'] = $id;
        $barang = Barang::where('kode_barang',$in['kode_barang'])->first();
        $in['barang_id'] = $barang->id;
        StokBarang::where('barang_id',$barang->id)->decrement('jumlah_stok',$in['sub_jumlah_barang']);
        $result = DetailTransaksi::create($in);
        $result->save();
        return Redirect::to('kasir/'.$id);       
    }

    public function deleteItem($id)
    {
        $item = DetailTransaksi::find($id);
        StokBarang::where('barang_id',$item->barang->id)->increment('jumlah_stok',$item->sub_jumlah_barang);
        $item->delete();
        return Redirect::back();       
    }

    public function submitTransaksi(Request $request)
    {
        $input = $request->input();
        $transaksi = Transaksi::find($input['transaksi_id']);
        $details = DetailTransaksi::where('transaksi_id',$input['transaksi_id'])->get();
        $laba = 0;
        foreach ($details as $detail) {
            $laba = $laba + $detail->sub_jumlah_barang*($detail->barang->harga_jual - $detail->barang->harga_modal);
        }
        $transaksi->diskon = $input['diskon'];
        $transaksi->laba = $laba - $input['diskon'];
        $transaksi->total_harga = $input['total'];
        $transaksi->save();
        return Redirect::to('transaksi');
    }

}

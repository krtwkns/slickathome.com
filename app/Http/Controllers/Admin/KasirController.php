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
        $transaction = Transaksi::where('id', $id)->get();
        $data = [
            'page' => 'kasir',
            'transaction' => $transaction,
            'item' => $detailTransaksi,
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
        $in = $request->input() ;
        $in['transaksi_id'] = $id;
        $in['barang_id'] = 4 ;
        $result = DetailTransaksi::create($in);
        $result->save();

        return Redirect::to('/kasir/'.$id);       
    }

}

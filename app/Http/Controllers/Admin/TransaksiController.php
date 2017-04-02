<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Transaksi;
use App\DetailTransaksi;
use Intervention\Image\ImageManagerStatic as Image;
use Session;
use Input;
use DB;
use Validator;
use Response;
use Auth;


class TransaksiController extends Controller
{

    public function index()
    {
        
        $data = [
            'page' => 'transaksi',
            'transaksi' => Transaksi::all()
        ];
        return view('admin.transaksi.index',$data);
    }

    public function addTransaksi(Request $request)
    {        
    	$transaksi = Transaksi::create([
    			'created_by' =>  Auth::User()->name,
                'diskon' => 0,
                'total_harga' => 0,
                'laba' => 0,
    	]);
        
        return Redirect::to('/kasir/'.$transaksi->id.'');
    }

    public function delete($id)
    {
        $result = Transaksi::find($id)->delete();
        return Redirect::to('/');
    }

    public function viewTransaksi($id)
    {
        $transaksi = Transaksi::where('id', $id)->first();
        $item = DetailTransaksi::where('transaksi_id', $id)->get();
        
        $data = [
            'page' => 'view-transaksi',
            'item' => $item,
            'transaksi' => $transaksi,
        ];
        return view('admin.transaksi.view', $data);
    }

    

}
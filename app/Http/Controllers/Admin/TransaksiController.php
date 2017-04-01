<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Transaksi;
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
    			'created_by' =>  Auth::User()->id,
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

    

}
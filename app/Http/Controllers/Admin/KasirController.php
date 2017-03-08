<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Barang;
use App\HargaBarang;
use Session;
use Input;
use DB;
use Validator;
use Response;


class KasirController extends Controller
{

    public function index()
    {
        $data = [
            'page' => 'kasir',
            'barang' => Barang::all(),
            'harga_barang' => HargaBarang::all()
        ];
        return view('admin.kasir.index',$data);
    }

    public function autocomplete(Request $request)
    {
        
    }

    public function insert ()
    {

    }

}

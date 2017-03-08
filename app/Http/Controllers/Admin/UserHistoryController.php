<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\UserHistory;
use App\User;
use Session;
use Input;
use DB;
use Validator;
use Response;

class UserHistoryController extends Controller
{

    public function index()
    {           
        $data = [
            'page' => 'user-history',
            'users_history' => UserHistory::all()
        ];
        // return view('admin.barang.index',$data);
        dd($data);
    }

    public function postHistory(Request $request)
    {
       Barang::create($request->input());
        // Session::put('alert-success', 'Barang "'.$request->input('nama_barang').'" berhasil ditambahkan');
        return Redirect::to('/');
    }


}
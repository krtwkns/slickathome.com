<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\UserHistory;
use App\Users;
use Session;
use Input;
use DB;
use Validator;
use Response;
use Carbon\Carbon;

class UserHistoryController extends Controller
{

    public function index()
    {                   
        $data = [
            'page' => 'user-history',
            'users_history' => UserHistory::orderBy('timestamp_history', 'DESC')->get(),
            'users' => Users::all()
        ];
        return view('admin.user-history.index',$data);
        // dd($data['users_history']->username['name']);
        // dd($data['users']);
    }


}
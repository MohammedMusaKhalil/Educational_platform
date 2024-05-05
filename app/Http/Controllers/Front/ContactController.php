<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index(){
        $data['settings']=DB::table('settings')->first();
        return view('Front\contact\index',$data);
    }
}

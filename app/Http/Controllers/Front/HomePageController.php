<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
    public function index()
    {   $data['banner']=DB::table('site_contents')->select('content')->where('name','banner')->first();
        $data['courses']=DB::table('courses')->get();
        $data['trainer']=DB::table('trainers')->select('name');
        $num['trainers']=DB::table('trainers')->count();
        $num['students']=DB::table('students')->count();
        $num['course']=DB::table('courses')->count();
          return view('Front.index',$data,$num);
    }
}

<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\cat;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Catch_;
use Illuminate\Support\Facades\DB;


class CourseController extends Controller
{
    public function cat($id){
       $data['cat']= DB::table('cats')->findOr($id);
       $data['cats']= DB::table('cats')->get();
       $data['trainer']=DB::table('trainers')->get();
       $data['courses']=DB::table('courses')->where('cat_id',$id)->get();
        return view('Front\courses\cat',$data);
    }
    public function show($id,$c_id){
        $data['courses']=DB::table('courses')->findOr($c_id);
        return view('Front\courses\show',$data);
    }
}

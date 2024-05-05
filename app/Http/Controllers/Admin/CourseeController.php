<?php

namespace App\Http\Controllers\Admin;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Trainer;


class CourseeController extends Controller
{
    public function index()
    {
        $data['courses']=DB::table('courses')->select('id','name','price','img')->orderBy('id','DESC')->get();
        return view('Admin.courses.index',$data);
    }
    public function create(){
        $data['cats']=DB::table('cats')->select('id','name')->get();
        $data['trainers']=DB::table('trainers')->select('id','name')->get();
        return view('Admin.courses.create',$data);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'small_desc' => 'required|string|max:191',
            'desc' => 'nullable|string',
            'price' => 'required|integer',
            'cat_id' => 'required|exists:cats,id',
            'trainer_id' => 'required|exists:trainers,id',
            'img' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('img')) {
            $new_name = $request->file('img')->getClientOriginalName();
            Image::make($request->file('img'))->resize(360, 313)->save(public_path('uploads/courses/' . $new_name));
            $data['img'] = $new_name;
        }
        DB::table('courses')->insert($data);
       // Course::create($data);

        return redirect(route('Admin.courses.index'))->with('success', 'تم إنشاء الكورس بنجاح.');
    }

    public function edit($id){
        $data['cats']=DB::table('cats')->select('id','name')->get();
        $data['trainers']=DB::table('trainers')->select('id','name')->get();
        $data['courses']=Course::findOrFail($id);
        return view('Admin.courses.edit', $data);
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'small_desc' => 'required|string|max:191',
            'desc' => 'nullable|string',
            'price' => 'required|integer',
            'cat_id' => 'required|exists:cats,id',
            'trainer_id' => 'required|exists:trainers,id',
            'img' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $courses = Course::find($request->id);

        if (!$courses) {
            return back()->with('error', 'المدرب غير موجود.');
        }

        $courses->name = $request->name;
        $courses->small_desc = $request->small_desc;
        $courses->desc = $request->desc;
        $courses->price = $request->price;
        $courses->cat_id = $request->cat_id;
        $courses->trainer_id = $request->trainer_id;


        if ($request->hasFile('img')) {
            $new_name = $request->file('img')->hashName();
            Image::make($request->file('img'))->resize(360, 313)->save(public_path('uploads/courses/' . $new_name));
            $courses->img = $new_name;
        }

        $courses->save();

        return redirect(route('Admin.courses.index'))->with('success', 'تم تحديث بيانات المدرب بنجاح.');
    }
    public function delete($id){
        DB::table('courses')->where('id', $id)->delete();
        return redirect(route('Admin.courses.index'))->with('success', 'تم حذف بنجاح.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Trainer;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;




class TrainerController extends Controller
{
    public function index()
    {
        $data['trainer']=DB::table('trainers')->select('id','name','phone','spec','img')->orderBy('id','DESC')->get();
        return view('Admin.trainers.index',$data);
    }
    public function create(){
        return view('Admin.trainers.create');
    }
    public function store(Request $request)
    {
        // التحقق من صحة البيانات المدخلة من النموذج
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'spec' => 'required|string|max:50',
            'phone' => 'nullable|string|max:50',
            'img' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('img')) {
            // هنا يمكنك استخدام الصورة بأمان
            $new_name = $request->file('img')->hashName();

            $data['img'] = $new_name; // تعيين اسم الصورة في البيانات

            // حفظ الصورة باستخدام Intervention Image
            Image::make($request->file('img'))->resize(50, 50)->save(public_path('uploads/trianers/' . $new_name));
        }
        Trainer::create($data);

        return redirect(route('Admin.trainers.index'))->with('success', 'تم إنشاء المدرب بنجاح.');
    }

    public function edit($id){
        $data['trainer']=DB::table('trainers')->findOr($id);
        return view('Admin.trainers.edit', $data);
    }
    public function update(Request $request)
    {
        // التحقق من صحة البيانات المدخلة من النموذج
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'spec' => 'required|string|max:50',
            'phone' => 'nullable|string|max:50',
            'img' => 'nullable|image|mimes:jpg,jpeg,png', // اختياري: تحقق من الصورة إذا تم تحميلها
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // العثور على المدرب الذي تحتاج إلى تحديث بناءً على الـ id الممرر في الطلب
        $trainer = Trainer::find($request->id);

        if (!$trainer) {
            return back()->with('error', 'المدرب غير موجود.');
        }

        // تحديث البيانات
        $trainer->name = $request->name;
        $trainer->spec = $request->spec;
        $trainer->phone = $request->phone;

        // التحقق من وجود صورة مرفقة وحفظها باستخدام Intervention Image
        if ($request->hasFile('img')) {
            $new_name = $request->file('img')->hashName();
                Image::make($request->file('img'))->resize(50, 50)->save(public_path('uploads/trianers/' . $new_name));
            $trainer->img = $new_name;
        }

        $trainer->save();

        return redirect(route('Admin.trainers.index'))->with('success', 'تم تحديث بيانات المدرب بنجاح.');
    }
    public function delete($id){
        DB::table('trainers')->where('id', $id)->delete();
        return redirect(route('Admin.trainers.index'))->with('success', 'تم حذف بنجاح.');
    }
}

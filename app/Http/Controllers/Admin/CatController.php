<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\cat;


class CatController extends Controller
{
    public function index()
    {
        $data['cats']=DB::table('cats')->select('id','name')->orderBy('id','DESC')->get();
        return view('Admin.cats.index',$data);
    }
    public function create(){
        return view('Admin.cats.create');
    }
    public function store(Request $request)
    {
        // التحقق من صحة البيانات المدخلة من النموذج
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // إنشاء سجل جديد  في قاعدة البيانات
        $cat = new Cat();
        $cat->name = $data['name'];
        $cat->save();

        // إعادة توجيه المستخدم بعد إضافة السجل بنجاح
        return redirect(route('Admin.cat.index'))->with('success', 'تمت إضافة القطة بنجاح.');
    }
    public function edit($id){
        $data['cat']=DB::table('cats')->findOr($id);
        return view('Admin.cats.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:20'
        ]);

        // تحديث البيانات في قاعدة البيانات بناءً على الـ id المعطى
        DB::table('cats')->where('id', $id)->update($data);

        return redirect(route('Admin.cat.index'))->with('success', 'تم تحديث القطة بنجاح.');
    }
    public function delete($id){
        DB::table('cats')->where('id', $id)->delete();
        return redirect(route('Admin.cat.index'))->with('success', 'تم حذف القطة بنجاح.');
    }

}

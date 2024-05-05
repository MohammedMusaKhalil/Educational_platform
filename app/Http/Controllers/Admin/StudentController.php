<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('Admin.students.index', compact('students'));
    }

    public function create()
    {
        return view('Admin.students.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'spec' => 'nullable|string|max:255',
        ]);

        Student::create($data);

        return redirect()->route('Admin.students.index')->with('success', 'تم إنشاء الطالب بنجاح.');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('Admin.students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,
            'spec' => 'nullable|string|max:255',
        ]);

        $student->update($data);

        return redirect()->route('Admin.students.index')->with('success', 'تم تحديث بيانات الطالب بنجاح.');
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('Admin.students.index')->with('success', 'تم حذف الطالب بنجاح.');
    }
    public function showCourses($id){
        $data['students'] = DB::table('students')->where('id', $id)->first();
        $courses=DB::table('course_student')->where('student_id',$data['students']->id)->get();
        $data['courses'] = $courses;
        $data['student_id'] = $id;
        return view('Admin.students.showCourses',$data);
    }
    public function rejectCourses($id,$c_id){
        DB::table('course_student')->where('student_id',$id)->where('course_id',$c_id)->update([
            'status'=>'reject',
        ]);
        return back();
    }
    public function approveCourses($id,$c_id){
        DB::table('course_student')->where('student_id',$id)->where('course_id',$c_id)->update([
            'status'=>'approve',
        ]);
        return back();
    }
    public function addCourse($id){
        $data['student_id']=$id;
        $data['courses']=DB::table('courses')->select('id','name',)->get();
        return view('Admin.students.addCourse',$data);
    }
    public function storeCourse($id,Request $request){
        $data=$request->validate([
            'course_id'=>'required|exists:courses,id'
            ]);
        DB::table('course_student')->insert([
            'student_id'=>$id,
            'course_id'=>$data['course_id']
        ]);
        return redirect(route('Admin.students.showCourses',$id));
    }
    public function deleteCourse($id, $c_id)
    {
        DB::table('course_student')->where('student_id', $id)->where('course_id', $c_id)->delete();
        return back();
    }
}

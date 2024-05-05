<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CatController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\TrainerController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Admin\CourseeController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Front\CourseController;
use App\Http\Controllers\Front\MessageController;
use App\Http\Controllers\Front\HomePageController;
use Illuminate\Support\Facades\Route;
Use App\Http\Middleware\AdminAuth;

//Route::get('/','Front\HomePageController');
Route::get('languageConverter/{locale}', function($locale){
    if(in_array($locale, ['ar','en'])){
        session()->put('locale',$locale);
    }
    return redirect()->back();
})->name('languageConverter');


        Route::get('/',[HomePageController::class,'index'])->name('Front.HomePage');



        Route::get('/cat/{id}', [CourseController::class,'cat'])->name('Front.cat');


        Route::get('/cat/{id}/course/{c_id}', [CourseController::class,'show'])->name('Front.show');


        Route::get('/contact',[ContactController::class,'index'])->name('Front.contact');


        Route::post('/message/newsletter',[MessageController::class,'newsletter'])->name('Front.message.newsletter');


        Route::post('/message/contact',[MessageController::class,'contact'])->name('Front.message.contact');


        Route::post('/message/enroll',[MessageController::class,'enroll'])->name('Front.message.enroll');


        Route::namespace('Admin')->prefix('dashboard')->group(function (){
            Route::get('/login',[AuthController::class,'login'])->name('Admin.login');
            Route::post('/do-login',[AuthController::class,'do_login'])->name('Admin.do-login');

            Route::middleware('Admin:Admin')->group(function (){
                Route::get('/logout',[AuthController::class,'logout'])->name('Admin.logout');
                Route::get('/',[HomeController::class,'index'])->name('Admin.home');
                Route::get('/cats',[CatController::class,'index'])->name('Admin.cat.index');
                Route::get('/cats/create',[CatController::class,'create'])->name('Admin.cats.create');
                Route::post('/cats/store',[CatController::class,'store'])->name('Admin.cat.store');
                Route::get('/cats/edit/{id}',[CatController::class,'edit'])->name('Admin.cat.edit');
                Route::put('/cats/update/{id}', [CatController::class, 'update'])->name('Admin.cats.update');
                Route::get('/cats/delete/{id}',[CatController::class,'delete'])->name('Admin.cat.delete');

                Route::get('/trainers',[TrainerController::class,'index'])->name('Admin.trainers.index');
                Route::get('/trainers/create',[TrainerController::class,'create'])->name('Admin.trainers.create');
                Route::post('/trainers/store',[TrainerController::class,'store'])->name('Admin.trainers.store');
                Route::get('/trainers/edit/{id}',[TrainerController::class,'edit'])->name('Admin.trainers.edit');
                Route::put('/trainers/update/{id}', [TrainerController::class, 'update'])->name('Admin.trainers.update');
                Route::get('/trainers/delete/{id}',[TrainerController::class,'delete'])->name('Admin.trainers.delete');

                Route::get('/courses',[CourseeController::class,'index'])->name('Admin.courses.index');
                Route::get('/courses/create',[CourseeController::class,'create'])->name('Admin.courses.create');
                Route::post('/courses/store',[CourseeController::class,'store'])->name('Admin.courses.store');
                Route::get('/courses/edit/{id}',[CourseeController::class,'edit'])->name('Admin.courses.edit');
                Route::put('/courses/update/{id}', [CourseeController::class, 'update'])->name('Admin.courses.update');
                Route::get('/courses/delete/{id}',[CourseeController::class,'delete'])->name('Admin.courses.delete');

                Route::get('/students',[StudentController::class,'index'])->name('Admin.students.index');
                Route::get('/students/create',[StudentController::class,'create'])->name('Admin.students.create');
                Route::post('/students/store',[StudentController::class,'store'])->name('Admin.students.store');
                Route::get('/students/edit/{id}',[StudentController::class,'edit'])->name('Admin.students.edit');
                Route::put('/students/update/{id}', [StudentController::class, 'update'])->name('Admin.students.update');
                Route::get('/students/delete/{id}',[StudentController::class,'delete'])->name('Admin.students.delete');
                Route::get('/students/showCourses/{id}',[StudentController::class,'showCourses'])->name('Admin.students.showCourses');
                Route::get('/students/{id}/courses/{c_id}/approve',[StudentController::class,'approveCourses'])->name('Admin.students.approve');
                Route::get('/students/{id}/courses/{c_id}/reject',[StudentController::class,'rejectCourses'])->name('Admin.students.reject');
                Route::get('/students/{id}/add-to-course',[StudentController::class,'addCourse'])->name('Admin.students.addCourse');
                Route::post('/students/{id}/add-to-course',[StudentController::class,'storeCourse'])->name('Admin.students.storeCourse');
                Route::get('/students/{id}/courses/{c_id}/delete', [StudentController::class, 'deleteCourse'])->name('Admin.students.deleteCourse');
            });



        });

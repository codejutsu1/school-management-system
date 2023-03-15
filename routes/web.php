<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Parent\ParentController;
use App\Http\Controllers\Teacher\ClassController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Student\StudentsController;
use App\Http\Controllers\SuperAdmin\RolesController;
use App\Http\Controllers\Teacher\TeachersController;
use App\Http\Controllers\SuperAdmin\CreateController;
use App\Http\Controllers\SuperAdmin\ResultController;
use App\Http\Controllers\SuperAdmin\SettingController;
use App\Http\Controllers\Principal\PrincipalController;
use App\Http\Controllers\SuperAdmin\DepartmentController;
use App\Http\Controllers\SuperAdmin\PermissionsController;
use App\Http\Controllers\Student\ResultController as StudentResult;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    if(auth()->user()->name == 'Principal'){
        auth()->user()->assignRole('super admin');
    }else if(auth()->user()->name == 'Vice Principal')
    {
        auth()->user()->assignRole('vice principal');
    }else if(auth()->user()->name == 'Teacher')
    {
        auth()->user()->assignRole('teacher');
    }else if(auth()->user()->name == 'Student')
    {
        auth()->user()->assignRole('student');
    }else if(auth()->user()->name == 'Parent')
    {
        auth()->user()->assignRole('parent');
    }


    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => ['auth', 'role:super admin'], 'prefix' => 'dashboard'], function() {
    Route::resource('students', StudentController::class)->except('show');
    Route::get('/students/{student:slug}', [StudentController::class, 'show'])->name('students.show');
    Route::resource('teachers', TeacherController::class);
    Route::resource('principals', PrincipalController::class);
    Route::get('create-departments', [DepartmentController::class, 'createDepartments'])->name('create.departments');
    Route::get('create-extra-curriculum-activity', [CreateController::class, 'extraCurriculum'])->name('extra.curriculum');
    Route::get('create-house', [CreateController::class, 'createHouse'])->name('create.house');

    Route::get('roles', [RolesController::class, 'index'])->name('roles');
    Route::get('permissions', [PermissionsController::class, 'index'])->name('permissions');


    Route::controller(ResultController::class)->group(function() {
        Route::get('result/individually', 'resultIndividually')->name('result.individually');
        Route::get('result/by-subject', 'resultBySubject')->name('result.by.subject');
    });

    Route::get('settings', [SettingController::class, 'settings'])->name('super.admin.settings');
});

Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'], function(){
    Route::group(['middleware' => 'role:teacher'], function() {
        Route::controller(TeachersController::class)->group(function() {
            Route::get('teacher/teacher-information',  'viewTeacherInfo')->name('view.teacher.info')->middleware('teacher');
            Route::get('teacher/list-teachers',  'listTeachers')->name('list.teachers');
            Route::get('teacher/{teacher:slug}', 'showListTeachers')->name('show.list.teacher');
            Route::get('teachers/students/show', 'showStudents')->name('show.students');
            Route::get('house-members', 'listHouse')->name('list.house')->middleware('role:house leader');
            Route::get('extra-curriculum-members', 'curriculumStudent')->name('curriculum.student')->middleware('role:extra curriculum');
            Route::get('show-students-result', 'showStudentsResult')->name('show.students.result')->middleware('role:form teacher');
        });
        
        Route::controller(ClassController::class)->group(function() {
            Route::get('jss1a', 'jss1a')->name('jss1a')->middleware('role:form teacher');
        });
    });

    Route::get('show-result/{id}', [TeachersController::class, 'showResult'])->name('show.result')->middleware('role:form teacher|super admin');
});


Route::group(['middleware' => ['auth', 'role:student'], 'prefix' => 'dashboard'], function() {
    Route::get('your-result', [StudentResult::class, 'showStudentResult'])->name('student.result');
    Route::get('your-profile', [StudentsController::class, 'studentProfile'])->name('student.profile');
});

Route::get('student/student-information', [StudentsController::class, 'viewStudentInfo'])->name('view.student.info')->middleware('student');
require __DIR__.'/auth.php';

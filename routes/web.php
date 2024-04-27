<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PayPalController;

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

Route::get('/', [App\Http\Controllers\FrontendController::class, 'homepage'])->name('homepage');

// payment success url
Route::get('/payment/success/{order_id}', [App\Http\Controllers\School\OrderController::class, 'payment_success'])->name('payment_success');

Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/register', function(){
    return redirect()->route('login');
});

// Admin routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::post('/set-school', [App\Http\Controllers\Admin\SchoolController::class, 'set_school']);
    Route::get('/schools', [App\Http\Controllers\Admin\SchoolController::class, 'index'])->name('schools');
    Route::get('/schools/create', [App\Http\Controllers\Admin\SchoolController::class, 'create']);
    Route::post('/schools/store', [App\Http\Controllers\Admin\SchoolController::class, 'store']);
    Route::get('/schools/edit/{id}', [App\Http\Controllers\Admin\SchoolController::class, 'edit']);
    Route::post('/schools/update', [App\Http\Controllers\Admin\SchoolController::class, 'update']);
    Route::get('/schools/delete/{id}', [App\Http\Controllers\Admin\SchoolController::class, 'delete']);

    Route::get('/school-admins', [App\Http\Controllers\Admin\SchoolAdminController::class, 'index'])->name('school_admins');
    Route::get('/school-admins/create', [App\Http\Controllers\Admin\SchoolAdminController::class, 'create']);
    Route::post('/school-admins/store', [App\Http\Controllers\Admin\SchoolAdminController::class, 'store']);
    Route::get('/school-admins/edit/{id}', [App\Http\Controllers\Admin\SchoolAdminController::class, 'edit']);
    Route::post('/school-admins/update', [App\Http\Controllers\Admin\SchoolAdminController::class, 'update']);
    Route::get('/school-admins/delete/{id}', [App\Http\Controllers\Admin\SchoolAdminController::class, 'delete']);

    Route::get('/school-groups', [App\Http\Controllers\Admin\SchoolGroupController::class, 'index'])->name('school_groups');
    Route::get('/school-groups/create', [App\Http\Controllers\Admin\SchoolGroupController::class, 'create']);
    Route::post('/school-groups/store', [App\Http\Controllers\Admin\SchoolGroupController::class, 'store']);
    Route::get('/school-groups/edit/{id}', [App\Http\Controllers\Admin\SchoolGroupController::class, 'edit']);
    Route::post('/school-groups/update', [App\Http\Controllers\Admin\SchoolGroupController::class, 'update']);
    Route::get('/school-groups/delete/{id}', [App\Http\Controllers\Admin\SchoolGroupController::class, 'delete']);

    Route::get('/teachers', [App\Http\Controllers\Admin\TeacherController::class, 'index'])->name('teachers');
    Route::get('/teachers/create', [App\Http\Controllers\Admin\TeacherController::class, 'create']);
    Route::post('/teachers/store', [App\Http\Controllers\Admin\TeacherController::class, 'store']);
    Route::get('/teachers/edit/{id}', [App\Http\Controllers\Admin\TeacherController::class, 'edit']);
    Route::post('/teachers/update', [App\Http\Controllers\Admin\TeacherController::class, 'update']);
    Route::get('/teachers/delete/{id}', [App\Http\Controllers\Admin\TeacherController::class, 'delete']);
    
    Route::get('/students', [App\Http\Controllers\Admin\StudentController::class, 'index'])->name('students');
    Route::get('/students/create', [App\Http\Controllers\Admin\StudentController::class, 'create']);
    Route::post('/students/store', [App\Http\Controllers\Admin\StudentController::class, 'store']);
    Route::get('/students/edit/{id}', [App\Http\Controllers\Admin\StudentController::class, 'edit']);
    Route::post('/students/update', [App\Http\Controllers\Admin\StudentController::class, 'update']);
    Route::get('/students/delete/{id}', [App\Http\Controllers\Admin\StudentController::class, 'delete']);

    Route::get('/lists', [App\Http\Controllers\Admin\ListController::class, 'index'])->name('lists');
    Route::get('/lists/create', [App\Http\Controllers\Admin\ListController::class, 'create']);
    Route::post('/lists/store', [App\Http\Controllers\Admin\ListController::class, 'store']);
    Route::get('/lists/edit/{id}', [App\Http\Controllers\Admin\ListController::class, 'edit']);
    Route::post('/lists/update', [App\Http\Controllers\Admin\ListController::class, 'update']);
    Route::get('/lists/delete/{id}', [App\Http\Controllers\Admin\ListController::class, 'delete']);

    Route::get('/list-items', [App\Http\Controllers\Admin\ListItemController::class, 'index'])->name('list_items');
    Route::get('/list-items/create', [App\Http\Controllers\Admin\ListItemController::class, 'create']);
    Route::post('/list-items/store', [App\Http\Controllers\Admin\ListItemController::class, 'store']);
    Route::get('/list-items/edit/{id}', [App\Http\Controllers\Admin\ListItemController::class, 'edit']);
    Route::post('/list-items/update', [App\Http\Controllers\Admin\ListItemController::class, 'update']);
    Route::get('/list-items/delete/{id}', [App\Http\Controllers\Admin\ListItemController::class, 'delete']);

    Route::get('/activities', [App\Http\Controllers\Admin\ActivityController::class, 'index'])->name('activities');
    Route::get('/activities/create', [App\Http\Controllers\Admin\ActivityController::class, 'create']);
    Route::post('/activities/store', [App\Http\Controllers\Admin\ActivityController::class, 'store']);
    Route::get('/activities/edit/{id}', [App\Http\Controllers\Admin\ActivityController::class, 'edit']);
    Route::post('/activities/update', [App\Http\Controllers\Admin\ActivityController::class, 'update']);
    Route::get('/activities/delete/{id}', [App\Http\Controllers\Admin\ActivityController::class, 'delete']);

    Route::get('/activity-instances', [App\Http\Controllers\Admin\ActivityInstanceController::class, 'index'])->name('activity_instances');
    Route::get('/activity-instances/create', [App\Http\Controllers\Admin\ActivityInstanceController::class, 'create']);
    Route::post('/activity-instances/store', [App\Http\Controllers\Admin\ActivityInstanceController::class, 'store']);
    Route::get('/activity-instances/edit/{id}', [App\Http\Controllers\Admin\ActivityInstanceController::class, 'edit']);
    Route::post('/activity-instances/update', [App\Http\Controllers\Admin\ActivityInstanceController::class, 'update']);
    Route::get('/activity-instances/delete/{id}', [App\Http\Controllers\Admin\ActivityInstanceController::class, 'delete']);

    Route::get('/levels', [App\Http\Controllers\Admin\LevelController::class, 'index'])->name('levels');
    Route::get('/levels/create', [App\Http\Controllers\Admin\LevelController::class, 'create']);
    Route::post('/levels/store', [App\Http\Controllers\Admin\LevelController::class, 'store']);
    Route::get('/levels/edit/{id}', [App\Http\Controllers\Admin\LevelController::class, 'edit']);
    Route::post('/levels/update', [App\Http\Controllers\Admin\LevelController::class, 'update']);
    Route::get('/levels/delete/{id}', [App\Http\Controllers\Admin\LevelController::class, 'delete']);

    Route::get('/orders', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('orders');
    Route::get('/orders/{id}', [App\Http\Controllers\Admin\OrderController::class, 'invoice'])->name('invoice');

    Route::get('/plan-types', [App\Http\Controllers\Admin\PlanTypeController::class, 'index'])->name('plan_types');
    Route::get('/plan-types/create', [App\Http\Controllers\Admin\PlanTypeController::class, 'create']);
    Route::post('/plan-types/store', [App\Http\Controllers\Admin\PlanTypeController::class, 'store']);
    Route::get('/plan-types/edit/{id}', [App\Http\Controllers\Admin\PlanTypeController::class, 'edit']);
    Route::post('/plan-types/update', [App\Http\Controllers\Admin\PlanTypeController::class, 'update']);
    Route::get('/plan-types/delete/{id}', [App\Http\Controllers\Admin\PlanTypeController::class, 'delete']);

    // Change Password
    Route::get('/change-password', [App\Http\Controllers\Admin\ChangePasswordController::class, 'change_password']);
    Route::post('/change-password', [App\Http\Controllers\Admin\ChangePasswordController::class, 'update_password'])->name('update_password_admin');
});


// School routes
Route::group(['prefix' => 'school', 'middleware' => ['auth', 'school']], function () {
    Route::get('/dashboard', [App\Http\Controllers\School\DashboardController::class, 'index']);

    Route::post('/set-school', [App\Http\Controllers\Admin\SchoolController::class, 'set_school']);

    Route::get('/school-groups', [App\Http\Controllers\School\SchoolGroupController::class, 'index'])->name('school_school_groups');
    Route::get('/school-groups/create', [App\Http\Controllers\School\SchoolGroupController::class, 'create']);
    Route::post('/school-groups/store', [App\Http\Controllers\School\SchoolGroupController::class, 'store']);
    Route::get('/school-groups/edit/{id}', [App\Http\Controllers\School\SchoolGroupController::class, 'edit']);
    Route::post('/school-groups/update', [App\Http\Controllers\School\SchoolGroupController::class, 'update']);
    Route::get('/school-groups/delete/{id}', [App\Http\Controllers\School\SchoolGroupController::class, 'delete']);

    Route::get('/teachers', [App\Http\Controllers\School\TeacherController::class, 'index'])->name('school_teachers');
    Route::get('/teachers/create', [App\Http\Controllers\School\TeacherController::class, 'create']);
    Route::post('/teachers/store', [App\Http\Controllers\School\TeacherController::class, 'store']);
    Route::get('/teachers/edit/{id}', [App\Http\Controllers\School\TeacherController::class, 'edit']);
    Route::post('/teachers/update', [App\Http\Controllers\School\TeacherController::class, 'update']);
    Route::get('/teachers/delete/{id}', [App\Http\Controllers\School\TeacherController::class, 'delete']);
    
    Route::get('/students', [App\Http\Controllers\School\StudentController::class, 'index'])->name('school_students');
    Route::get('/students/create', [App\Http\Controllers\School\StudentController::class, 'create']);
    Route::post('/students/store', [App\Http\Controllers\School\StudentController::class, 'store']);
    Route::get('/students/edit/{id}', [App\Http\Controllers\School\StudentController::class, 'edit']);
    Route::post('/students/update', [App\Http\Controllers\School\StudentController::class, 'update']);
    Route::get('/students/delete/{id}', [App\Http\Controllers\School\StudentController::class, 'delete']);

    Route::get('/lists', [App\Http\Controllers\School\ListController::class, 'index'])->name('school_lists');
    Route::get('/lists/create', [App\Http\Controllers\School\ListController::class, 'create']);
    Route::post('/lists/store', [App\Http\Controllers\School\ListController::class, 'store']);
    Route::get('/lists/edit/{id}', [App\Http\Controllers\School\ListController::class, 'edit']);
    Route::post('/lists/update', [App\Http\Controllers\School\ListController::class, 'update']);
    Route::get('/lists/delete/{id}', [App\Http\Controllers\School\ListController::class, 'delete']);

    Route::get('/list-items', [App\Http\Controllers\School\ListItemController::class, 'index'])->name('school_list_items');
    Route::get('/list-items/create', [App\Http\Controllers\School\ListItemController::class, 'create']);
    Route::post('/list-items/store', [App\Http\Controllers\School\ListItemController::class, 'store']);
    Route::get('/list-items/edit/{id}', [App\Http\Controllers\School\ListItemController::class, 'edit']);
    Route::post('/list-items/update', [App\Http\Controllers\School\ListItemController::class, 'update']);
    Route::get('/list-items/delete/{id}', [App\Http\Controllers\School\ListItemController::class, 'delete']);

    Route::get('/activity-instances', [App\Http\Controllers\School\ActivityInstanceController::class, 'index'])->name('school_activity_instances');
    Route::get('/activity-instances/create', [App\Http\Controllers\School\ActivityInstanceController::class, 'create']);
    Route::post('/activity-instances/store', [App\Http\Controllers\School\ActivityInstanceController::class, 'store']);
    Route::get('/activity-instances/edit/{id}', [App\Http\Controllers\School\ActivityInstanceController::class, 'edit']);
    Route::post('/activity-instances/update', [App\Http\Controllers\School\ActivityInstanceController::class, 'update']);
    Route::get('/activity-instances/delete/{id}', [App\Http\Controllers\School\ActivityInstanceController::class, 'delete']);

    Route::get('/levels', [App\Http\Controllers\School\LevelController::class, 'index'])->name('school_levels');
    Route::get('/levels/create', [App\Http\Controllers\School\LevelController::class, 'create']);
    Route::post('/levels/store', [App\Http\Controllers\School\LevelController::class, 'store']);
    Route::get('/levels/edit/{id}', [App\Http\Controllers\School\LevelController::class, 'edit']);
    Route::post('/levels/update', [App\Http\Controllers\School\LevelController::class, 'update']);
    Route::get('/levels/delete/{id}', [App\Http\Controllers\School\LevelController::class, 'delete']);

    // Change Password
    Route::get('/change-password', [App\Http\Controllers\School\ChangePasswordController::class, 'change_password']);
    Route::post('/change-password', [App\Http\Controllers\School\ChangePasswordController::class, 'update_password'])->name('update_password_student');

    // Plan Types
    Route::get('/manage-plan-type', [App\Http\Controllers\School\PlanTypeController::class, 'manage_plan_type'])->name('manage_plan_types');
    // Orders
    Route::get('/orders', [App\Http\Controllers\School\OrderController::class, 'index'])->name('school_orders');
    Route::post('/order/store', [App\Http\Controllers\School\OrderController::class, 'store']);
});


// Teacher routes
Route::group(['prefix' => 'teacher', 'middleware' => ['auth', 'teacher']], function () {
    Route::get('/dashboard', [App\Http\Controllers\Teacher\DashboardController::class, 'index']);

    Route::get('/lists', [App\Http\Controllers\Teacher\ListController::class, 'index'])->name('teacher_lists');
    Route::get('/lists/create', [App\Http\Controllers\Teacher\ListController::class, 'create']);
    Route::post('/lists/store', [App\Http\Controllers\Teacher\ListController::class, 'store']);
    Route::get('/lists/edit/{id}', [App\Http\Controllers\Teacher\ListController::class, 'edit']);
    Route::post('/lists/update', [App\Http\Controllers\Teacher\ListController::class, 'update']);
    Route::get('/lists/delete/{id}', [App\Http\Controllers\Teacher\ListController::class, 'delete']);

    Route::get('/list-items', [App\Http\Controllers\Teacher\ListItemController::class, 'index'])->name('teacher_list_items');
    Route::get('/list-items/create', [App\Http\Controllers\Teacher\ListItemController::class, 'create']);
    Route::post('/list-items/store', [App\Http\Controllers\Teacher\ListItemController::class, 'store']);
    Route::get('/list-items/edit/{id}', [App\Http\Controllers\Teacher\ListItemController::class, 'edit']);
    Route::post('/list-items/update', [App\Http\Controllers\Teacher\ListItemController::class, 'update']);
    Route::get('/list-items/delete/{id}', [App\Http\Controllers\Teacher\ListItemController::class, 'delete']);

    Route::get('/activity-instances', [App\Http\Controllers\Teacher\ActivityInstanceController::class, 'index'])->name('teacher_activity_instances');
    Route::get('/activity-instances/create', [App\Http\Controllers\Teacher\ActivityInstanceController::class, 'create']);
    Route::post('/activity-instances/store', [App\Http\Controllers\Teacher\ActivityInstanceController::class, 'store']);
    Route::get('/activity-instances/edit/{id}', [App\Http\Controllers\Teacher\ActivityInstanceController::class, 'edit']);
    Route::post('/activity-instances/update', [App\Http\Controllers\Teacher\ActivityInstanceController::class, 'update']);
    Route::get('/activity-instances/delete/{id}', [App\Http\Controllers\Teacher\ActivityInstanceController::class, 'delete']);


    Route::get('/levels', [App\Http\Controllers\Teacher\LevelController::class, 'index'])->name('teacher_levels');
    Route::get('/levels/create', [App\Http\Controllers\Teacher\LevelController::class, 'create']);
    Route::post('/levels/store', [App\Http\Controllers\Teacher\LevelController::class, 'store']);
    Route::get('/levels/edit/{id}', [App\Http\Controllers\Teacher\LevelController::class, 'edit']);
    Route::post('/levels/update', [App\Http\Controllers\Teacher\LevelController::class, 'update']);
    Route::get('/levels/delete/{id}', [App\Http\Controllers\Teacher\LevelController::class, 'delete']);

    Route::get('/school-groups', [App\Http\Controllers\Teacher\SchoolGroupController::class, 'index'])->name('teacher_school_groups');

    Route::get('/students/{school_group_id}', [App\Http\Controllers\Teacher\StudentController::class, 'school_group_students']);

    Route::get('/student-scores/{student_id}', [App\Http\Controllers\Teacher\StudentController::class, 'student_scores'])->name('teacher_student_scores');
    

    // Change Password
    Route::get('/change-password', [App\Http\Controllers\Teacher\ChangePasswordController::class, 'change_password']);
    Route::post('/change-password', [App\Http\Controllers\Teacher\ChangePasswordController::class, 'update_password'])->name('update_password_teacher');
});

// Student panel
Route::group(['prefix' => 'student', 'middleware' => ['auth', 'student']], function () {
    Route::get('/dashboard', [App\Http\Controllers\Student\DashboardController::class, 'index']);

    // Change Password
    Route::get('/change-password', [App\Http\Controllers\Student\ChangePasswordController::class, 'change_password']);
    Route::post('/change-password', [App\Http\Controllers\Student\ChangePasswordController::class, 'update_password'])->name('update_password_student');
}); 
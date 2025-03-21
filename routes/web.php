<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SynergyController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Auth;


// Route::get('/', function () {
//     return view('welcome');
// });

//Login
// Route::get('/login',[SynergyController::class,'login']);
// Route::post('/user',[SynergyController::class,'user']);

Route::get('/login', [SynergyController::class, 'showLoginForm'])->name('login'); // Show login form
Route::post('/user', [SynergyController::class, 'login']); // Handle login submission

//index
Route::get('/',[SynergyController::class,'index']);

//table
// Route::view('/table','table')->name('table');

//registration
Route::get('/student/registration', [SynergyController::class, 'showForm'])->name('student.registration');
Route::post('/student/registration', [SynergyController::class, 'submitForm'])->name('student.submit');

//form
Route::get('/students', [SynergyController::class, 'form'])->name('students.index')->middleware('auth');


//logout
Route::post('/logout', function () {
    Auth::logout();  // Log out the user
    return redirect('/login');  // Redirect to login page after logout
})->name('logout');




// Edit route (form to update student)
Route::get('/student/{id}/edit', [SynergyController::class, 'edit'])->name('student.edit');

// Update student data (PUT request)
Route::put('/student/{id}', [SynergyController::class, 'update'])->name('student.update');

// Delete student (DELETE request)
Route::delete('/student/{id}', [SynergyController::class, 'destroy'])->name('student.delete');



//testimonial
Route::get('/testimonial',[SynergyController::class,'testimonial']);

Route::get('/test',function(){
    return view('test');
});

//course
Route::get('/course',[SynergyController::class,'course']);

//service
Route::get('/service',[SynergyController::class,'service']);

//directory
Route::get('/directory',[SynergyController::class,'directory']);

//contact
Route::get('/contact',[SynergyController::class,'contact']);

//dashboard
Route::get('/dashboard',[SynergyController::class,'dashboard'])->name('dashboard')->middleware('auth');




Route::post('/update-status', [SynergyController::class, 'updateStatus'])->name('student.details');


//notice
Route::get('/notice', [SynergyController::class, 'showCalendar'])->name('showCalendar')->middleware('auth');


Route::post('/students/updateDate', [SynergyController::class, 'getStudentsForCalendar'])->name('students.updateDate');

Route::post('/assign-appointment/{id}', [SynergyController::class, 'assignAppointment'])->name('assignAppointment');

Route::delete('/appointment/{id}/delete', [SynergyController::class, 'deleteAppointment'])->name('deleteAppointment');










// Route::get('/email/guardian/{id}', [SynergyController::class, 'emailGuardian']);


Route::get('/send-email-to-guardian/{id}', [SynergyController::class, 'emailGuardian'])->name("send.guardian.email");





Route::get('/images', [SynergyController::class, 'showImages'])->name('images.show');




//image
Route::get('/image', [SynergyController::class, 'image'])->name('image')->middleware('auth');


Route::post('/image/update/{id}', [SynergyController::class, 'updateImage'])->name('updateImage')->middleware('auth');


//update contact
Route::get('/update_new', [SynergyController::class, 'update_new'])->name('update_new')->middleware('auth');


Route::post('/update_contact/{id}', [SynergyController::class, 'updateContact'])->name('update_contact');


//appointment
Route::get('/appointment', [SynergyController::class, 'appointment'])->name('appointment')->middleware('auth');
Route::post('/send-reminder', [SynergyController::class, 'sendReminder'])->name('send.reminder');

Route::post('/verify-code', [SynergyController::class, 'verifyCode'])->name('verifyCode');

Route::get('/get-student-details', [SynergyController::class, 'getStudentDetails'])->name('getStudentDetails');

// Route::get('/students', [SynergyController::class, 'form'])->name('students.list');




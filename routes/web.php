<?php

use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CommentController;


// GET :lecture
// POST : ajouter
// PUT : modification complète
// PATCH : modification partielle
// DELETE : supprimer


// Route::get('/home', function () {
//     return view ('welcome');
// })->name("welcome");
// Route::get('/student', function () {
//     return '<h1> hi </h1>';
// })->name('student')->middleware('token');


// Route::group([
//     "prefix"=>"admin"
// ],function(){
//     // Route::get('/aboutUs', function () {
//     //     return view ('pages.about');
//     // })->name("about");


//     Route::get('/{id}/{name?}', function ($id,$name="hassan") {
//         return "je suis".$name." et id".$id;
//     })->name("userInfo");
// });
// // ex1
// Route::group([
//     "prefix"=>"laravel/public",
// ],function(){
//     Route::get('/', function(){
// return 'accueil';
// });
// Route::get('login', function(){
// return 'login';
// });
// Route::get('page/1', function()
// {
// return 'page1';
// });

// Route::get('test/{param}',function($x){
// // return 'test:'.$x;
// //utiliser une vue
// return view ('test', ["x" => $x]);

// })->name("test");
// });
// // liaison route modelz

// // Route::get('about',function(){
// //     return view ('p')
// // })
// Route::get('/form-csrf', function () {return
//     view('form-csrf');});

// Route::post('/details', function (Request $req) {
//     return $req->all();
//     })->name('details');

Route::get('/students',[StudentController::class,'getStudents']);
Route::get('/showStudent/{id}',[StudentController::class,'getStudents']);
//Route::get('/',function(){
   // return view('home');
//});

Route::prefix('students')->group(function(){
    Route::get('create',[StudentController::class,'create'])->name('students.create');
    Route::get('/',[StudentController::class,'index'])->name('students.index');
    Route::get('/{student}',[StudentController::class,'show'])->name('students.show');
    Route::get('/{student}/edit',[StudentController::class,'edit'])->name('students.edit');
    Route::post('/',[StudentController::class,'store'])->name('students.store');
    Route::put('/{student}',[StudentController::class,'update'])->name('students.update');
    Route::delete('/{student}',[StudentController::class,'destroy'])->name('students.destroy');
    Route::resource('posts.comments',CommentController::class);
    Route::scopeBindings()->group(function () {
    Route::resource('posts.comments',CommentController::class);
    });

  
});
Route::get('/home', function () {
    return view('home', ['name' => 'James']);
});
Route::get('/about', function () {
    return "welcome";
});  

<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    //action
    public function index(){

    $students =Student::all();
    return view("students.index",["data"=>$students]);
    }
    public function show($id){
        $student=Student::findOrFail($id);
        return view("students.show",["data"=>$student]);
    }
    public function create(){
        return view('students.create');
    }
    public function store(Request $req){
        // 1 la validation
       $rules=[
        'name'=> ['required','max:20'],
        'email'=> ['required','email','max:30'],
        'phone'=> ['required','max:12'],
        'section'=> ['required','max:20'],
        'image'=> ['required','image','max:1024'],
        ];
        $messages=[
            'name.required'=> 'you must provide your name',
            'image.image'=> 'upload an image please'
        ];
        $validateData = Validator::make($req->all(),$rules,$messages);
        if($validateData->fails())
return redirect()->back()->withErrors($validateData)->withInput();
// 2 on upload l'image dans '/storage/app/public/students'
$path_image=$req->image->store('students','public');
// dd($path_image);
// 3 on enregistre les informails du student
$student=new Student;
   $student->name=$req->name;
   $student->mail=$req->email;
   $student->phone=$req->phone;
   $student->section=$req->section;
   $student->image=$path_image;
   $student->save();
   //4 on retourne vers la meme page avec un message de réussite
//    return redirect()->back()->with("success","student has been added succeddfully");
return redirect()->route('students.index');

}

public function update(Request $req,Student $student){
    // 1 la validation
   $rules=[
    'name'=> ['required','max:20'],
    'email'=> ['required','email','max:30'],
    'phone'=> ['required','max:12'],
    'section'=> ['required','max:20'],
    'image'=> $req->hasFile('image')?['required','image','max:1024']:"",
    ];
    $messages=[
        'name.required'=> 'you must provide your name',
        'image.image'=> 'upload an image please'
    ];
    $validateData = Validator::make($req->all(),$rules,$messages);
    if($validateData->fails())
return redirect()->back()->withErrors($validateData)->withInput();
// 2 on suprime l'ancienne image
if($req->hasFile('image')){
unlink($req->image->store('storage/'.$student->image));
$path_image=$req->image->store('students','public');
}
// dd($path_image);
// 3 on enregistre les informails du student
$student->update([
    'name'=>$req->name,
    "email"=>$req->email,
    "phone"=>$req->phone,
    "section"=>$req->section,
    "image"=>$req->hasFile('image')? $path_image:$student->image

]);

//4 on retourne vers la meme page avec un message de réussite
//return redirect()->back()->with("success","student has been updated successfully");
return redirect()->route('students.index');

}
    public function edit(Student $student){
    return view('students.edit',['data'=>$student]);
    }
    public function destroy(Student $student){
        // On supprime l'image existant
unlink('storage/'.$student->image);
// On supprime les informations du $student de la table "students"
$student->delete();
// Redirection route "students.index"
return redirect()->route('students.index');
    }
}
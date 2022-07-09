<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('Home.index');
    }
    public function store(Request $request)
    {
        $request->validate
            (
            [
                'std_name' => 'required',
                'std_image' =>'required|image|mimes: jpg,jpeg,png',
            ],
            [
            //custom error message shown garna ko lagi 
            'std_image.image' => 'Image should be jpg,jpeg,png'
        ]);
        $object=new student();
        $object->student_name=$request->input('std_name');

        if($request->hasfile('std_image')){
            $image =$request->file('std_image');
            $name = $image->getClientOriginalName();
            $fileName ='assets/images/'.$name;
            $image->move('assets/images/',$fileName);
            $object->student_image=$fileName;//databse ma store huncha
        }
        $object->save();
        // return redirect()->back()->with('status','Image Uploaded success');
        return redirect()->back()->with('status',$fileName);
    }
}

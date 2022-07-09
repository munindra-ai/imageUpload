<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class HomeController extends Controller
{
    public function index()
    {
        return view('Home.index');
    }
    public function showImage()
    {
        $data = student::all();//all student ko database ma vayeko sabai row pass garcha+student ma vako data array ma pass garcha $data ma

        return view('Home.showImage',compact('data'));//compact ley pass data variable into view
    }
    public function store(Request $request)
    {
        $request->validate
            (
            [
                'std_name' => 'required',
                'std_image' =>'required|image|mimes: jpg,jpeg,png,PNG',
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
        // return redirect()->back()->with('status',$fileName);
        return redirect()->action([HomeController::class,'showImage'])->with('status','Image Uploaded success');
    }
}

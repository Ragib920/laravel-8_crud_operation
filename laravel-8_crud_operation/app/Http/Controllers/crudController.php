<?php

namespace App\Http\Controllers;

use App\Models\crud;
use Illuminate\Http\Request;

class crudController extends Controller
{

    public function showData()
    {
        $showData= crud::paginate(5);
        return view('index',compact('showData'));
    }
    public function addData()
    {
        return view('store');
    }
    public function storeData(Request $request)
    {
        $rules=[
            'name'=>'required|min:5',
            'email'=>'required|email',
        ];
        $custom_message=[
            'name.required'=>'Enter Your Name',
            'name.min'=>'Your name must be at least 5 characters',
            'email.required'=>'Enter your Email',
            'email.email'=>'Enter Valid a Email',
        ];
        $this->validate($request, $rules, $custom_message);

        $crud = new crud();
        $crud->name= $request->name;
        $crud->email= $request->email;
        $crud->save();
//        return back()->with('/store',' Added successfully');

        return redirect('/')->with('message',' Added successfully');
    }
    public function editData($id=null)
    {
        $result= crud::find($id);
        return view('/editData',compact('result'));
    }
    public function updateData(Request $request,$id)
    {
        $rules=[
            'name'=>'required|min:5',
            'email'=>'required|email',
        ];
        $custom_message=[
            'name.required'=>'Enter Your Name',
            'name.min'=>'Your name must be at least 5 characters',
            'email.required'=>'Enter your Email',
            'email.email'=>'Enter Valid a Email',
        ];
        $this->validate($request, $rules, $custom_message);

        $crud = crud::find($id);
        $crud->name= $request->name;
        $crud->email= $request->email;
        $crud->save();
//        return back()->with('/store',' Added successfully');

        return redirect('/')->with('message',' Added updated');
    }
    public function deleteData($id)
    {
        crud::where('id',$id)->delete();
        return back()->with('message',' Deleted Successfully');
    }

}

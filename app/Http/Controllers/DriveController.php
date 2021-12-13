<?php

namespace App\Http\Controllers;

use App\Drive;
use Illuminate\Http\Request;

class DriveController extends Controller
{

    public function index()
    {
       $userid= auth()->user()->id;
        $drives= Drive::where('userid','=',$userid)->get();
        return view('drives.index')->with('drives',$drives);
    }


    public function create()
    {
        return view("drives.create");
    }


    public function store(Request $request)
    {
        $request->validate([
         "title"=>"required|min:3|max:30",
         "description"=>"required|min:3|max:40",
         "file"=>"required|file|max:100000"
        ]);
        $drive=new Drive();
        $drive->title =$request->title;
        $drive->description =$request->description;
        $drive->userid=auth()->user()->id;
        //file code
        $file_data= $request->file('file');
        $file_name=$file_data->getCLientOriginalName();
        $file_data->move(public_path().'/upload/',$file_name);
        $drive->filename=$file_name;
        $drive->save();
        return redirect('drives')->with('done','insert successfully');
    }


    public function show($id)
    {
        $drive= Drive::find($id);
        return view("drives.show")->with('drive',$drive);
    }


    public function edit($id)
    {
        $drive= Drive::find($id);
        return view("drives.edit")->with('drive',$drive);
    }


    public function update(Request $request,  $id)
    {
        $request->validate([
            "title"=>"required|min:3|max:30",
            "description"=>"required|min:3|max:40",
            "file"=>"required|file|max:100000"
           ]);
           $drive= Drive::find($id);
           $drive->title =$request->title;
           $drive->description =$request->description;
           //file code
           $file_data= $request->file('file');
           $file_name=$file_data->getCLientOriginalName();
           $file_data->move(public_path().'/upload/',$file_name);
           $drive->filename=$file_name;
           $drive->save();
           return redirect('drives')->with('done','insert successfully');
    }


    public function destroy($id)
    {
        $drive=Drive::find($id);
        $drive->delete();
        return redirect("drives")->with('done',"remove successfully");
    }
    public function download($id)
    {
       $drive=Drive::where('id','=',$id)->firstOrfail();
       $drive_path= public_path('upload/'.$drive->filename);
       return  response()->download($drive_path );
    }
}

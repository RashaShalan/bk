<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use Redirect;


use App\Models\school;
use App\Models\student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $school = school::all();
          $student = student::all();

          return view('student.index', compact('school','student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $school = school::all();

        return view('student.create', compact('school'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name'       => 'required',
            'school_id'       => 'required',
            
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('Student/create')
                ->withErrors($validator)
                ->withInput($request);
        } else {
            $last = student::where('school_id',$request->school_id)->latest('order')->first();
           // dd($last);
            // store
            $student = new student;
            $student->name       = $request->name;
            $student->school_id       = $request->school_id;
            $student->order       = $last->order+1;

            $student->save();

            // redirect
            Session::flash('message', 'Successfully created student!');
            return Redirect::to('Student');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = student::find($id);
        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $school = school::all();
        $student = student::find($id);

        return view('student.edit', compact('school','student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'name'       => 'required',
            'school_id'       => 'required',
            
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('Student/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput($request);
        } else {
            //check if student change his school
            $check=student::find($id);
            if($check->school_id==$request->school_id)
           { // store
            $student =  student::find($id);
            $student->name       = $request->name;
            $student->school_id       = $request->school_id;

            $student->save();}else{
                $last = student::where('school_id',$request->school_id)->latest('order')->first();

                $student =  student::find($id);
                $student->name       = $request->name;
                $student->school_id       = $request->school_id;
                $student->order       = $last->order+1;

                $student->save();
            }

            // redirect
            Session::flash('message', 'Successfully updated Student!');
            return Redirect::to('Student');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = student::find($id);
        $student->delete();

        // redirect
        Session::flash('message', 'Successfully deleted a student!');
        return redirect()->back();
    }
     /**
     * restore specific post
     *
     * @return void
     */
    public function restore($id)
    {
        student::withTrashed()->find($id)->restore();
  
        return redirect()->back();
    }  
  
    /**
     * restore all post
     *
     * @return response()
     */
    public function restoreAll()
    {
        student::onlyTrashed()->restore();
  
        return redirect()->back();
    }
    /**
     * Reorder All Students
     */
    function reorderStudents(Request $request)
    {
       // Artisan::queue('reorder:student');
        \Artisan::call('reorder:student');
        return redirect()->back();

    }
}

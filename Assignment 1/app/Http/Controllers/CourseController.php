<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course=Course::all();
//        $course->load('department');
        return view('Course.1course',['course'=>$course]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course=Course::all();
        $course->load('department');
      return view('Course.2create',["course"=>$course]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $course=new Course();
        $course->name=$request->get('name');
       $course->code=$request->get('code');
        $course->ects=$request->get('ects');
       $course->description=$request->get('description');
       $course->department_id=$request->get('department');
        $department=Department::find($request->get('department'));
      $course->save();
      $department->save();
       return redirect()->route('store.course')->with("create a course","Course $course->code created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $course->load('department');
        return  view('Course.3courseshow',["course"=>$course]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {   //$department=Department::all();
        $course->load('department');
        $department = Department::find($course->department_id);
        return  view('Course.4courseedit',["course"=>$course , "department"=>$department]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $course->code=$request->get('code');
        $course->name=$request->get('name');
        $course->ects=$request->get('ects');
        $course->description=$request->get('description');
        $course->department_id=$request->get('department');
        $course->save();
        return redirect()->route('show.course',[$course->id])->with("updated a course","Course $course->code updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        Course::where('id',$course->id)->delete();
        return redirect()->route('courses')->with("remove a course","Course $course->code successfully removed");
    }
}

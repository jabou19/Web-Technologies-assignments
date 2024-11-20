<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $department= Department::all();
        $department->load('courses');

        return view('Deparment.department',["department" =>$department]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department= Department::all();
//        $department->all();
       $department->load('courses');

        return view('Deparment.createdepartmet',["department" =>$department]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $department=new Department();
        $department->name=$request->get('name');
        $department->code=$request->get('code');
        $department->description=$request->get('description');
        $department->save();
        return redirect()->route('store')->with("create","Department $department->code is created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        $department->load('courses');
           return view('Deparment.showdepartment',["department"=>$department]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
   $department->load('courses');
  return view("Deparment.editdepartment",["department"=>$department]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $department->load('courses');
        $department->name = $request["name"];
        $department->code = $request["code"];
        $department->description = $request["description"];
        $department->save();

        return redirect()->route( 'update',[$department->id])->with("updated","Department $department->code updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department){

        Department::where('id',$department->id)->delete();
        return redirect()->route('departments')->with("remove","Department $department->code successfully removed");
    }
}

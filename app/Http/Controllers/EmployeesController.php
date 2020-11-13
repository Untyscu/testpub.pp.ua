<?php

namespace App\Http\Controllers;

use App\Models\departments;
use App\Models\employees;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeEditRequest;

class EmployeesController extends Controller
{
    public function index()
    {
        $employees = employees::all();
        $departments = departments::all();
        return view("pages.employees", compact('employees','departments'));
    }
    public function editform($id)
    {
        if($id == 0){
            $departments = departments::all();
            return view("pages.editempl", compact( 'departments'));
        }else{
            $employee = employees::find($id);
            $departments = departments::all();
            return view("pages.editempl", compact( 'id','employee', 'departments'));
        }
    }
    public function edit(EmployeeEditRequest $request)
    {
        $id = '';
        if ($request->id != null) {
            $id = $request->id;
            $employee = employees::find($id);
        }else{
            $employee = new employees;
        }
        $departments = "";
        foreach ($request->departments as $item) {
            $departments .= $item . ";";
        }
        $employee->fname = $request->input('fname');
        $employee->mname = $request->input('mname');
        $employee->lname = $request->input('lname');
        $employee->sex = $request->input('sex');
        $employee->wage = $request->input('wage');
        $employee->departments = $departments;
        $employee->save();
        return redirect('/employees');
//        return dd($request);
    }
    public function del($id)
    {
        employees::find($id)->delete();
        return redirect('/employees');
    }
}

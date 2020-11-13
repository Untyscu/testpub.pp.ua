<?php

namespace App\Http\Controllers;

use App\Models\departments;
use App\Models\employees;
use Illuminate\Http\Request;
use App\Http\Requests\DepDelRequest;

class DepartmentsController extends Controller
{
    public function index()
    {
        $departments = departments::all();
        $data = array();
        foreach ($departments as $department){
            $result = array();
            $employees = employees::where('departments', 'like', '%'.$department->id.'%')->count();
            $payment = employees::where('departments', 'like', '%'.$department->id.'%')->max('wage');
            array_push($result, $department->id, $department->name, $employees, $payment);
            array_push($data, $result);
        }
        return view("pages.departments", compact('data'));
    }
    public function editform(Request $request, $id)
    {
        if($id == 0){
            return view("pages.editdep");
        }else {
            $departments = departments::where("id", $id)->first();
            return view("pages.editdep", compact('departments'));
        }
    }
    public function edit(Request $request)
    {
        $id = '';
        if ($request->id != null) {
            $id = $request->id;
            $department = departments::find($id);
        }else{
            $department = new departments;
        }

        $department->name = $request->input('name');
        $department->save();
        return redirect('/departments');
    }
    public function delform($id)
    {
        $department = departments::find($id);
        $uses = employees::where('departments', 'like', '%'.$department->id.'%')->count();
        return view("pages.delform", compact('department', 'uses'));
    }
    public function del(DepDelRequest $request)
    {
        departments::find($request->input('id'))->delete();
        return redirect('/departments');
    }
}

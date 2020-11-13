<?php

namespace App\Http\Controllers;

use App\Models\departments;
use App\Models\employees;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $employees = employees::all();
        $departments = departments::all();
        return view('pages.main', compact('employees', 'departments'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssessorController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('role:assessor');
    // }

    public function dashboard()
    {
        return view('assessor.dashboard');
    }
}

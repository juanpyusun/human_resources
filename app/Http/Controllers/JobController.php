<?php

namespace App\Http\Controllers;

use App\Models\Job;

use Illuminate\Http\Request;

class JobController extends Controller{
    public function index(){
        return view('jobs.index'); 
    }
}

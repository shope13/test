<?php

namespace App\Http\Controllers;

use App\Worker;

class WorkerController extends Controller
{
    public function index()
    {
        $workers=Worker::with('employees')->whereNull('parent_id')->paginate(100);
        return view('test', ['workers' => $workers]);
    }

    public function show($id)
    {
        return Worker::find($id)->load('employees')->employees;
    }
}

<?php

namespace App\Http\Controllers;

use App\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index()
    {
        $workers = Worker::paginate(100);
        return view('test', ['workers' => $workers]);
    }

    public function show($id)
    {
        $workers = Worker::with('employees')->get();
        return $workers->employees;
    }
}

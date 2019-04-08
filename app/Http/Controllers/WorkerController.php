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

//    public function emloyees($id)
//    {
//        return $this[$id]->with('employees')->whereNull('parent_id')->get();
//    }
}

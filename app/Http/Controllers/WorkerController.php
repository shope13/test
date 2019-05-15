<?php

namespace App\Http\Controllers;

use App\Worker;
use Illuminate\Http\Request;
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

    public function search(Request $request)
    {
        $workers = Worker::where('name', 'like', "%{$request->get('query')}%")->limit(50)->get();
        return ['workers' => $workers];
    }
}

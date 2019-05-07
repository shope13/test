<?php

namespace App\Http\Controllers;
use App\Worker;
use Validator;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $request->session()->put('search', $request
            ->has('search') ? $request->get('search') : ($request->session()
            ->has('search') ? $request->session()->get('search') : ''));

        $request->session()->put('field', $request
            ->has('field') ? $request->get('field') : ($request->session()
            ->has('field') ? $request->session()->get('field') : 'id'));

        $request->session()->put('sort', $request
            ->has('sort') ? $request->get('sort') : ($request->session()
            ->has('sort') ? $request->session()->get('sort') : 'asc'));

        $workers = new Worker();
        $workers = $workers->where('id', 'like', '%'.$request->session()->get('search') . '%')
            ->orWhere('name', 'like', '%'.$request->session()->get('search') . '%')
            ->orWhere('post', 'like', '%'.$request->session()->get('search') . '%')
            ->orWhere('DateEmp', 'like', '%'.$request->session()->get('search') . '%')
            ->orWhere('salary', 'like', '%'.$request->session()->get('search') . '%')
            ->with('boss')
            ->orderBy($request->session()->get('field'), $request->session()->get('sort'))
            ->paginate(100);

        if ($request->ajax()) {
            return view('home.home', ['workers' => $workers]);
        }else{
            return view('home.ajax', ['workers' => $workers]);
        }
    }

    public function create(Request $request)
    {
        if ($request->isMethod('get'))
            return view('home.form');

        $rules = [
            'name' => 'required',
            'post' => 'required',
            'DateEmp' => 'required',
            'salary' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return response()->json([
                'fail' =>true,
                'errors' => $validator->errors()
            ]);

        $workers = new Worker();
        $workers->name = $request->name;
        $workers->post = $request->post;
        $workers->DateEmp = $request->DateEmp;
        $workers->salary = $request->salary;
        $workers->save();

        return response()->json([
            'fail' => false,
            'redirect_url' => url('home')
        ]);
    }

    public function show(Request $request, $id)
    {
        if($request->isMethod('get')) {
            return view('home.detail',['workers' => Worker::find($id)]);
        }
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('get'))
            return view('home.form',['workers' => Worker::find($id)]);

        $rules = [
            'name' => 'required',
            'post' => 'required',
            'DateEmp' => 'required',
            'salary' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return response()->json([
                'fail' =>true,
                'errors' => $validator->errors()
            ]);

        $workers = Worker::find($id);
        $workers->name = $request->name;
        $workers->post = $request->post;
        $workers->DateEmp = $request->DateEmp;
        $workers->salary = $request->salary;
        $workers->save();

        return response()->json([
            'fail' => false,
            'redirect_url' => url('home')
        ]);
    }

    public function destroy($id)
    {
        Worker::destroy($id);
        return redirect('home');
    }

}

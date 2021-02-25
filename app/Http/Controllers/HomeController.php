<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
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
    public function index()
    {
        $data = Task::all();
        $trashed =Task::withTrashed()->get();
        return view('home')->with('data',$data)->with('trashed',$trashed);
    }

    public function insert(request $request)
    {
        $oop = new Task();
        $oop->task = $request->task;
        $oop->save();
        return redirect()->back();
    }
    public function delete($id)
    {
        $oop = Task::findOrfail($id);
        $oop->delete();
        return redirect()->back();

    }

    public function done($id)
    {
        $oop =Task::findOrfail($id);
        $oop->done = 1;
        $oop->save();
        return redirect()->back();
        
    }

    public function edit($id)
    {
        $oop =Task::findOrfail($id);
        return view('edit')->with('oop',$oop);     
        
    }
    public function update($id , request $request)
    {
        $oop = Task::findOrfail($id);
        $oop = new Task();
        $oop->task = $request->task;
        $oop->done =0;
        $oop->save();
        return redirect()->route('home');
    } 


    public function restore($id)
    {
        $oop = Task::onlyTrashed()
        ->where('id', $id)
        ->first();
        $oop->restore();
        return redirect()->back();

    }
    public function destroy($id)
    {
        $oop =Task::withTrashed()
        ->where('id', $id)
        ->first();
        $oop->forcedelete();
        return redirect()->back();
    }

}

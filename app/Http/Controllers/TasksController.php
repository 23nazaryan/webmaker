<?php

namespace App\Http\Controllers;

use App\Tasks;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    public function list()
    {
        if (Auth::user()->role == 2) {
            $tasks = Auth::user()->tasks;
        } else {
            $tasks = Tasks::all();
        }

        return view('pages.tasks', compact('tasks'));
    }

    public function create()
    {
        if (Auth::user()->role !=2) {
            return redirect('/');
        }

        return view('pages.create', ['developers' => User::where('role', 1)->get()]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required'
        ]);

        $task = new Tasks;
        $task->fill($request->all());
        $task->created_by = Auth::user()->id;
        $task->save();

        return redirect('/tasks');
    }

    public function show($id)
    {
        return view('pages.show', ['task' => Tasks::find($id)]);
    }

    public function edit($id)
    {
        return view('pages.edit', ['task' => Tasks::find($id), 'developers' => User::where('role', 1)->get()]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required'
        ]);

        $task = Tasks::find($id);
        $task->fill($request->all());
        $task->save();

        return redirect()->route('task.show', $task->id);
    }

    public function destroy($id)
    {
        Tasks::find($id)->delete();

        return redirect()->route('tasks.list');
    }

    public function status(Request $request)
    {
        $task = Tasks::find($request->get('task'));
        $task->status = $request->get('status');
        $task->save();

        return response()->json(['status' => 'ok'], 200);
    }

    public function search(Request $request)
    {
        $tasks = Tasks::query()->where('name', 'LIKE', "%{$request->get('name')}%")->get();

        return view('pages.tasks', compact('tasks'));
    }
}

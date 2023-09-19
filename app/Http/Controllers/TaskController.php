<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function  index()
    {
        $task = response()->json(Task::all());
        return $task;
    }
    public function  show($id)
    {
        $task = response()->json(Task::find($id));
        return $task;
    }
    public function  destroy($id)
    {
        Task::find($id)->delete;
        return redirect('/task/list');
    }
    public function store(Request $request)
    {
        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->user_id = $request->user_id;
        $task->statues = $request->statues;
        $task->save();
        return redirect('/task/list');
    }
    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->user_id = $request->user_id;
        $task->statues = $request->statues;
        $task->save();
        return redirect('/task/list');
    }
    public function newView()
    {
        $users = User::all();

        return view('task.new', ['users' => $users]);
    }
    public function listView()
    {

        $tasks = Task::all();
        return view('task.list', ['tasks' => $tasks]);
    }
    public function editView($id)
    {
        $users = User::all();
        $tasks = Task::find($id);
        return view('task.list', ['useres'=>$users,'tasks' => $tasks]);
    }
}

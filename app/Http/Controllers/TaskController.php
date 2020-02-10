<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Requests\CreateTask;
use App\Http\Requests\EditTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        // ユーザーのタスクを取得する
        $tasks = Auth::user()->tasks()->get();
        // $tasks = Task::all();

        return view('tasks/index', [
            'tasks' => $tasks,
        ]);
    }

    public function showCreateForm()
    {
        return view('tasks/create');
    }

    public function create(CreateTask $request)
    {
        $task = new Task();

        $task->title = $request->title;
        $task->content = $request->content;
        $task->due_date = $request->due_date;

        // Auth::user()->save($task);
        Auth::user()->$task->save();

        return redirect()->route('tasks.index');
    }

    /**
     * GET /tasks/{id}/edit
     */
    public function showEditForm(int $id)
    {
        $task = Task::find($id);

        return view('tasks/edit', [
            'task' => $task,
        ]);
    }

    public function edit(int $id, EditTask $request)
    {
        // 1
        $task = Task::find($id);

        // 2
        $task->title = $request->title;
        $task->content = $request->content;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        $task->save();

        // 
        return redirect()->route('tasks.index');
    }
}

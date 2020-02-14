<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Requests\CreateTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        // ユーザーの未着手タスクを作成日時の降順で取得する
        $tasks = Auth::user()->tasks()
                ->where('status', 1)
                ->orderBy('created_at', 'desc')
                ->get();

        return view('tasks.index', [
            'tasks' => $tasks,
            'keyword' => '',
        ]);
    }

    public function showAll(Request $request)
    {
        // キーワードの受け取り
        $keyword = $request->input('keyword');

        if (empty($keyword)) {
            // ユーザのすべてのタスクを取得する
            $query = Auth::user()->tasks()
                    ->orderBy('created_at', 'desc');

        } else {
            // キーワードで検索する
            $query = Auth::user()->tasks()
                    ->where('title', 'like binary', '%' . $keyword . '%')
                    ->orWhere('content', 'like binary', '%' . $keyword . '%')
                    ->orderBy('created_at', 'desc');
        }

        $tasks = $query->get();

        return view('tasks.all', [
            'tasks' => $tasks,
            'keyword' => $keyword,
        ]);
    }

    public function showCreateForm()
    {
        return view('tasks/create');
    }

    public function create(CreateTask $request)
    {
        $task = new Task();

        $taskCreate = $task->fill($request->all());

        $user = Auth::user();
        $user->tasks()->save($taskCreate);

        return redirect()->route('tasks.showAll');
    }

    public function showContent(int $id)
    {
        $task = Task::find($id);

        return view('tasks/show', [
            'task' => $task,
        ]);
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

    public function edit(int $id, Request $request)
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
        return redirect()->route('tasks.showAll');
    }

    /**
     * タスク削除
     * @param Task $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Task $task, int $id)
    {    

        $task->find($id)->delete();

        return redirect()->route('tasks.showAll');
    }
}

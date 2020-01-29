@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <nav class="panel panel-default">
                <div class="panel-body">
                        <a href="{{ route('folders.create') }}" class="btn btn-default btn-block">
                            フォルダを追加する
                        </a>
                    </div>
                    <div class="panel-heading">フォルダ</div>
                    <div class="list-group">
                        @foreach($folders as $folder)
                            <a href="{{ route('tasks.index', ['id' => $folder->id]) }}" class="list-group-item {{ $current_folder_id === $folder->id ? 'active' : '' }}">
                                {{ $folder->title }}
                            </a>
                        @endforeach
                    </div>
                </nav>
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-right">
                            <a href="{{ route('tasks.create', ['id' => $current_folder_id]) }}" class="btn btn-default btn-block">
                                タスクを追加する
                            </a>
                        </div>
                    </div>
                    <div class="panel-heading">未着手</div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>タイトル</th>
                            <th>期限</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                                @if ($task->status === 1)
                                    <tr>
                                        <td><a href="{{ route('tasks.content', ['id' => $task->folder_id, 'task_id' => $task->id]) }}">
                                            {{ $task->title }}
                                            </a></td>
                                        <td>{{ $task->formatted_due_date }}</td>
                                        <td><a href="{{ route('tasks.edit', ['id' => $task->folder_id, 'task_id' => $task->id]) }}">
                                                編集
                                            </a></td>
                                        <td><form action="{{ route('tasks.delete', ['id' => $task->folder_id, 'task_id' => $task->id]) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="delete">
                                            <input type="submit" name="" value="削除">
                                            </form></td>
                                    </tr>
                                @else
                                    @continue
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">着手中</div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>タイトル</th>
                            <th>期限</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                                @if ($task->status === 2)
                                    <tr>
                                        <td><a href="{{ route('tasks.content', ['id' => $task->folder_id, 'task_id' => $task->id]) }}">
                                            {{ $task->title }}
                                            </a></td>
                                        <td>{{ $task->formatted_due_date }}</td>
                                        <td><a href="{{ route('tasks.edit', ['id' => $task->folder_id, 'task_id' => $task->id]) }}">
                                                編集
                                            </a></td>
                                        <td><form action="{{ route('tasks.delete', ['id' => $task->folder_id, 'task_id' => $task->id]) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="delete">
                                            <input type="submit" name="" value="削除">
                                            </form></td>
                                    </tr>
                                @else
                                    @continue
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">完了</div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>タイトル</th>
                            <th>期限</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                                @if ($task->status === 3)
                                    <tr>
                                        <td><a href="{{ route('tasks.content', ['id' => $task->folder_id, 'task_id' => $task->id]) }}">
                                            {{ $task->title }}
                                            </a></td>
                                        <td>{{ $task->formatted_due_date }}</td>
                                        <td><a href="{{ route('tasks.edit', ['id' => $task->folder_id, 'task_id' => $task->id]) }}">
                                                編集
                                            </a></td>
                                        <td><form action="{{ route('tasks.delete', ['id' => $task->folder_id, 'task_id' => $task->id]) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="delete">
                                            <input type="submit" name="" value="削除">
                                            </form></td>
                                    </tr>
                                @else
                                    @continue
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
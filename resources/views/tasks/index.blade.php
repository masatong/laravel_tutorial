@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12" style="padding:20px 0; padding-left:0px;">
                <form class="form-inline" action="{{ route('tasks.showAll') }}">
                    <div class="form-group">
                        <input type="text" name="keyword" value="{{ $keyword }}" class="form-control" placeholder="キーワードを入力">
                    </div>
                    <input type="submit" value="検索" class="btn btn-info">
                </form>
            </div>
            <div class="column col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">未着手タスク</div>
                    <div class="panel-body">
                        <div class="text-right">
                            <a href="{{ route('tasks.create') }}" class="btn btn-default btn-block">
                                タスクを追加する
                            </a>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>タイトル</th>
                                <th>状態</th>
                                <th>期限</th>
                                <th></th>
                                <th></th>
                                <th>作成日時</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td><a href="{{ route('tasks.show', ['id' => $task->id]) }}">{{ $task->title }}</td>
                                    <td>
                                        <span class="label {{ $task->status_class }}">{{ $task->status_label }}</span>
                                    </td>
                                    <td>{{ $task->formatted_due_date }}</td>
                                    <td><a href="{{ route('tasks.edit', ['id' => $task->id]) }}">編集</td>
                                    <td><form action="{{ route('tasks.delete', ['id' => $task->id]) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="delete">
                                            <input type="submit" name="" value="削除">
                                        </form></td>
                                        <td>{{ $task->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-12" style="padding:20px 0; padding-left:0px;">
                <form class="form-inline" action="{{ route('tasks.showAll') }}">
                    @csrf
                    <input type="submit" value="タスクをすべて表示" class="btn btn-info">
                </form>
            </div>
        </div>
    </div>
@endsection
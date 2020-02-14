@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-offset-3 col-md-6">
                <nav class="panel panel-default">
                    <div class="panel-heading">タスク詳細</div>
                    <div class="panel-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $message)
                                    <p>{{ $message }}</p>
                                @endforeach
                            </div>
                        @endif
                        <form
                            action="{{ route('tasks.edit', ['id' => $task->id]) }}"
                            method="post"
                        >
                            @csrf
                            <div class="form-group">
                                <label for="title">タイトル</label><br>
                                {{ old('title') ?? $task->title }}
                            </div>
                            <div class="form-group">
                                <label for="title">内容</label><br>
                                <textarea readonly name="content" class="form-control" rows="10">
                                    {{ old('content') ?? $task->content }}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="status">状態</label><br>
                                @switch($task->status)
                                    @case(1)
                                    未着手
                                    @break
                                    @case(2)
                                    着手中
                                    @break
                                    @case(3)
                                    完了
                                    @break
                                @endswitch
                            </div>
                            <div class="form-group">
                                <label for="due_date">期限</label><br>
                                {{ old('due_date') ?? $task->formatted_due_date }}
                            </div>
                            <div class="text-left">
                                <a href="{{ route('tasks.showAll') }}">
                                    戻る
                                </a>
                            </div>
                            <div class="text-right">
                                <a href="{{ route('tasks.edit', ['id' => $task->id]) }}">
                                    編集
                                </a>
                            </div>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>
@endsection
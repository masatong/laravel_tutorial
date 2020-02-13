<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>タスク管理</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
<header>
    <nav>
        <a class="my-navbar-brand" href="/">タスク管理</a>
    </nav>
</header>
<main>
    <div class="container">
        <div class="row">
            <div class="col-sm-4" style="padding:20px 0; padding-left:0px;">
                <form class="form-inline" action="#">
                    <div class="form-group">
                        <input type="text" name="keyword" value="{{ $keyword }}" class="form-control" placeholder="キーワードを入力">
                    </div>
                    <input type="submit" value="検索" class="btn btn-info">
                </form>
            </div>
            <div class="col col-md-4">
                <nav class="panel panel-default">
                    <div class="panel-heading">タスク</div>
                    <div class="panel-body">
                        <a href="{{ route('tasks.create') }}" class="btn btn-default btn-block">
                            タスクを追加する
                        </a>
                    </div>
                    <div class="list-group">
                        @foreach($tasks as $task)
                            <a href="{{ route('tasks.index') }}" class="list-group-item">
                                {{ $task->title }}
                            </a>
                        @endforeach
                    </div>
                </nav>
            </div>
            <div class="column col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">タスク</div>
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td><a href="#">{{ $task->title }}</td>
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
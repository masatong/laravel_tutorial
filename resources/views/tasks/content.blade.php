@extends('layout')

@section('styles')
  @include('share.flatpickr.styles')
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">タスク内容</div>
          <div class="panel-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form
                action="{{ route('tasks.edit', ['id' => $task->folder_id, 'task_id' => $task->id]) }}"
                method="POST"
            >
              @csrf
              <div class="form-group">
                <label for="title">タイトル</label><br>
                  {{ old('title') ?? $task->title }}
                <!-- <input type="text" class="form-control" name="title" id="title"
                       value="{{ old('title') ?? $task->title }}" /> -->
              </div>
              <div class="form-group">
                <label for="content">内容</label><br>
                  {{ old('content') ?? $task->content }}
                <!-- <input type="text" class="form-control" name="content" id="content"
                       value="{{ old('content') ?? $task->content }}" /> -->
              </div>
              <div class="form-group">
                <label for="status">状態</label><br>
                  {{ old('status') ?? $task->status }}
                <!-- <select name="status" id="status" class="form-control">
                  @foreach(\App\Task::STATUS as $key => $val)
                    <option
                        value="{{ $key }}"
                        {{ $key == old('status', $task->status) ? 'selected' : '' }}
                    >
                      {{ $val['label'] }}
                    </option>
                  @endforeach
                </select> -->
              </div>
              <div class="form-group">
                <label for="due_date">期限</label><br>
                  {{ old('due_date') ?? $task->formatted_due_date }}
                <!-- <input type="text" class="form-control" name="due_date" id="due_date"
                       value="{{ old('due_date') ?? $task->formatted_due_date }}" /> -->
              </div>
              <div class="text-right">
                <a href="{{ route('tasks.edit', ['id' => $task->folder_id, 'task_id' => $task->id]) }}">
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

@section('scripts')
  @include('share.flatpickr.scripts')
@endsection
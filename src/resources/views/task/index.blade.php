<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Player Library</title>
</head>

<body>
    <p>タスク</p>
    @if (session('feedback.success'))
        <p style="color: green">{{ session('feedback,success') }}</p>
    @endif
    <div>
    <a href="{{ route('game.index')}}">戻る</a>
    </div>
    <div>
        @foreach ($tasks as $task)
                    <details>
                        <summary><a href="{{ route('task.index', ['id' => $task->task_id]) }}">{{ $task->name }}</a>
                        </summary>
                        <div>
                            <p>{{$task->detail}}</p>
                        </div>
                        <div>
                            <form action={{route('task.edit',$task->id)}} method="GET">
                            @csrf
                            <button type="submit">編集</button>
                            </form>
                        </div>
                        <div>
                            <form action="{{route('task.destroy',$task->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit">削除</button>
                            </form>
                        </div>
                    </details>
        @endforeach
    </div>
    <div>
        <p>タイトル追加</p>
        <form action="{{ route('task.store') }}" method="POST">
            @csrf
            <label for="task-name">タイトル</label>
            <span>100文字まで</span>
            <div>
            <textarea id="task-name" type="text" name="name" placeholder="タスクを入力"></textarea>
            </div>
            <div>
            <textarea id="task-detail" type="text" name="detail" placeholder="詳細内容を入力"></textarea>
            </div>
            <input type="hidden" id="game_id" name="game_id" value={{request()->query('gameId')}} >
            @error('name')
                <p style="color: red;">{{ $message }}</p>
            @enderror
            <button type="submit">追加</button>
        </form>
    </div>
</body>

</html>

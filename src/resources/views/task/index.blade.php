<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <p>タスク</p>
    @if (session('feedback.success'))
        <p style="color: green">{{ session('feedback,success') }}</p>
    @endif
    <div>
        @foreach ($tasks as $task)
            <form action="{{ route('game.create') }}" method="POST">

                @if (\Illuminate\Support\Facades\auth::id() === $task->game_id)
                    <details>
                        <summary><a href="{{ route('task.index', ['id' => $task->task_id]) }}">{{ $task->name }}</a>
                        </summary>

                    </details>
                @endif
            </form>
        @endforeach
    </div>
    <div>
        <p>タイトル追加</p>
        <form action="{{ route('task.store') }}" method="POST">
            @csrf
            <label for="task-name">タイトル</label>
            <span>100文字まで</span>
            <textarea id="task-name" type="text" name="task" placeholder="タスクを入力"></textarea>
            <input type="hidden" id="game_id" name="game_id" value={{request()->query('gameId')}} />
            @error('task')
                <p style="color: red;">{{ $message }}</p>
            @enderror
            <button type="submit">追加</button>
        </form>
    </div>
</body>

</html>

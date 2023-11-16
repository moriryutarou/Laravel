<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <title>Player Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <p>タスク一覧</p>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    @if (session('feedback.success'))
        <p style="color: green">{{ session('feedback,success') }}</p>
    @endif
    <div>
        <a href="{{ route('game.index') }}">戻る</a>
    </div>
    <div>
        @foreach ($tasks as $task)
            <div>
                <summary><a>{{ $task->name }}</a>
                </summary>
                <details>
                    <div>
                        <p>{{ $task->detail }}</p>
                    </div>
                    <div>
                        <form action={{ route('task.edit', $task->id) }} method="GET">
                            @csrf
                            <button type="submit">編集</button>
                        </form>
                    </div>
                    <div>
                        <form action="{{ route('task.destroy', $task->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit">削除</button>
                        </form>
                    </div>
                </details>
            </div>
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
            <input type="hidden" id="game_id" name="game_id" value={{ request()->query('gameId') }}>
            @error('name')
                <p style="color: red;">{{ $message }}</p>
            @enderror
            <button type="submit">追加</button>
        </form>
    </div>
</body>

</html>

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
    <h1>タイトル一覧</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    @if (session('feedback.success'))
        <p style="color: green">{{ session('feedback,success') }}</p>
    @endif
    <div>
        @foreach ($games as $game)
            @if (\Illuminate\Support\Facades\auth::id() === $game->user_id)
                <details>
                    <summary><a href="{{ route('task.index', ['gameId' => $game->id]) }}">{{ $game->title }}</a>
                    </summary>
                    @if (\Illuminate\Support\Facades\auth::id() === $game->user_id)
                        <div>
                            <a href="{{ route('game.update.index', ['gameId' => $game->id]) }}">編集</a>
                            <form action="{{ route('game.delete', ['gameId' => $game->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit">削除</button>
                            </form>
                        </div>
                    @else
                        編集できません
                    @endif
                </details>
            @endif
        @endforeach
    </div>
    @auth
        <div>
            <p>タイトル追加</p>
            <form action="{{ route('game.create') }}" method="POST">
                @csrf
                <label for="game-title">タイトル</label>
                <span>100文字まで</span>
                <textarea id="game-title" type="text" name="game" placeholder="タイトルを入力"></textarea>
                @error('game')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
                <button type="submit">追加</button>
            </form>
        </div>
    @endauth
</body>

</html>

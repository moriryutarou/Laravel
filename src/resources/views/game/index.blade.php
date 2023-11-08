<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <h1>テスト</h1>
    @if (session('feedback.success'))
        <p style="color: green">{{ session('feedback,success')}}</p>
    @endif
    <div>
        @foreach ( $games as $game )
        <details>
                <summary>{{$game->title}}</summary>
                <div>
                    <a href="{{route('game.update.index',['gameId'=>$game->id])}}">編集</a>
                    <form action="{{ route('game.delete',['gameId' =>$game->id])}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit">削除</button>
                    </form>
                </div>
        </details>
        @endforeach
    </div>
    @auth
    <div>
        <p>タイトル追加</p>
        <form action="{{ route('game.create')}}" method="POST">
            @csrf
            <label for="game-title">タイトル</label>
            <span>100文字まで</span>
            <textarea id="game-title" type="text" name="game"
            placeholder="タイトルを入力"></textarea>
            @error('game')
            <p style="color: red;">{{$message}}</p>
            @enderror
            <button type="submit">追加</button>
        </form>
    </div>
    @endauth
</body>
</html>

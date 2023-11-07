<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <h1>テスト</h1>
    <div>
        @foreach ( $games as $game )
        <details>
                <summary>{{$game->title}}</summary>
                <div>
                    <a href="{{route('game.update.index',['gameId'=>$game->id])}}">編集</a>
                </div>
        </details>
        @endforeach
    </div>
    <div>
        <p>タイトル追加</p>
        <form action="{{ route('game.create')}}" method="POST">
            @csrf
            <label for="game-title">タイトル</label>
            <span>100文字まで</span>
            <textarea id="game-title" type="text" name="title"
            placeholder="タイトルを入力"></textarea>
            @error('title')
            <p style="color: red;">{{$message}}</p>
            @enderror
            <button type="submit">追加</button>
        </form>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>テスト</h1>
    <div>
        @foreach ( $games as $game )
            <p>{{$game->title}}</p>
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

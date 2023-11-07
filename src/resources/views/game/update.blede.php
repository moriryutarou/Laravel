<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>タイトル編集</h1>
    <div>
        <a href="{{ route('game.index) }}">戻る</a>
        <p>タイトル編集</p>
        @if (session('feedback.success'))
            <p style="color: green">{{ session('feedback.success')}}</p>
        @endif
        <form action="{{ route('game.update.put',['gameId' => $game->id]) }}" method="post">
            @method('PUT')
            @csrf
            <label for="game-title">タイトル</label>
            <span>100文字まで</span>
            <textarea id="game-title" type="text" name="title" placeholder="タイトルを入力"></textarea>
            @error('title')
            <p style="color: red;">{{$message}}</p>
            @enderror
            <button type="submit">編集</button>
        </form>
    </div>
</body>
</html>

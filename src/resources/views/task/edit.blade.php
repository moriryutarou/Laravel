<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Player Library</title>
</head>

<body>
    <h1>タスク編集</h1>
    <div>
        <a href="{{ route('game.index')}}">戻る</a>
        <p>編集フォーム</p>
        <form action="{{route('task.update',$task->id)}}" method="POST">
            @method('PUT')
            @csrf
            <label for="task-name">タスク</label>
            <span>100文字まで</span>
            <div>
            <textarea id="task-name" type="text" name="name"
            placeholder="タイトルを入力"></textarea>
            </div>
            <div>
            <textarea id="task-name" type="text" name="detail"
            placeholder="説明内容を入力"></textarea>
            </div>
            @error('name')
            <p style="color: red;">{{$message}}</p>
            @enderror
            <button type="submit">追加</button>
        </form>
    </div>
</body>
</html>

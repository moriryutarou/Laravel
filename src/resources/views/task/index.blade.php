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
    <div>
        @foreach ($tasks as $task)
            <p>{{$task->neme}}</p>
        @endforeach
    </div>
</body>
</html>

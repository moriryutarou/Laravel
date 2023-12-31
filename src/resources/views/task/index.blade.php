<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>Gamer's note</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DotGothic16&display=swap" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary .pb-5" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand nav-item" href="#">Gamer's note</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#Navber"
                aria-controls="Navber" aria-expanded="false" aria-label="ナビゲーションの切替">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="Navber">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <form action="{{ route('TaskSearch.index') }}" class="d-flex" role="search">
                    <input type="search" class="form-control me-2" aria-label="検索..." name="keyword">
                    <input type="hidden" id="game_id" name="game_id" value={{ $game->id }}>
                    <button type="submit" class="btn btn-outline-success flex-shrink-0">検索</button>
                </form>
                <form action="{{ route('game.index') }}" class="mx-sm-1">
                    <button type="submit" class="btn btn-outline-secondary flex-shrink-0" aria-current="page"
                        href="#">戻る</button>
                </form>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div>

        <div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
            </script>
            @if (session('feedback.success'))
                <p style="color: green">{{ session('feedback,success') }}</p>
            @endif

            <div class="container-md ">
                <div class="my-2">
                    <h4 style="font-family: 'DotGothic16', sans-serif;">{{ $game->title }}</h4>
                </div>
                <hr>
                @if (count($tasks) > 0)
                    @foreach ($tasks as $task)
                        <div class="d-flex row-gap-3 .pt-4">
                            <div class="p-2 flex-grow-1  mb-3">
                                <summary>
                                    <a>{{ $task->name }}</a>
                                </summary>
                            </div>
                            <div class="p-2 mb-1">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalToggle-{{ $task->id }}">
                                    詳細
                                </button>
                                <div class="modal fade" id="exampleModalToggle-{{ $task->id }}" aria-hidden="true"
                                    aria-labelledby="exampleModalToggleLabel-{{ $task->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5"
                                                    id="exampleModalToggleLabel-{{ $task->id }}">
                                                    {{ $task->name }}
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                {{ $task->detail }}
                                            </div>
                                            <div class="modal-footer">
                                                <div>
                                                    <form action="{{ route('task.destroy', $task->id) }}"
                                                        method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">削除</button>
                                                    </form>
                                                </div>
                                                <button class="btn btn-primary"
                                                    data-bs-target="#exampleModalToggle2-{{ $task->id }}"
                                                    data-bs-toggle="modal">変更</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModalToggle2-{{ $task->id }}" aria-hidden="true"
                                aria-labelledby="exampleModalToggleLabel2-{{ $task->id }}" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5"
                                                id="exampleModalToggleLabel2-{{ $task->id }}">タスク編集</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('task.update', $task->id) }}" method="POST">
                                                @method('PUT')
                                                @csrf
                                                <div lass="mb-3">
                                                    <label for="recipient-name" class="col-form-label">タスク名</label>
                                                    <textarea class="form-control" id="task-name" type="text" name="name" placeholder="タイトルを入力"> {{ $task->name }}</textarea>
                                                    <span>100文字まで</span>
                                                </div>
                                                <div lass="mb-3">
                                                    <label for="message-text" class="col-form-label">詳細内容</label>
                                                    <textarea class="form-control" id="task-name" type="text" name="detail" placeholder="説明内容を入力">{{ $task->detail }}</textarea>
                                                    <span>255文字まで</span>
                                                </div>
                                                @error('name')
                                                    <p style="color: red;">{{ $message }}</p>
                                                @enderror
                                                <div class="modal-footer mb-3">
                                                    <button type="submit" class="btn btn-primary">確定</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="pagination justify-content-center">
                        {{ $tasks->links() }}
                    </div>
                @else
                    <figure class="text-center">
                        <blockquote class="blockquote">
                            <p>タスクは登録されていません</p>
                        </blockquote>
                    </figure>
                @endif

                <div>
                    <hr>
                </div>

            </div>

            <div class="container">
                <blockquote class="blockquote">
                    <p>新規追加</p>
                </blockquote>
                <form action="{{ route('task.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <textarea class="form-control" id="task-name" type="text" name="name" placeholder="タスク名を入力"></textarea>
                    </div>
                    <div class="mb-3">
                        <small>100文字まで</small>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" id="task-detail" type="text" name="detail" placeholder="詳細内容を入力"></textarea>
                    </div>
                    <div class="mb-3">
                        <small>255文字まで</small>
                    </div>
                    <input type="hidden" id="game_id" name="game_id" value={{ request()->query('gameid') }}>
                    @error('name')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                    <button class="btn btn-primary" type="submit">追加</button>
                </form>
            </div>
</body>

</html>

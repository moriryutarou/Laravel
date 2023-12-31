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
            <a class="navbar-brand" href="#">Gamer's note</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#Navber"
                aria-controls="Navber" aria-expanded="false" aria-label="ナビゲーションの切替">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end " id="Navber">
                <form action="{{ route('Search.index') }}" class="d-flex" role="search">
                    <input type="search" class="form-control me-2" aria-label="検索..." name="keyword">
                    <button type="submit" class="btn btn-outline-success flex-shrink-0">検索</button>
                </form>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
        @if (session('feedback.success'))
            <p style="color: green">{{ session('feedback,success') }}</p>
        @endif
        <div class="container-sm">
            <div class="my-2">
                <h4 style="font-family: 'DotGothic16', sans-serif;">タイトル一覧</h4>
            </div>
            <hr>
            @if (count($games) > 0)
                @foreach ($games as $game)
                    <div class="d-flex">
                        @if (\Illuminate\Support\Facades\auth::id() === $game->user_id)
                            <div class="p-2 flex-grow-1  mb-3">
                                <div class="list-group">
                                    <a href="{{ route('task.index', ['gameid' => $game->id]) }}"
                                        class="list-group-item list-group-item-action ">
                                        {{ $game->title }}
                                    </a>
                                </div>
                            </div>

                            <div class="p-2 mb-1">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalToggle-{{ $game->id }}">
                                    変更
                                </button>
                                <div class="modal fade" id="exampleModalToggle-{{ $game->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel-{{ $game->id }}">
                                                    登録内容の変更</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            @auth
                                                <div class="modal-body">
                                                    <form action="{{ route('game.update.put', ['gameid' => $game->id]) }}"
                                                        method="POST">
                                                        @method('put')
                                                        @csrf
                                                        <label for="game-title" class="col-form-label">タイトル</label>
                                                        <textarea class="form-control" id="game-title" type="text" name="game" placeholder="タイトルを入力">{{ $game->title }}</textarea>
                                                        <span>100文字まで</span>
                                                        @error('game')
                                                            <p style="color: red;">{{ $message }}</p>
                                                        @enderror
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">登録</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            @endauth

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-2 mb-1">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal-{{ $game->id }}">
                                    削除
                                </button>
                                <div class="modal fade" id="exampleModal-{{ $game->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel-{{ $game->id }}">削除確認</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                登録したタスクも含めて削除されます
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('game.delete', ['gameid' => $game->id]) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">閉じる</button>
                                                    <button type="submit" class="btn btn-danger">削除</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
                <div class="pagination justify-content-center">
                    {{ $games->links() }}
                </div>
            @else
                <figure class="text-center">
                    <blockquote class="blockquote">
                        <p>タイトルは登録されていません</p>
                    </blockquote>
                </figure>
            @endif

            <div>
                <hr>
            </div>
        </div>



    </div>


    <div class="container">
        @auth
            <div class="mb-3">
                <blockquote class="blockquote">
                    <p>タイトル追加</p>
                </blockquote>
                <form action="{{ route('game.create') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <textarea class="form-control" id="game-title" type="text" name="game" placeholder="タイトルを入力"></textarea>
                    </div>
                    <div class="mb-2">
                        <small>100文字まで</small>
                    </div>
                    @error('game')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                    <div>
                        <button class="btn btn-primary" type="submit">追加</button>
                    </div>
                </form>
            </div>
        @endauth
    </div>

</body>

</html>

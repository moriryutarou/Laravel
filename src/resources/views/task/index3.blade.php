<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <title>Hello, world!</title>
</head>

<body>
    <h1>Hello, world!</h1>

    <!-- Button trigger modal -->



    {{-- <button type="button" class="btn btn-primary" data-modal-title="modal-1">
      Launch demo modal-1
    </button>
    <button type="button" class="btn btn-primary" data-modal-title="modal-2">
      Launch demo modal-2
    </button>
    <button type="button" class="btn btn-primary" data-modal-title="modal-3">
      Launch demo modal-3
    </button>
    <button type="button" class="btn btn-primary" data-modal-title="dddddd">
      zzzzz
      </button> --}}
    @foreach ($tasks as $task)
        <button id="{{$task->id}}"type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalToggle"
            data-modal-title="{{ $task->name }}" data-modal-detail="{{ $task->detail }}" onclick="test({{$task->id}})">
            詳細 </button>
    @endforeach


    <!-- Modal -->
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="exampleModalToggleLabel">Modal title</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="ggg()"></button>
                </div>
                <div class="modal-body">
                    <h5 class="detail" id="exampleModalLabel">xxx</h5>

                {{-- <div lass="mb-3">
                <label for="recipient-name" class="col-form-label">タスク名</label>
                <textarea class="modal-detail form-control" id="task-name" type="text" name="name" value="modal-title"></textarea>
                <span>100文字まで</span>
                </div> --}}
                </div>
                <div class="modal-footer">
                    <div>
                        <form action="{{ route('task.destroy', $task->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">削除</button>
                        </form>
                    </div>
                    <button id="edit-button" class="btn btn-primary" data-bs-target="#exampleModalToggle2"
                        data-bs-toggle="modal" onclick="change()" data-name>変更</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">タスク編集</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="ggg()"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('task.update', $task->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div lass="mb-3">
                            <label for="recipient-name" class="col-form-label">タスク名</label>
                            <textarea class="modal-title form-control" id="task-name" type="text" name="name" value="sessionStorage.getItem('data-modal-title')">
                            </textarea>
                            <span>100文字まで</span>
                        </div>
                        <div lass="mb-3">
                            <label for="message-text" class="col-form-label">詳細内容</label>
                            <textarea class="test form-control" id="task-dtail" type="text" name="detail" value="test"></textarea>
                            <span>255文字まで</span>
                        </div>
                        @error('name')
                            <p style="color: red;">{{ $message }}</p>
                        @enderror
                        <div class="modal-footer mb-3">
                            <button type="submit" class="btn btn-primary" onclick="ggg()">確定</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
    <script>
        function test(id) {
            console.log(id);
            const myModal = new bootstrap.Modal(document.getElementById('exampleModalToggle'), {})

            const modalTitle = document.querySelector('.modal-title');
            const detail = document.querySelector('.detail');

            const aaa = document.getElementById(id);

            modalTitle.textContent = aaa.getAttribute('data-modal-title');
            detail.textContent = aaa.getAttribute('data-modal-detail');

            sessionStorage.setItem('id',id)
            sessionStorage.setItem('data-modal-title',aaa.getAttribute('data-modal-title'));
            sessionStorage.setItem('data-modal-detail',aaa.getAttribute('data-modal-detail'));


            myModal.show(id);
        }

        function ggg() {
            //Get modal
        const bs_modal = document.getElementById("exampleModalToggle");
            //Change state like in hidden modal
        bs_modal.classList.remove('show');
        bs_modal.setAttribute('aria-hidden', 'true');
        bs_modal.setAttribute('style', 'display: none');

        //Get modal backdrop
        const modalBackdrops = document.getElementsByClassName('modal-backdrop');

        //Remove opened modal backdrop
        document.body.removeChild(modalBackdrops[0]);
            myModal.hide();
            $('.modal-backdrop').remove();
         }


        function change(){
            // console.log(id);
            // const myModal = new bootstrap.Modal(document.getElementById('exampleModalToggle2'), {})
            const modalTitle = document.getElementById("task-name");
            const detail = document.getElementById("task-dtail");
            console.log(modalTitle);

            const aaa = document.getElementById(sessionStorage.getItem('id'));
            modalTitle.value = aaa.getAttribute('data-modal-title');
            const aaa = document.getElementById(sessionStorage.getItem('id'));
            modalTitle.value = aaa.getAttribute('data-modal-detail');

            ggg();

            // myModal.show(id);

        }
        // const myModal = new bootstrap.Modal(document.getElementById('exampleModalToggle'), {})
        // const btns = document.querySelectorAll('button')
        // console.log(btns);

        // for (const btn of btns) {
        //     btn.addEventListener('click', (e) => {
        //         const modalTitle = document.querySelector('.modal-title')
        //         const detail = document.querySelector('.detail')
        //         console.log(e.target.getAttribute('data-modal-title'));

        //         modalTitle.textContent = e.target.getAttribute('data-modal-title')
        //         modalTitle.value = e.target.getAttribute('data-modal-title')
        //         detail.textContent = e.target.getAttribute('data-modal-detail')
        //         detail.value = e.target.getAttribute('date-modal-detail')

        //         myModal.show()
        //     })
        // }
    </script>

</body>

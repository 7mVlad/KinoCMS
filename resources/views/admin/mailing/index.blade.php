@extends('admin.layouts.main')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-10 m-auto">

                        <form action="{{ route('admin.mailing.send') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mt-5" id="users" hidden>

                                <table class="table table-striped table-dark m-auto text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">ID</th>
                                            <th scope="col">Дата регистрации</th>
                                            <th scope="col">Дата рождения</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Телефон</th>
                                            <th scope="col">ФИО</th>
                                            <th scope="col">Псевдоним</th>
                                            <th scope="col">Город</th>
                                        </tr>
                                    </thead>

                                    <tbody class="alldata">
                                        @foreach ($users as $user)
                                            <tr>
                                                <td><input type="checkbox" name="users[]" value="{{ $user->email }}"></td>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>{{ $user->birthday }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>{{ $user->name }} {{ $user->last_name }}</td>
                                                <td>{{ $user->pseudonym }}</td>
                                                <td>{{ $user->city }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>

                                <div class="mb-5">

                                </div>
                                <div class="btn btn-outline-info d-block m-auto w-25" id="send">
                                    Отправить выбранным
                                </div>
                            </div>

                            <div id="main">
                                <h2 class="font-weight-bold text-center m-5">E-mail</h2>

                                <div class="form-group d-flex">
                                    <label>Выбрать email кому слать</label>
                                    <input class="ml-5 mr-3 users" type="checkbox" name="user" style="transform:scale(2);"
                                        checked value="all">
                                    <label>Все пользователи</label>
                                    <input class="ml-5 mr-3 users" type="checkbox" name="user" style="transform:scale(2);"
                                        value="one">
                                    <label>Выборочно</label>
                                </div>
                                <div class="form-group">
                                    <div class="btn btn-success" id="choose">
                                        Выбрать пользователей
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="my-input">Загрузить HTML-письмо</label>
                                    <input id="my-input" class="ml-3" type="file" name="html"
                                        placeholder="Загрузить">
                                </div>

                                <div class="p-3 w-25" style="border: 3px solid #000">
                                    <h5 class="text-center pb-3">Список последних загруженных шаблонов</h3>
                                        @foreach ($templates as $template)
                                            <div class="d-block pb-2">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <input class="template mr-3" type="checkbox" name="template"
                                                            value="{{ $template->path }}">
                                                        <label>{{ $template->title }}</label>
                                                    </div>
                                                    <div class="col-6">
                                                        <a class="btn btn-danger btn-sm ml-5"
                                                            href="{{ route('admin.mailing.delete', $template) }}">
                                                            <i class="fas fa-trash"></i>&nbsp;&nbsp;Удалить
                                                        </a>
                                                    </div>
                                                </div>


                                            </div>
                                        @endforeach
                                </div>

                                <input type="submit" class="btn btn-primary d-block m-auto font-weight-bolder"
                                    value="Начать рассылку">
                            </div>

                        </form>

                    </div>
                </div>


            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <script>
        $(".users").change(function() {
            $(this).siblings(".users").prop('checked', false);
        });

        document.getElementById('choose').onclick = function() {
            document.getElementById('main').hidden = true;
            document.getElementById('users').hidden = false;
        }
        document.getElementById('send').onclick = function() {
            document.getElementById('main').hidden = false;
            document.getElementById('users').hidden = true;
        }
    </script>
@endsection

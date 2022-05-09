@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row justify-content-between">
                    <div class="col-2 mb-3 mt-3">
                        <a href="{{ route('admin.user.create') }}" class="btn btn-block btn-outline-success">Добавить
                            пользователя</a>
                    </div>
                    <form action="{{ route('admin.user.search') }}" method="get">
                        <div class="form-group d-flex mt-3 mr-5 pr-5">
                            <input type="text" class="form-control" name="search" id="search" placeholder="Поиск">
                            <input type="submit" class="btn btn-secondary" value="Поиск">
                        </div>
                    </form>

                </div>


                <h2 class="font-weight-bold text-center mb-5">Пользователи</h2>

                <div class="row">
                    <div id="search_list">

                    </div>
                    <table class="table table-striped table-dark col-10 m-auto text-center">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Дата регистрации</th>
                                <th scope="col">Дата рождения</th>
                                <th scope="col">Email</th>
                                <th scope="col">Телефон</th>
                                <th scope="col">ФИО</th>
                                <th scope="col">Псевдоним</th>
                                <th scope="col">Город</th>
                                <th scope="col" colspan="2" class="text-center">Действия</th>
                            </tr>
                        </thead>

                        @if (count($users))
                            <tbody class="alldata">
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->birthday }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->name }} {{ $user->last_name }}</td>
                                        <td>{{ $user->pseudonym }}</td>
                                        <td>{{ $user->city }}</td>
                                        <td class="text-right">
                                            <a class="btn btn-info btn-sm"
                                                href="{{ route('admin.user.edit', $user->id) }}">
                                                <i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;Изменить
                                            </a>
                                        </td>
                                        <td class="text-left">
                                            <form action="{{ route('admin.user.delete', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash" role="button">&nbsp;&nbsp;Удалить</i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @else
                            <tbody>
                                <tr>
                                    <td colspan="9">Совпадений не найдено</td>
                                </tr>
                            </tbody>
                        @endif

                    </table>

                </div>
                <div class="mt-5">
                    {{ $users->appends(['search' => request()->search])->links() }}
                </div>




            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

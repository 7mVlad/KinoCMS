@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row pt-5">
                <div class="col-10 m-auto">
                    {{-- Форма --}}
                    <form action="{{ route('admin.stock.store') }}" method="POST" enctype="multipart/form-data"
                        class="ml-4 mb-3 ">
                        @csrf

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Имя</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" value="{{ Auth::user()->name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3 row">
                                    <div class="form-group mt-3">
                                        <label style="margin-right: 30px">Язык</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="release" value="1"
                                                checked>
                                            <label class="form-check-label mr-4">Русский</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="release" value="0">
                                            <label class="form-check-label">Украинский</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Фамилия</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3 row">
                                    <div class="form-group mt-3">
                                        <label style="margin-right: 30px">Пол</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="das" value="1" checked>
                                            <label class="form-check-label mr-4">Мужской</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="das" value="0">
                                            <label class="form-check-label">Женский</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Псевдоним</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Телефон</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">E-mail</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Дата рождения</label>
                                    <div class="col-sm-5">
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Адрес</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Город</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Пароль</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Повторите пароль</label>
                                    <div class="col-sm-5">
                                        <input type="password" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Номер карты</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <input type="submit" class="btn btn-primary d-block m-auto font-weight-bolder"
                            value="Сохранить">
                    </form>
                </div>
            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection


@extends('admin.layouts.main')
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
                        <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data"
                            class="ml-4 mb-3 ">
                            @csrf

                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label">Имя</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3 row">
                                        <div class="form-group mt-3">
                                            <label class="mr-5">Язык</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="language" value="ru"
                                                    checked>
                                                <label class="form-check-label mr-4">Русский</label>
                                                <input class="form-check-input" type="radio" name="language" value="ua">
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
                                            <input type="text" class="form-control" name="last_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3 row">
                                        <div class="form-group mt-3">
                                            <label class="mr-5">Пол</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" value="man"
                                                    checked>
                                                <label class="form-check-label mr-4">Мужской</label>
                                                <input class="form-check-input" type="radio" name="gender" value="woman">
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
                                            <input type="text" class="form-control" name="pseudonym">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label">Телефон</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="phone">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-6">
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label">E-mail</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Дата рождения</label>
                                        <div class="col-sm-5">
                                            <input type="date" class="form-control" name="birthday">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-6">
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label">Адрес</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="address">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label">Город</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="city">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-6">
                                    <div class="mb-3 row">
                                        <label for="password" class="col-md-2 col-form-label text-md-end">Пароль</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control" name="password"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3 row">
                                        <label for="password-confirm" class="col-md-3 col-form-label text-md-end">Повторите
                                            пароль</label>

                                        <div class="col-md-5">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="cor_password" required autocomplete="new-password">
                                        </div>

                                        <div class="text-danger pt-1" id="error"></div>
                                        <div class="text-success pt-1" id="success"></div>
                                    </div>
                                </div>
                            </div>




                            <div class="row mb-5">
                                <div class="col-6">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Номер карты</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="card_number">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label">Выберите роль</label>
                                        <select name="role" class="form-control col-sm-4">
                                            @foreach ($roles as $id => $role)
                                                <option value="{{ $id }}"
                                                    {{ $id == old('role') ? ' selected' : '' }}>
                                                    {{ $role }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <input type="submit" class="btn btn-primary d-block m-auto font-weight-bolder" value="Сохранить"
                                id="submit">
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
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script>

<script>
    $(function() {
        $("#password-confirm").keyup(function() {
            var password = $("#password").val();
            if(password !== $(this).val()) {
                $("#error").html("Пароли не совпадают");
                $("#success").html("");
                $("#submit").addClass('disabled');
            } else {
                $("#success").html("Пароли совпадают");
                $("#error").html("");
                $("#submit").removeClass('disabled');
            }
        });

    });
</script>

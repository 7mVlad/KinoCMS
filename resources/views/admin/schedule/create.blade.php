@extends('admin.layouts.main')
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.min.js">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12 mt-5">
                        <div class="panel panel-default">
                            <h2 class="panel-heading mb-5">Добавление фильма в расписание</h2>
                            <form action="{{route('admin.schedule.store')}}" method="post">
                                @csrf
                                <div class="panel-body ml-3">
                                    <div class="form-group w-25">
                                        <label>Выберите кинотеатр:</label>
                                        <select name="cinema_id" class="form-control">
                                            <option value="">--- Выберите кинотеатр ---</option>
                                            @foreach ($cinemas as $key => $cinema)
                                                <option value="{{ $key }}">{{ $cinema->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group w-25">
                                        <label>Выберите зал:</label>
                                        <select name="hall_id" class="form-control">
                                            <option value="">--- Выберите зал ---</option>
                                        </select>
                                    </div>
                                    <div class="form-group w-25">
                                        <label>Выберите фильм:</label>
                                        <select name="film_id" class="form-control">
                                            <option value="">--- Выберите фильм ---</option>
                                            @foreach ($films as $film)
                                                <option value="{{ $film->id }}">{{ $film->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group w-25">
                                        <label>Установите цену</label>
                                        <input class="form-control" type="text" name="cost">
                                    </div>
                                    <div class="form-group w-25">
                                        <label>Выберите дату</label>
                                        <input class="form-control" type="date" name="date">
                                    </div>
                                    <div class="form-group w-25">
                                        <label>Выберите время</label>
                                        <input class="form-control" type="time" name="time">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary ml-3 mt-3 font-weight-bolder"
                                value="Сохранить">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="cinema_id"]').on('change', function() {
                var cinemaID = $(this).val();
                cinemaID++;
                if (cinemaID) {
                    $.ajax({
                        url: 'http://127.0.0.1:8000/admin/schedule/' + cinemaID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {

                            $('select[name="hall_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="hall_id"]').append('<option value="' +
                                value.id + '">' + value.hall_number + '</option>');
                            });


                        }
                    });
                } else {
                    $('select[name="hall_id"]').empty();
                }
            });
        });
    </script>
@endsection

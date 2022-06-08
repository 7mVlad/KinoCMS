@extends('layouts.main')
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.min.js">
    <section class="row">
        <div class="col-12 m-auto">
            <div class="wrapper pb-5" style="background-color: aliceblue;color:black">
                <div class="container">
                    <form action="{{route('schedule.filter')}}" method="post">
                        @csrf
                        <div class="d-flex justify-content-between pt-5">
                            <div class="form-group w-25 mr-5">
                                <select name="cinema_id" class="custom-select">
                                    <option value="">--- Выберите кинотеатр ---</option>
                                    @foreach ($cinemas as $key => $cinema)
                                        <option value="{{ $cinema->id }}">{{ $cinema->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group w-25 mr-5">
                                <select name="hall_id" class="custom-select">
                                    <option value="">--- Выберите зал ---</option>
                                </select>
                            </div>
                            <div class="form-group w-25 mr-5">
                                <select class="custom-select" name="film_id">
                                    <option value="">--- Выберите фильм ---</option>
                                    @foreach ($films as $film)
                                        <option value="{{ $film->id }}">{{ $film->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group w-25 ">
                                <select class="custom-select" name="date">
                                    <option value="">--- Выберите дату ---</option>
                                    @foreach ($schedules as $key => $scheduleDate)
                                        <option value="{{ $key }}">{{ $key }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <input class="btn btn-outline-success mb-5" type="submit" value="Фильтр">
                    </form>



                    @foreach ($schedules as $key => $scheduleDate)
                        <h4>{{ $key }}</h4>
                        <table class="table mb-5 ">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Время</th>
                                    <th class="w-50" scope="col">Фильм</th>
                                    <th scope="col">Зал</th>
                                    <th scope="col">Цена</th>
                                    <th scope="col">Бронировать</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($scheduleDate as $schedule)
                                    @if ($key == $schedule->date)
                                        <tr>
                                            <td>{{ $schedule->time }}</td>
                                            <td>{{ $schedule->getFilm->title }}</td>
                                            <td>{{ $schedule->getHall->hall_number }}</td>
                                            <td>{{ $schedule->cost }}</td>
                                            <td>
                                                <a href="{{ route('booking.index', $schedule->id) }}">
                                                    <div class="btn btn-primary ml-5">+</div>
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    @endforeach



                </div>
            </div>

        </div>
    </section>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="cinema_id"]').on('change', function() {
                var cinemaID = $(this).val();
                if (cinemaID) {
                    $.ajax({
                        url: 'http://127.0.0.1:8000/admin/schedule/' + cinemaID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {

                            $('select[name="hall_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="hall_id"]').append('<option value="' +
                                    value.id + '">' + value.hall_number +
                                    '</option>');
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

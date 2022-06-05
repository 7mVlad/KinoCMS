@extends('layouts.main')
@section('content')
    <section class="row">
        <div class="col-12 m-auto">
            <div class="wrapper pb-5" style="background-color: aliceblue;color:black">
                <div class="container">

                    <div class="image">
                        <img src="https://my.p24.app/files/e9ad7cad-0266-4416-ac11-8366fb625e21" style="width: 100%"
                            height="400" alt="">
                    </div>

                    <div class="row mt-5">
                        <div class="col-3">
                            <img src="{{ Storage::url($schedule->getFilm->main_image) }}" style="width: 100%" height="450"
                                alt="">
                        </div>
                        <div class="col-9">

                            <h3>{{ $schedule->getFilm->title }}</h3>
                            <p>{{ $schedule->date . ', ' . $schedule->time . ', ' . $schedule->getHall->hall_number }}</p>

                            <form action="{{route('booking.store')}}" method="POST">
                                @csrf
                                <input type="hidden" name="schedule" value="{{$schedule->id}}">
                                <input type="hidden" name="user" value="{{Auth::user()->id}}">
                                <div class="d-flex justify-content-center">
                                    <p class="font-weight-bold mr-5">РЯД 1</p>
                                    @for ($i = 1; $i < 13; $i++)
                                        <label class="label">
                                            <input class="checkbox" type="checkbox" name="row_col[]" value="{{1 . '.' .$i}}" {{ in_array(1 . '.' .$i, $rowCols->toArray(), true) ? 'disabled' : '' }} >
                                            <span class="fake mr-1" style="--before-fake:'{{$i}}'"></span>
                                        </label>
                                    @endfor
                                </div>
                                <div class="d-flex justify-content-center" style="margin-top: -10px">
                                    <p class="font-weight-bold mr-5">РЯД 2</p>
                                    @for ($i = 1; $i < 14; $i++)
                                        <label class="label">
                                            <input class="checkbox" type="checkbox" name="row_col[]" value="{{2 . '.' .$i}}" {{ in_array(2 . '.' .$i, $rowCols->toArray(), true) ? 'disabled' : '' }}>
                                            <span class="fake mr-1" style="--before-fake:'{{$i}}'"></span>
                                        </label>
                                    @endfor
                                </div>
                                <div class="d-flex justify-content-center" style="margin-top: -10px">
                                    <p class="font-weight-bold mr-5">РЯД 3</p>
                                    @for ($i = 1; $i < 15; $i++)
                                        <label class="label">
                                            <input class="checkbox" type="checkbox"  name="row_col[]" value="{{3 . '.' .$i}}" {{ in_array(3 . '.' .$i, $rowCols->toArray(), true) ? 'disabled' : '' }}>
                                            <span class="fake mr-1" style="--before-fake:'{{$i}}'"></span>
                                        </label>
                                    @endfor
                                </div>
                                <br>
                                <br>
                                @for ($i = 4; $i < 10; $i++)
                                    <div class="d-flex justify-content-center" style="margin-top: -10px">
                                        <p class="font-weight-bold mr-5">РЯД {{$i}}</p>
                                        @for ($j = 1; $j < 14; $j++)
                                            <label class="label">
                                                <input class="checkbox" type="checkbox" name="row_col[]" value="{{$i . '.' .$j}}" {{ in_array($i . '.' .$j, $rowCols->toArray(), true) ? 'disabled' : '' }}>
                                                <span class="fake mr-1" style="--before-fake:'{{$j}}'"></span>
                                            </label>
                                        @endfor
                                    </div>
                                @endfor

                                <div class="d-flex justify-content-center" style="margin-top: -10px">
                                    <p class="font-weight-bold mr-5">РЯД 10</p>
                                    @for ($i = 1; $i < 21; $i++)
                                        <label class="label">
                                            <input class="checkbox" type="checkbox" name="row_col[]" value="{{10 . '.' .$i}}" {{ in_array(10 . '.' .$i, $rowCols->toArray(), true) ? 'disabled' : '' }}>
                                            <span class="fake mr-1" style="--before-fake:'{{$i}}'"></span>
                                        </label>
                                    @endfor
                                </div>

                                <input type="submit" class="btn btn-success d-block m-auto font-weight-bolder"
                                value="Забронировать">
                            </form>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <style>
        .checkbox {
            display: none;
        }

        .fake {
            display: inline-block;
            width: 40px;
            height: 40px;
            border: 1px solid rgb(222, 149, 46);
            position: relative;
            background-color: rgb(222, 149, 46);
            transition: all .2s;
            font-weight: bold;
            color: #fff;
            cursor: pointer;
        }

        .fake::before {
            content: var(--before-fake, '');
            position: absolute;
            width: 5px;
            height: 5px;
            bottom: 17px;
            right: 15px;
        }

        .checkbox:checked+.fake {
            background-color: rgb(57, 132, 61);
            border: 1px solid rgb(57, 132, 61);
        }

        .checkbox:disabled+.fake {
            background-color: rgb(57, 132, 61);
            border: 1px solid rgb(57, 132, 61);
        }

    </style>
@endsection

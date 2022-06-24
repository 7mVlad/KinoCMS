@extends('layouts.main')
@section('content')
    <section class="row">
        <div class="col-12 m-auto">
            <div class="wrapper pb-5" style="background-color: aliceblue; color:black">

                <div class="container">

                    <div class="col-12">
                        <div class="banner">
                            <img src="{{ Storage::url($cinema->top_banner) }}" style="width: 100%;height:400px">
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-3">
                            <h2>{{ $cinema->title }}</h2>
                        </div>
                        <div class="col-2" style="position: absolute; left:30px">
                            <table class="table table-bordered table-dark text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">Количество залов: {{count($halls)}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($halls as $hall)
                                        <tr>
                                            <td><a href="{{route('hall.show', $hall->id)}}">{{ $hall->hall_number }}</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-3 mb-5">
                            <img src="{{ Storage::url($cinema->logo_image) }}" alt="" style="width: 100%;height:150px">
                        </div>
                        <div class="col-3 ml-5">
                            <div class="btn btn-success d-block">Расписание сеансов</div>
                        </div>
                    </div>

                    <p>
                        {{ $cinema->description }}
                    </p>


                    <h3 class="text-center">Условия</h3>

                    <p>
                        {{ $cinema->conditions }}
                    </p>


                    <h4 class="text-center mb-3">ФОТОГАЛЕРЕЯ</h4>
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach ($cinemaImages as $key => $cinemaImage)
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"
                                    class="{{ $key == 0 ? 'active' : '' }}"></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach ($cinemaImages as $key => $cinemaImage)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img class="d-block w-100" height="500" src="{{ Storage::url($cinemaImage->path) }}">
                                </div>
                            @endforeach

                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>
@endsection

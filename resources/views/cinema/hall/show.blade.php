@extends('layouts.main')
@section('content')
    <section class="row">
        <div class="col-12 m-auto">
            <div class="wrapper pb-5" style="background-color: aliceblue; color:black">

                <div class="container">

                    <div class="col-12">
                        <div class="banner">
                            <img src="{{ Storage::url($hall->top_banner) }}" style="width: 100%;height:400px">
                        </div>
                    </div>

                    <div class="col-12">
                        <h2 class="text-center mt-5">{{ $hall->hall_number }}</h2>
                    </div>

                    <p>
                        {{ $hall->description }}
                    </p>


                    <h3 class="text-center">Карта зала</h3>

                    <div class="col-12">
                        <div class="hall_scheme">
                            <img src="{{Storage::url($hall->hall_scheme)}}" style="width: 100%;height:600px">
                        </div>
                    </div>



                    <h4 class="text-center mb-3">ФОТОГАЛЕРЕЯ</h4>
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach ($hallImages as $key => $hallImage)
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"
                                    class="{{ $key == 0 ? 'active' : '' }}"></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach ($hallImages as $key => $hallImage)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img class="d-block w-100" height="500" src="{{ $hallImage->path }}">
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

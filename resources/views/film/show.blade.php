@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="wrapper pb-5" style="background-color: aliceblue;color:black">

                <div class="container">

                    @if (isset($film->trailer_link))
                        <iframe style="width: 100%; min-height:500px" src="{{ $film->trailer_link }}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    @endif


                    <div class="row mt-5">
                        <div class="col-4">
                            <img src="{{ Storage::url($film->main_image) }}" alt="" style="width: 100%; height:400px">
                        </div>
                        <div class="col-8 mb-5">
                            <div class="btn btn-success d-block m-auto w-25">Купить билет</div>

                            <h2 class="mt-3 text-center mb-5">{{ $film->title }}</h2>

                            <p class="mb-5" style="color: black">
                                {{ $film->content }}
                            </p>

                            <h4 class="text-center mb-3">Кадры и постеры</h4>
                            <div id="carouselExampleIndicators" class="carousel slide w-75 m-auto" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    @foreach ($filmImages as $key => $filmImage)
                                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"
                                            class="{{ $key == 0 ? 'active' : '' }}"></li>
                                    @endforeach
                                </ol>
                                <div class="carousel-inner">
                                    @foreach ($filmImages as $key => $filmImage)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <img class="d-block w-100" height="350" src="{{ Storage::url($filmImage->path)}}">
                                        </div>
                                    @endforeach

                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

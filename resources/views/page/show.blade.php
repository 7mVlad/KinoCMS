@extends('layouts.main')
@section('content')


<div class="row">
    <div class="col-12 pb-5">
        <div class="container">

            <div class="img__block mb-5">
                <img src="{{ Storage::url($page->main_image) }}" style="width: 100%; height: 400px">
            </div>

            <h2 class="text-center">{{$page->title}}</h2>

            <p class="mt-5" style="color: black; line-height:1.4;">
                {{$page->content}}
            </p>

            <h3 class="text-center m-5">Фотогалерея</h3>
            <div id="carouselExampleIndicators" class="carousel slide w-75 m-auto" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach ($pageImages as $key => $pageImage)
                        @if ($key == 0)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"
                                class="active"></li>
                        @else
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}">
                            </li>
                        @endif
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach ($pageImages as $key => $pageImage)
                        @if ($key == 0)
                            <div class="carousel-item active">
                                <img class="d-block w-100" height="550" src="{{ $pageImage->path }}">
                            </div>
                        @else
                            <div class="carousel-item">
                                <img class="d-block w-100" height="550" src="{{ $pageImage->path }}">
                            </div>
                        @endif
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
@endsection

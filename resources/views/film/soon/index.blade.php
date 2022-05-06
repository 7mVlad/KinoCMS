@extends('layouts.main')
@section('content')
    <section class="row">
        <div class="col-12 m-auto">
            <div class="wrapper pb-5" style="background-color: aliceblue;">
                <div class="container">


                    <div class="film__inner d-flex flex-wrap">
                        <div class="row ml-5 mr-5 ">

                            @foreach ($films as $film)
                                @if ($film->release == 0)
                                    <div class="col-3 text-center mt-5 pb-5" style="height: 300px">
                                        <a class="text-dark" href="{{route('film.show', $film->id)}}">
                                            <img width="100%" height="100%" src="{{ Storage::url($film->main_image) }}">
                                            <h6 class="mt-2">{{ $film->title }}</h6>
                                            <div class="btn btn-success btn-sm">Купить билет</div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

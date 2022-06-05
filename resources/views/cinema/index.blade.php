@extends('layouts.main')
@section('content')
    <section class="row">
        <div class="col-12 m-auto">
            <div class="wrapper pb-5" style="background-color: aliceblue;">
                <div class="container">
                    <h2 class="text-center font-weight-bolder p-5">Наши Кинотеатры</h2>


                    <div class="film__inner d-flex flex-wrap">


                        @foreach ($cinemas as $cinema)
                            <div class="col-4">
                                <a href="#">
                                    <img src="{{ Storage::url($cinema->logo_image) }}" style="width: 100%"
                                        height="300">
                                    <h4 class="text-center font-weight-bolder pt-3">{{ $cinema->title }}</h4>
                                </a>

                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>
@endsection

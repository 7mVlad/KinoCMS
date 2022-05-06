@extends('layouts.main')
@section('content')
    <section class="row">
        <div class="col-12 m-auto">
            <div class="wrapper pb-5" style="background-color: aliceblue;color:black">
                <div class="container">

                    <h2 class="text-center pt-5">Новости</h2>

                    <div class="film__inner d-flex flex-wrap">
                        <div class="row ">

                            @foreach ($muchNews as $news)
                                <div class="col-4 mt-5 pb-5" style="height: 500px">
                                    <a href="{{ route('news.show', $news->id) }}">
                                    <img width="100%" height="60%" src="{{ Storage::url($news->main_image) }}">
                                        <div class="mt-2" style="font-size: 22px">{{ $news->title }}</div>
                                    </a>
                                    <div>{{ $news->date }}</div>
                                    <p style="font-size: 14px;line-height:1.4;">{{ $news->content }}</p>

                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

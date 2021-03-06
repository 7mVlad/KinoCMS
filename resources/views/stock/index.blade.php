@extends('layouts.main')
@section('content')
    <section class="row">
        <div class="col-12 m-auto">
            <div class="wrapper pb-5" style="background-color: aliceblue;color:black">
                <div class="container">

                    <h2 class="text-center pt-5">Акции и скидки</h2>

                    <div class="film__inner d-flex flex-wrap">
                        <div class="row ">

                            @foreach ($stocks as $stock)
                                <div class="col-4 mt-5 pb-5" style="height: 350px">
                                    <a href="{{ route('stock.show', $stock->id) }}">
                                    <img width="100%" height="70%" src="{{ Storage::url($stock->main_image) }}">
                                        <div class="mt-2" style="font-size: 22px">{{ $stock->title }}</div>
                                    </a>
                                    <div>{{date('d.m.Y', strtotime($stock->date))}}</div>
                                    <p style="font-size: 14px;line-height:1.4;">{{ $stock->content }}</p>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection


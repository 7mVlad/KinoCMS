@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="container">

                    <iframe style="width: 100%; min-height:500px" src="{{ $news->video_link }}"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>

                <div class="row mt-5 mb-5 pb-5" style="background-color: #0b394e;color:white">
                    <div class="col-12">
                        <h2 class="font-weight-bold mb-5 pt-3" style="color:white">{{ $news->title }}</h2>

                        <div class="row">
                            <div class="col-4">
                                <img src="{{ Storage::url($news->main_image) }}" alt="" style="width: 100%; height:250px">
                            </div>
                            <div class="col-8">
                                <p>{{ $news->content }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
